<?php include('server.php');

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Freelance Marketplace</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrapValidator.css">

<style>
	:root {
		--primary: #2563eb;
		--primary-dark: #1d4ed8;
		--secondary: #64748b;
		--success: #22c55e;
		--background: #f8fafc;
		--text: #1e293b;
		--border: #e2e8f0;
	}

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	body {
		font-family: 'Inter', sans-serif;
		background-color: var(--background);
		color: var(--text);
		min-height: 100vh;
		margin: 0;
		padding: 0;
		display: flex;
		flex-direction: column;
	}

	.main-content {
		flex: 1;
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 80px 20px;
		min-height: calc(100vh - 300px);
		position: relative;
		z-index: 1;
	}

	.auth-container {
		width: 100%;
		max-width: 420px;
		margin: 0 auto;
		position: relative;
		background: transparent;
	}

	.auth-card {
		background: white;
		border-radius: 16px;
		box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
		padding: 3rem;
		transition: all 0.3s ease;
		position: absolute;
		width: 100%;
		opacity: 0;
		visibility: hidden;
		transform: translateY(20px);
		z-index: 2;
	}

	.auth-card.active {
		opacity: 1;
		visibility: visible;
		transform: translateY(0);
		position: relative;
	}

	.auth-header {
		text-align: center;
		margin-bottom: 2rem;
	}

	.auth-header h1 {
		font-size: 2.5rem;
		font-weight: 700;
		color: var(--text);
		margin-bottom: 0.5rem;
	}

	.auth-header p {
		color: var(--secondary);
		font-size: 1.25rem;
	}

	.form-group {
		margin-bottom: 1.5rem;
	}

	.form-group label {
		display: block;
		font-size: 1.25rem;
		font-weight: 500;
		margin-bottom: 0.5rem;
		color: var(--text);
	}

	.form-control {
		width: 100%;
		padding: 1rem 1.25rem;
		border: 1px solid var(--border);
		border-radius: 8px;
		font-size: 1.25rem;
		transition: all 0.2s ease;
	}

	.form-control:focus {
		border-color: var(--primary);
		box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
		outline: none;
	}

	.btn-primary {
		width: 100%;
		padding: 1rem 1.25rem;
		background-color: var(--primary);
		color: white;
		border: none;
		border-radius: 8px;
		font-weight: 500;
		font-size: 1.25rem;
		cursor: pointer;
		transition: all 0.2s ease;
	}

	.btn-primary:hover {
		background-color: var(--primary-dark);
	}

	.form-switch {
		text-align: center;
		margin-top: 1.5rem;
		font-size: 1.25rem;
		color: var(--secondary);
	}

	.form-switch a {
		color: var(--primary);
		text-decoration: none;
		font-weight: 500;
		cursor: pointer;
		padding: 5px 10px;
		border-radius: 4px;
		transition: all 0.2s ease;
	}

	.form-switch a:hover {
		background-color: rgba(37, 99, 235, 0.1);
	}

	.error-message {
		background-color: #fee2e2;
		border: 1px solid #fecaca;
		color: #dc2626;
		padding: 0.75rem;
		border-radius: 8px;
		margin-bottom: 1rem;
		font-size: 0.875rem;
	}

	.radio-group {
		display: flex;
		gap: 1rem;
		margin-top: 0.5rem;
	}

	.radio-option {
		display: flex;
		align-items: center;
		gap: 0.5rem;
	}

	.radio-option input[type="radio"] {
		width: 1rem;
		height: 1rem;
	}

	/* Footer Styles */
	.footer {
		background: #1e293b;
		color: white;
		padding: 40px 0;
		position: relative;
		z-index: 0;
	}

	.footer-content {
		max-width: 1200px;
		margin: 0 auto;
		padding: 0 20px;
	}

	.footer-row {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		gap: 30px;
	}

	.footer-col {
		flex: 1;
		min-width: 200px;
	}

	.footer-col h3 {
		color: white;
		margin-bottom: 20px;
		font-size: 1.2rem;
	}

	.footer-col p {
		color: #94a3b8;
		margin: 10px 0;
	}

	.footer-col a {
		color: #94a3b8;
		text-decoration: none;
		transition: color 0.3s ease;
	}

	.footer-col a:hover {
		color: white;
	}

	.social-links {
		display: flex;
		gap: 15px;
		margin-top: 15px;
	}

	.social-links a {
		color: #94a3b8;
		font-size: 1.2rem;
		transition: color 0.3s ease;
	}

	.social-links a:hover {
		color: white;
	}

	@media (max-width: 768px) {
		.main-content {
			padding: 60px 20px;
		}

		.footer-row {
			flex-direction: column;
			gap: 20px;
		}

		.footer-col {
			min-width: 100%;
		}
	}
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
			<a href="loginReg.php" class="btn btn-info navbar-btn navbar-right" data-toggle="modal" data-target="#registerModal">S'inscrire</a>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php">Accueil</a></li>
			</ul>
		</div>		
	</div>	
</nav>
<!--End Navbar menu-->

