
@extends('layouts.strategic_app')

@section('content')

<div class="card">

    <div class="card-body">
        <a class="btn btn-primary btn-sm" href="/profile_form"> <i class="fa fa-chevron-left"></i> Back </a>
            <div class="card mt-4">
                <div class="card-header bg-success text-light">
                   Edit Mission
                </div>
                <div class="card-body">
                    <form action="{{ route('mission.update', $mission->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mission</label>
                                        <textarea type="text" name="name" placeholder="Mission" rows="10" class="form-control">{{ $mission->name }}</textarea>
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
