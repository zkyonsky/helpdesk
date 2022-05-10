<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Project;
use Livewire\Component;

class Customerdata extends Component
{
    public $selectedCustomer = null;
    public $tes;

    public function render()
    {
        

        return view('livewire.customerdata', 
                    [
                        'customers' => Customer::all()
                    ]);
        
    }
}
