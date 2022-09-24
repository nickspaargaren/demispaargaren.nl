<?php
session_start();
?>
<head>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="https://use.typekit.net/mup3tnf.css">
</head>
<body>

<style>
	body {background: none; padding: 0; margin: 0;}
	input, textarea   {width: 100%; box-sizing: border-box; border: 0; padding: 10px; margin: 0 0 5px 0; font-family: inherit; font-size: inherit; color: #000; background: #fff; border: 1px solid #000;}
	table {max-width: 630px; width: 100%;}
</style>

<h1>Send me a message</h1>

		<form action="formversturen.php" method="post">
			<table style="border-spacing: 0px;">
				<tr>
					<td>
					<input type="input" name="naam" placeholder="Name" required/>
					</td>
				</tr>
				<tr>
					<td>
					<input type="email" name="email" placeholder="Email" required/>
					</td>
				</tr>
				<tr>
					<td>
					<textarea type="input" name="bericht"  placeholder="Message" style="height: 200px;" required></textarea>
					</td>
				</tr>
			</table>
			<button type="submit" class="knop" value="Versturen">Send!</button>
		</form>
	</div>
</div>
<div class="cleared"></div>
</body>
</html>
