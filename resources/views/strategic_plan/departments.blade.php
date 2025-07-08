@extends('layouts.strategic_app')

@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/department_form" class ="btn btn-success float-right">Add Departments</a>
        <h3 class="card-title">Available Departments</h3>
    </div>

    @if(session('message'))
  <div class="alert alert-success">
    {{session('message')}}
  </div>
  @endif
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
    <table class="table table-striped table-hover table-sm">
              <thead class="thead-light">
                <tr>
                  <th>Department Code</th>
                  <th>Department Name</th>
                  <th>Action</th>
                </tr>
              </thead>
            <tbody>

              @foreach($dept as $depts)
              <tr>
              <td>{{$depts->department_code }}</td>
              <td>{{$depts->department_name }}</td>
              <td class="btn-flex">
                <a href="strategic_plan/department_edit/{{$depts->id}}" class="btn btn-outline-info btn-md"> <i class="fa fa-edit"></i> </a>

              <form action="/departments/{{ $depts->id }}" method="POST">
              @csrf
              @method('delete')

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
