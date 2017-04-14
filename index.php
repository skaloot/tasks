<?php (isset($_SERVER['HTTP_ACCEPT_ENCODING'])&&substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))?ob_start("ob_gzhandler"):ob_start(); 

date_default_timezone_set("Asia/Kuala_lumpur");
ini_set("error_reporting", 1);
ini_set('display_errors', 1);

require 'vendor/autoload.php';
$db = new MyDB();


$sql = $db->pdo->query("SELECT * FROM tasks");
while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
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

<title>Task System</title>

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
        <a href="add" class="btn btn-primary"><i class="fa fa-plus"></i> Add Task</a>
    </div>

    <!-- ALERT -->
    <?php if(isset($_COOKIE['SUCCESS'])) { ?>
    <div id="alert-wrapper">
        <br>
        <div class="alert alert-success">
            <?php echo $_COOKIE['SUCCESS']; ?>
        </div>
    </div>
    <script type="text/javascript">
        setTimeout(function(){
            $("#alert-wrapper").slideUp(350);
        }, 2000);
    </script>
    <?php } ?>

    <br>
        <?php if(count($data) > 0) { ?>
        <table class="list">
            <thead>
                <tr class="list_header">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $d) { ?>
                <tr class="list">
                    <td><?php echo $d["id"]; ?></td>
                    <td><?php echo $d["name"]; ?></td>
                    <td><?php echo $d["status"]; ?></td>
                    <td><?php echo $d["created_at"]; ?></td>
                    <td>
                        <a href="edit?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="delete?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-remove"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <h2>No data.</h2>
        <?php } ?>
    </div>
    <div class="col-md-1"></div>
</div>

</body>
</html>




