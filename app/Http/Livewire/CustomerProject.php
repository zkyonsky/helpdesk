<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Project;

class CustomerProject extends Component
{
    public $selectedCustomer = null;
    public $selectedProject = null;
    public $projects = null;
    public $customerProject = null;

    public function mount($customerId)
    {
        $this->selectedCustomer = $customerId;
    }

    public function render()
    {
        return view('livewire.customer-project', [
            'customers' => Customer::all()
        ]);
    }

    public function updatedSelectedCustomer($customer_id)
    {
        $this->projects = Project::where('customer_id', $customer_id)->get();

        $this->dispatchBrowserEvent('customer-updated', ['selectedCustomer' => $customer_id]);
    }

    public function updatedSelectedProject($project_id)
    {
        $this->customerProject = Project::findOrFail($project_id);
    }

}