<div class="main-content">
	<div class="auth-container">
		<!-- Login Form -->
		<div class="auth-card active" id="loginForm">
			<div class="auth-header">
				<h1>Connexion</h1>
				<p>Bienvenue ! Connectez-vous pour continuer</p>
			</div>
			<form method="post">
				<div class="error-message">
					<p><?php echo $errorMsg; ?></p>
				</div>
				<div class="form-group">
					<label for="username">Nom d'utilisateur</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Entrez votre nom d'utilisateur">
				</div>
				<div class="form-group">
					<label for="password">Mot de passe</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
				</div>
				<div class="form-group">
					<label>Type d'utilisateur</label>
					<div class="radio-group">
						<div class="radio-option">
							<input type="radio" name="usertype" value="freelancer" id="freelancer">
							<label for="freelancer">Prostateur</label>
						</div>
						<div class="radio-option">
							<input type="radio" name="usertype" value="employer" id="employer">
							<label for="employer">Client</label>
						</div>
					</div>
				</div>
				<button type="submit" name="login" class="btn-primary">Se connecter</button>
			</form>
			<div class="form-switch">
				Pas encore de compte ? <a href="javascript:void(0)" onclick="showRegister()">Créer un compte</a>
			</div>
		</div>

		<!-- Register Form -->
		<div class="auth-card" id="registerForm">
			<div class="auth-header">
				<h1>Créer un compte</h1>
				<p>Rejoignez notre communauté de freelancers</p>
			</div>
			<form method="post">
				<div class="error-message">
					<p><?php echo $errorMsg2; ?></p>
				</div>
				<div class="form-group">
					<label for="name">Nom complet</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Entrez votre nom">
				</div>
				<div class="form-group">
					<label for="reg-username">Nom d'utilisateur</label>
					<input type="text" class="form-control" id="reg-username" name="username" value="<?php echo $username; ?>" placeholder="Choisissez un nom d'utilisateur">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Entrez votre email">
				</div>
				<div class="form-group">
					<label for="reg-password">Mot de passe</label>
					<input type="password" class="form-control" id="reg-password" name="password" placeholder="Créez un mot de passe">
				</div>
				<div class="form-group">
					<label for="repassword">Confirmer le mot de passe</label>
					<input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirmez votre mot de passe">
				</div>
				<div class="form-group">
					<label for="contactNo">Numéro de téléphone</label>
					<input type="text" class="form-control" id="contactNo" name="contactNo" value="<?php echo $contactNo; ?>" placeholder="Entrez votre numéro de téléphone">
				</div>
				<div class="form-group">
					<label for="gender">Genre</label>
					<div class="radio-group">
						<div class="radio-option">
							<input type="radio" name="gender" value="male" id="male">
							<label for="male">Homme</label>
						</div>
						<div class="radio-option">
							<input type="radio" name="gender" value="female" id="female">
							<label for="female">Femme</label>
						</div>
						<div class="radio-option">
							<input type="radio" name="gender" value="other" id="other">
							<label for="other">Autre</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="birthdate">Date de naissance</label>
					<input type="text" class="form-control" id="birthdate" name="birthdate" value="<?php echo $birthdate; ?>" placeholder="AAAA-MM-JJ">
				</div>
				<div class="form-group">
					<label for="address">Adresse</label>
					<input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" placeholder="Entrez votre adresse">
				</div>
				<div class="form-group">
					<label for="prof_title">Titre professionnel</label>
					<input type="text" class="form-control" id="prof_title" name="prof_title" value="<?php echo $prof_title; ?>" placeholder="Entrez votre titre professionnel">
				</div>
				<div class="form-group">
					<label for="profile_sum">Résumé du profil</label>
					<textarea class="form-control" id="profile_sum" name="profile_sum" placeholder="Décrivez-vous brièvement"><?php echo $profile_sum; ?></textarea>
				</div>
				<div class="form-group">
					<label for="education">Éducation</label>
					<input type="text" class="form-control" id="education" name="education" value="<?php echo $education; ?>" placeholder="Votre parcours éducatif">
				</div>
				<div class="form-group">
					<label for="experience">Expérience</label>
					<input type="text" class="form-control" id="experience" name="experience" value="<?php echo $experience; ?>" placeholder="Votre expérience professionnelle">
				</div>
				<div class="form-group">
					<label for="skills">Compétences</label>
					<input type="text" class="form-control" id="skills" name="skills" value="<?php echo $skills; ?>" placeholder="Vos compétences principales">
				</div>
				<div class="form-group">
					<label>Type d'utilisateur</label>
					<div class="radio-group">
						<div class="radio-option">
							<input type="radio" name="usertype" value="freelancer" id="reg-freelancer">
							<label for="reg-freelancer">Prostateur</label>
						</div>
						<div class="radio-option">
							<input type="radio" name="usertype" value="employer" id="reg-employer">
							<label for="reg-employer">Client</label>
						</div>
					</div>
				</div>
				<button type="submit" name="register" class="btn-primary">Créer un compte</button>
			</form>
			<div class="form-switch">
				Déjà un compte ? <a href="javascript:void(0)" onclick="showLogin()">Se connecter</a>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrapValidator.js"></script>

<script>
function showRegister() {
	document.getElementById('loginForm').classList.remove('active');
	document.getElementById('registerForm').classList.add('active');
}

function showLogin() {
	document.getElementById('registerForm').classList.remove('active');
	document.getElementById('loginForm').classList.add('active');
}
</script>

</body>
</html>