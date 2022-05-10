<?php

namespace App\Http\Controllers;

use App\Models\Sla;
use Illuminate\Http\Request;

class SlaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:slas.index|slas.create|slas.edit|slas.delete']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slas = Sla::orderBy('name')->when(request()->q, function($slas) {
            $slas = $slas->where('name', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('slas.index', compact('slas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slas.create');
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
            'response'   => 'required|numeric',
            'resolution'   => 'required|numeric',
            'warning'   => 'required|numeric',
        ]);

        $slas = Sla::create([
            'name'     => $request->name,
            'response'   => $request->response,
            'resolution'   => $request->resolution,
            'warning'   => $request->warning,
        ]);

        if($slas){
            //redirect dengan pesan sukses
            return redirect()->route('slas.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('slas.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $sla = Sla::findOrFail($id);

        return view('slas.edit', compact('sla'));
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
            'response'   => 'required|numeric',
            'resolution'   => 'required|numeric',
            'warning'   => 'required|numeric',
        ]);
        
        $sla = Sla::findOrFail($id);
        $sla->update([
            'name'     => $request->name,
            'response'   => $request->response,
            'resolution'   => $request->resolution,
            'warning'   => $request->warning,
        ]);

        if($sla){
            //redirect dengan pesan sukses
            return redirect()->route('slas.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('slas.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $sla = Sla::findOrFail($id);
        $sla->delete();

        if($sla){
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
