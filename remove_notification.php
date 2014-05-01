
<html>
     <head>
        <style>
             table
            {
                font-family: Georgia;
            }
            th
            {
                font-size: 16px;
                color: blue;
            }
            td
            {
                font-size: 12px;
            }
        </style>
    <body>
        <form action="<?php ?>" method="post">
        <h3 align="center">Removing a notification details</h3>
        <hr width="90%">
                 <p align="center">
<?php
require_once 'connect_db.php';
$query = mysql_query("select title from notifications;"); // Run your query

echo "Please Select a event to delete:  ";echo '<select name="nname"> <option value="-1">Select</option>'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while ($row = mysql_fetch_array($query)) {
   echo '<option value="'.$row['title'].'">'.$row['title'].'</option>';
}
echo '</select>';// Close your drop down box

echo '<input type="submit" value="Delete" name="submit">';
?></p>
        </form>
<?php

if(isset($_POST['submit']))
{
    $nname=$_POST['nname'];

    if($nname=='')
    {
        echo "<script>
            alert('Please select notification to delete!!!');
            </script> ";
      //window.location.href='remove_stud.php'

    }
    else {
    include 'connect_db.php';
    $query="delete from notifications where title='$nname'";
    trim($query);
    $query=stripcslashes($query);
    $query_html=htmlspecialchars($query);

    $result=mysql_query($query);
    $row=mysql_affected_rows();
    if(!$row)
    {
        echo "<script>
            alert('Please enter a valid notification!!!');
            </script> ";
    }
    else
        {
        echo "<script>";
        echo "alert('Notification is successfully removed from database');
            </script> ";
    }
}
}
?>
</body>
</html>