<?php

use Laudis\Neo4j\Authentication\Authenticate;
use Laudis\Neo4j\ClientBuilder;

    require_once(__DIR__ . "/../vendor/autoload.php");

    $url = 'neo4j+s://bc3f8171.databases.neo4j.io';
    $auth = Authenticate::basic('neo4j', 's5nyk6s-IgVirIpF00K-Sq1z9AbwCepv94g0spCw1u4');

    $client = ClientBuilder::create()
                ->withDriver('noe4j', $url, $auth)->build();

    // $movies = $client->run("Match (movie:Movie) RETURN movie");

    // foreach ($movies as $key => $data) {
    //     $node = $data->get('movie');
    //     echo '<li>' . $node->getProperty('title') . '</li>';
    // }