<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Passwortmanager</title>

    <link rel="shortcut icon" href="css/favicon.ico" type="image/x-icon">
    <link rel="icon" href="css/favicon.ico" type="image/x-icon">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Zugangsdaten löschen</h2>

    <form class="form-horizontal" action="index.php?r=credentials/delete&id=<?= $model->getId() ?>" method="post">
        <input type="hidden" name="id" value="<?= $model->getId() ?>"/>
        <p class="alert alert-error">Wollen Sie die Zugangsdaten von <?= $model->getName()  ?> / <?= $model->getDomain() ?> wirklich löschen?</p>
        <div class="form-actions">
            <button type="submit" class="btn btn-danger">Löschen</button>
            <a class="btn btn-default" href="index.php?r=credentials/index">Abbruch</a>
        </div>
    </form>

</div>