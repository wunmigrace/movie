<?php
require_once('../../App/DBClient.php');
use App\DBClient;

$movie = new stdClass();

if(isset($_POST['el_id'])){
    $db_client = new DBClient();

    $element_id = $_POST['el_id'];

    $queryResults = $db_client->cypherQuery("Match (movie:Movie) WHERE elementId(movie) = '$element_id' RETURN movie");


    foreach ($queryResults as $data) {
        $node = $data->get('movie');

        $movie->id = $node->getId();
        $movie->el_id = $node->getElementId();
        $movie->title = $node->getProperty('title');
        $movie->released = $node->getProperty('released');

        break;
    }
}


// Define headers
header("Content-Type: application/json");
header("charset=UTF-8");
echo json_encode($movie);