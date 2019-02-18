<html>
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <?php //wp_head(); ?>
    <style type="text/css">
    body, html{
       height: 100%;
       display: grid;
       background-color: <?php echo get_theme_mod('ulr_section_bg', '#FFFFFF'); ?>; 
       background-image: url( <?php echo get_theme_mod('ulr_section_bg_img', 'none'); ?>) ; 
       
    }

	.login-form {
        width: <?php echo get_theme_mod('ulr_section_width', '370px'); ?>; ;
        margin: auto; 
        margin-bottom:10px
	}
    .login-form form {
    	margin-bottom: 15px;
        background: <?php echo get_theme_mod('ulr_section_bg2', '#FFFFFF'); ?>; 
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;

    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .login-form .hint-text {
		color: #777;
		padding-bottom: 15px;
		text-align: center;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .login-btn {        
        font-size: 15px;
        font-weight: bold;
    }
    .or-seperator {
        margin: 20px 0 10px;
        text-align: center;
        border-top: 1px solid #ccc;
    }
    .or-seperator i {
        padding: 0 10px;
        background: #f7f7f7;
        position: relative;
        top: -11px;
        z-index: 1;
    }
    .social-btn .btn {
        margin: 10px 0;
        font-size: 15px;
        text-align: left; 
        line-height: 24px;       
    }
	.social-btn .btn i {
		float: left;
		margin: 4px 15px  0 5px;
        min-width: 15px;
	}
	.input-group-addon .fa{
		font-size: 18px;
	}
</style>
  </head>
<body id="LoginForm">

<div class="login-form">
    <form action="/" method="post">
    <div class="alert alert-danger errormsg" style="display:none"></div>
        <h2 class="text-center">Sign in</h2>		
        <div class="form-group">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
        </div>
        <input type="text" class="form-control" name="username" placeholder="Username" id="log" required="required">
        </div>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock"></i></span>
        </div>
        <input type="password" class="form-control" name="password" placeholder="Password" id="pwd" required="required">
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-success btn-block loginBtn">Sign in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right text-success">Forgot Password?</a>
        </div>  
        <div class="or-seperator"><i>or</i></div>
        <div class="text-center social-btn">
            <a href="#" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with <b>Facebook</b></a>
            <a href="#" class="btn btn-info btn-block"><i class="fa fa-twitter"></i> Sign in with <b>Twitter</b></a>
			<a href="#" class="btn btn-danger btn-block"><i class="fa fa-google"></i> Sign in with <b>Google</b></a>
        </div>
    </form>
    <div class="hint-text small">Don't have an account? <a href="#" data-toggle="modal" data-target="#exampleModal">register</button>
    </div>
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
<?php wp_footer(); ?>
</footer>
</html>
