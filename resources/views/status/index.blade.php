@extends('...layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Statuses</h1>

            <br>

            <a href="{{ route('admin.statuses.create') }}" class="btn btn-default">New Status</a>

            <br>

            <br>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($statuses as $status)
                    <tr>
                        <td>{{ $status->id }}</td>
                        <td>{{ $status->name }}</td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['admin.statuses.destroy', $status->id], 'class' => 'form-horizontal']) !!}
                            <a href="{{ route('admin.statuses.edit', ['id' => $status->id]) }}" class="btn btn-info">Edit</a>
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $statuses->render() !!}

        </div>
    </div>
</div>
@endsection
