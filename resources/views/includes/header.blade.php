<header>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="{{ @route('home') }}" class="navbar-brand">CONSULT API</a>
      </div>
      <div class="collapse navbar-collapse" id="main-navbar">
        <ul class="nav navbar-nav">
          <li {{ @url()->current() === @url()->route('home') ? 'class=active' : null }}><a href="{{ @route('home') }}">Home</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="{{ @request()->segment(2) === 'dashboard' ? 'active' : null }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li><a data-toggle="modal" data-target="#login-modal" href=""><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<div>
  @include('includes.modals.login')
</div>