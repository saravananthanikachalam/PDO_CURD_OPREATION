<?php 
session_start(); 
$servername="localhost";
$username="root";
$password="";
$database="pdo";
try{
    $conn= new PDO("mysql:host=$servername;dbname=$database",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
}
catch(PDOException $e){
    echo "Connection Faild" .$e->getMessage();
}
if(isset($_POST['btn']))
{
    $id=$_POST['btn'];

    try{
        $query="DELETE FROM curd WHERE id=:id";
        $statement=$conn->prepare($query);
        $data=[':id'=>$id];
        $query_execute = $statement->execute($data);

        if($query_execute){
            
        $_SESSION['message'] ="Delete Successfully";
        header('Location:PDO_CURD_FETCH.PHP');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Delete Not Inserted";
        header('Location:PDO_CURD_FETCH.PHP');
        exit(0);
    }
            

    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
?>