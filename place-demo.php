<?php
$songs = array(
    array("Smith Tom", 3,4),
    array("Jone Hey", 4,3)
);
$host = 'localhost';
$user = 'root';
$pass = 'zxcv';
$db = 'music';
$conn_db = new mysqli($host,$user,$pass,$db);
if(!$conn_db){
    die("ERROR ". mysqli_connect_error());
}
$sql = "INSERT INTO `songs` (`song_title`,`fk_song_artist`,`fk_song_rating`)
VALUES (?,?,?)";

if($stmt = $conn_db->prepare($sql)){
    foreach($songs as $song)
    {
        $stmt->bind_param("sii",$song[0],$song[1],$song[2]);
        if($stmt->execute()){
            echo "Execute OKE : new rows list songs " .$conn_db->insert_id ." added </br>";
        }
    }
} else {
    echo "PrepareERROR ". $conn_db->error;
}