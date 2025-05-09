<?php
session_start();


// Create connection
$conn = new mysqli("localhost", "root", 'fM6&qVblka$$xp%dMYUnd', "fmarket");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*$sql = "SELECT * FROM employer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " " . $row["username"]. " " . $row["password"]. " " . $row["Name"]. "<br>";
    }
} else {
    echo "0 results";
}*/

$username=$name=$email=$password=$contactNo=$birthdate=$address=$prof_title=$profile_sum=$education=$experience=$skills="";

// Messages d'erreur
$errors = array(
    'username' => 'Le nom d\'utilisateur est requis',
    'email' => 'L\'email est requis',
    'password' => 'Le mot de passe est requis',
    'password_confirm' => 'Les mots de passe ne correspondent pas',
    'account_type' => 'Le type de compte est requis',
    'login' => 'Nom d\'utilisateur ou mot de passe incorrect',
    'register' => 'Erreur lors de l\'inscription',
    'profile' => 'Erreur lors de la mise à jour du profil',
    'job' => 'Erreur lors de la mise à jour de l\'offre',
    'message' => 'Erreur lors de l\'envoi du message',
    'apply' => 'Erreur lors de la candidature',
    'cover_letter' => 'La lettre de motivation est requise',
    'bid' => 'L\'offre est requise'
);

// Messages de succès
$success = array(
    'register' => 'Inscription réussie',
    'profile' => 'Profil mis à jour avec succès',
    'job' => 'Offre mise à jour avec succès',
    'message' => 'Message envoyé avec succès',
    'apply' => 'Candidature envoyée avec succès'
);

if(isset($_POST["register"])){
	$username=test_input($_POST["username"]);
	$name=test_input($_POST["name"]);
	$email=test_input($_POST["email"]);
	$password=test_input($_POST["password"]);
	$repassword=test_input($_POST["repassword"]);
	$contactNo=test_input($_POST["contactNo"]);
	$gender=test_input($_POST["gender"]);
	$birthdate=test_input($_POST["birthdate"]);
	$address=test_input($_POST["address"]);
	$prof_title=test_input($_POST["prof_title"]);
	$profile_sum=test_input($_POST["profile_sum"]);
	$education=test_input($_POST["education"]);
	$experience=test_input($_POST["experience"]);
	$skills=test_input($_POST["skills"]);
	$usertype=test_input($_POST["usertype"]);

	if ($usertype=="freelancer") {
		$sql = "SELECT * FROM freelancer,employer WHERE freelancer.username = '$username' OR employer.username = '$username'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION["errorMsg2"]="The username is already taken";
		}
		else{
			unset($_SESSION["errorMsg2"]);
			$sql = "INSERT INTO freelancer (username, password, Name, email, contact_no, address, gender, birthdate, prof_title, profile_sum, education, experience, skills) VALUES ('$username', '$password', '$name','$email','$contactNo','$address','$gender','$birthdate','$prof_title','$profile_sum','$education','$experience','$skills')";
			$result = $conn->query($sql);
			if($result==true){
				$_SESSION["Username"]=$username;
				$_SESSION["Usertype"]=1;
				header("location: freelancerProfile.php");
			}

		}
	}
	else{
		$sql = "SELECT * FROM freelancer,employer WHERE freelancer.username = '$username' OR employer.username = '$username'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION["errorMsg2"]="The username is already taken";
		}
		else{
			unset($_SESSION["errorMsg2"]);
			$sql = "INSERT INTO employer (username, password, Name, email, contact_no, address, gender, birthdate) VALUES ('$username', '$password', '$name','$email','$contactNo','$address','$gender','$birthdate')";
			$result = $conn->query($sql);
			if($result==true){
				$_SESSION["Username"]=$username;
				$_SESSION["Usertype"]=2;
				header("location: employerProfile.php");
			}

		}
	}
}

if(isset($_POST["login"])){
	session_unset();
	$username=test_input($_POST["username"]);
	$password=test_input($_POST["password"]);
	$usertype=test_input($_POST["usertype"]);

	if ($usertype=="freelancer") {
		$sql = "SELECT * FROM freelancer WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$_SESSION["Username"]=$username;
			$_SESSION["Usertype"]=1;
			unset($_SESSION["errorMsg"]);
			header("location: freelancerProfile.php");
		}
		else{
			$_SESSION["errorMsg"]="username/password is incorrect";
		}
	}
	else{
		$sql = "SELECT * FROM employer WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$_SESSION["Username"]=$username;
			$_SESSION["Usertype"]=2;
			unset($_SESSION["errorMsg"]);
			header("location: employerProfile.php");
		}
		else{
			$_SESSION["errorMsg"]="username/password is incorrect";
		}
	}
	
}


if(isset($_SESSION["errorMsg"])){
	$errorMsg=$_SESSION["errorMsg"];
	unset($_SESSION["errorMsg"]);
}
else{
	$errorMsg="";
}

if(isset($_SESSION["errorMsg2"])){
	$errorMsg2=$_SESSION["errorMsg2"];
	unset($_SESSION["errorMsg2"]);
}
else{
	$errorMsg2="";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//$conn->close();
?>