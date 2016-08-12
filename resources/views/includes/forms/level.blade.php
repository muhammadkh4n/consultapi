<form class="form-horizontal col-sm-12" method="post" action="{{ route('add.level') }}">

  <div class="form-group row {{ $errors->has('level_name') ? 'has-error has-feedback' : null }}">
    <label for="level_name" class="col-sm-2 control-label">Level Name</label>
    <div class="col-sm-10">
      <input name="level_name" type="text" class="form-control" id="level_name" placeholder="Level Name" value="{{ old('level_name') }}">
      @if($errors->has('level_name'))
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="help_levelname" class="help-block">{{ $errors->first('level_name') }}</span>
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