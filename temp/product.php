<!DOCTYPE html>
<html>

<body>

    <?php
    session_start();

    // initializing variables
    $username = "";
    $email    = "";
    $errors = array();

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'test_db');

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }



    $sql = "SELECT id, username, email, img FROM users";
    $result = $db->query($sql);


    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            print "<br> id: " . $row["id"] . "<br> - Name: " . $row["username"] . "<br> - Email: " . $row["email"] . "<br>";
            print "<img src=\"" . $row["img"] . "\">";
        }
    } else {
        print "0 results";
    }



    $db->close();
    ?>



</body>

</html>











// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $type_user = mysqli_real_escape_string($db, $_POST['type_user']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (empty($type_user)) {
    array_push($errors, "Type of user is required");
  }
  // echo "asf";

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users_admin WHERE username='$username' AND type_user='$type_user' AND password='$password'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) === 1) {
      $row = mysqli_fetch_assoc($results);
      echo "hi peter";
      // while ($row = mysqli_fetch_assoc($results)) {
      if ($row['password'] == $password && $row['type_user'] == $type_user) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['type_user'] = $row['type_user'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['mobile'] = $row['mobile'];
        $_SESSION['address'] = $row['address'];
        $_SESSION['country'] = $row['country'];
        $_SESSION['abn'] = $row['abn'];
        $_SESSION['success'] = "You are now logged in";
        // $_SESSION['success'] = "You are now logged in";
        if ($_SESSION['type_user'] == 'System manager') {
          header('location: system_man.php');
        }
      } else {
        // $_SESSION['username'] = $username;
        // $_SESSION['type_user'] = $type_user;
        // $_SESSION['success'] = "You are now logged in";
        // header('location: host.php');
        array_push($errors, "Wrong! Your entry doesn't match, please try again.");
      }
    }
  }
}