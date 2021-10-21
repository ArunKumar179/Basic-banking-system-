<?php
$insert = false;
if(isset($_POST['name'])){

    $server = "localhost";
    $username = "root";
    $password = "";

   
    $con = mysqli_connect($server, $username, $password);

  
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $Name = $_POST['Name'];
    $Accontnumber= $_POST['Accountnumber'];
    $Amount = $_POST['Amount'];
   
  
    $sql = "INSERT INTO `transfer`.`amount` (`Slno`, `Name`, `Accountnumber`, `Amount`) VALUES ('$Name','$Accontnumber','$Amount');";
    if($con->query($sql) == true){
    
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add customer</title>
   
    <style>
.container{
    max-width:80%;
    background-color:hsl(220, 16%, 96%);
    padding:35px;
    margin:auto;
  

}
*{
    margin:0;
    padding:0;
    box-sizing: border-box;
}
.container>h1{
    text-align: center;
    color: blue;
    font-family: 'Roboto Condensed', sans-serif;
}
.container>p{
    text-align: center;
}
.btn{
    padding:11px 28px;
    border:none;
    outline: width 0;
    color:white;
   background-image:linear-gradient(120deg,	rgb(255, 0, 0),	rgb(0, 0,255),rgb(0,128,0));
  
   border-radius:25px;
  cursor:pointer;
  font-weight: 400;
  font-style: italic;
  margin: 11px auto;
 
}
input,textarea{
  
    width: 80%;
    margin:11px auto;
    padding:10px;
    font-size: 16px;
    border: solid black;
    border-radius: 22px;
    align-items: center;

    
}
form{
    display: flex;
    justify-content: center;
    align-items: centers;
    flex-direction: column;
}
.msg{
    color: blue;
    font-size: medium;
    font-family: 'Roboto Condensed', sans-serif;
    
}
    </style>

</head>
<body>
    <div class="container">
        <h1>Welcome to TSFB</h1>
        <p>Enter your  Bank details for easy and safe transaction</p>
        <?php
        if($insert==true){
        echo "<p class='msg'>Sucessfully sent</p>";
        }
        ?>
        <form action="transfer.php" method="post">
            <input type="text" name="Name" id="Name" placeholder="Enter your name">
            <input type="text"  name="Accountnumber" id="Accountnumber" placeholder="Enter Account number">
            <input type="text"  name="Amount" id="Amount" placeholder="Enter Amount">
       
            <button class="btn">Transfer</button>
            <button class="btn">Reset</button>
        </form>

    </div>
    <script src="index.js"></script>
</body>
</html>
