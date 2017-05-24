<?php

include 'functions.php';

if (isset($_POST['create_user'])) {
	
	# code...
	
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$username = $_POST['username'];
	// $post_image = $_FILES['image']['name'];
	// $post_image_temp = $_FILES['image']['tmp_name'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	$user_role = $_POST['user_role'];
	$post_date = date('d-m-y h:i:s');

	// $post_comment_count = 4;


	// move_uploaded_file($post_image_temp, "../images/$post_image");

    

     $query  =  "INSERT INTO users (user_firstname, user_lastname , username, user_email, user_password,user_role) VALUES ('$user_firstname','$user_lastname','$username','$user_email','$user_password','$user_role')" ;
    $run_query = mysqli_query($connection , $query);

    check_query_success($run_query);

    echo "User Created : " . " " . "<a href='users.php' class='btn btn-primary'>View Users</a>";


}





?>



<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="author">Firstname</label>
		<input type="text" name="user_firstname" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_status">Lastname</label>
		<input type="text" name="user_lastname" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_status">Username</label>
		<input type="text" name="username" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_status">Email</label>
		<input type="email" name="user_email" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_status">Password</label>
		<input type="password" name="user_password" class="form-control" >
	</div>

	<div class="form-group">
		<select name="user_role">
		    <option value="">Select role</option>
			<option value="admin">admin</option>
			<option value="subscriber">Subscriber</option>

		</select>
	</div>

	<!-- <div class="form-group">
		<label for="post_category_id">Role </label><br>
		<select name="post_category_id" class="fosrm-control">
		  <option>Select category</option>
			<?php

			




			?>
		</select>
	</div>
     -->
    
	

	<!-- <div class="form-group">
		<label for="image">Post Image</label>
		<input type="file" name="image"  >
	</div> -->

	

	<div class="form-group">
		<input type="submit" name="create_user" class="btn btn-primary" value="Create User">
	</div>
</form>