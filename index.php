<?php
session_start();
//setting internal encoding for string functions
mb_internal_encoding("UTF-8");
require_once("config/autoload.php");

// Creating the router and processing parameters from the user's URL
$router = new RouterController();
$router->process(array($_SERVER['REQUEST_URI']));
?>


<html>
    <header></header>
    <body>

        <section>
            <nav>
                <div class="navbar">Some content</div>
            </nav>
        </section>

    </body>
</html>