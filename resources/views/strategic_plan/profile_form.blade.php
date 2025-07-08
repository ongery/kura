@extends('layouts.strategic_app')






@section('content')
<div class="card">
    <div class="card-header">
        <a href="/profile" class ="btn btn-success float-right">Back</a>
        <h3 class="card-title">Create Your Profile</h3>
    </div>

    @foreach($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach


    <div class="card-body">
        <form action="{{ route('avatar.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label> Upload Avatar </label>
                        <input type="file" class="form-control" name="avatar">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-sm"> <i class="fa fa-upload"></i> Upload</button>
            <hr>
        </form>
    </div>
</div>

<div class="py-4">
    <div class="card">
        <div class="card-header bg-success text-light text-center"> Vision </div>
        <div class="card-body">
            <a class="btn btn-success btn-sm" href="/vision/create">Create Vision</a>
            <table class="table table-bordered table-striped text-center mt-4">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Vision</th>
                    <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visions as $key => $vision)
                        <tr class="text-center">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $vision->name }}</td>
                            <td class="text-center">
                                <form action="{{ route('vision.destroy',$vision->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-success btn-sm" href="{{ route('vision.edit', $vision->id) }}"> <i class="fa fa-edit"></i> </a>
                                    <button type="submit" class="btn btn-danger btn-sm mx-2"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

<div class="py-4">
    <div class="card">
        <div class="card-header bg-primary text-light text-center"> Mission </div>
        <div class="card-body">
            <a class="btn btn-primary btn-sm" href="/mission/create">Create Mission</a>
            <table class="table table-bordered table-striped text-center mt-4">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Mission</th>
                    <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($missions as $key => $mission)
                        <tr class="text-center">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $mission->name }}</td>
                            <td class="text-center">
                                <form action="{{ route('mission.destroy',$mission->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-success btn-sm" href="{{ route('mission.edit', $mission->id) }}"> <i class="fa fa-edit"></i> </a>
                                    <button type="submit" class="btn btn-danger btn-sm mx-2"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

<div class="py-4">
    <div class="card">
        <div class="card-header bg-info text-light text-center"> Core Values </div>
        <div class="card-body">
            <a class="btn btn-info btn-sm" href="/values/create">Create Values</a>
            <table class="table table-bordered table-striped text-center mt-4">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>Values</th>
                    <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($values as $key => $value)
                        <tr class="text-center">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td class="text-center">
                                <form action="{{ route('values.destroy',$value->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-success btn-sm" href="{{ route('values.edit', $value->id) }}"> <i class="fa fa-edit"></i> </a>
                                    <button type="submit" class="btn btn-danger btn-sm mx-2"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
