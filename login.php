<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
        <style>
.center {
  text-align: center;
  background: aqua;
  
}
</style>
    <body>
        <form role="form" id="templatemo-preferences-form" name="login" action="" method="post">
            <div class="center">
                <h1>Login </h1>
             <label>NAME</label><br/>

             <input type="text" id="name" placeholder="enter name" name="name" required> <br/>
            <label>PASSWORD</label><br/>
           
            <input type="text" id="pwd" placeholder="enter password" name="password" required><br/>
            <br/>
            <button type="submit"  name="submit" value="Register" >Login</button>
             
            
            
            <br>
        Click here to <a href="index.php" title="Registration"> Register
            </div>
        </form>
        
        
        
        
        
        <?php
        // put your code here
        if(isset($_POST['submit'])){
        $name = $_POST['name'];	
       
        $password = $_POST['password'];
        
        
        $con = mysqli_connect("localhost","root","","lib_system");
        
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " .mysqli_connect_error();
                    }
		
		
			$query = "SELECT * FROM user WHERE name='$name' and password='$password'";
                        $result = mysqli_query($con,$query);
                        if($result)
                        {
                            if(mysqli_num_rows($result)>0)
                            {
                                session_start();
                                $_SESSION['username'] = $name;
                                
                                header("Location: home.php");
                            }
                            else{
                                echo("Invalid credenatials");
                            }
                            
                        }                     
                        else{
                            echo("Invalid credenatials");
                        }
	      }
               
        
        
        
        
        
        ?>
    </body>
</html>
