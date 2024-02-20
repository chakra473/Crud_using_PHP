<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    
    $server="localhost";
    $user_name="root";
    $password= "";
    $db_name="db2";

    $connection= new mysqli($server,$user_name,$password,$db_name);

    $query="DELETE FROM clients WHERE id=$id";

    $connection->query($query);

}
header("location: /CRUDOPERATION/index.php");
exit;