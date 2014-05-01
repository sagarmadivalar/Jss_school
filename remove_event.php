
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
        <h3 align="center">Removing a event details</h3>
        <hr width="90%">
                 <p align="center">
<?php
require_once 'connect_db.php';
$query = mysql_query("select ename from events;"); // Run your query

echo "Please Select a event to delete:  ";echo '<select name="ename"> <option value="-1">Select</option>'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while ($row = mysql_fetch_array($query)) {
   echo '<option value="'.$row['ename'].'">'.$row['ename'].'</option>';
}
echo '</select>';// Close your drop down box

echo '<input type="submit" value="Delete" name="submit">';
?></p>
        </form>

<?php

if(isset($_POST['submit']))
{
    $ename=$_POST['ename'];

    if($ename=='')
    {
        echo "<script>
            alert('Please select event to delete!!!');
            </script> ";
      //window.location.href='remove_stud.php'

    }
    else {
    include 'connect_db.php';
    $query="delete from events where ename='$ename'";
    trim($query);
    $query=stripcslashes($query);
    $query_html=htmlspecialchars($query);

    $result=mysql_query($query);
    $row=mysql_affected_rows();
    if(!$row)
    {
        echo "<script>
            alert('Please enter a valid event!!!');
            </script> ";
    }
    else
        {
        echo "<script>";
        echo "alert('Event is successfully removed from database');
            </script> ";
    }
}
}
?>
</body>
</html>