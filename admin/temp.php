<div class="box">
	<h4 class="display-4 text-center">View</h4><br>
	<?php if (isset($_GET['success'])) { ?>
		<div class="alert alert-success" role="alert">
			<?php echo $_GET['success']; ?>
		</div>
	<?php } ?>
	<?php if (mysqli_num_rows($result)) { ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Order.NO</th>
					<th scope="col">ID.NO</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = 0;
				while ($rows = mysqli_fetch_assoc($result)) {
					$i++;
				?>
					<tr>
						<th scope="row"><?= $i ?></th>
						<th scope="row"><?= $rows['id'] ?></th>
						<td><?= $rows['name'] ?></td>
						<td><?php echo $rows['email']; ?></td>
						<td><a href="update.php?id=<?= $rows['id'] ?>" class="btn btn-success">Update</a>

							<a href="php/delete.php?id=<?= $rows['id'] ?>" class="btn btn-danger">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php } ?>
	<div class="link-right">
		<a href="index.php" class="link-primary">Create</a>
	</div>
</div>








<?php

if (isset($_POST['create'])) {
	include "../db_conn.php";
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$name = validate($_POST['name']);
	$email = validate($_POST['email']);

	$user_data = 'name=' . $name . '&email=' . $email;

	if (empty($name)) {
		header("Location: ../index.php?error=Name is required&$user_data");
	} else if (empty($email)) {
		header("Location: ../index.php?error=Email is required&$user_data");
	} else {

		$sql = "INSERT INTO users(name, email) 
               VALUES('$name', '$email')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: ../read.php?success=successfully created");
		} else {
			header("Location: ../index.php?error=unknown error occurred&$user_data");
		}
	}
}



















<?php

if (isset($_POST['create_customer_ad'])) {
	include "../../db_conn.php";
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$c_username = validate($_POST['c_username']);
	$c_first_name = validate($_POST['c_first_name']);
	$c_last_name = validate($_POST['c_last_name']);
	$c_email = validate($_POST['c_email']);
	$c_mobile = validate($_POST['c_mobile']);
	$c_address = validate($_POST['c_address']);
	$c_country = validate($_POST['c_country']);
	$errors = array();


	$user_data = 'c_username=' . $c_username . '&c_first_name=' . $c_first_name . '&c_last_name=' . $c_last_name . '&c_email=' . $c_email . '&c_mobile=' . $c_mobile . '&c_address=' . $c_address . '&c_country=' . $c_country;

	if (empty($c_username)) {
		array_push($errors, "Type of user is required");
		// header("Location: ./create_cust.php?error=Userame is required&$user_data");
	} else if (empty($c_email)) {
		header("Location: ./create_cust.php?error=Email is required&$user_data");
	} else {

		$sql = "INSERT INTO users_customer(c_username, c_email) 
               VALUES('$c_username', '$c_email')";
		$result = mysqli_query($db, $sql);
		if ($result) {
			header("Location: ../read.php?success=successfully created");
		} else {
			header("Location: ../index.php?error=unknown error occurred&$user_data");
		}
	}
}









<?php include('./create_cust_f.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Create</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/CRUD.css">
</head>

<body>
	<div class="container">
		<form action="./create_cust.php" method="post">

			<h4 class="display-4 text-center">Create</h4>
			<hr><br>
			<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $_GET['error']; ?>
				</div>
			<?php } ?>
			<div class="form-group">
				<label for="c_username">Username</label>
				<input type="text" class="form-control" id="c_username" name="c_username" value="<?php if (isset($_GET['c_username']))
																										echo ($_GET['c_username']); ?>" placeholder="Enter username">
			</div>

			<div class="form-group">
				<label for="c_first_name">First Name</label>
				<input type="text" class="form-control" id="c_first_name" name="c_first_name" value="<?php if (isset($_GET['c_first_name']))
																											echo ($_GET['c_first_name']); ?>" placeholder="Enter first name">
			</div>

			<div class="form-group">
				<label for="c_last_name">Last Name</label>
				<input type="text" class="form-control" id="c_last_name" name="c_last_name" value="<?php if (isset($_GET['c_last_name']))
																										echo ($_GET['c_last_name']); ?>" placeholder="Enter last name">
			</div>

			<div class="form-group">
				<label for="c_email">Email</label>
				<input type="email" class="form-control" id="c_email" name="c_email" value="<?php if (isset($_GET['c_email']))
																								echo ($_GET['c_email']); ?>" placeholder="Enter email">
			</div>

			<div class="form-group">
				<label for="c_mobile">Mobile</label>
				<input type="text" class="form-control" id="c_mobile" name="c_mobile" value="<?php if (isset($_GET['c_mobile']))
																									echo ($_GET['c_mobile']); ?>" placeholder="Enter mobile">
			</div>

			<div class="form-group">
				<label for="c_password">Password</label>
				<input type="text" class="form-control" id="c_password" name="password_c1" placeholder="Enter password">
			</div>

			<div class="form-group">
				<label for="c_password">Confirm password</label>
				<input type="text" class="form-control" id="c_password" name="password_c2" placeholder="Please confirm your password">
			</div>

			<div class="form-group">
				<label for="c_address">Address</label>
				<input type="text" class="form-control" id="c_address" name="c_address" value="<?php if (isset($_GET['c_address']))
																									echo ($_GET['c_address']); ?>" placeholder="Enter address">
			</div>

			<div class="form-group">
				<label for="c_country">Country</label>
				<select class="form-control" id="c_country" name="c_country" value="<?php if (isset($_GET['c_country']))
																						echo ($_GET['c_country']); ?>">
					<option selected value=""></option>
					<option value="China">China</option>
					<option value="Australia">Australia</option>
					<option value="America">America</option>
					<option value="Africa">Africa</option>
					<option value="Japan">Japan</option>
					<option value="South Korea">South Korea</option>
				</select><br>
			</div>


			<button type="submit" class="btn btn-primary" name="create_customer_ad">Create</button>
			<a href="../sys_dashboard.php" class="link-primary">View</a>
		</form>
	</div>
