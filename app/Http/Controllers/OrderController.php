<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Order;
use App\OrderDetail;
use App\Product;
use DB;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       return Order::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $name =  $request->ordername;
        $kabupaten = $request->kabupaten;
        $kecamatan = $request->kecamatan;
        $alamat = $request->alamat;
        $nohp = $request->nohp;
        $cart = Session::get('cart');
        
        $order = Order::create([
            'id_user' => null,
            'name_customer' => $name,
            'id_table' => null,
            'status_order' => 'pending',
            'kabupaten' =>$kabupaten,
            'kecamatan' => $kecamatan,
            'alamat' => $alamat,
            'no_hp' => $nohp,
            'total_price' => $request->total_price
        ]);
            
        foreach ($cart as $idp => $jumlah)
           
            {
                OrderDetail::create([
                    
                    'id_product' => $idp,
                    'id_order'      => $order->id,
                    'qty'           => $jumlah['cqty'],

                ]);
            }
           Session::put('cart', '');
        return $order->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        
        $data = DB::table('order_details')
            ->where('order_details.id_order','=',$id)
            ->join(
                'products',
                'products.id','=','order_details.id_product'
            )
            ->select(
                'products.name',
                'order_details.qty'
            )->get();

        
          return $data;
        

    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        
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

        $iduser = auth()->user()->id;
        $status = Order::find($id)->status_order;
       if ($status == 'pending') {
            $data = 'diproses';
        }elseif($status == 'diproses'){
            $data = 'dibayar';
        }else{
            $data = 'selesai';
        }

        Order::where('id',$id)->update(['status_order' => $data,
            'id_user' => $iduser
        ]);
        return $data;
        // return $status[0]->status_order;
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
