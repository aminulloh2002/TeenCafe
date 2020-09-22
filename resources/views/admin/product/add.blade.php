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
                <form method="post" class="form-horizontal" enctype="multipart/form-data" action="{{route('product.store')}}" >
                    @csrf
                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Name Product</label>
                        <div class="col-sm-10">
                            <input name="name" value="{{old('name')}}" type="text" class="form-control"
                                   placeholder="Input text">
                                   @error('name')
                                    <small style="color: red; font-style:italic;">Nama harus di isi</small>
                                    @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Price</label>
                        <div class="col-sm-10">
                            <input name="price" value="{{old('price')}}" type="text" class="form-control"
                                   placeholder="Input text">
                                   @error('price')
                                   <small style="color: red; font-style:italic;">Harga harus di isi</small>
                                   @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Qty</label>
                        <div class="col-sm-10">
                            <input name="qty" value="{{old('qty')}}" type="text" class="form-control"
                                   placeholder="Input text">
                                   @error('qty')
                                   <small style="color: red; font-style:italic;">Nama harus di isi</small>
                                   @enderror
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <select name="status" class="form-control" >
                                <option value="Tersedia">Tersedia</option>
                                <option value="Kosong">Kosong</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            Description
                        </label>
                        <div class="col-sm-10 col-md-10">
                            <textarea rows="4" class="form-control resize_vertical" value="{{old('description')}}" name="description" style="height: 115px;"></textarea>
                            @error('description')
                            <small style="color: red; font-style:italic;">Nama harus di isi</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input name="image" type="file" class="form-control" >
                            @error('image')
                            <small style="color: red; font-style:italic;">Nama harus di isi</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Variant</label>
                        <div class="col-sm-10">
                            <select name="variant" class="form-control" >
                                <option value="Minuman">Minuman</option>
                                <option value="Makanan">Makanan</option>
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