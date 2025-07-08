@extends('layouts.strategic_app')

@section('content')
<div class="card row mt-2">
    <div class="card-header">
    <h3 class="card-title">Score Card</h3>
    <a href="/work-plan-form" class ="btn btn-success float-right">Add Work Plan</a>

@include('navbar.strategy_nav')


    </div>

    @if(session('message'))
  <div class="alert alert-success">
    {{session('message')}}
  </div>
  @endif
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table id="example1" class="table table-bordered table-striped text-center">
              <thead class="thead-light">
                <tr>
                  <th>Activity/Initiave</th>
                  <th>Description</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Days Left</th>
                  <th>Output</th>
                  <th>Budget</th>
                  <th>Status</th>
                  <th>Department Responsible</th>
                  <th>Person Responsible</th>
                  <th>Action</th>
                </tr>
              </thead>
            <tbody>


            @foreach($work as $row)
              <tr>
                <td>{{$row->activity }}</td>
                <td>{{$row->description }}</td>
                <td>{{$row->date }}</td>
                <td>{{$row->deadline }}</td>
                <td>{{$row->days_left }}</td>
                <td>{{$row->outcome }}</td>
                <td>{{$row->one_off_cost }}</td>
                <td>{{$row->status }}</td>
                <td>{{$row->department }}</td>
                <td>{{$row->person }}</td>
                <td class="btn-flex">
                  <a href="{{ route('workplan.edit', $row->id) }}" class="btn btn-outline-info btn-sm"> <i class="fa fa-edit"></i> </a>
                <form action="{{ route('workplan.destroy', $row->id) }}}}" method="POST">
                @csrf
                @method('delete')

                <button type="submit" class="btn btn-outline-danger"> <i class="fa fa-trash"></i> </button>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
       </table>
    </div>
</div>
@endsection
