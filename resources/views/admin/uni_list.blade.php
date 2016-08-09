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
      <div class="panel-heading" role="tab">
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

    <div id="universities-table">
      <table class="table table-striped">
        <tr>
          <th>id</th>
          <th>University Name</th>
          <th>Address</th>
          <th>Email</th>
          <th>Website</th>
          <th>Est.</th>
          <th>Pop (total, int, pk)</th>
          <th>Rank</th>
        </tr>
        @foreach($universities as $uni)
          <tr>
            <td>{{ $uni->id }}</td>
            <td>{{ $uni->name }}</td>
            <td>{{ $uni->address }}, {{ $uni->city }}, {{ $uni->country }}</td>
            <td><a href="mailto:{{ $uni->email }}">{{ $uni->email }}</a></td>
            <td><a href="{{ $uni->website }}">{{ $uni->website }}</a></td>
            <td>{{ $uni->university_info->established }}</td>
            <td>{{ $uni->university_info->population }}, {{ $uni->university_info->intpopulation }}, {{ $uni->university_info->pkpopulation }}</td>
            <td>{{ $uni->university_info->rank }}</td>
          </tr>
        @endforeach
      </table>
      </div>
  </div>
@endsection