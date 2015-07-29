<div class="form-group">
    {!! Form::label('name', 'Name', ['class' => 'col-lg-2 control-label']) !!}
    <div class="col-lg-10">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
    </div>
</div>