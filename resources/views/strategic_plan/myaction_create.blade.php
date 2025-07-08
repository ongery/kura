
@extends('layouts.strategic_app')

@section('content')
<div class="card">
    <div class="card-header bg-success">
      <h3 class="card-title"> My Action </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <a class="btn btn-primary btn-sm" href="/work-plan"> <i class="fa fa-chevron-left"></i> Back </a>
            <div class="card mt-4">
                <div class="card-header bg-success text-light">
                    Update My Action
                </div>
                <div class="card-body">
                    <form action="{{ route('objectives.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
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
                                        <input type="text" name="description" placeholder="Activity" class="form-control" value="{{ $row->description }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Attachment</label>
                                        <input type="text" name="activity" placeholder="Activity" class="form-control" value="{{ $row->activity }}">
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
