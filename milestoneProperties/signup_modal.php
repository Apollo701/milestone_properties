
<!-- Modal -->
<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Sign Up</h4>
      </div>
      <div class="modal-body">
       <form action="new_user_created.php" role="form" method="post">
                <!User Login Information>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputEmail">Email</label>
<!--                        <span class="error"><?php
                        if($GLOBALS['emailNotValid']) {echo "Email not valid";}
                        else if($GLOBALS['emailRegistered']) {echo "Email already registered";}
                        ?></span>-->
                        <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputPW1">New Password</label>
<!--                        <span class="error"><?php
                        if($GLOBALS['passwordNotValid']) {echo "Password is not valid (only letters and numbers allowed)";}
                        ?></span>-->
                        <input type="password" class="form-control" id="InputPW1" placeholder="Create Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <label for="InputPW2">Re-Enter New Password</label>
<!--                        <span class="error"><?php
                        if($GLOBALS['passwordNotMatch']) {echo "Passwords do not match";}
                        ?></span>-->
                        <input type="password" name="password" class="form-control" id="InputPW2" placeholder="Re-Enter Password">
                    </div>
                </div>
                

                <div class="form-group">
                    <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>