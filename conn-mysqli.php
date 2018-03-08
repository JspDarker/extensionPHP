<?php
// attempt database connection
/*
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
*/

/**
 * -> Attempt Database Connection
 */
/*
$conn_mysqli = new mysqli("localhost",'root','zxcv','raw');
if($conn_mysqli == false){
    die ("ERROR: ". $conn_mysqli->connect_error);
} else {
    $sql_select = "SELECT * FROM `products`";
    if($result = $conn_mysqli->query($sql_select)){
        if($result->num_rows > 0){

            while($row = $result->fetch_array()){
                echo $row[0] .": ".$row[1]."</br>"; // output
            }
            $result->close();// close query
        } else {
            echo "No record matching your query were found";
        }
    } else {
        echo "ERROR could execute $sql_select ". $conn_mysqli->error;
    }
}
$conn_mysqli->close();// close database -> giai phong bo nho
*/
/**
 * -> Attempt Database Connection
 */
$user = 'root';
$host = 'localhost';
$pass = 'zxcv';
$db_name = 'raw';
$connect_db = new mysqli($host,$user,$pass,$db_name);

if($connect_db === false){
    die( "ERROR: " .mysqli_connect_error());
}

// select table
$sql = "SELECT * FROM `products`";
$result = $connect_db->query($sql);

// test execute Query before print
if($result == false){
    echo "Error : ". $connect_db->error;
}

// execute Query
if($result->num_rows >0){
    while($row = $result->fetch_array()){
        echo $row[0].": ".$row[1] ."</br>";
    }
    $result->close(); // Close query select
}

$connect_db->close(); // Close Connect database