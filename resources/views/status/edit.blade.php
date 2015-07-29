@extends('...layouts.master')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
       {!! Form::model($status, ['method' => 'PUT', 'route' => ['admin.statuses.update', $status->id], 'class' => 'form-horizontal']) !!}
            @include('status._form', ['submitButtonText' => 'Edit'])
       {!! Form::close() !!}

       @if ($errors->any())
       <ul class="alert alert-warning">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
       </ul>
       @endif
    </div>
</div>
@endsection