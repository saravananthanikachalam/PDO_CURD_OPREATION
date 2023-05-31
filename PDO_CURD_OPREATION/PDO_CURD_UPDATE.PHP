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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
   if(isset($_POST('id')))
    {
        $id=$_POST['id'];

        $query="SELECT * FROM curd WHERE id=:id";
        $statement=$conn->perpare($query);
        $data = [':id'=>$id];
        $statement->execute($data);

        $result = $statement->fetch(PDO::FETCH_OBJ);//PDO::FETCH_OBJ
    } 
    ?>
<form action="PDO_CURD_REG1.PHP" method="POST">
    <label for="chk" aria-hidden="true">Sign up</label> 
	<input type="hidden" name="id"   value="<?=$result->id;?>"   placeholder="User Id" required="">

	<input type="text" name="Fname"  value="<?=$result->Fname;?>"   placeholder="User name" required="">

	<input type="email" name="Mail"  value="<?=$result->Mail;?>"   placeholder="Email" required="">

	<input type="password" name="Pass"  value="<?=$result->Pass;?>"       placeholder="Password" required="">

	<button type="submit" name="btn" class="btn btn-primary">update</button>
</form>
		
</body>
</html>