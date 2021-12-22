<?php
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$genre = $_POST['genre'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','contact');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into enregistrement(nom, prenom, genre, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $nom, $prenom, $genre, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Enregistré avec succès...";
		$stmt->close();
		$conn->close();
	}
?>