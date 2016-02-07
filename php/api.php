<?php

        // set up the connection variables
        $db_name  = 'april';
        $hostname = '127.0.0.1';
        $username = 'root';
        $password = 'hae789';

        // connect to the database
        $dbh = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);

        // a query get all the records from the users table
        $sql = 'SELECT c_name, cond_1, cond_2 FROM item';

        // use prepared statements, even if not strictly required is good practice
        $stmt = $dbh->prepare( $sql );

        // execute the query
        $stmt->execute();

        // fetch the results into an array
        $result = $stmt->fetchAll( PDO::FETCH_ASSOC );

        // convert to json
        $json = json_encode( $result );
        // echo the json string
        echo $json;
?>