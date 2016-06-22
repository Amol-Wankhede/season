<?php 
	include 'connect.inc.php';
	var_dump($_POST);	

	var_dump($_POST['id']);

	$activityIds = implode(",", $_POST['id']);
	var_dump($activityIds);

	$sql = "UPDATE season_activity set cityId = $_POST[city] WHERE activityId in ($activityIds)";
	var_dump($sql);

	$stmt1 = $pdo->prepare($sql);
                                $stmt1->execute();

 ?>

 	<a href="index.php">Click here for more</a>