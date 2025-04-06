<?php declare(strict_types=1);
/**
 * 
 */



require_once(__DIR__ . '/vendor/autoload.php');

// require_once(dirname(__DIR__) . '/verbatim/Verbatim.php');

use Oeuvres\Kit\{Filesys, Log, Xt};


Nuclio::init();
class Nuclio
{
    /** configuration parameters */
    static public $config = [
    ];

    /**
     * Init static things
     */
    static public function init()
    {
        $config_file = __DIR__ . '/config.php';
        if (file_exists($config_file)) {
            $conf = include($config_file);
            self::$config = array_merge(self::$config, $conf);
        }
    }

}
