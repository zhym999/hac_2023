
<!DOCTYPE html>
<!-- saved from url=(0051)https://getbootstrap.com/docs/5.0/examples/sign-in/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Authentification</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
          
     <div class="card-body"> 
<main class="form-signin">

<form method="post" action="test.php">
    <img class="mb-4" src="css/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Authentification</h1>
    <label for="inputEmail" class="visually-hidden">Adresse Email</label>
    <input type="email" name="email" placeholder="Email address" class="form-control"><br>
    <label for="inputPassword" class="visually-hidden">Mot de passe</label>
    <input type="password" name="pass" placeholder="Password" class="form-control"><br>
    
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="remember" value="remember"> Se rappeler de moi
        </label>
    </div>
   
    <a href="inscrire.php">S'inscrire</a><br>
    <input type="hidden" name="action" value="login">
    <input type="submit" value="login" class="btn btn-warning">
  
    <p class="mt-5 mb-3 text-muted">© 2023–2024</p>
</form>

  
</main>

</div>

    
  

</body></html>