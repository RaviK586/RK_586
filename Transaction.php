<!DOCTYPE html> 
<html> 
  <head>
    <title>Basic Banking System </title>
    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css" type="text/css" /> 
    </head>
    <body>
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
                  <li><a href="#"> Transaction History </a></li>
                  <li><a href="register.php"> Registration </a></li>
        </ul>
      </div>
      <div class="container">
        <h2 class="text-center pt-4" style="color : black;">Transaction History</h2>
        
       <br>
       <div class="table-responsive-sm">
   <table border="3" bordercolor="021c3d" bgcolor="#99CCFF"  class="table table-striped table-hover">
        <thead style="color : black;">
            <tr>
                <th class="text-center">S.No.</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'configuration.php';

            $sql ="select * from transaction";

            $query =mysqli_query($connection, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>
           <div style="text-align:center">
            <tr style="color : black;">
            <td style="text-align:center" class="py-2"><?php echo $rows['ID']; ?></td>
            <td style="text-align:center" class="py-2"><?php echo $rows['sender']; ?></td>
            <td style="text-align:center" class="py-2"><?php echo $rows['receiver']; ?></td>
            <td style="text-align:center" class="py-2"><?php echo $rows['balance']; ?> </td>
            <td style="text-align:center" class="py-2"><?php echo $rows['date']; ?> </td>
            </div> 
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
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
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
</body>
</html>