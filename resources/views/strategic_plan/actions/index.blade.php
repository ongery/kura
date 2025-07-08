@extends('layouts.strategic_app')

@section('content')
<div class="function-btn py-2">
    <a class="btn btn-success btn-sm" href="/myactions/create"> <i class="fa fa-plus"></i> Create Action </a>
</div>
<div class="card">
    <div class="card-header bg-success">
      <h3 class="card-title"> Strategic Objectives </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Description</th>
          <th>Attachment</th>
          <th>Date</th>
          <th>Options</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($rows as $key => $row)
                <tr class="text-center">
                    <td>{{ $key+1 }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->description }}</td>
                    <td> <a href="{{ asset('storage/attachments/' .$row->attachment) }}">Download</a> </td>
                    <td>{{ $row->updated_at }}</td>
                    <td class="text-center">
                        <form action="{{ route('myactions.destroy',$row->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-success btn-sm" href="{{ route('myactions.edit', $row->id) }}"> <i class="fa fa-edit"></i> </a>
                            <button type="submit" class="btn btn-danger btn-sm mx-2"><i class="fa fa-trash"></i> </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection
