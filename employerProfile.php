<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
	$username="";
	//header("location: index.php");
}

if(isset($_POST["jid"])){
	$_SESSION["job_id"]=$_POST["jid"];
	header("location: jobDetails.php");
}

if(isset($_POST["f_user"])){
	$_SESSION["f_user"]=$_POST["f_user"];
	header("location: viewFreelancer.php");
}


$sql = "SELECT * FROM employer WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name=$row["Name"];
        $email=$row["email"];
        $contactNo=$row["contact_no"];
        $gender=$row["gender"];
        $birthdate=$row["birthdate"];
        $address=$row["address"];
        $profile_sum=$row["profile_sum"];
        $company=$row["company"];
        $profile_image = isset($row["profile_image"]) ? $row["profile_image"] : null;
    }
} else {
    echo "0 results";
}

$sql = "SELECT * FROM job_offer WHERE e_username='$username' and valid=1 ORDER BY timestamp DESC";
$result = $conn->query($sql);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Profil Employeur</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="awesome/css/fontawesome-all.min.css">

<style>
	body{padding-top: 3%;margin: 0;}
	.card{box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background:#fff}
</style>

</head>
<body>

<!--Navbar menu-->
<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
	<div class="container">
		<div class="navber-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">Marché des Freelances</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="allJob.php">Parcourir les offres</a></li>
				<li><a href="allFreelancer.php">Parcourir les Freelances</a></li>
				<li><a href="allEmployer.php">Parcourir les Employeurs</a></li>
				<li class="dropdown" style="background:#000;padding:0 20px 0 20px;">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?>
			        </a>
			        <ul class="dropdown-menu list-group list-group-item-info">
			        	<a href="employerProfile.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span>  Voir le profil</a>
			          	<a href="editEmployer.php" class="list-group-item"><span class="glyphicon glyphicon-inbox"></span>  Modifier le profil</a>
					  	<a href="message.php" class="list-group-item"><span class="glyphicon glyphicon-envelope"></span>  Messages</a> 
					  	<a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-ok"></span>  Déconnexion</a>
			        </ul>
			    </li>
			</ul>
		</div>		
	</div>	
</nav>
<!--End Navbar menu-->


<!--main body-->
<div style="padding:1% 3% 1% 3%;">
<div class="row">

<!--Column 1-->
	<div class="col-lg-3">

<!--Main profile card-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="card">
							<div class="card-body text-center">
								<?php
								if(isset($profile_image) && !empty($profile_image)) {
									echo '<img src="' . $profile_image . '" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">';
								} else {
									echo '<img src="images/default-profile.png" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">';
								}
								?>
								<h4><?php echo $name; ?></h4>
								<p class="text-muted"><?php echo $company; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<p></p>
			<img src="image/img04.jpg">
			<h2><?php echo $name; ?></h2>
			<p><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?></p>
			<ul class="list-group">
				<a href="postJob.php" class="list-group-item list-group-item-info">Publier une offre</a>
	          	<a href="editEmployer.php" class="list-group-item list-group-item-info">Modifier le profil</a>
			  	<a href="message.php" class="list-group-item list-group-item-info">Messages</a>
			  	<a href="logout.php" class="list-group-item list-group-item-info">Déconnexion</a>
	        </ul>
	    </div>
<!--End Main profile card-->

<!--Contact Information-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-success">
			  <div class="panel-heading"><h4>Informations de contact</h4></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">E-mail</div>
			  <div class="panel-body"><?php echo $email; ?></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Téléphone</div>
			  <div class="panel-body"><?php echo $contactNo; ?></div>
			</div>
			<div class="panel panel-success">
			  <div class="panel-heading">Adresse</div>
			  <div class="panel-body"><?php echo $address; ?></div>
			</div>
		</div>
<!--End Contact Information-->

<!--Reputation-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-warning">
			  <div class="panel-heading"><h4>Réputation</h4></div>
			</div>
			<div class="panel panel-warning">
			  <div class="panel-heading">Avis</div>
			  <div class="panel-body">Rien à afficher</div>
			</div>
			<div class="panel panel-warning">
			  <div class="panel-heading">Évaluations</div>
			  <div class="panel-body">Rien à afficher</div>
			</div>
		</div>
<!--End Reputation-->

	</div>
<!--End Column 1-->

<!--Column 2-->
	<div class="col-lg-7">

<!--Employer Profile Details-->	
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-primary">
			  <div class="panel-heading"><h3>Détails du profil employeur</h3></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Nom de l'entreprise</div>
			  <div class="panel-body"><h4><?php echo $company; ?></h4></div>
			</div>
			
			<div class="panel panel-primary">
			  <div class="panel-heading">Résumé du profil</div>
			  <div class="panel-body"><h4><?php echo $profile_sum; ?></h4></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Offres d'emploi actuelles</div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <th>ID Offre</th>
                          <th>Titre</th>
                          <th>Type</th>
                          <th>Description</th>
                          <th>Budget</th>
                          <th>Date limite</th>
                          <th>Statut</th>
                      </tr>
                      <?php 
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $type=$row["type"];
                                $description=$row["description"];
                                $budget=$row["budget"];
                                $deadline=$row["deadline"];
                                $status=$row["status"];

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    <td>'.$type.'</td>
                                    <td>'.$description.'</td>
                                    <td>'.$budget.'</td>
                                    <td>'.$deadline.'</td>
                                    <td>'.$status.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Rien à afficher</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Offres d'emploi précédentes</div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <th>ID Offre</th>
                          <th>Titre</th>
                          <th>Type</th>
                          <th>Description</th>
                          <th>Budget</th>
                          <th>Date limite</th>
                          <th>Statut</th>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer WHERE e_username='$username' and valid=0 ORDER BY timestamp DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $type=$row["type"];
                                $description=$row["description"];
                                $budget=$row["budget"];
                                $deadline=$row["deadline"];
                                $status=$row["status"];

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    <td>'.$type.'</td>
                                    <td>'.$description.'</td>
                                    <td>'.$budget.'</td>
                                    <td>'.$deadline.'</td>
                                    <td>'.$status.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Rien à afficher</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Freelancers actuellement engagés</div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>ID Offre</td>
                          <td>Titre</td>
                          <td>Freelance</td>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.e_username='$username' AND selected.valid=1 ORDER BY job_offer.timestamp DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $f_username=$row["f_username"];
                                $timestamp=$row["timestamp"];

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    </form>
                                    <form action="employerProfile.php" method="post">
                                    <input type="hidden" name="f_user" value="'.$f_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                                    <td>'.$timestamp.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Rien à afficher</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
			</div>
			<div class="panel panel-primary">
			  <div class="panel-heading">Freelancers précédemment engagés</div>
			  <div class="panel-body"><h4>
                  <table style="width:100%">
                      <tr>
                          <td>ID Offre</td>
                          <td>Titre</td>
                          <td>Freelance</td>
                      </tr>
                      <?php 
                      	$sql = "SELECT * FROM job_offer,selected WHERE job_offer.job_id=selected.job_id AND selected.e_username='$username' AND selected.valid=0 ORDER BY job_offer.timestamp DESC";
						$result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $job_id=$row["job_id"];
                                $title=$row["title"];
                                $f_username=$row["f_username"];
                                $timestamp=$row["timestamp"];

                                echo '
                                <form action="employerProfile.php" method="post">
                                <input type="hidden" name="jid" value="'.$job_id.'">
                                    <tr>
                                    <td>'.$job_id.'</td>
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$title.'"></td>
                                    </form>
                                    <form action="employerProfile.php" method="post">
                                    <input type="hidden" name="f_user" value="'.$f_username.'">
                                    <td><input type="submit" class="btn btn-link btn-lg" value="'.$f_username.'"></td>
                                    <td>'.$timestamp.'</td>
                                    </tr>
                                </form>
                                ';

                                }
                        } else {
                            echo "<tr><td>Rien à afficher</td></tr>";
                        }

                       ?>
                  </table>
              </h4></div>
			</div>
		</div>
