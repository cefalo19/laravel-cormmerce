@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Categories</h1>

            <br>

            <a href="{{ route('categories.create') }}" class="btn btn-default">New Category</a>

            <br>

            <br>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.edit',    ['id' => $category->id]) }}">Edit</a> |
                            <a href="{{ route('categories.destroy', ['id' => $category->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $categories->render() !!}

        </div>
    </div>
</div>
@endsection
