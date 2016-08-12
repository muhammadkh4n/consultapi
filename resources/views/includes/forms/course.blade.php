<form class="form-horizontal col-sm-12" method="post" action="{{ route('add.course') }}">

  <div class="form-group row {{ $errors->has('course_name') ? 'has-error has-feedback' : null }}">
    <label for="course_name" class="col-sm-2 control-label">Course Name</label>
    <div class="col-sm-10">
      <input name="course_name" type="text" class="form-control" id="course_name" placeholder="Course Name" value="{{ old('course_name') }}">
      @if($errors->has('course_name'))
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="help_coursename" class="help-block">{{ $errors->first('course_name') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row {{ $errors->has('course_field_id') ? 'has-error' : null }}">
    <label for="course_field_id" class="col-sm-2 control-label">Select Field</label>
    <div class="col-sm-10">
      <select name="course_field_id" id="course_field_id" class="form-control">
        <option value="">Select Field</option>
        @foreach($field_props as $prop)
          <option value="{{ $prop->field_id }}" {{ $prop->field_id == old('course_field_id') ? 'selected' : null }}>{{ $prop->field->field_name }} ({{ $prop->level->level_name }})</option>
        @endforeach
      </select>
      @if($errors->has('course_field_id'))
        <span id="help_coursefieldid" class="help-block">{{ $errors->first('course_field_id') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row {{ $errors->has('course_level_id') ? 'has-error' : null }}">
    <label for="course_level_id" class="col-sm-2 control-label">Select Level</label>
    <div class="col-sm-10">
      <select class="form-control" id="course_level_id" name="course_level_id">
        <option value="">Select Level</option>
        @foreach($level_props as $prop)
          <option value="{{ $prop->level_id }}" {{ $prop->level_id == old('course_level_id') ? 'selected' : null }}>{{ $prop->level->level_name }}</option>
        @endforeach
      </select>
      @if($errors->has('course_level_id'))
        <span id="help_courselevelid" class="help-block">{{ $errors->first('course_level_id') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row {{ $errors->has('course_rank') ? 'has-error has-feedback' : null }}">
    <label for="course_rank" class="col-sm-2 control-label">Course Rank</label>
    <div class="col-sm-10">
      <input name="course_rank" type="text" class="form-control" id="course_rank" placeholder="Course Rank" value="{{ old('course_rank') }}">
      @if($errors->has('course_rank'))
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="help_courserank" class="help-block">{{ $errors->first('course_rank') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row {{ $errors->has('careers') ? 'has-error has-feedback' : null }}">
    <label for="careers" class="col-sm-2 control-label">Careers</label>
    <div class="col-sm-10">
      <input name="careers" type="text" class="form-control" id="careers" placeholder="Careers" value="{{ old('careers') }}">
      @if($errors->has('careers'))
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="help_careers" class="help-block">{{ $errors->first('careers') }}</span>
      @endif
    </div>
  </div>

  <div class="form-group row {{ $errors->has('accred') ? 'has-error has-feedback' : null }}">
    <label for="accred" class="col-sm-2 control-label">Accreditation</label>
    <div class="col-sm-10">
      <textarea name="accred" class="form-control" id="accred" placeholder="Accreditation" rows="5">{{ old('accred') }}</textarea>
      @if($errors->has('accred'))
        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
        <span id="help_fieldtuition" class="help-block">{{ $errors->first('accred') }}</span>
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