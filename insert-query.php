<?php
/**********************************************************
 *  Attempt Connection Database
 *
 * if UPDATE: conn_db->affected_rows // test output
 * if INSERT: conn_db->insert_id // test output
 *
 *
 **********************************************************/

$host = 'localhost';
$user = 'root';
$pass = 'zxcv';
$db_name = 'music';
$conn_db = new mysqli($host,$user,$pass,$db_name);
if($conn_db === false){
    die("ERROR ". mysqli_connect_error());
}

// INSERT query
$sql =  " UPDATE `artists` SET `artist_name` = 'Minh Thu', `artist_country`= 'UK' 
          WHERE `artist_id` = 5
        ";
// $conn_db->query($sql);

/*
if($conn_db->query($sql) === true){
    echo "OKE ". $conn_db->affected_rows . " added";
} else {
    echo "ERROR could not execute $sql ". $conn_db->error;
}
*/

$conn_db->close();