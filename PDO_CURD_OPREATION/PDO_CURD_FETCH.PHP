<?php
session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>front</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
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
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <th>id</th>
                    <th>Name</th>
                    <th>Mail</th>
                    <th>Password</th>
                    <th>update</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php 
                    $query="SELECT * FROM curd";
                    $statement=$conn->prepare($query);
                    $statement->execute();
                    $result=$statement->fetchAll(PDO::FETCH_OBJ);//PDO::FETCH_ASSOC
                                                                   //<td><?=$row->id eathu vanthu object kudutha eantha method podannum;
                                                                   //PDO::FETCH_OBJ
                    if($result)
                    {
                        foreach($result as $row)
                        {
                            ?>
                             <tr>
                               <td><?=$row->id;?></td>
                               <td><?=$row->Fname;?></td>
                               <td><?=$row->Mail;?></td>
                               <td><?=$row->Pass;?></td>
                               <td> <form action="PDO_CURD_UPDATE.PHP" method="POST">
                                <button type="submit" class="btn btn-success" name="btn" value="<?=$row->id;?>">Update</button>
                               </form></td>
                               <td> <form action="PDO_DEL.PHP" method="POST">
                               <button type="submit" class="btn btn-danger" name="btn" value="<?=$row->id;?>"> delete</button>
                               </form></td>
                            </tr>
               
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <tr colspan="5">No record found</tr>
                        <?php
                    }
                    ?>
                </tbody>
                    </body>
                    </html>
