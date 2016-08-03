@extends ('layouts.master')

@section('title', 'Dashboard')

@section('content')
  <div class="container-fluid" id="dashboard-container">

    <div class="col-sm-2 hidden-xs" id="dashboard-sidebar">
      <h4 class="text-uppercase text-center text-muted">Menu</h4>
      <div class="list-group">
        <a href="{{ route('admin.dashboard') }}" class="list-group-item {{ @url()->current() === @url()->route('admin.dashboard') ? 'active' : null }}">University list</a>
        <a href="{{ route('admin.dashboard.add') }}" class="list-group-item {{ @url()->current() === @url()->route('admin.dashboard.add') ? 'active' : null }}">Add University</a>
      </div>
    </div>

    <div class="col-sm-10" id="dashboard-content">
      <h4 class="page-header text-center text-muted">@yield('dashboard-title')</h4>
      <div class="col-sm-12" id="dashboard-section">
        @yield ('dashboard-content')
      </div>
    </div>

  </div>
@endsection