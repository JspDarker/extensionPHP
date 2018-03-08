<?php
/**********************************************************
 *  Attempt Connection Database
**********************************************************/

$host = 'localhost';
$user = 'root';
$pass = 'zxcv';
$db_name = 'music';
$connect_db = new mysqli($host,$user,$pass,$db_name);
if($connect_db ===false){
    die("ERROR: could not connect ". mysqli_connect_error());
}

// attempt query execution
$sql_select = "SELECT `artist_id`, `artist_name` FROM `artists`";
$res = $connect_db->query($sql_select);

// test ERROR Query Execute
if($res === false){
    echo "Error " .$connect_db->error;
}

if($res->num_rows > 0){
    while($row = $res->fetch_object()){
        echo $row->artist_id .": ".$row->artist_name."</br>";
    }
    $res->close();
} else {
   echo "No records matching your query were found";
}

$connect_db->close();
