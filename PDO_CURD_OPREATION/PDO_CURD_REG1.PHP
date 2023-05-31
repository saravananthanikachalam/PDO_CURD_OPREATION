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

    $query="INSERT INTO curd (id, Fname, Mail, Pass) VALUES (:id, :Fname, :Mail, :Pass)";
    $query_run=$conn->prepare($query);
    
    $data =[
        ':id'=>$id,
        ':Fname'=>$Fname,
        ':Mail'=>$Mail,
        ':Pass'=>$Pass,
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION['message'] ="Inserted Successfully";
        header('Location: PDO_CURD_LOGIN.PHP');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Not Inserted";
        header('Location: PDO_CURD_LOGIN.PHP');
        echo "<script>Data not inserted</script>";
        exit(0);
    }
}
?>     