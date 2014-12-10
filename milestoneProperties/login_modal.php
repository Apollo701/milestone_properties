
<!-- Modal -->
<div class="modal fade" id="logInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Log In</h4>
      </div>
      <div class="modal-body">
       <form role="form" method="post">
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputEmail">Email</label>
                        <input type="email" class="form-control" name="InputEmail" placeholder="Enter Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputPW1">Password</label>
                        <input type="password" class="form-control" name="InputPW1" placeholder="Create Password">
                    </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                      <button type="submit" class="btn btn-default">Sign in</button><br><br>
                        <a href="login_forgot.php">Forgot Your Password?</a>
                  </div>
                </div>
              </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>