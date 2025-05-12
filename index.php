<?php include('server.php');
if(isset($_SESSION["Username"])){
	$username=$_SESSION["Username"];
	if ($_SESSION["Usertype"]==1) {
		header("location: freelancerProfile.php");
	}
	else{
		header("location: employerProfile.php");
	}
}
else{
    $username="";
	//header("location: index.php");
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Freelance Marketplace</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="awesome/css/fontawesome-all.min.css">

<style>
	body{padding-top: 3%;margin: 0;}
	.header1{background-color: #EEEEEE;padding-left: 1%;}
	.header2{padding:20px 40px 20px 40px;color:#fff;}
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
			<a href="loginReg.php" class="btn btn-info navbar-btn navbar-right">S'inscrire</a>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php">Accueil</a></li>
				<li><a href="allJob.php">toutes les travailles</a></li>
				<li><a href="#how">Comment ça marche</a></li>
				<li><a href="#faq">FAQ</a></li>
			</ul>
		</div>		
	</div>	
</nav>
<!--End Navbar menu-->



<!--Header and slider-->

<!--Header-->
<div class="row header1">
	<div class="col-lg-4">
		<div class="jumbotron">
			<div class="container text-center">
				<h1>Marché des Freelances</h1>
				<p>N'oubliez pas, le temps c'est de l'argent. Utilisez-le correctement. Ne perdez pas votre temps à réfléchir quand d'autres font avancer les choses ici.</p>
				<a href="loginReg.php" class="btn btn-warning btn-lg">C'est Gratuit !! Inscrivez-vous Maintenant !!!</a>
				<p></p>
				<div class="btn-group">
					<a href="#how" type="button" class="btn btn-info">Comment ça marche</a>
					<a href="#faq" type="button" class="btn btn-default">FAQ</a>
					<a href="#category" type="button" class="btn btn-info">Catégories</a>
				</div>
			</div>
		</div>	
	</div>
<!--End Header-->

<!--slider-->
	<div class="col-lg-8">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		    <div class="item active">
		      <img src="image/computer.jpg" alt="Chania">
		      <div class="carousel-caption">
		        <h3>Travail</h3>
		        <p>Travaillez dur pour réussir.</p>
		      </div>
		    </div>

		    <div class="item">
		      <img src="image/mug.jpg" alt="Chania">
		      <div class="carousel-caption">
		        <h3>Temps</h3>
		        <p>Ne perdez pas votre temps.</p>
		      </div>
		    </div>

		    <div class="item">
		      <img src="image/coat.jpg" alt="Flower">
		      <div class="carousel-caption">
		        <h3>Croyez</h3>
		        <p>Croyez toujours en vous.</p>
		      </div>
		    </div>
		  </div>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
</div>
<!--End slider-->
<!--End Header and slider-->


<!--Individual register tip-->
<div style="background:#cce5ff">
<div class="container text-center" style="padding:5%;">
	<div class="row">
		<div class="col-lg-6 card" style="padding:40px 80px 40px 80px;">
			<h1>Besoin de faire réaliser des travaux ?</h1>
			<p>C'est simple. Publiez simplement un projet que vous souhaitez réaliser et recevez des offres compétitives de freelances en quelques minutes. Quels que soient vos besoins, il y aura un freelance pour les réaliser : du web design, au développement d'applications mobiles, assistants virtuels, fabrication de produits, et design graphique (et bien plus encore). C'est la façon la plus simple et la plus sûre de faire réaliser des travaux en ligne.</p>
			<p></p>
			<a href="loginReg.php" class="btn btn-success btn-lg">Commencer</a>
		</div>
		<div class="col-lg-6" style="padding:40px 80px 40px 80px;margin-top:15px;box-shadow: 4px 4px 2px 5px rgba(0, 0, 0, 0.2), 0 6px 0px 0 rgba(0, 0, 0, 0.19);background:#fff">
			<h1>Vous cherchez du travail ?</h1>
			<p>Si vous êtes expert dans tout type de travail informatique ou en ligne, n'hésitez pas à rejoindre notre plateforme. Elle est facile à utiliser et le paiement est sécurisé. C'est une excellente plateforme pour les personnes compétentes. Ne manquez donc pas l'occasion d'explorer les offres d'emploi et de gagner de l'argent.</p>
			<p></p>
			<a href="loginReg.php" class="btn btn-primary btn-lg">Commencer</a>
		</div>
	</div>
</div>
</div>
<!--End Individual register tip-->


<!--Popular Categories-->
<div class="container text-center" style="padding:4%;" id="category">
	<h1 class="card header2" style="background:#007BFF">Catégories Populaires</h1>
	<div class="row">
		<div class="col-lg-4">
			<div class="card" style="padding:20px 40px 20px 40px;margin:20px;">
				<a href="loginReg.php"><span class="glyphicon glyphicon-credit-card"></span>
				<h3>Développeur Web</h3>
				<p>Veuillez vous connecter et parcourir nos développeurs web</p></a>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card" style="padding:20px 40px 20px 40px;margin:20px;">
				<a href="loginReg.php"><span class="glyphicon glyphicon-phone"></span>
				<h3>Développeur Mobile</h3>
				<p>Veuillez vous connecter et parcourir nos développeurs mobiles</p></a>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card" style="padding:20px 40px 20px 40px;margin:20px;">
				<a href="loginReg.php"><span class="glyphicon glyphicon-picture"></span>
				<h3>Designer Graphique</h3>
				<p>Veuillez vous connecter et parcourir nos designers graphiques</p></a>
			</div>
		</div>
	</div>
		<div class="row">
		<div class="col-lg-4">
			<div class="card" style="padding:20px 40px 20px 40px;margin:20px;">
				<a href="loginReg.php"><span class="glyphicon glyphicon-pencil"></span>
				<h3>Rédacteur Créatif</h3>
				<p>Veuillez vous connecter et parcourir nos rédacteurs créatifs</p></a>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card" style="padding:20px 40px 20px 40px;margin:20px;">
				<a href="loginReg.php"><span class="glyphicon glyphicon-signal"></span>
				<h3>Expert en Marketing</h3>
				<p>Veuillez vous connecter et parcourir nos experts en marketing</p></a>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card" style="padding:20px 40px 20px 40px;margin:20px;">
				<a href="loginReg.php"><span class="glyphicon glyphicon-headphones"></span>
				<h3>Assistant Virtuel</h3>
				<p>Veuillez vous connecter et parcourir nos assistants virtuels</p></a>
			</div>
		</div>
	</div>
</div>
<!--End Popular Categories-->

<!--How it works-->
<div style="background:#cce5ff">
<div class="container text-center" style="padding:4%;" id="how">
	<h1 class="card header2" style="background:#007BFF">Comment ça marche</h1>
	<div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
		<div class="col-lg-6">
			<h3>Publiez des Projets Gratuitement</h3>
			<p>Il est toujours gratuit de publier votre projet. Vous commencerez automatiquement à recevoir des offres de nos freelances. Vous pouvez également parcourir les talents disponibles sur notre site et les contacter via leurs informations de contact.</p>
		</div>
		<div class="col-lg-6">
			<img src="image/img01.jpg">
		</div>
	</div>
	<div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
		<div class="col-lg-6">
			<h3>Déposez de l'Argent en Toute Sécurité</h3>
			<p>Nous avons une sécurité complète pour votre argent précieux. Vous avez le droit de payer l'argent déposé une fois le projet terminé. Nous avons une bonne politique de remboursement pour garantir la satisfaction du projet terminé.</p>
		</div>
		<div class="col-lg-6">
			<img src="image/img02.jpg">
		</div>
	</div>
	<div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
		<div class="col-lg-6">
			<h3>N'hésitez Pas à Discuter</h3>
			<p>Il est plus facile de discuter avec les freelances ici. Avant d'embaucher un freelance, n'hésitez pas à discuter avec eux. Dites-leur ce dont vous avez besoin et faites réaliser le projet dans les plus brefs délais.</p>
		</div>
		<div class="col-lg-6">
			<img src="image/img03.jpg">
		</div>
	</div>
	<div class="row card" style="padding:30px 60px 30px 60px;margin:30px;">
		<div class="col-lg-6">
			<h3>Créez un Profil Employeur</h3>
			<p>Si vous avez beaucoup de travaux à faire ou si vous dirigez une petite entreprise qui a besoin de freelances au quotidien, c'est l'endroit idéal pour vous. Créez votre profil employeur aujourd'hui et commencez à embaucher.</p>
		</div>
		<div class="col-lg-6">
			<img src="image/img04.jpg">
		</div>
	</div>
</div>
</div>
<!--End How it works-->


<!--FAQ-->
<div class="container text-center" style="padding:4%;" id="faq">
  <h1 class="card header2" style="background:#007BFF">FAQ</h1>
  <div class="btn-group-vertical">
  <button type="button" class="btn btn-default btn-lg" data-toggle="collapse" data-target="#demo" style="width:1062px"><h3>Qu'est-ce que le Marché des Freelances ?</h3></button>
  <div id="demo" class="collapse">
  	<div class="card" style="padding:20px 40px 20px 40px;">
  		<h4>Le marché des freelances est une plateforme d'externalisation en ligne qui met en relation les employeurs et les entreprises avec un réseau mondial de freelances. Tout membre peut publier un projet, qu'il s'agisse d'un travail à court ou à long terme, et choisir parmi des freelances qualifiés qui proposent des offres avec tarif pour réaliser le travail. C'est un arrangement mutuellement bénéfique. <br>Les employeurs peuvent choisir parmi des milliers de freelances qui possèdent exactement les compétences nécessaires pour accomplir le travail, sans engager les frais et l'engagement d'embaucher des employés à temps plein en personne. <br>Les freelances peuvent accéder à une source facilement disponible d'opportunités de travail à temps partiel et à temps plein d'employeurs qui les recherchent spécifiquement.</h4>
  	</div>
  </div>
  <button type="button" class="btn btn-default btn-lg" data-toggle="collapse" data-target="#demo1" style="width:1062px"><h3>Je suis un Employeur, comment ce site fonctionnera-t-il pour moi ?</h3></button>
  <div id="demo1" class="collapse">
  	<div class="card" style="padding:20px 40px 20px 40px;">
  		<h4>Vous pouvez obtenir un avantage concurrentiel sur vos concurrents en accédant à une main-d'œuvre qualifiée mondiale à la demande. <br>Si vous êtes une petite entreprise et ne pouvez pas vous permettre d'embaucher un personnel à temps plein, ne vous inquiétez pas ! La puissance de Freelance est disponible pour les petites et moyennes entreprises ! Que ce soit un site web à construire, des cartes de visite ou du papier à en-tête à concevoir, un produit à concevoir ou à fabriquer, ou des recherches à effectuer, c'est l'endroit pour vous ! <br>Des milliers de travailleurs qualifiés sont prêts à commencer à travailler dès maintenant ! Tout ce que vous avez à faire est de publier un projet !</h4>
  	</div>
  </div>
  <button type="button" class="btn btn-default btn-lg" data-toggle="collapse" data-target="#demo2" style="width:1062px"><h3>Je suis un Freelance, comment ce site fonctionnera-t-il pour moi ?</h3></button>
  <div id="demo2" class="collapse">
  	<div class="card" style="padding:20px 40px 20px 40px;">
  		<h4>Avec Freelance, vous pouvez travailler à domicile et accéder à un réseau mondial d'entreprises et de projets dans un large éventail d'industries - l'opportunité ultime en termes de flexibilité professionnelle ! <br>Travaillez sur ce que vous voulez, quand vous voulez et où vous voulez ! Le mode de vie d'un freelance est en plein essor. En travaillant comme Freelance en ligne, vous pouvez considérablement augmenter votre base de clients et votre débit de travail. <br>Pour commencer, il vous suffit de vous inscrire et de commencer à faire des offres. C'est GRATUIT !</h4>
  	</div>
  </div>
  <button type="button" class="btn btn-default btn-lg" data-toggle="collapse" data-target="#demo3" style="width:1062px"><h3>Dois-je payer pour m'inscrire ?</h3></button>
  <div id="demo3" class="collapse">
  	<div class="card" style="padding:20px 40px 20px 40px;">
  		<h4>Non. Le marché des freelances est absolument gratuit pour s'inscrire et explorer les offres d'emploi publiées, les freelances et les employeurs.</h4>
  	</div>
  </div>
  </div>
</div>
<!--End FAQ-->


<!--Footer-->
<div class="text-center" style="padding:4%;background:#222;color:#fff;margin-top:20px;">
	<div class="row">
			<div class="col-lg-3">
			<h3>Liens rapides</h3>
			<p><a href="index.php">Accueil</a></p>
			<p><a href="#how">Comment ça marche</a></p>
			<p><a href="#faq">FAQ</a></p>
			<p><a href="loginReg.php">Connexion</a></p>
			<p><a href="loginReg.php">S'inscrire</a></p>
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