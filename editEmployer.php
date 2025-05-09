<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
}
else{
    $username="";
	//header("location: index.php");
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
        $company_type=$row["company_type"];
        $company_website=$row["company_website"];
        $company_description=$row["company_description"];
        }
} else {
    echo "0 results";
}


if(isset($_POST["editEmployer"])){
    $name=test_input($_POST["name"]);
    $email=test_input($_POST["email"]);
    $contactNo=test_input($_POST["contactNo"]);
    $gender=test_input($_POST["gender"]);
    $birthdate=test_input($_POST["birthdate"]);
    $address=test_input($_POST["address"]);
    $company=test_input($_POST["company"]);
    $company_type=test_input($_POST["company_type"]);
    $company_website=test_input($_POST["company_website"]);
    $company_description=test_input($_POST["company_description"]);

    // Handle image upload
    $profile_image = "";
    if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $target_dir = "uploads/employer/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $file_extension = strtolower(pathinfo($_FILES["profile_image"]["name"], PATHINFO_EXTENSION));
        $new_filename = $username . "_" . time() . "." . $file_extension;
        $target_file = $target_dir . $new_filename;
        
        // Check if image file is a actual image
        $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
        if($check !== false) {
            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                $profile_image = $target_file;
            }
        }
    }

    $sql = "UPDATE employer SET Name='$name',email='$email',contact_no='$contactNo', address='$address', gender='$gender', company='$company', company_type='$company_type', company_website='$company_website', company_description='$company_description', birthdate='$birthdate'";
    
    if($profile_image != "") {
        $sql .= ", profile_image='$profile_image'";
    }
    
    $sql .= " WHERE username='$username'";
    
    $result = $conn->query($sql);
    if($result==true){
        header("location: employerProfile.php");
    }
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit profile</title>
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
				<li><a href="#">Browse all jobs</a></li>
				<li><a href="#how">Browse Freelancers</a></li>
				<li><a href="#faq">Browse Employers</a></li>
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


<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h2>Modifier le profil</h2>
                </div>

                <form id="registrationForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-sm-4 control-label">Nom</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Téléphone</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="contactNo" value="<?php echo $contactNo; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Genre</label>
                    <div class="col-sm-5">
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" 
                                <?php if (isset($gender) && $gender=="male") echo "checked";?>
                                 value="male" /> Male
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" 
                                <?php if (isset($gender) && $gender=="female") echo "checked";?>
                                 value="female" /> Female
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" 
                                <?php if (isset($gender) && $gender=="other") echo "checked";?>
                                 value="other" /> Other
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Date de naissance</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="birthdate" placeholder="YYYY/MM/DD" value="<?php echo $birthdate; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Adresse</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Nom de l'entreprise</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="company" value="<?php echo $company; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Type de l'entreprise</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="company_type" value="<?php echo $company_type; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Site web de l'entreprise</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="company_website" value="<?php echo $company_website; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Description de l'entreprise</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="company_description" value="<?php echo $company_description; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Photo de profil</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" name="profile_image" accept="image/*" />
                        <small class="text-muted">Formats acceptés: JPG, JPEG, PNG. Taille max: 5MB</small>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                        <button type="submit" name="editEmployer" class="btn btn-info btn-lg">Mettre à jour</button>
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
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    }
                }
            },
            username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The username can only consist of alphabetical and number'
                    },
                    different: {
                        field: 'password',
                        message: 'The username and password cannot be the same as each other'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not a valid'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    },
                    stringLength: {
                        min: 6,
                        message: 'The password must have at least 6 characters'
                    }
                }
            },
            repassword: {
                validators: {
                    notEmpty: {
                        message: 'The password confirmation is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password  is not matched'
                    }
                }
            },
            contactNo: {
                validators: {
                    notEmpty: {
                        message: 'The contact number is required'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The number is not valid'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The gender is required'
                    }
                }
            },
            birthdate: {
                validators: {
                    notEmpty: {
                        message: 'The date of birth is required'
                    },
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'The date of birth is not valid'
                    }
                }
            },
            address: {
                validators: {
                    notEmpty: {
                        message: 'The address is required'
                    }
                }
            },
            usertype: {
                validators: {
                    notEmpty: {
                        message: 'The usertype is required'
                    }
                }
            }
        }
    });
});
</script>

</body>
</html>