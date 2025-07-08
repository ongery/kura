@extends('layouts.strategic_app')

@section('content')
<div class="card row mt-2">
    <div class="card-header">
    <h3 class="card-title">Score Card</h3>
    <a href="/score-card-form" class ="btn btn-success float-right">Add Score Card</a>

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
                  <th>Strategic Pillar</th>
                  <th>Strategic Objective</th>
                  <th>Target</th>
                  <th>Measure (KPI)</th>
                  <th>2020</th>
                  <th>2021</th>
                  <th>2022</th>
                  <th>2023</th>
                  <th>2024</th>
                  <th>2025</th>
                  <th>Monitoring Frequency</th>
                  <th>Department</th>
                  <th>Person Responsible</th>
                  <th>Options</th>
                </tr>
              </thead>
            <tbody>


            @foreach($score as $row)
              <tr>
              <td>{{$row->goal }}</td>
              <td>{{$row->objective }}</td>
              <td>{{$row->target }}</td>
              <td>{{$row->measure }}</td>
              <td>{{$row->b_2020 }}</td>
              <td>{{$row->b_2021 }}</td>
              <td>{{$row->b_2022 }}</td>
              <td>{{$row->b_2023 }}</td>
              <td>{{$row->b_2024 }}</td>
              <td>{{$row->b_2025 }}</td>
              <td>{{$row->frequency }}</td>
              <td>{{$row->department }}</td>
              <td>{{$row->person }}</td>
              <td class="btn-flex">
                <a href="strategic_plan/score-card_edit/{{$row->scorecard_id}}" class="btn btn-outline-info btn-md"> <i class="fa fa-edit"></i> </a>
                <form action="{{ route('score-card.destroy', $row->scorecard_id) }}" method="POST">
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
