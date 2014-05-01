<?php include 'header.php'; ?>;
<html>
    <head>
     <link rel="stylesheet" type="text/css" href="generic.css">

     <style>
         iframe
         {
             width: 1150px;
             height: 600px;
             border-color: antiquewhite;
         }
     </style>
    </head>
    <body>
        <div class="eventhome">
        <h3 align="center">Events Management</h3>
            <p align="left">
                <a href="admin_home.php"><button>Admin Home</button></a>
                <a href="add_event.php" target="myframe"><button>Add New Event</button></a>
                <a href="update_event.php" target="myframe"><button>Update Existing Event</button></a>
                <a href="remove_event.php" target="myframe"><button>Remove Existing Event</button></a>
        </p>
            <div class="frame_div">
                <iframe src="blank.php" name="myframe" border="0" />
            </div>
      </div>
   </body>
</html>
