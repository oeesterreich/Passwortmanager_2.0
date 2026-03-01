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
    <div class="row">
        <h2>Passwortmanager 2.0</h2>
    </div>
    <div class="row">
        <p class="form-inline">
            <a href="index.php?r=credentials/create" class="btn btn-success">Erstellen <span class="glyphicon glyphicon-plus"></span></a>

            <input id="filter" type="text" class="form-control" name="filter" maxLength="32" placeholder="Suche">

            <button id="btnSearch" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
            <button id="btnClear" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span></button>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Domäne</th>
                <th>CMS-Benutzername</th>
                <th>CMS-Passwort</th>
                <th></th>
            </tr>
            </thead>
            <tbody id="credentials">
            <?php

            require_once 'models/Credentials.php';

            // load and show all credentials from database
            $credentials = Credentials::getAll();

            foreach ($credentials as $c) {
                echo '<tr>';
                echo '<td>' . $c->getName() . '</td>';
                echo '<td>' . $c->getDomain() . '</td>';
                echo '<td>' . $c->getCmsUsername() . '</td>';
                echo '<td>' . $c->getCmsPassword() . '</td>';
                echo '<td>';
                echo '<a class="btn btn-info" href="view.php?id=' . $c->getId() . '"><span class="glyphicon glyphicon-eye-open"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-primary" href="update.php?id=' . $c->getId() . '"><span class="glyphicon glyphicon-pencil"></span></a>';
                echo '&nbsp;';
                echo '<a class="btn btn-danger" href="delete.php?id=' . $c->getId() . '"><span class="glyphicon glyphicon-remove"></span></a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div> <!-- /container -->
</body>
</html>
