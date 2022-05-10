<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:projects.index|projects.create|projects.edit|projects.delete']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->when(request()->q, function($projecs) {
            $projecs = $projecs->where('name', 'like', '%'. request()->q . '%');
        })->paginate(10);

        $customer = new Customer();

        return view('projects.index', compact('projects', 'customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::orderBy('name', 'asc')->get();
        return view('projects.create', compact('customers'));
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
            'name' => 'required',
            'customer_id' => 'required',
            'deliverystart' => 'required',
            'deliveryend' => 'required',
            'installstart' => 'required',
            'installend' => 'required',
            'uatstart' => 'required',
            'uatend' => 'required',
            'billstart' => 'required',
            'billdue' => 'required',
            'warrantyperiod' => 'required',
            'contractstart' => 'required',
            'contractperiod' => 'required',
        ]);

        $project = Project::create([
            'name' => $request->name,
            'customer_id' => $request->customer_id,
            'deliverystart' => $request->deliverystart,
            'deliveryend' => $request->deliveryend,
            'installstart' => $request->installstart,
            'installend' => $request->installend,
            'uatstart' => $request->uatstart,
            'uatend' => $request->uatend,
            'billstart' => $request->billstart,
            'billdue' => $request->billdue,
            'warrantyperiod' => $request->warrantyperiod,
            'contractstart' => $request->contractstart,
            'contractperiod' =>$request->contractperiod,
         ]);

         $project->save();

         if($project){
            //redirect dengan pesan sukses
            return redirect()->route('projects.index')->with(['success' => 'Project Berhasil Dibuat']);
            
        }else{
        //     //redirect dengan pesan error
            return redirect()->route('projects.index')->with(['error' => 'Project Gagal Dibuat']);
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
        $project = Project::findOrFail($id);
        $customers = Customer::orderBy('name', 'asc')->get();
        return view('projects.edit', compact('project', 'customers'));
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
            'name' => 'required',
            'customer_id' => 'required',
            'deliverystart' => 'required',
            'deliveryend' => 'required',
            'installstart' => 'required',
            'installend' => 'required',
            'uatstart' => 'required',
            'uatend' => 'required',
            'billstart' => 'required',
            'billdue' => 'required',
            'warrantyperiod' => 'required',
            'contractstart' => 'required',
            'contractperiod' => 'required',
        ]);

        $project = Project::findOrFail($id);


        $project->update([
            'name' => $request->name,
            'customer_id' => $request->customer_id,
            'deliverystart' => $request->deliverystart,
            'deliveryend' => $request->deliveryend,
            'installstart' => $request->installstart,
            'installend' => $request->installend,
            'uatstart' => $request->uatstart,
            'uatend' => $request->uatend,
            'billstart' => $request->billstart,
            'billdue' => $request->billdue,
            'warrantyperiod' => $request->warrantyperiod,
            'contractstart' => $request->contractstart,
            'contractperiod' =>$request->contractperiod,
         ]);

         if($project){
            //redirect dengan pesan sukses
            return redirect()->route('projects.index')->with(['success' => 'Project Berhasil Diubah']);
            
        }else{
        //     //redirect dengan pesan error
            return redirect()->route('projects.index')->with(['error' => 'Project Gagal Diubah']);
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
        $project = Project::findOrFail($id);
        $project->delete();

        if($project){
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
