<header>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a href="{{ @route('home') }}" class="navbar-brand">CONSULT API</a>
    </div>
    <ul class="nav navbar-nav">
      <li {{ @url()->current() === @url()->route('home') ? 'class=active' : null }}><a href="{{ @route('home') }}">Home</a></li>
      <li {{ @url()->current() === @url()->route('universities') ? 'class=active' : null }}><a href="{{ @route('universities') }}">Universities</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a data-toggle="modal" data-target="#login-modal" href=""><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;Login</a></li>
    </ul>
  </div>
</nav>
</header>

<div>
  @include('includes.modals.login')
</div>