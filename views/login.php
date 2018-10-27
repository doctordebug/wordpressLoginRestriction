<html>
  <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  </head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">login Form</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>User Login</h2>
   <p>Please enter your email and password</p>
   </div>
    <form id="Login">
        <div class="form-group">
            <input type="text" class="form-control" id="log" placeholder="Login">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="pwd" placeholder="Password">
        </div>
        <div class="alert alert-danger errormsg" style="display:none"></div>
        <ul>
            <li>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    register
                </button>
            </li>
            <li>
                <button type="button" class="btn btn-primary loginBtn">Login</button>
            </li>
            <li>
            <a href="<?php echo wp_logout_url( get_permalink() ); ?>">Logout</a>
            </li>
        </ul>

    </form>
    </div>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="form-group">
    <label for="registerName">User name</label>
    <input type="email" class="form-control" id="registerName" aria-describedby="nameHelp" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="registerEmail">Email address</label>
    <input type="email" class="form-control" id="registerEmail" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="registerPassword1">Password</label>
    <input type="password" class="form-control" id="registerPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="registerPassword2">Confirm password</label>
    <input type="password" class="form-control" id="registerPassword2" placeholder="Password">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary submitRegisterBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>

</div>
</div>





</body>
<footer>
<script>
  const ULR_PLUGIN_URL = '<?php echo ULR_PLUGIN_URL; ?>';
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="<?php echo ULR_PLUGIN_URL . 'js/login.js' ; ?>"></script>
</footer>
</html>
