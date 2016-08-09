@extends('layouts.dashboard.master')

@section('dashboard-title', 'Profile')

@section('dashboard-content')
  <div id="user-profile" class="text-center text-muted">
    <h2 class="">Hi, {{ $user->name }}</h2>
    @if (!$user->admin)
      <div class="alert alert-warning">
        <strong>Notice: </strong><span>Please email <a href="mailto:{{ 'muhammadkhan.pk@gmail.com' }}">Mr. Muhammad Khan</a> and request for admin privileges.</span>
      </div>
    @else
      <div class="alert alert-success">
        <strong>Notice: </strong><span>You are an Admin. Please act like one and add some data.</span>
      </div>
    @endif
  </div>
@endsection