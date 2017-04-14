<?php (isset($_SERVER['HTTP_ACCEPT_ENCODING'])&&substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))?ob_start("ob_gzhandler"):ob_start(); 

date_default_timezone_set("Asia/Kuala_lumpur");
ini_set("error_reporting", 1);
ini_set('display_errors', 1);

require 'vendor/autoload.php';
$db = new MyDB();

if(isset($_POST["edit_task"])) {
    $name = ucwords($_POST["name"]);
    $status = $_POST["status"];
    $id = $_POST["id"];
    $db->pdo->exec("UPDATE `tasks` SET name = '$name', status = '$status', created_at = '".date("Y-m-d H:i:s")."' WHERE id = '$id'");

    setcookie("SUCCESS", "Data has been saved.", time()+2, "/");
    header("location:/tasks/");
    exit;
}

$id = $_GET["id"];
$sql = $db->pdo->query("SELECT * FROM tasks WHERE id = '$id'");
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    $data = $row;
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

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<title>Task System - Edit</title>

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
                    <td><input type="text" class="form-control" name="name" required value="<?php echo $data['name']; ?>"></td>
                </tr>
                <tr class="list">
                    <td>Status</td>
                    <td>
                        <select name="status" class="form-control" required>
                            <option value="">Please Select</option>
                            <option <?php echo ($data['status']=="Pending")?"selected":""; ?>>Pending</option>
                            <option <?php echo ($data['status']=="Complete")?"selected":""; ?>>Complete</option>
                            <option <?php echo ($data['status']=="Closed")?"selected":""; ?>>Closed</option>
                        </select>
                    </td>
                </tr>
            </table>
            <br>
            <div style="text-align: left;">
                <button type="submit" name="edit_task" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            </div>
        </form>
    </div>
    <div class="col-md-1"></div>
</div>

</body>
</html>




