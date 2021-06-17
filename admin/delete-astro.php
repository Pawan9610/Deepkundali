<?php
    // Include constent.php File here 
    include('../config/constants.php');
    
    //!. get the ID of Astrologer to be deleted
    echo $id = $_GET['id'];

    //Create SQL Query to Deeted Astrologer
    $sql = "DELETE FROM astrologer WHERE id= $id";
    
    //Execute the SQL Query to Delet Admin
    $res = mysqli_query($conn, $sql);

    //check Weather SQL query executed or not 
    if ($res==TRUE) {

        $_SESSION['delete'] = "<div class='success'>Astrologer deleted successfully :) !!</div>";

        //Redirect To manage Astrologer page With Message
        header('location:'.SITEURL."/admin/pandit.php");
    }
    else {
        
        $_SESSION['delete'] = "<div class='error'>Failed to delete Astrologer :( Try Again...</div>";
        
        //Redirect To manage Astrologer page With Message
        header('location:'.SITEURL."/admin/pandit.php");
    }

