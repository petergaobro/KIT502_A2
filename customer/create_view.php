<?php include('create_view_f.php') ?>
<!DOCTYPE html>
<html>

<head>
    <title>Reviews Creat</title>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>

<body>
    <div class="header">
        <h2>Create Review</h2>
    </div>
    <form method="post" action="create_view.php">
        <?php include('../errors.php'); ?>
        <div class="input-group">
            <label>Location</label>
            <input type="text" name="r_location" value="<?php echo $r_location; ?>">
        </div>
        <div class="input-group">
            <label>Rating</label>
            <input type="text" name="r_rating" value="<?php echo $r_rating; ?>">
        </div>
        <div class="input-group">
            <label>Comment</label>
            <input type="text" name="r_comment" value="<?php echo $r_comment; ?>">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="create_view">Create</button>
        </div>
    </form>
</body>
</html>