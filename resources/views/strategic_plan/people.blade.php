@extends('layouts.strategic_app')

@section('content')
<div class="card row mt-2">
    <div class="card-header">
        <a href="/people_form" class ="btn btn-success float-right">Add Persons</a>
        <h3 class="card-title">Various Departimental Heads</h3>
    </div>

    @if(session('message'))
  <div class="alert alert-success">
    {{session('message')}}
  </div>
  @endif
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
    <table class="table table-bordered table-hover table-sm">
              <thead class="thead-light">
                <tr>
                  <th>FullNames</th>
                  <th>Department</th>
                  <th>Position</th>
                  <th>Action</th>
                </tr>
              </thead>
            <tfoot>
                <tr>
                  <th>FullNames</th>
                  <th>Department</th>
                  <th>Position</th>
                  <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
  
               
            @foreach($persons as $person)
              <tr>
              <td>{{$person->names }}</td>
              <td>{{$person->department }}</td>
              <td>{{$person->level }}</td>
              <td>
                <a href="strategic_plan/persons_edit/{{$person->id}}" class="btn btn-outline-info btn-sm">Edit</a>
                 
              <form action="/persons/{{ $person->id }}" method="POST"> 
              @csrf 
              @method('delete')

              <button type="submit" class="btn btn-outline-danger">Delete</button>
              </form>
              </td>
              </tr>
              @endforeach
            </tbody>
       </table>
    </div>
</div>
@endsection