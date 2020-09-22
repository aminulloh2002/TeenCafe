<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use PDF;
class CariLaporan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak_pdf($awal ,$akhir)
    {
        // $orders = Order::where('name_customer','like',"%".$value."%")->where('status_order','selesai')->paginate(10);
        $orders     = Order::whereBetween('created_at',[$awal, $akhir])->where('status_order','selesai')->get(); 
        // $orders = Order::all();
        $pdf = PDF::loadview('admin.report.reportorder_pdf',compact('orders','awal','akhir'));
    	return $pdf->download('laporan-orders-pdf');
    }
    public function cari(Request $request)
    {
        $value      = $request->nilai;
        $bln_st     = $request->bulan_start;
        $thn_st     = $request->tahun_start;
        $bln_fs     = $request->bulan_finish;
        $thn_fs     = $request->tahun_finish;

        $awal       = $thn_st.'-'.$bln_st.'-01 00:00:01';
        $akhir      = $thn_fs.'-'.$bln_fs.'-31 23:59:59';

        // $orders = Order::where('name_customer','like',"%".$value."%")->where('status_order','selesai')->paginate(10);
        $orders     = Order::whereBetween('created_at',[$awal, $akhir])->where('status_order','selesai')->get(); 
        // $orders = Order::all();
        return view('admin.report.result',compact('orders','awal','akhir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
