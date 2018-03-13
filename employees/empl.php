<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adding Employees --> DB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../img-wrapp/icon1.png" type="image/x-icon"> <!-- new add icon in title-->
    <style type="text/css">
        body {font-family: Arial, Helvetica, sans-serif;}
        #message{
            color: #d3534c;
        }
        .err {
            color: red;
            font-size: 10px;
            font-family: sans-serif;
            display: block;
            margin-bottom: 20px;
        }
        input[type=text]{
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            width: 30%;
            margin: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <h3>Contact Form Server</h3>
    <?php
    $name = $design ="";
        if(isset($_POST["submit"]))
        {
            $conn_db = new mysqli('localhost','root','zxcv','employeesdb');
            echo '<div id="message">';// open message block
                $inputError = false; // retrieve and check input values

                if(empty($_POST["e_name"])){
                    echo "name is required!";
                    $inputError = true;
                } else {
                    $name = $conn_db->escape_string($_POST['e_name']);
                }

                if($inputError != true && empty($_POST['design'])){
                    echo "design is required!";
                    $inputError = true;
                } else {
                    $design = $conn_db->escape_string($_POST["design"]);
                }

                // Add values to database using INSERT query
                if($inputError != true){
                    $sql_insert = "INSERT INTO `employees` (`name`, `designation`)
                    VALUES ('$name', '$design')";
                    if($conn_db->query($sql_insert) === true){
                        echo "Insert OKE ". $conn_db->insert_id. "added </br>";
                        $name = $design ="";
                    } else {
                        echo "ErrorInsert ". $conn_db->error;
                    }
                }
            echo '</div>';// end message block
            $conn_db->close();
        }

    ?>
    <form action="" method="post">
        <label for="e_name">Name</label>
        <input value="<?php echo $name;?>" type="text" id="e_name" name="e_name" placeholder="Your name..">
        <span class="err" id="nameError"></span>

        <label for="design">Designation</label>
        <input value="<?php echo $design;?>" type="text" id="design" name="design" placeholder="Your designation..">
        <span class="err" id="designError"></span>
        <input name="submit" type="submit" value="Submit">
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