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


$id = $_GET['id'];


//2. create SQL Query to delete admin
$sql = "DELETE  FROM tbl_informations WHERE id=$id";

//Execute the query
$res = mysqli_query($conn, $sql);

//check whether the query executed or not
if($res==TRUE)
{
    //query executed successfully and admin deleted
    //echo "Admin Deleted successfully";
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
    //redirect to manage-admin page
    header('location:'.SITEURL.'xample.php');
}
else
{
    //failed to delete admin
    //echo "Failed to Delete Admin";
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try again later</div>";
     //redirect to manage-admin page
     header('location:'.SITEURL.'xample.php');
}
//3. Redirect to manage Admin page with Message


?>

