@extends('admin.main')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-move"></i> General Elements
                </h3>
                <span class="pull-right">
                        <i class="fa fa-fw ti-angle-up clickable"></i>
                        <i class="fa fa-fw ti-close removepanel clickable"></i>
                    </span>
            </div>
            <div class="panel-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data" action="{{route('product.update',$product->id)}}" >
                    @csrf
                    @method('put')
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Name Product</label>
                        <div class="col-sm-10">
                            <input name="name" value="{{$product->name}}" value="{{old('name')}}" type="text" class="form-control" id="input-text"
                                   placeholder="Input text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-10">
                            <input name="price" value="{{$product->price}}" value="{{old('price')}}" type="text" class="form-control" id="input-text"
                                   placeholder="Input text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Qty</label>
                        <div class="col-sm-10">
                            <input name="qty" value="{{$product->qty}}" value="{{old('qty')}}" type="text" class="form-control" id="input-text"
                                   placeholder="Input text">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control" >
                                @if ($product->status=="Tersedia")
                                <option value="Tersedia" selected>Tersedia</option>
                                <option value="Kosong">Kosong</option>
                                @else
                                <option value="Kosong" selected>Kosong</option>
                                <option value="Tersedia" >Tersedia</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Description
                        </label>
                        <div class="col-sm-10 col-md-10">
                            <textarea rows="4" class="form-control resize_vertical"  name="description" value="{{old('description')}}" style="height: 115px;">{{$product->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">New Image(Optional)</label>
                        <div class="col-sm-10">
                            <input name="new_image" type="file" class="form-control" >
                            <input type="text" name="image" value="{{$product->image}}" hidden >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Variant</label>
                        <div class="col-sm-10">
                            <select name="variant" class="form-control" >
                                @if ($product->variant=="Minuman")
                                <option value="Minuman" selected>Minuman</option>
                                <option value="Makanan">Makanan</option>
                                @else
                                <option value="Minuman">Minuman</option>
                                <option value="Makanan" selected>Makanan</option>
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Sub Variant</label>
                        <div class="col-sm-10">
                            <select name="sub_variant" class="form-control" >
                                @foreach ($variants as $variant)
                                <option value="{{ $variant->sub_variant}}">{{ $variant->sub_variant}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection