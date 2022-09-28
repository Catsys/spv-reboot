#!/bin/php
<?php

$watches = explode(',', $argv[1] ?? 'all');

if (in_array('all', $watches)) {
    $watches = [];
    exec('supervisorctl status all | grep FATAL', $output);
    foreach ($output ?? [] as $out) {
        if ($out = explode(' ', $out)) {
            $watches[] = $out[0];
        }
    }

}

foreach ($watches as $procName) {
    exec('supervisorctl status '.$procName.' | grep FATAL | wc -l', $output);
    if (!empty($output[0])) {
        echo "rebooting {$procName}\n";
        $res = system("supervisorctl start {$procName}");
    }
    unset($output);
}

