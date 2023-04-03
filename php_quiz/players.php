<?php session_start(); ?>
<?php include "conn.php";
if (isset($_SESSION['admin'])) {
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP-Kuiz</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/style1.css">
	</head>

	<body>
		<header>
			<div class="container">
				<h1>PHP-Kuiz</h1>
				<a href="index.php" class="start">Home</a>
				<a href="add.php" class="start">Add Question</a>
				<a href="allquestions.php" class="start">All Questions</a>
				<a href="players.php" class="start">Players</a>
				<a href="exit.php" class="start">Logout</a>
				
	<nav class="navbar navbar-expand-lg navbar-light bg-danger ">
  				<a class="navbar-brand" href="#">RDG83</a>
  					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    					<span class="navbar-toggler-icon"></span>
  					</button>
  			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    		<div class="navbar-nav">
				<a class="nav-item nav-link active" href="index.php"> <u><span class="start">Home</span></a></u>
				<a class="nav-item nav-link active" href="add.php"> <u><span class="start">Add Questions</span></a></u>
				<a class="nav-item nav-link active" href="allquestions.php"> <u><span class="start">All Questions</span></a></u>
				<a class="nav-item nav-link active" href="players.php"> <u><span class="start">Players</span></a></u>
				<a class="nav-item nav-link active" href="exit.php"> <u><span class="start">Logout</span></a></u> 
    		</div>
  			</div>
	</nav>
			</div>
		</header>

		
	<h1> All Players</h1>
	<table class="data-table">
		<caption class="title">All kuiz players</caption>
		<thead>
			<tr>
			<th>Player Id</th>
			<th>Email</th>
			<th>Played On</th>
			<th>Score</th>
			</tr>
		</thead>
		<tbody>
		<?php 
            
            $query = "SELECT * FROM users ORDER BY played_on DESC";
            $select_players = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($select_players) > 0 ) {
            while ($row = mysqli_fetch_array($select_players)) {
                $id = $row['id'];
                $email = $row['email'];
                $played_on = $row['played_on'];
                $score = $row['score'];
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$email</td>";
                echo "<td>$played_on</td>";
                echo "<td>$score</td>";
              
                echo "</tr>";
             }
         }
        ?>
	
		</tbody>
		
	</table>
</body>
</html>

<?php } 
else {
	header("location: admin.php");
}
?>

