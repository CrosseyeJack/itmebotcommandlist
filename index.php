<?php
include_once('./config.php');
$mysqli = new mysqli($config['host'],$config['user'],$config['pass'],$config['data']);
$mysqli->set_charset("utf8");
$results=$mysqli->query($config['sqlq']);
$results->data_seek(0);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Cache-control" content="no-cache">
	<meta name="description" content="itmeBOT/CHAIR">
	<meta name="author" content="Crosseye Jack">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>itmeBOT Command List</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body style="padding-top: 70px;">
<nav class="navbar navbar-inverse navbar-fixed-top" style="margin: 0;">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Bot Commands</a>
		</div>
	</div>
</nav>
<div class="container-fluid">
	<div>
		<table id="commandtable" class="table table-fixed">
			<thead><tr>
					<th class="col-md-2">Command</th><th>Action</th>
				</tr>
			</thead>
			<tbody class="command-table">
			<?php
				while($row = $results->fetch_assoc()){
					echo ("<tr><td>!".htmlspecialchars($row[$config['cola']])."</td><td>".htmlspecialchars($row[$config['colb']])."</td></tr>\n");
				}
			?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>


