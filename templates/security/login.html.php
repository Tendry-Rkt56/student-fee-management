<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/assets/styles/login.css">
    <?php require_once 'components/head.html' ?>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>WELCOME AGAIN</h1>
            <p>Lorem ipsum is simply dummy text of the printing and typesetting industry.</p>
        </div>
        <div class="right-panel">
            <div class="login-form">
                <h2>Connexion</h2>
               <?php if (isset($_SESSION['danger'])): ?>
                    <div style="height:50px;" class="container alert alert-danger"><?=$_SESSION['danger']?></div>
                    <?php unset($_SESSION['danger']) ?>
               <?php endif?>
                <form action="" autocomplete="off" method="POST">
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="email" value="<?=isset($_SESSION['email']) ? $_SESSION['email'] : ''?>" id="username" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="passwords" required>
                    </div>
                    <button type="submit">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>