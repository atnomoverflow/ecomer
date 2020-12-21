<?php
if(session_id() == '') {
 session_start();
}  ?>
 <?php
    $success=false;
    require_once('../model/ModelUser.php');
        if(!empty($_POST["pass"])&&!empty($_POST["confpass"])) {
            $password =$_POST["pass"];
            $cpassword =$_POST["confpass"];
            $p= new ModelUser($_POST["username"],$_POST["lastname"],$_POST["firstname"],$_POST["pass"],$_POST["email"],$_POST["phnumb"],"",$_POST["gender"]);
                
                if(!preg_match("#[0-9]+#",$password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Number!";
                   
                }
                elseif(!preg_match("#[A-Z]+#",$password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
                }   
                elseif(!preg_match("#[a-z]+#",$password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
                   
                }elseif($_POST['pass']==$_POST['confpass']){
            
                    
                    if(($p->availableUserName(Model::$PDO))>0){
                        $passwordErr="this user name is used";
                    }else{
                        $p->addUser(Model::$PDO);
                        $passwordErr="congratilation your account has been created !!!";
                        $success=true;
                    }
            }else{
                $passwordErr="password does not match !!!";
          
        }
        }else if(empty($_POST["pass"])||empty($_POST['confpass'])) {
            $passwordErr = "Please Check You've Entered Or Confirmed Your Password!";
            
        } else {
                $passwordErr = "Please enter password";
          
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="mystyle.css">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../inc/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../inc/css/util.css">
	<link rel="stylesheet" type="text/css" href="../inc/css/main.css">
<!--===============================================================================================-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</head>
<body class="animsition">
	<!-- Header -->
	<?php require ("header.php") ?>
   
            <div class="container">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
    <?php
    if(isset($_POST['submit'])){
        if($success==true){
        ?>
    <div class="alert alert-success" role="alert">
          <?=$passwordErr?>
        
    </div>
    <?php }else{ ?>
    <div class="alert alert-danger" role="alert">
      <?=$passwordErr?>
    </div>
    <?php }
    }?>
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">POST started with your free account</p>
	<form method="post">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="firstname" class="form-control" placeholder="First name" type="text" required/>
    </div>
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="lastname" class="form-control" placeholder="last name" type="text" required/>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text">  <i class="fas fa-user-circle"></i> </span>
		 </div>
        <input name="username" class="form-control" placeholder="username" type="text" required/>
    </div> <!-- form-group// -->
   
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Email address" type="email" required/>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select name="extraphnum" class="custom-select" style="max-width: 120px;">
		    <option selected="">+971</option>
		    <option value="1">+972</option>
		    <option value="2">+198</option>
		    <option value="3">+701</option>
		</select>
    	<input name="phnumb" class="form-control" placeholder="Phone number" type="text" required/>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fas fa-venus-mars"></i> </span>
		</div>
		<select name="gender" class="form-control" required>
			<option selected="">Gender</option>
			<option>male</option>
			<option>female</option>
		</select>
	</div> <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="pass" class="form-control" placeholder="Create password" type="password" required/>
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="confpass" class="form-control" placeholder="Repeat password" type="password" required/>
    </div> <!-- form-group// -->  
    <input name="message" type="hidden">
    <input name="sucess" type="hidden">                                       
    <div class="form-group">
        <button name="submit" type="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<?php require ("footer.php") ?>
<!--===============================================================================================-->
	<script type="text/javascript" src="../inc/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../inc/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../inc/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="../inc/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../inc/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../inc/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="../inc/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../inc/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../inc/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../inc/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').php();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').php();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="../inc/js/main.js"></script>

</body>
</html>