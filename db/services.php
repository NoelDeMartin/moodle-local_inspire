<?php

defined('MOODLE_INTERNAL') || die();

$functions = [

    'local_inspire_get_quote' => [
        'classname'     => 'local_inspire\external',
        'methodname'    => 'get_quote',
        'classpath'     => 'local/inspire/classes/external.php',
        'description'   => 'Get inspirational quote',
        'type'          => 'read',
        'ajax'          => true,
        'loginrequired' => false,
    ],

];

$services = [

    'Inspire' => [
        'shortname' => 'inspire',
        'functions' => [
            'local_inspire_get_quote',
        ],
        'enabled' => 1,
        'restrictedusers' => 0,
    ],

];
