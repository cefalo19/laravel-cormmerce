<div class="form-group">
    {!! Form::label('name', 'Client', ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('user[name]', null, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('total', 'Total', ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('total', null, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('status[id]', 'Status', ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::select('status_id', $statuses, null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>