@extends('layouts.dashboard.master')

@section('dashboard-title', 'University List')

@section('dashboard-content')
  <div class="col-sm-12">
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        <p>{{ session('success') }}</p>
      </div>
    @endif

    <div class="panel panel-success" id="university-form-panel">
      <div class="panel-heading panel-add-button" role="tab">
        <h4 class="panel-title">
          <a role="button" class="btn btn-success" href="#university-form" data-toggle="collapse">Add University <i class="glyphicon glyphicon-plus"></i></a>
        </h4>
      </div>
      <div id="university-form" class="panel-collapse {{ count($errors) > 0 ? 'collapse in' : 'collapse' }}" role="tabpanel">
        <div class="panel-body">
          @include('includes.forms.university')
        </div>
      </div>
    </div>

    <div id="universities-table" class="table-responsive">
      <table class="table table-striped table-hover">
        <tr>
          <th>id</th>
          <th>University Name</th>
          <th>Website</th>
        </tr>
        @foreach($universities as $uni)
          <tr>
            <td>{{ $uni->id }}</td>
            <td><a href="{{ route('admin.dashboard.uni', ['uni_id' => $uni->id]) }}">{{ $uni->name }}</a></td>
            <td><a href="{{ $uni->website }}">{{ $uni->website }}</a></td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@endsection