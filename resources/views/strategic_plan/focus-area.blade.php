@extends('layouts.strategic_app')

@section('content')
<div class="card row mt-2">
    <div class="card-header">
    <h3 class="card-title">Focus Area</h3>
    <a href="/focus-area-form" class ="btn btn-success float-right">Add Strategic Piller</a>

@include('navbar.strategy_nav')


    </div>

    @if(session('message'))
  <div class="alert alert-success">
    {{session('message')}}
  </div>
  @endif
    <!-- /.card-header -->
    <div class="card-body table-responsive p-3">
        <table id="example1" class="table table-bordered table-striped text-center">
              <thead class="thead-light">
                <tr>
                  <th>Strategic Piller</th>
                  <th>Description</th>
                  {{-- <th>Department Resposible</th> --}}
                  <th>Action</th>
                </tr>
              </thead>
            <tbody>


            @foreach($focus as $row)
              <tr>
              <td>{{$row->goal }}</td>
              <td>{{$row->description }}</td>
              {{-- <td>{{$row->department }}</td> --}}
              <td>


              <form action="{{ route('focus-area.destroy', $row->id) }}" method="POST">
              @csrf
              @method('delete')
              <a href="strategic_plan/focus-area_edit/{{$row->id}}" class="btn btn-outline-info btn-md"> <i class="fa fa-edit"></i> </a>
              <button type="submit" class="btn btn-outline-danger btn-md"> <i class="fa fa-trash"></i> </button>
              </form>
              </td>
              </tr>
              @endforeach
            </tbody>
       </table>
    </div>
</div>
@endsection
