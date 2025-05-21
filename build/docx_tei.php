<?php declare(strict_types=1);

include_once(dirname(__DIR__) . '/vendor/autoload.php');

use Psr\Log\LogLevel;
use Oeuvres\Kit\{Filesys, Log, Xt};
use Oeuvres\Kit\Logger\{LoggerCli};
use Oeuvres\Teinte\Format\{Docx, Tei};
use Oeuvres\Xsl\{Xpack};

class Nuclio
{
    /** the docx transformer */
    static $docx;
    public static function cli()
    {
        global $argv;
        Log::setLogger(new LoggerCli(LogLevel::DEBUG));
        if (!isset($argv[1])) {
            die("usage: php docx_tei.php examples/*.docx\n");
        }
        // drop $argv[0], $argv[1…] should be file
        array_shift($argv);
        self::$docx = new Docx();
        // local xml template ?
        // self::$docx->user_template(__DIR__ . '/nuclio_tmpl.xml');
        foreach ($argv as $glob) {
            foreach (glob($glob) as $docx_file) {
                $tei_dir = dirname($docx_file) . "/";
                $src_name = pathinfo($docx_file, PATHINFO_FILENAME);
                $tei_file = $tei_dir . $src_name . ".xml";
                if (file_exists($tei_file)) {
                    Log::warning("File already exists: " . $tei_file);
                    // continue;
                }
                self::transform($docx_file, $tei_file);
            }
        }
                
    }

    static function transform($docx_file, $tei_file, $pars=[])
    {
        Log::info($docx_file . " > " . $tei_file);
        $tei_name = pathinfo($tei_file, PATHINFO_FILENAME);
        $id = substr($tei_name, 0, strpos($tei_name, '_'));
        self::$docx->open($docx_file);
        self::$docx->pkg(); // open the docx
        self::$docx->teilike(); // apply a first tei layer
        // for debug
        // file_put_contents($tei_file .'_teilike.xml', self::$docx->teiXML());

        self::$docx->pcre(); // apply regex, custom re may break XML
        // for debug write this step
        // file_put_contents($tei_file .'_pcre.xml', self::$docx->teiXML());
        self::$docx->tmpl();

        // project images
        $name = pathinfo($tei_file, PATHINFO_FILENAME);
        list($name) = explode('_', $name);
        $href_prefix = "$name/{$name}_ill";
        $file_prefix = dirname($tei_file) . "/$href_prefix";
        // $tei_file is supposed to be absolute here
        self::$docx->teiDOM()->documentURI = "file:///" . $tei_file;
        Tei::imagesCopy(self::$docx->teiDOM(), $file_prefix, $href_prefix, true);
        file_put_contents($tei_file, self::$docx->teiXML());
    }

}
Nuclio::cli();