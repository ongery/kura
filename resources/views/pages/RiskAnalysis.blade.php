@extends('layouts.master')
@section('main-content')

<div class="card row mt-2">
    <div class="card-header">
        <h3 class="card-title">Risks Library</h3>
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show">
        <strong>Success!</strong> Created successfully.
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    @endif

    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <livewire:risk-analysis />
    </div>
</div>


@endsection
