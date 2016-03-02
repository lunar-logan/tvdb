<?php
session_start();

include_once 'scripts/common.php';


if(!isset($_SESSION['user'])) {
	header("Location: enter.html");
}

$shows = NULL;								// Shows to be displayed

if(isset($_GET['y'])) {
	$y = filter_input(INPUT_GET, 'y');
	$shows = get_show_by_year($y);
}

?>
<!doctype HTML>
<html lang="en">
<head>
	<title></title>
</head>
<body>
<div>
	<h2>Browse tv shows</h2>
	<form method="GET" action="">
		<table>
			<tr>
				<td><label>Select year</label></td>
				<td>
					<select name="y">
						<option selected></option>
						<?php 
							$start_year = 1960;
							for($y=$start_year; $y <= date('Y'); $y++) {
								echo "<option>$y</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="Go"></td>
			</tr>
		</table>
	</form>
</div>

<div>
	<?php 
		if($shows != NULL) {
			echo '<h2>List of shows</h2>';
			echo '<ul>';
			while(($row = mysql_fetch_assoc($shows))) {
				echo '<li>' . $row['title'] . '</li>';
			}
			echo '</ul>';
		}
	?>
</div>
</body>
</html>