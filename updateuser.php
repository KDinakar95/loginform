<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
      
        h1{
            border-bottom: 1px solid black;
            text-align: center;
            background-color: lavenderblush;
            margin:0;
            
        }
        .tbl{
            width: 80%;
        }
        table tr th{
    border-bottom: 1px solid black;
    background-color:lightgray;
    padding: 1%;
    text-align: left;
            }
table tr td{
    padding: 1%;
}
    
    </style>
</head>
<body>
    <h1>Update user</h1>
         <?php
    //start session
    session_start();


     //create constants to store non repeating values
    define('SITEURL', 'http://localhost/food-order/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'personal information');

        $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
        $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database

?>
    
    
     <?php
            //1.get the id of selected admin
            $id=$_GET['id'];
        
            //2.create SQL Query to get the details
            $sql="SELECT * FROM tbl_informations WHERE id=$id";
        
            //Execute the Query
            $res=mysqli_query($conn, $sql);
        
            //check whether the query is executed or not
            if($res==TRUE)
            {
                //check whether the data is available or not
                $count = mysqli_num_rows($res);
                // check whether we have admin data or not
                if($count==1)
                {
                    //get the details
                    //echo "Admin available";
                    $row=mysqli_fetch_assoc($res);
                    
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $gender = $row['gender'];
                    $email_id = $row['email_id'];
                    $mobile_no = $row['mobile_no'];
                }
                else
                {
                    //redirect to manage admin page
                    header('location:'.SITEURL.'xample.php');
                }
            }
        
        
        ?>
    
    <form action="" method="POST">
            
            <table class="tbl-30">
                <tr>
                    <td>First Name</td>
                    <td>
                        <input type="text" name="first_name" placeholder="Enter Your Name" value="<?php echo $first_name;?>">
                    </td>
                </tr>
                
                <tr>
                    <td>last name</td>
                    <td>
                        <input type="text" name="last_name" placeholder="Your Usename" value="<?php echo $last_name;?>">
                    </td>
                </tr>
                
                <tr>
                    <td>Gender</td>
                    <td>
                        <input <?php if($gender=="male"){ echo "checked";}?> type="radio" name="gender" value="male">Male
                       <input <?php if($gender=="female"){ echo "checked";}?> type="radio" name="gender" value="female">female
                    </td>
                </tr>
                <tr>
                    <td>Email id</td>
                    <td>
                        <input type="email" name="email" placeholder="Your mail id" value="<?php echo $email_id;?>">
                    </td>
                </tr>
                <tr>
                    <td>Mobile no:</td>
                    <td>
                        <input type="number" name="mobile_no" placeholder="Your mobile no" value="<?php echo $mobile_no;?>">
                    </td>
                </tr>
                
                <tr>
                     <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </table>
    <?php 
    if(isset($_POST['submit']))
    {
       // echo "Button Clicked";
        //get all the values from form to update
         $id = $_POST['id'];
         $first_name = $_POST['first_name'];
         $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $email=   $_POST['email'];
        $mobile_no=  $_POST['mobile_no'];
        
        
        //create a AQL Query to update admin
        $sql = "UPDATE tbl_informations SET
        first_name = '$first_name',
        last_name='$last_name',
        gender='$gender',
        email_id = '$email',
        mobile_no = '$mobile_no'
        WHERE id='$id'
        ";
        //execute the query
        $res = mysqli_query($conn, $sql);
        
        //check whether the query executed successfully or not
        if($res==TRUE)
        {
            //query executed and admin updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully</div>";
            header('location:'.SITEURL.'xample.php');
        }
        else
        {
            //failed to update admin
             $_SESSION['update'] = "<div class='error'>failed to delete admin</div>";
            header('location:'.SITEURL.'xample.php');
        }
    }

?>
</body>
</html>