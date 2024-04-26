<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'bd_galeria';
    try {

    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	exit('Error');
    }
}
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Mi Galeria</title>
            <link href="Estilos.css" rel="stylesheet" type="text/css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>Mi Galeria</h1>
                <a href="Log_out.php"><i class="fas fa-image"></i>Cerrar Sesión</a>
            </div>
        </nav>
    EOT;
    }
function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }
    ?>