</body>

</html>







<?php

if (isset($_GET['id'])) {
        include "db_conn.php";

        function validate($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }

        $id = validate($_GET['id']);

        $sql = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        } else {
                header("Location: read.php");
        }
} else if (isset($_POST['update'])) {
        include "../db_conn.php";
        function validate($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }

        $name = validate($_POST['name']);
        $email = validate($_POST['email']);
        $id = validate($_POST['id']);

        if (empty($name)) {
                header("Location: ../update.php?id=$id&error=Name is required");
        } else if (empty($email)) {
                header("Location: ../update.php?id=$id&error=Email is required");
        } else {

                $sql = "UPDATE users
               SET name='$name', email='$email'
               WHERE id=$id ";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                        header("Location: ../read.php?success=successfully updated");
                } else {
                        header("Location: ../update.php?id=$id&error=unknown error occurred&$user_data");
                }
        }
} else {
        header("Location: read.php");
}



















// ------------
<?php

if (isset($_GET['id'])) {
    include "../../db_conn.php";

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "SELECT * FROM users_customer WHERE id=$id";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: ../sys_dashboard.php");
    }
} else if (isset($_POST['update_cust_ad'])) {
    include "../../db_conn.php";
    $c_username = mysqli_real_escape_string($db, $_POST['c_username']);
    $c_first_name = mysqli_real_escape_string($db, $_POST['c_first_name']);
    $c_last_name = mysqli_real_escape_string($db, $_POST['c_last_name']);
    $c_email = mysqli_real_escape_string($db, $_POST['c_email']);
    $c_mobile = mysqli_real_escape_string($db, $_POST['c_mobile']);
    $password_c1 = mysqli_real_escape_string($db, $_POST['password_c1']);
    $password_c2 = mysqli_real_escape_string($db, $_POST['password_c2']);
    $c_address = mysqli_real_escape_string($db, $_POST['c_address']);
    $c_country = mysqli_real_escape_string($db, $_POST['c_country']);


    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($c_username)) {
        array_push($errors, "Username is required");
    }
    if (empty($c_first_name)) {
        array_push($errors, "First name is required");
    }
    if (empty($c_last_name)) {
        array_push($errors, "Last name is required");
    }
    if (empty($c_email)) {
        array_push($errors, "Email is required");
    }
    if (empty($c_mobile)) {
        array_push($errors, "Mobile is required");
    }
    if (empty($password_c1)) {
        array_push($errors, "Password is required");
    }
    if ($password_c1 != $password_c2) {
        array_push($errors, "The two passwords do not match");
    }
    if (empty($c_address)) {
        array_push($errors, "Address is required");
    }
    if (empty($c_country)) {
        array_push($errors, "Country is required");
    }

    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users_customer WHERE c_username='$c_username' OR c_email='$c_email' OR c_mobile='$c_mobile' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['c_username'] === $c_username) {
            array_push($errors, "Username already exists");
        }

        if ($user['c_email'] === $c_email) {
            array_push($errors, "Email already exists");
        }
        if ($user['c_mobile'] === $c_mobile) {
            array_push($errors, "Mobile already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $c_password = md5($password_c1); //encrypt the password before saving in the database

        $query = "UPDATE users_customer 
        SET c_username = '$c_username', 
            c_first_name = '$c_first_name',
            c_last_name = '$c_last_name',
            c_email = '$c_email',
            c_mobile = '$c_mobile',
            c_address = '$c_address',
            c_password = '$c_password',
            c_country = '$c_country'
        WHERE id = $id";
        $sec_result = mysqli_query($db, $query);

        $_SESSION['c_username'] = $c_username;
        $_SESSION['success'] = "You are now updated successfully";
        header('location: ../sys_dashboard.php');
    }
} else {
    header("Location: ../sys_dashboard.php");
}
