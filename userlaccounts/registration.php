<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

<div>
	<?php
	if(isset($_POST['create'])){
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$phonenumber=$_POST['phonenumber'];
		$password=$_POST['password'];

		$sql="INSERT INTO users(firstname,lastname,email,phonenumber,password) values(?,?,?,?,?)";
		$stmtinsert=$db->prepare($sql);
		$result=$stmtinsert->execute($firstname,$lastname,$email,$phonenumber,$password);

		if($result){
			echo "SAved";



		}
		else{
			echo "error in data";
		}


	}
	?>	
</div>

<div class="pt-5 w-100 h-100" style="padding-left: 600px ;background-color:#fa6a36 ;height: 100%" >
	<form action="registration.php" method="post">
		<div class="container">
			
			<div class="row" style=" padding-right: 0;margin-right: :0; ">
				<div class="col-sm-3">
					<h1>Registration</h1>
					<p>Fill up the form with correct values.</p>
					<hr class="mb-3">
					<label for="firstname"><b>First Name</b></label>
					<input class="form-control" id="firstname" type="text" name="firstname" required>

					<label for="lastname"><b>Last Name</b></label>
					<input class="form-control" id="lastname"  type="text" name="lastname" required>

					<label for="email"><b>Email Address</b></label>
					<input class="form-control" id="email"  type="email" name="email" required>

					<label for="phonenumber"><b>Phone Number</b></label>
					<input class="form-control" id="phonenumber"  type="text" name="phonenumber" required>

					<label for="password"><b>Password</b></label>
					<input class="form-control" id="password"  type="password" name="password" required>
					<hr class="mb-3">
					<input class="btn btn-primary mb-4 font-weight-bold" type="submit" id="register" name="create" value="Sign Up">
				</div>
			</div>
		</div>
	</form>

<a class="ml-2"href="http://localhost/Apj%20Horse/userlaccounts/login.php" ><input class="btn btn-primary ml-5 mb-5 font-weight-bold" type="submit" id="register" name="create" value="log in"></a></button>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){


			var firstname 	= $('#firstname').val();
			var lastname	= $('#lastname').val();
			var email 		= $('#email').val();
			var phonenumber = $('#phonenumber').val();
			var password 	= $('#password').val();
			

				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'process.php',
					data: {firstname: firstname,lastname: lastname,email: email,phonenumber: phonenumber,password: password},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': data,
								'type': 'success'
								})
							
					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while saving the data.',
								'type': 'error'
								})
					}
				});

				
			}else{
				
			}

			



		});		

		
	});
	
</script>
</body>
</html>