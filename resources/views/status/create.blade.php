@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
       {!! Form::open(['route' => 'admin.statuses.store', 'class' => 'form-horizontal']) !!}
            @include('status._form', ['submitButtonText' => 'Create'])
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