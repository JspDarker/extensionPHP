<?php

// define values to be inserted

$songs = array(

    array('Shine', 3, 4),
    array('Hold On', 4, 3)
);

/*
// attempt connection database
$conn = new mysqli('localhost','root','zxcv','music');
if($conn->connect_error){
    die("ERROR ".mysqli_connect_error());
}

// attempt query execute
$sql_insert = "INSERT INTO `songs` (`song_titles`, `fk_song_artist`,`fk_song_rating`)
VALUES (?,?,?)
";
if($stmt = $conn->prepare($sql_insert)){

    foreach($songs as $song)
    {
        $stmt->bind_param("sii",$song[0],$song[1], $song[2]);
        if ($stmt->execute()){
            echo "New song with id: ". $stmt->insert_id." added </br>";
        } else {

        }
    }

} else {
    echo "ERROR: $sql_insert " .$conn->error;
}
$conn->close();
*/
$host = 'localhost';
$user = 'root';
$pass = 'zxcv';
$db = 'music';
$conn_db = new mysqli($host,$user,$pass,$db);
if($conn_db->connect_error){
    die("ERROR: ".mysqli_connect_error());
}
// *begin <----
   $sql = "INSERT INTO `songs` (`song_title`,`fk_song_artist`,`fk_song_rating`)
    VALUES (?,?,?)";
    if($stmt = $conn_db->prepare($sql)){
        foreach($songs as $song)
        {
            $stmt->bind_param("sii",$song[0],$song[1],$song[2]);
            if($stmt->execute()){
                echo "New song with id ".$conn_db->insert_id."</br>";
            } else {
                echo "executeERROR ".$conn_db->error;
            }
        }
    } else {
        echo "PrepareERROR ".$conn_db->error;
    }

// *the-end <----


//$sql = "DELETE FROM `songs` WHERE `song_id` > 6";
//$conn_db->query($sql);

/*
$sql = "
    INSERT INTO `songs` (`song_title`,`fk_song_artist`,`fk_song_rating`)
    VALUES (?,?,?)";
*/

/*
//$stmt = $conn_db->prepare($sql);
if($stmt = $conn_db->prepare($sql)){

    foreach($songs as $song)
    {
        $stmt->bind_param("sii",$song[0],$song[1],$song[2]);
        if($stmt->execute()){

            echo "New song with ID " .$conn_db->insert_id." added </br>";

        } else {
            echo "ERROR could not execute query $sql ".$conn_db->error;
        }
    }

} else {
    echo "ERROR: could not prepare $sql. ". $conn_db->error;
}
*/
$conn_db->close();