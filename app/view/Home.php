<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation en ligne</title>

</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href='Dashbord'><b>Accueil</b></a></li>
            </ul>
        </nav>
    </header>
    <main >
    <h2>Inscription</h2>
    <form action="app/controllers/signup.php" method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <button type="submit">S'inscrire</button>
    </form>

    <h2>Connexion</h2>
    <form action="app/controllers/login.php" method="post">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br>
        <button type="submit">Se connecter</button>
    </form>
    </main>
    <footer>
        <p>&copy; 2024 développé par KD.</p>
    </footer>
</body>
</html>