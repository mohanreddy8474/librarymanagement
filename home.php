<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
     <style>
.center {
  text-align: center;
  background: aqua;
  
}
</style>
    <body>
        <?php
        // put your code here
        session_start();
        if($_SESSION["username"]){
        ?> 
        Welcome <?php echo $_SESSION["username"];
        }
        
        $con = mysqli_connect("localhost","root","","lib_system");
        
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    
                    $sql="select * from books";                    
                    $result=mysqli_query($con,$sql);
                    
                    
                    echo "<table style='width:50%' border='1'>
                        <caption> List of Books in library </caption>
                        <tr>
                        <th>book_id</th>
                        <th>title</th>
                        <th>author</th>                        
                        </tr>";
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td><center>".$row["book_id"]."</center></td>";
                                echo "<td><center>".$row["title"]."</center></td>";
                                echo "<td><center>".$row["author"]."</center></td>";
                                echo "</tr>";


                            }
                        }
                            else{
                                echo "error";
                            }
        
        //searching
        if (isset($_POST['search'])) {
        $name = $_POST['searching'];     
        
        
        $con = mysqli_connect("localhost","root","","lib_system");
        
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
		
		
                    $sql="select * from books where title LIKE '%$name%' and available='yes'  ";                    
                    $result=mysqli_query($con,$sql);
                    
                    
                    echo "<table style='width:50%' border='1'>
                        <caption>List of available books</caption>
                        <tr>
                        <th>book_id</th>
                        <th>title</th>
                        <th>author</th>                        
                        </tr>";
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td><center>".$row["book_id"]."</center></td>";
                                echo "<td><center>".$row["title"]."</center></td>";
                                echo "<td><center>".$row["author"]."</center></td>";
                                echo "</tr>";


                            }
                        }
                            else{
                                echo "Book not found";
                            }

                        
                      
	      }
              
              
        if (isset($_POST['Reserve'])) {
        $bookid = $_POST['bookid'];     
        
        
        $con = mysqli_connect("localhost","root","","lib_system");
        
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
		
		
		    $sql="UPDATE books SET available='no' Where book_id = '$bookid'  ";                    
                    $result=mysqli_query($con,$sql);
                        if($result==1)
                        {
                         echo("Reservation Succesful");
                            
                        }  
                            else {
                                echo("Reservation failed/ book not found");
                            }
                            
                        
                      
	      }
        
        ?>
         <form role="form" id="templatemo-preferences-form" name="Search" action="" method="post">
            <div class="center">
                <input type="text" id="search" placeholder="Enter the title" name="searching" required><br/>
            <br/>
            <button type="submit"  name="search" value="Search" >Search</button>
             </div>
        </form>
        <form role="form" id="templatemo-preferences-form" name="reservation" action="" method="post">
            <div class="center">
            <input type="text" id="reserve" placeholder="Enter Book ID" name="bookid" required><br/>
            <br/>
            <button type="submit"  name="Reserve" value="Reserve" >Reserve</button>
             </div>
        </form>
        
        
        <form>
            <br>
        Click here to <a href="logout.php" title="logout">Logout
            
        </form>
        
        
    </body>
</html>
