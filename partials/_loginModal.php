<!-- login modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Log In to Tech_Discuss</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="/partials/_loginHandle.php" method="post">
          <div class="form-group">
            <label for="emailId">Email address</label>
            <input type="email" class="form-control" id="emailId" name="emailId" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <button type="submit" class="btn btn-outline-success">Submit</button>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close </button>
      </div>
    </div>
  </div>
</div>