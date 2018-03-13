<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Improve Display</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../img-wrapp/icon1.png" type="image/x-icon"> <!-- new add icon in title-->
    <style type="text/css">
        body {font-family: Arial, Helvetica, sans-serif;}
        .result{
            color: blueviolet;
        }
        .error{
            color: red;
            font-size: 10px;
        }
    </style>
</head>
<body>
<?php
$nameError = $error = $desError = $des = $name ="";
    if(isset($_POST["submit"])){
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $inputError = false;
            // message name
            if(empty($_POST['name'])){
                $nameError = "name is required";
                $inputError = true;
            } elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])){
                $nameError = "Only characters and white space allowed";
                $inputError = true;
            }else{
                $name = $_POST['name'];
            }
            // message designation
            if($inputError != true && empty($_POST['des'])){
                $desError = "designation is required";
                $inputError = true;
            } elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST['des'])){
                $desError = "Only characters and white space allowed";
                $inputError = true;
            }else{
                $des = $_POST['des'];
            }

            // connection database
            if($inputError != true){
                $mysqli = new mysqli('localhost','root','zxcv','employeesdb');
                $name = $mysqli->escape_string($_POST['name']);
                $des = $mysqli->escape_string($_POST['des']);
                // query insert table employees
                $sql_insert = "INSERT INTO `employees` (`name`,`designation`)
                VALUES ('$name','$des')";

                // test equal query
                if($mysqli->query($sql_insert) === true){
                    echo "<div class='result'>";
                    echo "Query Insert to accept with new ID ".$mysqli->insert_id;
                    echo "</div>";
                } else {
                    echo "ErrorInsertQuery ". $mysqli->error;
                }
                $mysqli->close();
            }
        }

    }
?>
<div class="container">
    <h3>Add Employee</h3>
    <form action="#" method="post">
        <label>Name Employee</label>
        <label>
            <input name="name" value="<?php echo $name;?>" type="text"/>
        </label>
        <span class="error"><?php echo $nameError;?></span><br /><br />

        <label>Designation</label>
        <label>
            <input name="des" value="<?php echo $des;?>" type="text"/>
        </label>
        <span class="error"><?php echo $desError;?></span><br />
        <button name="submit" type="submit">Submit</button>
    </form>
</div>
</body>
</html>

<?php
/*

$conn_db = new mysqli('localhost','root','zxcv','employeesdb');
$employees = array(
        array('Smith',"COE"),
        array('White',"Dark")
);
//=======================================================
$sql_delete = "DELETE FROM `employees` WHERE `id` > 3";
if($conn_db->query($sql_delete)){
    echo "ban da xoa duoc";
} else {
    echo "ERROR--query $sql_delete ". $conn_db->error;
}
//==================================================================

$sql_insert = "INSERT INTO `employees` (`name`,`designation`)
VALUES (?,?)";

if($stmt = $conn_db->prepare($sql_insert)){
    foreach($employees as $employee){
        $stmt->bind_param("ss",$employee[0],$employee[1]);
        if($stmt->execute()){
            echo "oke";
        } else {
            echo "ERROR-Execute() ".$conn_db->error;
        }
    }
}
*/// test kien thuc hom truoc

?>