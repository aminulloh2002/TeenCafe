<?php

namespace App\Http\Controllers\Admin;
use App\Meja;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meja = Meja::OrderBy('id','desc')->paginate(10);
        return view('admin.table.index',compact('meja'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.table.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_table'   => ['required','integer'],
        ]);        


    
        Meja::create($request->all());

        return redirect()->route('meja.index')->with('status','Data Variant Succesfully Added');
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
    public function edit(Meja $meja)
    {
        return view('admin.table.edit',compact('meja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Meja $meja)
    {
        $request->validate([
            'no_table'   => ['required','integer'],
        ]);        

        $meja->update($request->all());
        return redirect()->route('meja.index')->with('status','Data Meja Berhasil Diupdate');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meja $meja)
    {
        $meja->delete();
        return redirect()->route('meja.index')->with('status','Data Meja Berhasil Dihapus');
 
    }
}
