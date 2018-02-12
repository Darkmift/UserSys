<?php
include('HTML_Page_frame/header.php');
include('HTML_Page_frame/navbar.php');
?>



<div class="container">


    <div class="jumbotron">
        <h1 class="text-center"> 
            Home Page
        </h1>

        <!--Display the users db-->
        <?php
        $sql = "SELECT * FROM users";
        $result = query($sql);
        confirm($result);
        ?>
        <hr>
        <table class="table table-curved table-striped table-bordered table-hover">
            <thead style="background-color: #9a9fa8;color:white;">
                <tr >
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                    </tr>       
                    <?php
                }
                ?>
            </tbody>
        </table>  
        <hr>
        <!---->
    </div>

</div> <!--Container-->

<?php
include('HTML_Page_frame/footer.php');
?>