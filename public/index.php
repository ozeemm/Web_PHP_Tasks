<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futurama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"  rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="/"><i class="fa-solid fa-rocket"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/">Главная</a>
                <a class="nav-link" href="/Fry">Фрай</a>
                <a class="nav-link" href="/Bender">Бендер</a>
            </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php 
            $url = $_SERVER["REQUEST_URI"];

            if($url == "/")
                require "../views/main.php";
            else if(preg_match("#^/Fry#", $url))
                require "../views/fry.php";
            else if(preg_match("#^/Bender#", $url))
                require "../views/bender.php";
        ?>
    </div>
</body>
</html>