@extends('layouts.dashboard.master')

@section('dashboard-title', 'Levels and Fields')

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
    <div class="panel panel-success" id="add-level-form-panel">
      <div class="panel-heading panel-add-button" role="tab">
        <h4 class="panel-title">
          <a role="button" class="btn btn-success" href="#add-level-form" data-toggle="collapse">Add Level <i class="glyphicon glyphicon-plus"></i></a>
        </h4>
      </div>
      <div id="add-level-form" class="panel-collapse collapse" role="tabpanel">
        <div class="panel-body">
          @include('includes.forms.level')
        </div>
      </div>
    </div>
    @if(count($levels) > 0)
      <div class="uni-levels-fields levels-and-fields">
        @foreach($levels as $level)
          <h1><span class="label label-default">{{ $level->level_name }}</span></h1>
        @endforeach
      </div>
    @else
      <div class="alert alert-warning">
        <p>Add a Level</p>
      </div>
    @endif

    {{-- Field Panel --}}
    <div class="panel panel-success" id="add-field-form-panel">
      <div class="panel-heading panel-add-button" role="tab">
        <h4 class="panel-title">
          <a role="button" class="btn btn-success" href="#add-field-form" data-toggle="collapse">Add Field <i class="glyphicon glyphicon-plus"></i></a>
        </h4>
      </div>
      <div id="add-field-form" class="panel-collapse collapse" role="tabpanel">
        <div class="panel-body">
          @include('includes.forms.field')
        </div>
      </div>
    </div>
    @if(count($fields) > 0)
      <div class="uni-levels-fields levels-and-fields">
        @foreach($fields as $field)
          <h1><span class="label label-info">{{ $field->field_name }}</span></h1>
        @endforeach
      </div>
    @else
      <div class="alert alert-warning">
        <p>Add a Field</p>
      </div>
    @endif
  </div>
@endsection