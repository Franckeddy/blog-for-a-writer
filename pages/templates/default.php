<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blog pour un écrivain">
    <meta name="author" content="Franck Garçon">
    <title><?= App::getInstance()->title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="public/css/bootstrap-reboot.min.csss" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">

    <!--navbar-->
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                <a class="text-white h4" href="index.php">Acceuil</a>
                <span class="text-muted">Bienvenue sur le Blog.</span>
            </div>
            <div class="bg-dark p-4">
                <a class="text-white h4" href="#">Billets</a>
                <span class="text-muted">Liste des Billets.</span>
            </div>
            <div class="bg-dark p-4">
                <a class="text-white h4" href="#">Catégories</a>
                <span class="text-muted">Liste des Catégories.</span>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="container-fluid" style="padding-top: 1em">
            <div class="jumbotron" style="padding-top: 2em">
                <?= $content; ?>
            </div>
        </div>

        <!--footer-->
        <div class="p-3 mb-2 bg-dark text-white">
            <footer class="container" style="padding-top: 1em">
                <div class="panel panel-body">
                    <p>Tous droits réservés par moi...</p>
                </div>
            </footer>
        </div>
    </div>

<!-- Optional JavaScript -->
<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
