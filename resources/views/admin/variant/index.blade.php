@extends('admin.main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="ti-list"></i> Data Table with Action buttons
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
                            <th>Number Of Table</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($variants as $variant)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $variant->sub_variant}}</td>
                            <form action="{{route('variant.destroy',$variant->id)}}" method="post" >
                                <td>
                                    <a class="btn btn-primary btn-xs" href="{{route('variant.edit',$variant->id)}}"><span
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
                    {!! $variants->links() !!}
                    <a href="{{route('variant.create')}}" class="btn btn-primary">Add </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection