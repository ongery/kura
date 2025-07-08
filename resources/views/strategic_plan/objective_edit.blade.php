
@extends('layouts.strategic_app')

@section('content')
<div class="function-btn py-2">
    <a class="btn btn-success btn-sm" href="/objectives/create"> <i class="fa fa-plus"></i> Edit Objectives </a>
</div>
<div class="card">
    <div class="card-header bg-success">
      <h3 class="card-title"> Strategic Objectives </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a class="btn btn-primary btn-sm" href="{{ route('objectives.index') }}"> <i class="fa fa-chevron-left"></i> Back </a>
            <div class="card mt-4">
                <div class="card-header bg-success text-light">
                    Create New Category
                </div>
                <div class="card-body">
                    <form action="{{ route('objectives.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Objective</label>
                                        <input type="text" name="name" placeholder="Objective" class="form-control" value="{{ $row->name }}">
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-success mt-2"> <i class="bi bi-check-circle"></i> Submit & Post</button>
                   </form>
                </div>
            </div>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
