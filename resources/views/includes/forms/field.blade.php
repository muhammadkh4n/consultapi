<form class="form-horizontal col-sm-12" method="post" action="{{ route('add.field') }}">

  <div class="form-group row {{ $errors->has('field_name') ? 'has-error has-feedback' : null }}">
    <label for="field_name" class="col-sm-2 control-label">Field Name</label>
    <div class="col-sm-10">
      <input name="field_name" type="text" class="form-control" id="field_name" placeholder="Field Name" value="{{ old('field_name') }}">
      @if($errors->has('field_name'))
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="help_fieldname" class="help-block">{{ $errors->first('field_name') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Add</button>
    </div>
  </div>

  {{ csrf_field() }}
</form>