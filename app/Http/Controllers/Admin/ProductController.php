<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Product;
use App\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::OrderBy('id','desc')->paginate(10);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $variants = Variant::all();
        return view('admin.product.add',compact('variants'));
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
            'name'        => 'required',
            'price'       => 'required|integer',
            'qty'         => 'required|integer',
            'status'      => 'required',
            'description' => 'required',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'variant'     => 'required',
            'sub_variant' => 'required'
        ]);        
      
 
        if ($files = $request->file('image')) {
           $destinationPath = 'image/product/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
        }
//protected $fillable = ['name','price','qty','status','description','image','variant','sub_variant'];
    
    
        Product::create([
    		'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qty,
            'status' => $request->status,
            'description' => $request->description,
            'image' => $profileImage,
            'variant' =>$request->variant,
            'sub_variant' =>$request->sub_variant,
    	]);

        return redirect()->route('product.index')->with('status','Data Barang Berhasil Ditambahakan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.user.detail',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $variants= Variant::all();
        return view('admin.product.edit',compact('product'),compact('variants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'   => ['required'],
            'price'         => ['required','integer'],
            'qty'         => ['required','integer'],
            'status'          => ['required'],
            'description'         => ['required'],
            'image' => 'required',
            'new_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'variant' =>['required'],
            'sub_variant' => ['required']
        ]);     
        if($request->new_image != ""){
            $request->validate([
                'name'   => ['required'],
                'price'         => ['required','integer'],
                'qty'         => ['required','integer'],
                'status'          => ['required'],
                'description'         => ['required'],
                'new_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'variant' =>['required'],
                'sub_variant' => ['required']
            ]);
            if ($files = $request->file('foto_baru')) {
                $destinationPath = 'image/product/'; // upload path
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
             }
             Product::update([
                'name' => $request->name,
                'price' => $request->price,
                'qty' => $request->qty,
                'status' => $request->status,
                'description' => $request->description,
                'image' => $profileImage,
                'variant' =>$request->variant,
                'sub_variant' =>$request->sub_variant,
            ]);
            return redirect()->route('product.index')->with('status','Data User Berhasil DiEdit');

        }else{
            $product->update($request->all());
            return redirect()->route('product.index')->with('status','Data User Berhasil DiEdit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('status','Data Produk Berhasil Dihapus');
    }
}
