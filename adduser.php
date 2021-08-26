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
    <h1>Add user</h1>
    
    <form action="" method="POST">
            
            <table>
                <tr>
                    <td>First Name</td>
                    <td>
                        <input type="text" name="firstname" placeholder="Enter Your Name">
                    </td>
                </tr>
                
                <tr>
                    <td>last name</td>
                    <td>
                        <input type="text" name="lastname" placeholder="Your Usename">
                    </td>
                </tr>
                   <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="male"> Male
                        <input type="radio" name="gender" value="female">female
                    </td>
                    
                </tr>
              
                <tr>
                    <td>Email id</td>
                    <td>
                        <input type="email" name="email" placeholder="Your mail id">
                    </td>
                </tr>
                <tr>
                    <td>Mobile no:</td>
                    <td>
                        <input type="number" name="mobileno" placeholder="Your mobile no">
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add user">
                    </td>
                </tr>
            </table>
        </form>
        
        
    </table>
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
    
    if(isset($_POST['submit'])){
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $email = $_POST['email'];
        $mobile_no = $_POST['mobileno'];
         $gender = $_POST['gender']; 
                    // get the value from form
                  
               
              
          
        
        
        $sql = "INSERT INTO tbl_informations SET
        first_name = '$first_name',
        last_name = '$last_name',
        email_id = '$email',
        mobile_no = '$mobile_no',
        gender = '$gender'
          ";
        $res = mysqli_query($conn,$sql);
        
        
        if($res==true){
            $_SESSION['add'] = "User added successfully";
            header('location:'.SITEURL.'xample.php');
        }
        else{
           $_SESSION['add'] = "User not added successfully";
            header('location:'.SITEURL.'xample.php');
        }
        
    }
   
    
    
    
    ?>
    
</body>
</html>