<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:customers.index|customers.create|customers.edit|customers.delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->when(request()->q, function($customers) {
            $customers = $customers->where('name', 'like', '%'. request()->q . '%');
        })->paginate(5);

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
            'address'   => 'required',
            'phone'   => 'required|max:15',
            'email'   => 'required|email',
            'pic'   => 'required',
            'salesperson'   => 'required',
            'product'   => 'required',
        ]);

        $customers = Customer::create([
            'name'     => $request->name,
            'address'     => $request->address,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'pic'     => $request->pic,
            'salesperson'     => $request->salesperson,
            'product'     => $request->product,
        ]);

        if($customers){
            //redirect dengan pesan sukses
            return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('customers.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
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
        
        $this->validate($request, [
            'name'     => 'required',
            'address'   => 'required',
            'phone'   => 'required|max:15',
            'email'   => 'required|email',
            'pic'   => 'required',
            'salesperson'   => 'required',
            'product'   => 'required',
        ]);

        $customer = Customer::findOrFail($id);

        $customer->update([
            'name'     => $request->name,
            'address'     => $request->address,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'pic'     => $request->pic,
            'salesperson'     => $request->salesperson,
            'product'     => $request->product,
        ]);

        if($customer){
            //redirect dengan pesan sukses
            return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('customers.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $customer = Customer::findOrFail($id);
        $customer->delete();

        if($customer){
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
