<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title') | Consult API</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width initial-scale=1">
  <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">

  <link rel="stylesheet" href="{{ @url()->to('src/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ @url()->to('src/css/bootstrap-theme.min.css') }}">
  <link rel="stylesheet" href="{{ @url()->to('src/css/style.css') }}">
  @yield('styles')

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
@include('includes.header')
@yield('content')
@include('includes.footer')

<script src="{{ @url()->to('src/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ @url()->to('src/js/bootstrap.min.js') }}"></script>
<script src="{{ @url()->to('src/js/app.js') }}"></script>
@yield('scripts')
</body>
</html>