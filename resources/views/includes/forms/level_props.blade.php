<form class="form-horizontal col-sm-12" method="post" action="{{ route('add.level.props') }}">

  <div class="form-group row {{ $errors->has('level_id') ? 'has-error' : null }}">
    <label for="level_id" class="col-sm-2 control-label">Select Level</label>
    <div class="col-sm-10">
      <select class="form-control" id="level_id" name="level_id">
        <option value="">Select Level</option>
        @foreach($levels as $level)
          <option value="{{ $level->id }}" {{ $level->id == old('level_id') ? 'selected' : null }}>{{ $level->level_name }}</option>
        @endforeach
      </select>
      @if($errors->has('level_id'))
        <span id="help_levelid" class="help-block">{{ $errors->first('level_id') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row {{ $errors->has('level_tuition') ? 'has-error has-feedback' : null }}">
    <label for="level_tuition" class="col-sm-2 control-label">Level Tuition</label>
    <div class="col-sm-10">
      <input name="level_tuition" type="text" class="form-control" id="level_tuition" placeholder="Level Tuition" value="{{ old('level_tuition') }}">
      @if($errors->has('level_tuition'))
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="help_leveltuition" class="help-block">{{ $errors->first('level_tuition') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Add</button>
    </div>
  </div>
  <input type="hidden" name="university_id" value="{{ $university->id }}">
  {{ csrf_field() }}
</form>