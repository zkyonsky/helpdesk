<?php

namespace App\Http\Controllers;

use App\Models\Sla;
use App\Models\User;
use App\Models\Ticket;
use App\Mail\MailNotify;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Providers\LogActivity as ProvidersLogActivity;

class TicketController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:tickets.index|tickets.create|tickets.edit|tickets.delete']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('Teknisi'))
        {
            $tickets = Ticket::where('assignee', Auth::id())->latest()->when(request()->q, function($tickets) {
                $tickets = $tickets->where('problemsummary', 'like', '%'. request()->q . '%');
            })->paginate(5);
        } else {
            $tickets = Ticket::latest()->when(request()->q, function($tickets) {
                $tickets = $tickets->where('problemsummary', 'like', '%'. request()->q . '%');
            })->paginate(5);
        }
        

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slas = Sla::orderBy('name', 'asc')->get();
        $users = User::role('teknisi')->get();
        return view('tickets.create', compact('slas', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'updated_customer' => 'required',
            'reporteddate' => 'required|date',
            'sla_id' => 'required',
            'summary' => 'required',
            'detail' => 'required',
            'technician_id' => 'required',
        ]);

        $year = today()->year;
        $latest_ticket = Ticket::latest()->first();
        $last_number = Str::of($latest_ticket->number)->explode('/');
        $new_number = $last_number->get(0)+1;
        $ticket = Ticket::create([
            'number' => $new_number."/".$year,
            'sla_id' => $request->input('sla_id'),
            'reportedby' => Auth::id(),
            'customer_id' => $request->input('updated_customer'),
            'reporteddate' => $request->input('reporteddate'),
            'problemsummary' => $request->input('summary'),
            'problemdetail' => $request->input('detail'),
            'status' => 'Assigned',
            'assignee' => $request->input('technician_id'),
            'assigneddate' => now() 
         ]);

         $ticket->save();
         

         if($ticket){
            //redirect dengan pesan sukses
            $technician = User::findOrFail($request->input('technician_id'));
            $user = Auth::user();
            $subject = 'Membuat Tiket No '. $ticket->number;
            event(new ProvidersLogActivity($user, $subject));
            Mail::to($technician->email)->queue(new MailNotify($ticket));
            // dispatch(new SendEmailJob($technician->email, $ticket));
            return redirect()->route('tickets.index')->with(['success' => 'Tiket Berhasil Dibuat']);
            
        }else{
        //     //redirect dengan pesan error
            return redirect()->route('tickets.index')->with(['error' => 'Tiket Gagal Dibuat']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $slas = Sla::orderBy('name', 'asc')->get();
        $users = User::role('teknisi')->get();
        $customer = new Customer;
        return view('tickets.edit', compact('ticket', 'slas', 'users', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'updated_customer' => 'required',
            'reporteddate' => 'required|date',
            'sla_id' => 'required',
            'summary' => 'required',
            'detail' => 'required',
            'technician_id' => 'required',
        ]);

        $ticket = Ticket::findOrFail($id);

        $ticket->update([
            'sla_id' => $request->input('sla_id'),
            'customer_id' => $request->input('updated_customer'),
            'reporteddate' => $request->input('reporteddate'),
            'problemsummary' => $request->input('summary'),
            'problemdetail' => $request->input('detail'),
            'assignee' => $request->input('technician_id'),
            'resolution' => $request->input('resolution'),
            'status' => $request->input('status')
         ]);

         if($ticket){
            //redirect dengan pesan sukses
            $user = Auth::user();
            $subject = 'Memperbaharui Tiket No '. $ticket->number;
            event(new ProvidersLogActivity($user, $subject));
            return redirect()->route('tickets.index')->with(['success' => 'Tiket Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('tickets.index')->with(['error' => 'Tiket Gagal Diupdate!']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        if($ticket){
            $user = Auth::user();
            $subject = 'Menghapus Tiket No '. $ticket->number;
            event(new ProvidersLogActivity($user, $subject));
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
