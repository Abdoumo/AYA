<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
    $username="";
	//header("location: index.php");
}

if(isset($_SESSION["job_id"])){
    $job_id=$_SESSION["job_id"];
}
else{
    $job_id="";
    //header("location: index.php");
}

$sql = "SELECT * FROM apply WHERE job_id='$job_id' and f_username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $msg="You have already applied for this job. You cannot apply again.";
} else {
    $msg="";
}


if(isset($_POST["apply"]) && $msg==""){
    $cover=test_input($_POST["cover"]);
    $bid=test_input($_POST["bid"]);


    $sql = "INSERT INTO apply (f_username, job_id, bid, cover_letter) VALUES ('$username', '$job_id', '$bid','$cover')";

    
    $result = $conn->query($sql);
    if($result==true){
        header("location: allJob.php");
    }
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Apply for Job</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="awesome/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrapValidator.css">

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
			        	<a href="freelancerProfile.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span>  Voir le profil</a>
			          	<a href="editFreelancer.php" class="list-group-item"><span class="glyphicon glyphicon-inbox"></span>  Modifier le profil</a>
					  	<a href="message.php" class="list-group-item"><span class="glyphicon glyphicon-envelope"></span>  Messages</a> 
					  	<a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-ok"></span>  Déconnexion</a>
			        </ul>
			    </li>
			</ul>
		</div>		
	</div>	
</nav>
<!--End Navbar menu-->


<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h2>Postuler à l'offre</h2>
                </div>

                <form id="registrationForm" method="post" class="form-horizontal">
                <?php echo $msg; ?>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Écrire une lettre de motivation</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="17" name="cover"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Faire une offre</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="bid" value="" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                        <button type="submit" name="apply" class="btn btn-info btn-lg">Soumettre</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>


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
<script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>

<script>
$(document).ready(function() {
    $('#registrationForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cover: {
                validators: {
                    notEmpty: {
                        message: 'The title is required and cannot be empty'
                    }
                }
            },
            bid: {
                validators: {
                    notEmpty: {
                        message: 'The bid is required and cannot be empty'
                    },
                    stringLength: {
                        max: 11,
                        message: 'The number is too big'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The number is not valid'
                    }
                }
            }
        }
    });
});
</script>

</body>
</html>