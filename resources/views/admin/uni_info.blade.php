@extends('layouts.dashboard.master')

@section('dashboard-title')
  <a href="{{ $university->website }}" target="_blank">{{ $university->name }}</a>
@endsection

@section('dashboard-content')
  <div class="col-sm-12">
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        <p>{{ session('success') }}</p>
      </div>
    @endif
    @if (session('fail'))
      <div class="alert alert-danger" role="alert">
        <p>{{ session('fail') }}</p>
      </div>
    @endif

    @if (count($errors) > 0)
      <div class="alert alert-danger" role="alert">
        <p>The form has errors. Please correct them click <strong>Add</strong> again!</p>
      </div>
    @endif

    {{-- Level Panel --}}
    <div class="panel panel-success" id="level-form-panel">
      <div class="panel-heading panel-add-button" role="tab">
        <h4 class="panel-title">
          <a role="button" class="btn btn-success" href="#level-form" data-toggle="collapse">Add Level <i class="glyphicon glyphicon-plus"></i></a>
        </h4>
      </div>
      <div id="level-form" class="panel-collapse collapse" role="tabpanel">
        <div class="panel-body">
          @include('includes.forms.level_props')
        </div>
      </div>
    </div>

    <div class="uni-levels-fields">
      @if(count($level_props) > 0)
        <div class="panel-group" id="levels-accordion" role="tablist" aria-multiselectable="true">
          @foreach($level_props as $prop)
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="level-heading-{{ $prop->id }}">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#levels-accordion" href="#level-{{ $prop->id }}" aria-expanded="true" aria-controls="level-{{ $prop->id }}">
                    {{ $prop->level->level_name }}
                  </a>
                </h4>
              </div>
              <div id="level-{{ $prop->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="level-heading-{{ $prop->id }}">
                <div class="panel-body">
                  @if($prop->level_tuition)
                    <dl class="dl-horizontal">
                      <dt>Level Tuition</dt>
                      <dd>{{ $prop->level_tuition }}</dd>
                    </dl>
                  @else
                    No Specific Level Data
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="alert alert-warning">
          <p>No Levels Added to <strong>{{ $university->name }}</strong> yet!</p>
        </div>
      @endif
    </div>

    {{-- Field Panel --}}
    <div class="panel panel-success" id="field-form-panel">
      <div class="panel-heading panel-add-button" role="tab">
        <h4 class="panel-title">
          <a role="button" class="btn btn-success {{ count($level_props) > 0 ? null : 'disabled' }}" href="#field-form" data-toggle="collapse">Add Field <i class="glyphicon glyphicon-plus"></i></a>
        </h4>
      </div>
      <div id="field-form" class="panel-collapse collapse" role="tabpanel">
        <div class="panel-body">
          @include('includes.forms.field_props')
        </div>
      </div>
    </div>

    <div class="uni-levels-fields">
      @if(count($field_props) > 0)
        <div class="panel-group" id="fields-accordion" role="tablist" aria-multiselectable="true">
          @foreach($field_props as $prop)
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="field-heading-{{ $prop->id }}">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#fields-accordion" href="#field-{{ $prop->id }}" aria-expanded="true" aria-controls="field-{{ $prop->id }}">
                    {{ $prop->field->field_name }} ({{ $prop->level->level_name }})
                  </a>
                </h4>
              </div>
              <div id="field-{{ $prop->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="field-heading-{{ $prop->id }}">
                <div class="panel-body">
                  <dl class="dl-horizontal">
                    <dt>Field Tuition</dt>
                    <dd>{{ $prop->field_tuition }}</dd>
                    <dt>Field Rank</dt>
                    <dd>{{ $prop->field_rank }}</dd>
                    <dt>Duration</dt>
                    <dd>{{ $prop->duration }}</dd>
                    <dt>Entrance Requirements</dt>
                    <dd>{{ $prop->ent_req }}</dd>
                  </dl>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        @if(count($level_props) > 0)
          <div class="alert alert-warning">
            <p>No Fields Added to <strong>{{ $university->name }}</strong> yet!</p>
          </div>
        @else
          <div class="alert alert-warning">
            <p>Add a level first!</p>
          </div>
        @endif
      @endif
    </div>

    {{-- Course Panel --}}
    <div class="panel panel-success" id="course-form-panel">
      <div class="panel-heading panel-add-button" role="tab">
        <h4 class="panel-title">
          <a role="button" class="btn btn-success {{ count($field_props) > 0 ? null : 'disabled' }}" href="#course-form" data-toggle="collapse">Add Course <i class="glyphicon glyphicon-plus"></i></a>
        </h4>
      </div>
      <div id="course-form" class="panel-collapse collapse" role="tabpanel">
        <div class="panel-body">
          @include('includes.forms.course')
        </div>
      </div>
    </div>

    <div class="uni-levels-fields">
      @if(count($courses) > 0)
        <div id="courses-table" class="table-responsive">
          <table class="table table-striped table-hover">
            <tr>
              <th>id</th>
              <th>Course Name</th>
              <th>Course Field</th>
              <th>Course Level</th>
              <th>Course Rank</th>
              <th>Course Careers</th>
            </tr>
            @foreach($courses as $course)
              <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->course_name }}</td>
                <td>{{ $course->field->field_name }}</td>
                <td>{{ $course->level->level_name }}</td>
                <td>{{ $course->course_rank }}</td>
                <td>{{ $course->careers }}</td>
              </tr>
            @endforeach
          </table>
        </div>
      @else
        @if (count($field_props) > 0)
          <div class="alert alert-warning">
            <p>Add Courses to {{ $university->name }}</p>
          </div>
        @else
          <div class="alert alert-warning">
            <p>Add a field first!</p>
          </div>
        @endif
      @endif
    </div>

  </div>
@endsection