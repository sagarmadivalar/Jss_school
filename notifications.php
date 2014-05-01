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
        <h3 align="center">Notifications Management</h3>
            <p align="left">
                <a href="admin_home.php"><button>Admin Home</button></a>
                <a href="add_notifications.php" target="myframe"><button>Add Notification</button></a>
                <a href="update_notifications.php" target="myframe"><button>Update Notifications</button></a>
                <a href="remove_notification.php" target="myframe"><button>Remove Notifications</button></a>
        </p>
            <div class="frame_div">
                <iframe src="blank.php" name="myframe" border="0" />
            </div>
      </div>
   </body>
</html>
