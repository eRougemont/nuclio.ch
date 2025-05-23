<?php declare(strict_types=1);
/** Require master class  */
require_once(__DIR__ . '/Nuclio.php');

use Oeuvres\Kit\{Route, I18n, Http};

// Get a language to route correctly, store it for other pages
$lang = Http::par('lang', 'fr', '/de|en|fr|it/', 'lang');
// send the attribute to other consumers
Route::setAtt("lang", $lang);
// Register specific messages
// I18n::load(__DIR__ . '/' . $lang . '.tsv');
// register the template in which include content
Route::template(__DIR__ . '/template.php');


// welcome page
Route::get('/', __DIR__ . '/php/landing.php');
Route::get('/sources', __DIR__ . "/pages/nuclio_sources.html");


// Cache source transform
$html_cache = __DIR__ . '/html_cache/';
Route::get(
    '/(\d\d\d\d-\d\d-\d\d.*)',
    __DIR__ . '/php/docx.php',
    [
        "docx_file" => __DIR__ . "/src/nuclio$1.docx",
        "html_file" => "$html_cache$1.html"
    ]
);
// try if a local html page is available
Route::get('/(.*)', "$html_cache$1.html");


// No Route has worked
echo "Page introuvable, 404.";
