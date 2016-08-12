<form class="form-horizontal col-sm-12" method="post" action="{{ route('add.field.props') }}">

  <div class="form-group row {{ $errors->has('field_id') ? 'has-error' : null }}">
    <label for="field_id" class="col-sm-2 control-label">Select Field</label>
    <div class="col-sm-10">
      <select name="field_id" id="field_id" class="form-control">
        <option value="">Select Field</option>
        @foreach($fields as $field)
          <option value="{{ $field->id }}" {{ $field->id == old('field_id') ? 'selected' : null }}>{{ $field->field_name }}</option>
        @endforeach
      </select>
      @if($errors->has('field_id'))
        <span id="help_fieldid" class="help-block">{{ $errors->first('field_id') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row {{ $errors->has('field_level_id') ? 'has-error' : null }}">
    <label for="field_level_id" class="col-sm-2 control-label">Select Level</label>
    <div class="col-sm-10">
      <select class="form-control" id="field_level_id" name="field_level_id">
        <option value="">Select Level</option>
        @foreach($level_props as $prop)
          <option value="{{ $prop->level_id }}" {{ $prop->level_id == old('field_level_id') ? 'selected' : null }}>{{ $prop->level->level_name }}</option>
        @endforeach
      </select>
      @if($errors->has('field_level_id'))
        <span id="help_fieldlevelid" class="help-block">{{ $errors->first('field_level_id') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row {{ $errors->has('duration') ? 'has-error has-feedback' : null }}">
    <label for="duration" class="col-sm-2 control-label">Duration</label>
    <div class="col-sm-10">
      <input name="duration" type="text" class="form-control" id="duration" placeholder="Duration" value="{{ old('duration') }}">
      @if($errors->has('duration'))
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="help_duration" class="help-block">{{ $errors->first('duration') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row {{ $errors->has('field_rank') ? 'has-error has-feedback' : null }}">
    <label for="field_rank" class="col-sm-2 control-label">Field Rank</label>
    <div class="col-sm-10">
      <input name="field_rank" type="text" class="form-control" id="field_rank" placeholder="Field Rank" value="{{ old('field_rank') }}">
      @if($errors->has('field_rank'))
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="help_fieldrank" class="help-block">{{ $errors->first('field_rank') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row {{ $errors->has('field_tuition') ? 'has-error has-feedback' : null }}">
    <label for="field_tuition" class="col-sm-2 control-label">Field Tuition</label>
    <div class="col-sm-10">
      <input name="field_tuition" type="text" class="form-control" id="field_tuition" placeholder="Field Tuition" value="{{ old('field_tuition') }}">
      @if($errors->has('field_tuition'))
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="help_fieldtuition" class="help-block">{{ $errors->first('field_tuition') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row {{ $errors->has('ent_req') ? 'has-error has-feedback' : null }}">
    <label for="ent_req" class="col-sm-2 control-label">Entrance Req.</label>
    <div class="col-sm-10">
      <textarea name="ent_req" class="form-control" id="ent_req" placeholder="Entrance Requirements" rows="5">{{ old('ent_req') }}</textarea>
      @if($errors->has('ent_req'))
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="help_endreq" class="help-block">{{ $errors->first('ent_req') }}</span>
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