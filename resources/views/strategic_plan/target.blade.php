@extends('layouts.strategic_app')

@section('content')
<div class="btn text-right">

</div>
<div class="card row mt-2">
    <div class="card-header">
        <h3 class="card-title">Targets Table</h3>
        {{-- <a class="btn btn-primary btn-sm float-right" href="/target-form">Add Target</a> --}}

@include('navbar.strategy_nav')


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
                  <th>Baseline 2020(Number)</th>
                  <th>2021(Number)</th>
                  <th>2022(Number)</th>
                  <th>2023(Number)</th>
                  <th>2024(Number)</th>
                  <th>2025(Number)</th>
                  <th>Action</th>
                </tr>
              </thead>
            <tbody>


            @foreach($target as $rows)
              <tr>
              <td>{{$rows->b_2020 }}</td>
              <td>{{$rows->b_2021 }}</td>
              <td>{{$rows->b_2022 }}</td>
              <td>{{$rows->b_2023 }}</td>
              <td>{{$rows->b_2024 }}</td>
              <td>{{$rows->b_2025 }}</td>
              <td class="btn-flex">
                <a href="strategic_plan/target_edit/{{$rows->id}}" class="btn btn-outline-info btn-md"> <i class="fa fa-edit"></i> </a>

              <form action="{{ route('target.destroy', $rows->id) }}" method="POST">
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
