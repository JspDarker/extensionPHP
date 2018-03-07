<?php
// attempt database connection
$mysqli = new mysqli('localhost','root','zxcv','raw');
    if( $mysqli == false){
        die("ERROR: mysqli connect failed ". mysqli_connect_error());
    } // --> OKE nhe!

    // attempt query execute
    $sql = "SELECT * FROM `users`";
    $result = $mysqli->query($sql);
    if($result == false){
        die("ERROR: could not execute $sql ." . $mysqli->error);
    }
    if($result->num_rows > 0){
        while( $row = $result->fetch_array()){
            echo $row[0] ." : " .$row[1] ."</br>";
        }
        $result->close();
    } else {
        echo "No records matching your query were found";
    }
$mysqli->close();

