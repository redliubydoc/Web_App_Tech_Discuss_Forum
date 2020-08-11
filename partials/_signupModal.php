<!-- signup modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up for an Tech_Discuss account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/partials/_signupHandle.php" method="post">
            <div class="form-group">  
              <label for="emailId">Email address</label>
              <input type="email" class="form-control" id="emailId" name="emailId" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="userName">Name</label>
              <input type="text" class="form-control" id="userName" name="userName">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="cPassword">Confirm Password</label>
                <input type="password" class="form-control" id="cPassword" name="cPassword">
                <small id="cPasswordHelp" class="form-text text-muted">Make sure to enter same password.</small>
              </div>
            <button type="submit" class="btn  btn-outline-success">Submit</button>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close </button>
      </div>
    </div>
  </div>
</div>