<?php
include "../db_conn.php";
session_start();

$r_location = "";
$r_rating = "";
$r_comment = "";

$errors = array();

if (isset($_GET['id'])) {


    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "SELECT * FROM users_review WHERE id=$id";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: review.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Review</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>

<body>
    <div class="header">
        <h2>Update Review</h2>
    </div>
    <form method="post" action="update_review_f.php">

        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>

        <input type="text" name="id" value="<?php echo $id; ?>" ; hidden>
        <div class="input-group">
            <label>Location</label>
            <input type="text" name="r_location" value="<?= $row['r_location'] ?>">
        </div>

        <div class="input-group">
            <label>Rate</label>
            <input type="text" name="r_rating" value="<?= $row['r_rating'] ?>">
        </div>

        <div class="input-group">
            <label>Comment</label>
            <input type="text" name="r_comment" value="<?= $row['r_comment'] ?>">
        </div>

        <div class="input-group">

            <button type="submit" class="btn btn-primary" name="edit_review">Update</button>
        </div>
    </form>
</body>

</html>