<?php

namespace App\Services;

use DateTime;
use DateInterval;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Ticket;

class ReportService {

    private $year, $month, $id;

    public function __construct(int $year, int $month, int $id = null)
    {
        $this->year = $year;
        $this->month = $month;
        $this->id = $id;
    }

    public function getMonthlyTickets()
    {
        $monthlyTickets = Ticket::whereYear('reporteddate', $this->year)
                                ->whereMonth('reporteddate', $this->month)
                                ->when(!is_null($this->id), function($monthlyTickets){
                                    $monthlyTickets = $monthlyTickets->whereYear('reporteddate', $this->year)
                                    ->whereMonth('reporteddate', $this->month)
                                    ->where('assignee', $this->id);
                                })->count(); 
        return $monthlyTickets;   
    }

    public function getMonthlyDoneTickets()
    {
        $monthlyDoneTickets = Ticket::whereYear('reporteddate', $this->year)
                                ->whereMonth('reporteddate', $this->month)
                                ->Where('status', 'Closed')
                                ->when(!is_null($this->id), function($monthlyDoneTickets){
                                    $monthlyDoneTickets = $monthlyDoneTickets
                                    ->whereYear('reporteddate', $this->year)
                                    ->whereMonth('reporteddate', $this->month)
                                    ->Where('status', 'Closed')
                                    ->where('assignee', $this->id);
                                })->count(); 
        return $monthlyDoneTickets;   
    }

    public function getMonthlyPendingTickets()
    {
        $monthlyPendingTickets = Ticket::whereYear('reporteddate', $this->year)
                                ->whereMonth('reporteddate', $this->month)
                                ->Where('status', 'Pending')
                                ->when(!is_null($this->id), function($monthlyPendingTickets){
                                    $monthlyPendingTickets = $monthlyPendingTickets
                                    ->whereYear('reporteddate', $this->year)
                                    ->whereMonth('reporteddate', $this->month)
                                    ->Where('status', 'Pending')
                                    ->where('assignee', $this->id);
                                })->count(); 
        return $monthlyPendingTickets;   
    }

    public function getOverdueTickets(String $code = null)
    {
        $assignedTickets = Ticket::with('sla:id,resolution,warning')
                                ->whereYear('reporteddate', $this->year)
                                ->whereMonth('reporteddate', $this->month)
                                ->where('status', 'Assigned')
                                ->when(!is_null($this->id), function($assignedTickets){
                                    $assignedTickets = $assignedTickets->whereYear('reporteddate', $this->year)
                                    ->whereMonth('reporteddate', $this->month)
                                    ->where('status', 'Assigned')
                                    ->where('assignee', $this->id);
                                })->get();
        $assigned_plus = 0;

        if($code == 'red'){
            foreach($assignedTickets as $ticket)
            {  
                $time = Carbon::parse($ticket->reporteddate);
                $new_time = $time->addHours($ticket->sla->resolution);
                if($new_time->lt(now())){
                    $assigned_plus = +1;
                }   
            }
        } elseif($code == 'yellow'){
            foreach($assignedTickets as $ticket)
            {
                $time = Carbon::parse($ticket->reporteddate);
                $warning_time = $time->addHours($ticket->sla->warning);
                $resolution_time = $time->addHours($ticket->sla->resolution); 
                if(now()->between($warning_time, $resolution_time)){
                    $assigned_plus = +1;
                }
            }
        }
        return $assigned_plus;
    }

    public function getAllTechnicianTickets(){
        $technicians = User::role('Teknisi')->get();
        $allReport = collect([]);
        foreach($technicians as $technician){
            $report = new ReportService(now()->format('Y'), now()->format('m'), $technician->id);
            $combined = $allReport->push(['name' => $technician->name, 'assigned' => $report->getMonthlyTickets(), 'expired' => $report->getOverdueTickets('red'), 'warning' => $report->getOverdueTickets('yellow'), 'pending' => $report->getMonthlyPendingTickets(), 'done' => $report->getMonthlyDoneTickets()]);
        }
        return $combined;
    }
}


