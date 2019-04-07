<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blog pour un écrivain">
    <meta name="author" content="Franck Garçon">
    <title><?= App::getInstance()->title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-reboot.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/starter-template.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <!--navbar-->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <a class="navbar-brand text-white h4" href="index" style="align-content: center">Acceuil</a>
        <a class="text-muted" href="?p=users.login">Administration du Site.</a>
    </nav>
    <!--body-->
    <div class="container-fluid" style="padding-top: 6em; padding-bottom: 4em">
        <div class="jumbotron" style="padding-top: 2em">
            <?= $content ?>
        </div>
    </div>
    <!--footer-->
    <div class="p-1 bg-dark text-white fixed-bottom">
        <footer class="container" style="padding-top: 1em">
            <div class="panel panel-body" style="align-content: center">
                <p>Copyright 2019</p>
            </div>
        </footer>
    </div>
</div>

<!-- Optional JavaScript -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>
</html>
