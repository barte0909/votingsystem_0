<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | Voting System</title>
 	

<?php include('./header.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
		
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:red;
	}
	
	.logo {
    margin: auto;
    font-size: 8rem;
    /*background: #00000061;*/
    /*padding: .5em 0.8em;*/
    /*border-radius: 50% 50%;*/
    color: #000000b3;
}
.bggg{
	background-color: white;
	padding-left: 450px;
	align-items: center;


}

#bg1{
	background-color: white;
	border: solid 1px  ;
	border-width: 100%;
	height: 200px;
	align-items: center;
	border-color: white;

}
.col-md-8{
	width: 450px;
	height: 300px;
	text-align: center;
	display: flex;
	align-items: center;
}
.text{
	text-align: center;
	margin-top: 80px;

}
.logo1{
	height: 60px;
	width: 70px;
	margin-bottom: 20px;

}





</style>

<body>


  <main id="main" class=" alert-info">
  		<div id="bg1"> 
  			<div class="logo">
  				<h1 class="text">Philcst CS Department Voting System</h1>
  			
  			</div>
  		</div>
  		<div id="koko" class="bggg">
  			<div class="card col-md-8">
  				<div class="card-body">
				  <img class="logo1" src="logophilcst.png" alt="..." >
  					<form id="login-form" >
  						<div class="form1">
					
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>