@extends('layouts.dashboard.master')

@section('dashboard-title', $level->level_name)

@section('dashboard-content')
  <div class="col-sm-12">
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        <p>{{ session('success') }}</p>
      </div>
    @endif

    <div id="level_info">
      <h2>{{ $level->level_name }}</h2>
      <p>Tuition: {{ $level->level_tuition }}</p>
    </div>

    <div class="panel panel-success" id="field-form-panel">
      <div class="panel-heading panel-add-button" role="tab">
        <h4 class="panel-title">
          <a role="button" class="btn btn-success" href="#field-form" data-toggle="collapse">Add Field <i class="glyphicon glyphicon-plus"></i></a>
        </h4>
      </div>
      <div id="field-form" class="panel-collapse {{ count($errors) > 0 ? 'collapse in' : 'collapse' }}" role="tabpanel">
        <div class="panel-body">
          @include('includes.forms.field')
        </div>
      </div>
    </div>

    <div id="field-table" class="table-responsive">
      <table class="table table-striped table-hover">
        <tr>
          <th>id</th>
          <th>Field Name</th>
          <th>Field Tuition</th>
          <th>University</th>
        </tr>
        @foreach($level->fields as $field)
          <tr>
            <td>{{ $field->id }}</td>
            <td><a href="#">{{ $field->field_name }}</a></td>
            <td>{{ $field->field_tuition }}</td>
            <td>{{ $level->university->name }}</td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection