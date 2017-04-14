<?php (isset($_SERVER['HTTP_ACCEPT_ENCODING'])&&substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))?ob_start("ob_gzhandler"):ob_start(); 

date_default_timezone_set("Asia/Kuala_lumpur");
ini_set("error_reporting", 1);
ini_set('display_errors', 1);

require 'vendor/autoload.php';
$db = new MyDB();

if(isset($_POST["add_task"])) {
    $name = ucwords($_POST["name"]);
    $status = $_POST["status"];
    $db->pdo->exec("INSERT INTO `tasks`(`name`,`status`,`created_at`) VALUES ('$name','$status','".date("Y-m-d H:i:s")."')");

    setcookie("SUCCESS", "Data has been added.", time()+2, "/");
    header("location:/tasks/");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta name="description" content="Task System">
<meta name="keywords" content="Task, CRUD">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="author" content="Skaloot ;)">


<script>
/*
==============================================================
   __                               __       __    _________
  /  \  |  /      /\      |        /  \     /  \       |
  |     | /      /  \     |       /    \   /    \      |
   \    |/      /    \    |      |      | |      |     |
    \   |\     /______\   |      |      | |      |     |
     |  | \   /        \  |       \    /   \    /      |
  \__/  |  \ /          \ |_____   \__/     \__/       |
  
==============================================================
*/
</script>

<link rel="icon" href="favicon.ico" type="image/x-icon">

<title>Task System - Add</title>

<link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" media="all" href="css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/style.css">

<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>

<body>


<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <br>
        <div style="text-align: left;">
            <a href="/tasks/" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
        <br>
        <br>
        <form method="post">
            <table>
                <tr class="list">
                    <td style="width:20%;">Name</td>
                    <td><input type="text" class="form-control" name="name" required></td>
                </tr>
                <tr class="list">
                    <td>Status</td>
                    <td>
                        <select name="status" class="form-control" required>
                            <option selected value="">Please Select</option>
                            <option>Pending</option>
                            <option>Complete</option>
                            <option>Closed</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <div style="text-align: left;">
                <button type="submit" name="add_task" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
            </div>
        </form>
    </div>
    <div class="col-md-1"></div>
</div>

</body>
</html>




