<?php declare(strict_types=1);

require_once(__DIR__ . "/Nuclio.php");

use Oeuvres\Kit\{Http, I18n, Route};


$page = ltrim(Route::url_request(), '/');
$body_class = $page;
$lang = Route::getAtt("lang");

?><!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title><?= Route::title('nuclio.ch') ?></title>
        <link rel="stylesheet" href="<?= Route::home_href() ?>theme/nuclio.css"  type="text/css"/>
        <script src="<?= Route::home_href() ?>theme/nuclio-fonts.js"></script>
        <link rel="icon" href="<?= Route::home_href() ?>theme/atom-favicon.svg"/>
    </head>
    <body>
<header id="header"  class="nav-down">
    <div class="banner">
        <a class="brand" href="<?= Route::home_href() ?>.">
        <svg><use href="<?= Route::home_href() ?>theme/icons.svg#atom" /></svg>
            <div>
                <div class="name">nuclio.ch</div>
                <div class="moto">Nucléaire, histoires suisses</div>
            </div>
        </a>
        <nav id="tabs" class="tabs">
            <a href="<?= Route::home_href() ?>sources" class="tab"><?= I18n::_('sources') ?></a>
            <a href="#" class="tab"><?= I18n::_('analyses') ?></a>
            <a href="#" class="tab"><?= I18n::_('chronologie') ?></a>
            <a href="#" class="tab"><?= I18n::_('bibliographie') ?></a>
        </nav>
    </div>
</header>
<div id="all">
    <div id="content">
        <div class="container">
            <?php Route::main(); ?>
        </div>
    </div>
    <footer id="footer">
        <nav id="logos">
        </nav>
    </footer>
</div>
        <script src="<?= Route::home_href() ?>theme/nuclio.js"></script>
    </body>
</html>
