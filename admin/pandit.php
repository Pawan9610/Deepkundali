<?php include('partials/sidebar.php');?> 
                    <div class="main-content border shadow">
                        <div class="main-content-header center shadow-2">Astrologer Managment</div>
                        
                        <!-- <div id="add-astro" class="nowrap"> -->
                        <div class="astro-nav ">
                            <div><a href="./add-astro.php" class="btn-primary btn-border shadow-3">Add Astro</a>
                            </div>
                            <div>
                                <br><br>
                                <?php 
                                    if (isset($_SESSION['delete'])) {
                                        echo $_SESSION['delete']; //Dispalying Session Message
                                        unset($_SESSION['delete']); // Removing Session Message
                                    }
                                    if (isset($_SESSION['update'])) {
                                        echo $_SESSION['update'];//Displaying Session Message
                                        unset($_SESSION['update']);//Removing Session Message
                                    }
                                    if (isset($_SESSION['updatePass'])) {
                                        echo $_SESSION['updatePass'];//Displaying Session Message
                                        unset($_SESSION['updatePass']);//Removing Session Message
                                    }
                                ?>
                            </div>
                        <!-- </div> --></div>
                        <div class="tbl center">
                            <table class="primary-color scroll-h font-m">
                                <tr>
                                        <th>S.N.</th>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>City</th>
                                        <th>Mobile No.</th>
                                        <th>Experience</th>
                                        <th> Price</th>
                                        <th>Action</th>
                                        
                                    </tr>

                                    <?php
                                        //Query to get all admin
                                        $sql ="SELECT * FROM astrologer";
                                        //Execute the Query
                                        $res = mysqli_query($conn,$sql);

                                        // check Weather Query is Executed or not 
                                        if ($res==TRUE) 
                                        {
                                            //count row to check weather we have data i database or not 
                                            $count = mysqli_num_rows($res);

                                            $sn = 1;

                                            if ($count>0) {
                                                
                                                //we have data in database 
                                                while ($rows=mysqli_fetch_assoc($res)) 
                                                {
                                                    //Using While loop to get all the data from the database
                                                    //And while loop will run as long as we have data in database

                                                    //Get individual data 
                                                    $id = $rows['id'];
                                                    $full_name = $rows['full_name'];
                                                    $username = $rows['username'];
                                                    $city = $rows['city'];
                                                    $mob = $rows['mob_no'];
                                                    $exp = $rows['exp'];
                                                    $price = $rows['price'];
                                                 
                                                    // Display the value in our table
                                                 ?>

                                                    <tr>
                                                        <!-- <td>1.</td> -->
                                                        <td><?php echo $sn++?>.</td>
                                                        <td><?php echo $full_name;?></td>
                                                        <td><?php echo $username;?></td>
                                                        <td><?php echo $city;?></td>
                                                        <td><?php echo $mob;?></td>
                                                        <td><?php echo $exp;?></td>
                                                        <td><?php echo $price;?></td>
                                                        <td>
                                                        
                                                            <span><a class="btn-primary btn-border shadow-4" href="<?php echo SITEURL;?>admin/change-pass.php?id=<?php echo $id;?>">Change Password</a></span>
                                                            <span><a class="btn-secondary btn-border shadow-4" href="<?php echo SITEURL;?>admin/update-astro.php?id=<?php echo $id;?>">Update</a></span>
                                                            <span><a class="btn-danger btn-border shadow-4" href="<?php echo SITEURL;?>/admin/delete-astro.php?id=<?php echo $id;?>">Delete</a></span>
                                                            
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }

                                            }
                                            else{
                                                //do not have any data
                                            }
                                        } 
                                    ?>

                                </table>
                            </div>
                        </div>
    </main>

    <!-- partial -->
        <script src='https://cdn.rawgit.com/facebook/rebound-js/fe8994c1caca9f0e7ff27336c5ecf0a4abd807dc/rebound.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.4/hammer.min.js'></script>
        <script src='https://code.jquery.com/pep/0.3.0/pep.js'></script>
        <script src='https://cdn.rawgit.com/meandmax/lory/v1.6.6/dist/lory.min.js'></script>
        <script  src="./script.js"></script>

</body>
</html>