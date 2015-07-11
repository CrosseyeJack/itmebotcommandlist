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
	<div class="container sub-list">
		<div class="row">
		<p><strong>Mod Only Commands</strong><br>More Mod Commands coming soon. Got an Idea. then tell me and i'll put it on the todo list.</p>
		<table id="modcommandtable" class="table table-fixed">
				<thead>
					<tr>
						<th class="col-md-4">Command</th><th>Action</th>
					</tr>
				</thead>
				<tbody class="command-table">
					<tr><td style="vertical-align: middle;">!makemulti TwitchName1 TwitchName2 TwitchName3 etc</td>
						<td>Creates the multitwitch link which is trigger off the !multicommand<br><strong>Example:</strong> !makemulti itmejp djwheat thestrippin<br>
						<strong>Creates: !multi</strong> http://multitwitch.tv/itmejp/djwheat/thestrippin/ or http://kbmod.com/multistream/itmejp/djwheat/thestrippin/</td></tr>
					<tr><td style="vertical-align: middle;">!clearmulti</td>
						<td>Deletes the !multi command. The multi command is also deleted automatically at the end of a stream.</td></tr>
					<tr><td style="vertical-align: middle;">!makecommand Trigger Message</td>
						<td>Creates or updates a !command<br><strong>Example:</strong> !makecommand welcome Hello and Welcome to the stream.<br>Tips: you can add {nick} to the message and it will replace it with either the command issuers name or the target of the command if issued like !triggerword SomeoneInChat</td></tr>
					<tr><td style="vertical-align: middle;">!clearcommand Trigger</td>
						<td>Deletes the command linked to Trigger</td></tr>
					<tr><td style="vertical-align: middle;">!titleyt on</td>
						<td>Enables the Title YouTube Videos linked in chat option. If bot detects that someone has posted a YouTube Link bot will try and get the videos title and say it in chat.</td></tr>
					<tr><td style="vertical-align: middle;">!titleyt off</td>
						<td>Disables the Title YouTube Videos linked in chat option. If chat gets spammy this gives you the option to tell bot to STFU.</td></tr>
				</tbody>
			</table>
			<div>
			<strong>General Commands:</strong><br>
			<p>While the stream is offline everyone can issue commands to the bot, during a stream only subscribers and mods can issue commands to the bot.</p>
			<p>When Subs/NonSubs issue a command it will have a 3 min cooldown. Mods override this cooldown expect for 5 sec's after a command has been triggered by another user of chat.
			This is just to prevent the command being repeated when two or more people try and trigger a command in such a short time.</p>
			<p>Subs/NonSubs have a number of command "credits". every time they successfully issue a command to bot a credit is deducted from them. Once they are out of credits they can no longer issue commands untill their credits have been reissued over time. This may need balancing, feedback is welcomed.</p>
			</div>
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
</div>
</body>
</html>


