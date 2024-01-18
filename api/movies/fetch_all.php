<?php
require_once('../../App/DBClient.php');
use App\DBClient;

$db_client = new DBClient();

$queryResults = $db_client->cypherQuery("Match (movie:Movie) RETURN movie");

$movies = array();

foreach ($queryResults as $key => $data) {
    $node = $data->get('movie');
    // echo '<li>' . $node->getProperty('title') . '</li>';
    
    $movie = new stdClass();
    $movie->id = $node->getId();
    $movie->el_id = $node->getElementId();
    $movie->title = $node->getProperty('title');
    $movie->released = $node->getProperty('released');

    // Add the movie to movies array
    array_push($movies, $movie);
}

// Define headers
header("Content-Type: application/json");
header("charset=UTF-8");
echo json_encode($movies);