<!--End Employer Profile Details-->

	</div>
<!--End Column 2-->


<!--Column 3-->
	<div class="col-lg-2">
<!--My Wallet-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-info">
			  <div class="panel-heading"><h3>My Wallet</h3></div>
			</div>
			<ul class="list-group">
			  <li class="list-group-item">Balance: $0.0</li>
			  <li class="list-group-item">Payment Method: </li>
			  <li class="list-group-item">Deposit</li>
			</ul>
		</div>
<!--End My Wallet-->

<!--Social Network Profiles-->
		<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
			<div class="panel panel-info">
			  <div class="panel-heading"><h3>Social Network Profiles</h3></div>
			</div>
			<ul class="list-group">
			  <li class="list-group-item" style="font-size:20px;color:#3B579D;"><i class="fab fa-facebook-square"> Facebook</i></li>
			  <li class="list-group-item" style="font-size:20px;color:#D34438;"><i class="fab fa-google-plus-square"> Google</i></li>
			  <li class="list-group-item" style="font-size:20px;color:#2CAAE1;"><i class="fab fa-twitter-square"> Twitter</i></li>
			  <li class="list-group-item" style="font-size:20px;color:#0274B3;"><i class="fab fa-linkedin"> Linkedin</i></li>
			</ul>
		</div>
<!--End Social Network Profiles-->

	</div>
<!--End Column 3-->

</div>
</div>
<!--End main body-->


<!--Footer-->
<div class="text-center" style="padding:4%;background:#222;color:#fff;margin-top:20px;">
	<div class="row">
			<div class="col-lg-3">
			<h3>Liens rapides</h3>
			<p><a href="index.php">Accueil</a></p>
			<p><a href="allJob.php">Parcourir les offres</a></p>
			<p><a href="allFreelancer.php">Parcourir les Freelances</a></p>
			<p><a href="allEmployer.php">Parcourir les Employeurs</a></p>
		</div>
		<div class="col-lg-3">
			<h3>À propos</h3>
			<p>Rahamat-E-Elahi, CUET ID-1304054</p>
			<p>Shovagata Sarker Borno, CUET ID-1304041</p>
			<p>Md. Sharifullah, CUET ID-1304049</p>
			<p>&copy 2018</p>
		</div>
		<div class="col-lg-3">
			<h3>Contactez-nous</h3>
			<p>Chittagong University of Engineering and Technology</p>
			<p>Chittagong, Bangladesh</p>
			<p>&copy CUET 2018</p>
		</div>
		<div class="col-lg-3">
			<h3>Réseaux sociaux</h3>
			<p style="font-size:20px;color:#3B579D;"><i class="fab fa-facebook-square"> Facebook</i></p>
			<p style="font-size:20px;color:#D34438;"><i class="fab fa-google-plus-square"> Google</i></p>
			<p style="font-size:20px;color:#2CAAE1;"><i class="fab fa-twitter-square"> Twitter</i></p>
			<p style="font-size:20px;color:#0274B3;"><i class="fab fa-linkedin"> Linkedin</i></p>
		</div>
	</div>
</div>
<!--End Footer-->


<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>