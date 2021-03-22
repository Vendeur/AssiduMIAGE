<?php

class bd
{
	protected function dbConnexion()
    {
    	$host = "localhost" ;
    	$dbname = "centralisationAbsence";
    	$user = "root";
    	$pwd = "";
        $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $pwd);

        return $db;
    }
}