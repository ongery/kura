
@extends('layouts.strategic_app')

@section('content')
<div class="function-btn py-2">
    <a class="btn btn-primary btn-sm" href="/profile_form"> <i class="fa fa-chevron-left"></i> Back </a>
</div>
<div class="card">
    <div class="card-body">
            <div class="card mt-4">
                <div class="card-header bg-success text-light">
                    Create Mission
                </div>
                <div class="card-body">
                   <form action="{{ route('mission.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mission</label>
                                        <textarea type="text" name="name" placeholder="Mission" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-success btn-sm mt-2"> <i class="fa fa-save"></i> Save </button>
                   </form>
                </div>
            </div>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
