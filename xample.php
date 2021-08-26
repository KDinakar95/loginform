<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .btn{
            text-decoration: none;
            border: 1px solid black;
            background-color: blue;
            color:white;
            padding: 10px;
            border-radius: 10px;
        }
      
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
    <h1>Personal information</h1>
    <?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    
    ?>
    
    <table class="tbl">
        <tr>
           <th>S.no</th>
            <th>First name</th>
            <th>last name</th>
            <th>Gender</th>
            <th>Email id</th>
            <th>mobile number</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tbl_informations";
        $res = mysqli_query($conn,$sql);
        if($res==true){
            $count =mysqli_num_rows($res);
            $sn=1;
            if($count>0){
               while($rows=mysqli_fetch_assoc($res)){
                   $id=$rows['id'];
                   $first_name = $rows['first_name'];
                   $last_name = $rows['last_name'];
                   $email = $rows['email_id'];
                   $mobile_no = $rows['mobile_no'];
                   $gender = $rows['gender'];
                   ?>
                   
                   <tr>
                      <td><?php echo $sn++;?></td>
                       <td><?php echo $first_name;?></td>
                    <td><?php echo $last_name;?></td>
                        <td><?php echo $gender;?></td>
                     <td><?php echo $email;?></td>
                           <td><?php echo $mobile_no;?></td>
                             <td>
          <a href="adduser.php" class="btn">Add user</a>
                <a href="<?php echo SITEURL;?>updateuser.php?id=<?php echo $id;?>" class="btn">Update Admin</a>
           <a href="<?php echo SITEURL;?>deleteuser.php?id=<?php echo $id;?>" class="btn">Delete Admin</a>
            
        </td>
                   </tr>
                   
                   
                   <?php
                   
                   
                   
               } 
            }
            else{
                
            }
        }
        
        ?>
        
        
      
    </table>

</body>
</html>