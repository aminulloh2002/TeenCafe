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
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="panel-body">
                <form method="post" class="form-horizontal" action="{{route('meja.update',$meja->id)}}" >
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="input-text" class="col-sm-2 control-label">Number Of Table</label>
                        <div class="col-sm-10">
                        <input name="no_table"  value="{{$meja->no_table}}" value="{{old('no_table')}}" type="text" class="form-control" id="input-text"
                                   placeholder="Input text">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection