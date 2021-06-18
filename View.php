

      


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
          <li><a href="#"> View all customers  </a></li>
                  <li><a href="Transfer.php"> Transfer Money </a></li>
                  <li><a href="Transaction.php"> Transaction History </a></li>
                  <li><a href="register.php"> Registration </a></li>
        </ul>
      </div>

 


      <div class="container">
      <b><h2  class="text-center pt-4"style="color : black;" >Bank Customers Details</h2></b>
        <table border="3" bordercolor="021c3d" bgcolor="#99CCFF"  class="table table-striped table-hover">
                <tr style="color : black;" class="table-primary">
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email Address</th>
                    <th class="text-center">Account Balance</th>
                    <th class="text-center">Information</th>
                </tr>
            <?php
                include 'configuration.php';
                
                $query = "SELECT * FROM  user_data  ";
                $result=mysqli_query($connection,$query);
                
                if(!$result)
                {
                    echo "Error : ".$query."<br>".mysqli_error($connection);
                }
                while($rows=mysqli_fetch_array($result))
                {
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            
                <tr >
                    <td style="text-align:center" class=" text-center py-2"><?php echo $rows['id'] ?></td>
                    <td style="text-align:center" class=" text-center py-2"><?php echo $rows['name'] ?></td>
                    <td style="text-align:center" class=" text-center py-2"><?php echo $rows['email'] ?></td>
                    <td style="text-align:center" class=" text-center py-2"><?php echo $rows['balance'] ?></td>
                    <div id="button"><td style="text-align:center"><a href="View1.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn" style="background-color : #FFCCCB; ">View</button></a></td></div>
                </tr>
                <?php
                }
                ?>
            </table>
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