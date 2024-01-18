<?php 
 namespace App;

 class DBClient
 {
    protected $client;

    function __construct()
    {
        include 'connect.php';
        $this->client = $client;
    }

    public function cypherQuery(string $query) : object | array | null
    {
        $result = $this->client->run($query);

        return $result;
    }
 }
 