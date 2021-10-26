<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Library Management System</title>
    </head>
    <style>
.center {
  text-align: center;
  background: aqua;
  
}
</style>
    
    <body>
        
        <form  action="" method="post" >
            <div class="center">
            <h1>Library Registration </h1>
            <label>NAME</label></br><input type="text"   name="name"><br/> 
            <label>ID</label></br><input type="text"   name="id"><br/> 
            <label>CONTACT</label></br><input type="text"   name="contact"><br/> 
            <label>PASSWORD</label></br><input type="text"   name="password"><br/></br>
            <button type="submit"  name="submit" value="Register" >Update</button>
            <br>
        Click here to <a href="login.php" title="Login"> Login 
            
            </div>
        </form>
        
        
        <?php
        // put your code here
        $Name = $id = $Contact = $Password = "" ;
        
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $Name = $_POST['name'];
            $Id = $_POST['id'];
            $Contact = $_POST['contact'];
            $Password = $_POST['password'];
            
            $con = mysqli_connect("localhost","root","","lib_system");                     
       
			$query = "INSERT INTO `user` (id, name, contact, password) VALUES ('$Id', '$Name', '$Contact', '$Password')";
                        $result = mysqli_query($con,$query);
                        if($result){
			 echo ("Registration Succesful");
			            }
                                    else
                                    {
                                        echo ("Fail"); 
                                    }
                         } 
        
        
        
        ?>
    </body>
</html>
