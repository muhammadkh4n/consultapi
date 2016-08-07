<div class="modal fade" tabindex="-1" role="dialog" id="login-modal">
  <form class="form-horizontal">
    <div class="modal-dialog" role="document">
      <div class="modal-content" id="loginModalContent">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Login</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="login-email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input name="email" type="email" class="form-control" id="login-email" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="login-password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input name="password" type="password" class="form-control" id="login-password" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember"> Remember me
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-success" onclick="getModal()">Register</button>
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </form>
</div><!-- /.modal -->