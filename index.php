<?php

require_once('./controllers/view.php');
$view = new View($_SERVER['REQUEST_URI']);
$page = new View(true);

$view->renderView(true);
