<?php
session_start();
include "../db_conn.php";
$QA = "";
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
    $sql = "SELECT * FROM Q_A WHERE id=$id";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: ./customer_profile.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Client edit Q&A</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
    <div class="header">
        <h2>Client edit Q&A</h2>
    </div>
    <form method="post" action="update_qa_f.php">
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <!-- house id -->
        <input type="text" name="id" value="<?php echo $id; ?>" ; hidden>
        <div class="input-group">
            <label>Q&A</label>
            <input type="text" name="QA" value="<?= $row['QA'] ?>">
        </div>
        <!-- button  -->
        <div class="input-group">
            <button type="submit" class="btn btn-primary" name="edit_QA">Update</button>
        </div>
    </form>
</body>


</html>