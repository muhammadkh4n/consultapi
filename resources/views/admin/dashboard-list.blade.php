@extends('layouts.admin.master')

@section('dashboard-title', 'University List')

@section('dashboard-content')
  <div class="col-sm-12">
    @if (Session::has('success'))
      <div class="alert alert-success" role="alert">
        <p>{{ Session::get('success') }}</p>
      </div>
    @endif
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
@endsection