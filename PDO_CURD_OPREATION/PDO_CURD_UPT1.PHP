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
    $id=$_POST['id'];
    $Fname=$_POST['Fname'];
    $Mail=$_POST['Mail'];
    $Pass=$_POST['Pass'];

    try{
        $query="UPDATE curd Fname=:Fname, Mail=:Mail, Pass=:Pass WHERE id=:id";
        $statement=$conn->prepare($query);

        $data = [
            ':Fname'=> $Fname,
            ':Mail'=> $Mail,
            ':Pass'=> $Pass,
            ':id' => $id
        ];

        $query_execute = $statement->execute($data);

        if($query_execute)
    {
        $_SESSION['message'] ="Update Successfully";
        header('Location: PDO_CURD_FETCH.PHP');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Update Not Inserted";
        header('Location:PDO_CURD_FETCH.PHP');
        echo "<script>Data not inserted</script>";
        exit(0);
    }
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
?>