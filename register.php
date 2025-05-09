<!DOCTYPE html>
<html>
<head>
    <title>Register - Freelance Marketplace</title>
    <!-- Same head content as login.php -->
    <!-- ... (copy the same head section from login.php) ... -->
</head>
<body>
    <!-- Same navbar as login.php -->
    <!-- ... (copy the same navbar section from login.php) ... -->

    <div class="container" style="margin-top: 100px;">
        <div class="wonder-card">
            <h2 class="wonder-title">S'inscrire</h2>
            <form id="registrationForm" method="post" class="form-horizontal">
                <div class="error-message">
                    <p><?php echo $errorMsg2; ?></p>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-user"></i> Nom</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" placeholder="Entrez votre nom" />
                </div>
                <div class="form-group">
                    <label><i class="fas fa-user"></i> Nom d'utilisateur</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>" placeholder="Entrez votre nom d'utilisateur" />
                </div>
                <div class="form-group">
                    <label><i class="fas fa-envelope"></i> Adresse e-mail</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Entrez votre email" />
                </div>
                <div class="form-group">
                    <label><i class="fas fa-lock"></i> Mot de passe</label>
                    <input type="password" class="form-control" name="password" placeholder="Entrez votre mot de passe" />
                </div>
                <div class="form-group">
                    <label><i class="fas fa-lock"></i> Confirmer le mot de passe</label>
                    <input type="password" class="form-control" name="repassword" placeholder="Confirmez votre mot de passe" />
                </div>
                <!-- Add other registration fields as needed -->
                <div class="form-group">
                    <button type="submit" name="register" class="btn btn-info">
                        <i class="fas fa-user-plus"></i> S'inscrire
                    </button>
                </div>
            </form>
            <div class="toggle-link">
                Déjà un compte ? <a href="login.php">Se connecter</a>
            </div>
        </div>
    </div>

    <!-- Same scripts as login.php -->
    <!-- ... (copy the same script section from login.php) ... -->
</body>
</html> 