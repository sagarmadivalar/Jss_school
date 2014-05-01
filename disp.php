
<html>
    <head>
        <style type="text/css">

         th,td
         {
             width: 200px;
}
        </style>
    </head>
    <body>
        <?php
        include 'header.php';
        if(isset($_POST['submit']) && $_POST['rid']!=NULL)
        {
            // Make a MySQL Connection
            include 'connect_db.php';

        // Get all the data from the "example" table
        $rid=$_POST['rid'];
        $query1 = "SELECT * from registration where rid='$rid'";
        $result1 = mysql_query($query1);
        if(!$result1)
        {
            print "Error - the query could not be executed.";
            $error = mysql_error();
            print "<p>" . $error . "</p>";

        }
    //echo "$rid";
  ?>
  <div class="adcontact">
       <a href="admin_home.php"><button class="btn">Admin Home</button></a><br><br>
      <div class="center1">
        <?php
        print "<h1>STUDENT DETAILS</h1><hr width='35%'><br>";
        if(mysql_num_rows($result1)==1){
  print '<table border="3" align="center" cellpadding="4" cellspacing="1" bgcolor="#c7b097">';
  print "<tr>";

// Get the number of rows in the result, as well as the first row
//  and the number of fields in the rows

  $num_rows = mysql_num_rows($result1);
  $row = mysql_fetch_array($result1);
  $num_fields = mysql_num_fields($result1);

// Produce the column labels

   
  $keys = array_keys($row);
  for ($index = 0; $index < $num_fields; $index++)


  print "</tr>";

// Output the values of the fields in the rows

  for ($row_num = 0; $row_num < $num_rows; $row_num++) {
    print "<tr>";
    $values = array_values($row);
    for ($index = 0; $index < $num_fields; $index++){
        print "<th align='left'>" . $keys[2 * $index + 1] . "</th>";

      $value = htmlspecialchars($values[2 * $index + 1]);
      print "<td>" . $value . "</td> ";
      print "</tr>";
    }


    $row = mysql_fetch_array($result1);
  }

  print "</table>";

      }
      else
          {
          echo '<script> window.location="admin_viewi_info.php"; alert("Please Enter valid RegNo.") </script>';
      }
      }
      else
          {
         echo '<script> window.location="admin_viewi_info.php"; alert("Please Enter valid RegNo.") </script>';
          }

?>
      
        <form name="f1" action="comment.php" method="POST"><br/><br/>
            <input type="submit" name="comment" value="comment" class="btn">
        </form>
          </div></div>
    </body>
</html>