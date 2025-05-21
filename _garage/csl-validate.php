<?php

$nuclio_fns = json_decode( file_get_contents(__DIR__ . "/nuclio_zot.json"), true);
foreach($nuclio_fns as $record) {
    if (isset($record['type'])) continue;
    echo $record['id'] . "\n";
}