<div id="modal-spinner">
  <div class="text-center modal-spinner-inner">
    <img src='{{ @url()->to('src/img/spin.gif') }}' alt='Loading'>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="login-modal">
  <form class="form-horizontal" id="accountForm">
    <div class="modal-dialog" role="document">
      <div class="modal-content" id="loginModalContent">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          <div class="alert" id="modalAlert"><strong>Error!</strong> </div>
          <div class="form-group" id="email-group">
            <label for="login-email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input name="email" type="email" class="form-control" id="login-email" placeholder="Email">
              <span id="help-email" class="help-block"></span>
            </div>
          </div>
          <div class="form-group" id="password-group">
            <label for="login-password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input name="password" type="password" class="form-control" id="login-password" placeholder="Password">
              <span id="help-password" class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label class="">
                  <input type="checkbox" name="remember" id="remember-me"> Remember me
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success" onclick="getModal()" id="register-toggle">Register</button>
          <button onclick="postLogin(event)" type="button" class="btn btn-primary">Login</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </form>
</div><!-- /.modal -->