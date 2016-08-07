<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Registration Form</h4>
</div>
<div class="modal-body">
  <div class="form-group" id="name-group">
    <label for="register-name" class="col-sm-2 control-label">Full Name</label>
    <div class="col-sm-10">
      <input name="name" type="text" class="form-control" id="register-name" placeholder="Full Name">
      <span id="help-name" class="help-block"></span>
    </div>
  </div>
  <div class="form-group" id="email-group">
    <label for="register-email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input name="email" type="email" class="form-control" id="register-email" placeholder="Email">
      <span id="help-email" class="help-block"></span>
    </div>
  </div>
  <div class="form-group" id="password-group">
    <label for="register-password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input name="password" type="password" class="form-control" id="register-password" placeholder="Password">
      <span id="help-password" class="help-block"></span>
    </div>
  </div>
  <div class="form-group" id="confirm-group">
    <label for="register-confirm" class="col-sm-2 control-label">Confirm</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="register-confirm" placeholder="Confirm Password">
      <span id="help-confirm" class="help-block"></span>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
  <button onclick="postRegister(event)" type="button" class="btn btn-primary">Register</button>
</div>