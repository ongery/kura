
@extends('layouts.strategic_app')

@section('content')
<div class="function-btn py-2">
    <a class="btn btn-primary btn-sm" href="{{ route('myactions.index') }}"> <i class="fa fa-chevron-left"></i> Back </a>
</div>
<div class="card">
    <div class="card-header bg-success">
      <h3 class="card-title"> My Actions </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
            <div class="card mt-4">
                <div class="card-header bg-success text-light">
                    Create Action
                </div>
                <div class="card-body">
                   <form action="{{ route('myactions.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="description" placeholder="Description" class="form-control" value="{{ old('description') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Attach File</label>
                                        <input type="file" name="attachment" class="form-control">
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-success mt-2"> <i class="fa fa-check-circle"></i> Submit & Post</button>
                   </form>
                </div>
            </div>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
