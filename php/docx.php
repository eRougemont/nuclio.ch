<?php declare(strict_types=1);
require_once(dirname(__DIR__) . '/vendor/autoload.php');

use Psr\Log\LogLevel;
use Oeuvres\Kit\{Http, Log, LoggerWeb, Route, Xt};
use Oeuvres\Teinte\Format\{Docx};
use Oeuvres\Xsl\{Xpack};
/**
 * This filter will always return false, to let the Route continue
 * Requested html page will be updated if needed.
 */

$docx_file = Http::par('docx_file');
if (!file_exists($docx_file)) {
    return false;
}
$html_file = Http::par('html_file', null);
if ($html_file === null) {
    $html_file = dirname(__DIR__) . "/html_cache/" . trim(Route::url_request(), '/\\') . ".html";
}
$force = Http::par('force', null);



// cache OK
if (
    !$force
    && file_exists($html_file)
    && filemtime($html_file) > filemtime($docx_file)
) return false;



$docx = new Docx();
$docx->open($docx_file);
/* // for debug
$docx->pkg();
$docx->teilike();
$docx->pcre();
$docx->tmpl();
echo $docx->teiXML();
*/
$docx->teiMake();
// file_put_contents($html_file . ".xml", $docx->teiXML()); 
$xsl_file = Xpack::dir() . 'tei_html_article.xsl';
Xt::transformToUri(
    $xsl_file,
    $docx->teiDOM(),
    $html_file
);
return false;