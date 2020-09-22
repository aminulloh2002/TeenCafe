@extends('admin.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="ti-list"></i> Products
                </h3>
                <span class="pull-right">
                        <i class="fa fa-fw ti-angle-up clickable"></i>
                    </span>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    @if(session('status'))
                    <div class="alert alert-success col-md-12 mt-3 ml-3 mr-5">
                        {{session('status')}}
                    </div>
                    @endif
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>status</th>
                            <th>Variant</th>
                            <th>Sub Variant</th>  
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name}}</td>
                            <td>{{ $product->price}}</td>
                            <td>{{ $product->status}}</td>
                            <td>{{ $product->variant}}</td>
                            <td>{{ $product->sub_variant}}</td>
                            <form action="{{route('product.destroy',$product->id)}}" method="post" >
                                
                            <td>
                                

                                    <a class="btn btn-primary btn-xs" href="{{route('product.edit',$product->id)}}"><span
                                            class="fa fa-fw ti-pencil"></span></a>

                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-xs" type="submit"><span
                                            class="fa fa-fw ti-trash"></span></button>

                            </td>
                            </form> 
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('product.create')}}" class="btn btn-primary">Add </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection