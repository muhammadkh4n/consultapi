@extends ('layouts.master')

@section('title', 'Dashboard')

@section('content')
  <div class="container-fluid" id="dashboard-container">

    <div class="col-sm-2 hidden-xs" id="dashboard-sidebar">
      <h4 class="text-uppercase text-center text-muted">Menu</h4>
      <div class="list-group">
        <a href="{{ route('user.dashboard') }}" class="list-group-item {{ @url()->current() === @url()->route('user.dashboard') ? 'active' : null }}">Profile</a>
        @if (auth()->user()->admin)
          <a href="{{ route('admin.dashboard.unis') }}" class="list-group-item {{ @url()->current() === @url()->route('admin.dashboard.unis') ? 'active' : null }}">All Universities</a>
          <a href="{{ route('admin.dashboard.users') }}" class="list-group-item {{ @url()->current() === @url()->route('admin.dashboard.users') ? 'active' : null }}">All Users</a>
        @endif
      </div>
    </div>

    <div class="col-sm-10 col-sm-offset-2" id="dashboard-content">
      <h4 class="page-header text-center text-muted">@yield('dashboard-title')</h4>
      <div class="col-sm-12" id="dashboard-section">
        @yield ('dashboard-content')
      </div>
    </div>

  </div>
@endsection