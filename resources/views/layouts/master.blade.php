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

<script>
  var loginModal = $('#login-modal');
  var modal = $('#loginModalContent');
  var spinner = $('#modal-spinner').html();
  var modalLogin = modal.html();
  var modalRegister;

  console.log({{ auth()->check() }});

  function getModal() {
    modal.html(spinner);
    $.ajax({
      url: '{{ route('user.register') }}',
      type: 'GET',
      success: function (res) {
        console.log('SUCCESS');
        modal.html(res.html);
        modalRegister = modal.html();
      },
      error: function (res) {
        console.log(res);
        console.log('ERROR');
      }
    });
  }

  function postLogin(e) {
    e.preventDefault();

    var data = {
      email: $('#login-email').val(),
      password: $('#login-password').val(),
      remember: $('#remember-me').prop('checked'),
      _token: '{{ csrf_token() }}'
    };

    modal.html(spinner);

    $.ajax({
      url: '{{ route('user.login') }}',
      type: 'POST',
      data: data,
      success: function (res) {
        location.reload();
        console.log('SUCCESS');
        console.log(res);
      },
      error: function (res) {
        modal.html(modalLogin);

        $('#login-email').val(data.email);
        $('#login-password').val(data.password);
        $('#remember-me').prop('checked', data.remember);

        if (res.status == 422) {
          var errors = $.parseJSON(res.responseText);
          if (errors.email) {
            $('#email-group').addClass('has-error');
            $('#help-email').html(errors.email);
          }
          if (errors.password) {
            $('#password-group').addClass('has-error');
            $('#help-password').html(errors.password);
          }
        } else {
          $('#modalAlert').append(res.responseText).addClass('alert-danger').show();
        }
        console.log(res);
        console.log('ERROR');
      }
    });
  }

  function postRegister(e) {
    e.preventDefault();

    var data = {
      name: $('#register-name').val(),
      email: $('#register-email').val(),
      password: $('#register-password').val(),
      confirm: $('#register-confirm').val(),
      _token: '{{ csrf_token() }}'
    };

    modal.html(spinner);

    $.ajax({
      url: '{{ route('user.register') }}',
      type: 'POST',
      data: data,
      success: function (res) {
        modal.html(modalLogin);
        $('#register-toggle').hide();
        $('#modalAlert').html(res + ' <strong>Login Now</strong>').addClass('alert-success').show();
        console.log('SUCCESS');
        console.log(res);
      },
      error: function (res) {
        modal.html(modalRegister);

        $('#register-name').val(data.name);
        $('#register-email').val(data.email);
        $('#register-password').val(data.password);
        $('#register-confirm').val(data.confirm);

        if (res.status == 422) {
          var errors = $.parseJSON(res.responseText);
          if (errors.name) {
            $('#name-group').addClass('has-error');
            $('#help-name').html(errors.name);
          }
          if (errors.email) {
            $('#email-group').addClass('has-error');
            $('#help-email').html(errors.email);
          }
          if (errors.password) {
            $('#password-group').addClass('has-error');
            $('#help-password').html(errors.password);
          }
          if (errors.confirm) {
            $('#confirm-group').addClass('has-error');
            $('#help-confirm').html(errors.confirm);
          }
        } else {
          $('#modalAlert').append(res.responseText).addClass('alert-danger').show();
        }
        console.log(res);
        console.log('ERROR');
      }
    });
  }

  loginModal.on('hidden.bs.modal', function (e) {
    modal.html(modalLogin);
  });
</script>
</body>
</html>