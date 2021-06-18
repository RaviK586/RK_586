

      <?php
include 'configuration.php';

if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from user_data where id=$from";
    $query = mysqli_query($connection,$sql);
    $sql1 = mysqli_fetch_array($query); 

    $sql = "SELECT * from user_data where id=$to";
    $query = mysqli_query($connection,$sql);
    $sql2 = mysqli_fetch_array($query);


    
    if ($amount == 0){

        echo "<script type='text/javascript'>";
        echo "alert('Alert!! Please enter correct amount ')";
        echo "</script>";
    }


  
    
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Sorry!! This user does not have sufficient balance")';  
        echo '</script>';
    }
    


      else if(($amount)<0)
      {
           echo '<script type="text/javascript">';
           echo ' alert("Sorry!! Enter Correct amount for this transaction")';  
           echo '</script>';
      }


    else {

        $newbalance = $sql1['balance'] - $amount;
        
        $sql = "UPDATE user_data set balance=$newbalance where id=$from";
        mysqli_query($connection,$sql);
     

        
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE user_data set balance=$newbalance where id=$to";
        mysqli_query($connection,$sql);
        
    
       $sender = $sql1['name'];
       $receiver = $sql2['name'];
       $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
       $query=mysqli_query($connection,$sql);
      
       if($query){
            echo "<script> alert('Transaction Successful');
                            window.location='index.php';
                  </script>";
           
       }

        $newbalance= 0;
        $amount =0;

        }
    
}
?>


<html> 
  <head>
    <title>Basic Banking System </title>
    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css" type="text/css" /> 
    </head>

    
<body style="background-color : #E59866 ;">
<div id="container">
      <div id="header">
        <h1><img id="logo" style="width: 760px; height: 112px;" alt="" src="images/header.png" /></h1>
      </div>
      <div id="sub-header"></div>
      <div id="menu">
        <div id="menu-left"></div>
        <div id="menu-right"></div>
        <ul>
          <li id="first"><li><a href="index.php">Home</a></li>
          <li><a href="View.php"> View all customers  </a></li>
                  <li><a href="Transfer.php"> Transfer Money </a></li>
                  <li><a href="Transaction.php"> Transaction History </a></li>
                  <li><a href="register.php"> Registration </a></li>
        </ul>
      </div>

 


      <div class="container">
        <h2 class="text-center pt-4" style="color : black;">Banl Customers Details</h2>
        <table border="3" bordercolor="021c3d" bgcolor="#99CCFF" class="table table-striped table-hover" >">
                <tr style="color : black;" class="table-primary">
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email Address </th>
                    <th class="text-center">Account Balance</th>
                </tr>
            <?php
                include 'configuration.php';
                $id=$_GET['id'];
                $query = "SELECT * FROM  user_data where id=$id ";
                $result=mysqli_query($connection,$query);
               
                if(!$result)
                {
                    echo "Error : ".$query."<br>".mysqli_error($connection);
                }
                $rows=mysqli_fetch_array($result)
                
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            
                <tr style="color : black;">
                    <td ><?php echo $rows['id'] ?></td>
                    <td class=" text-center py-2"><?php echo $rows['name'] ?></td>
                    <td class=" text-center py-2"><?php echo $rows['email'] ?></td>
                    <td class=" text-center py-2"><?php echo $rows['balance'] ?></td>
                </tr>
                
            </table>
        </div>
        <h2 class="text-center pt-4" style="color : black;">Send Money to Other Customer</h2>
        <label style="color : black;"><strong>Transfer To:</strong></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose Customer</option>
            <?php
                include 'configuration.php';
                $sid=$_GET['id'];
                $query = "SELECT * FROM user_data where id!=$sid";
                $result=mysqli_query($connection,$query);
                if(!$result)
                {
                    echo "Error ".$query."<br>".mysqli_error($connection);
                }
                while($rows=mysqli_fetch_array($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['name'] ;?> ( Account Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : black;"><strong>Total Amount of Money:</strong></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
                <button class="btn btn-outline-dark mb-3" name="submit" type="submit" id="myBtn" >Transfer Your Money</button>
            </div>
        </form>
    </div>    
    
    <div id="footer">
        <div id="footer-content">
          <div id="footer-right">
          <a href="" accesskey="t">Terms of Use </a>&middot; 
          <a href="" accesskey="p">Privacy Policy </a>&middot; 
          <a href="" accesskey="s">Sitemap </a>&middot; </div>
         <p> Design by <a href="">Ravi Kachhadiya</a>
          Copyright &copy; 2021  .</p>
        </div>
      </div>
    </div>

</body>
</html>