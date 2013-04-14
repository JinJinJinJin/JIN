JIN
====

<?PHP

error_reporting(0);

if($_POST['submit'])
{
    $username     = $_POST['username'];
    $firstname    = $_POST['firstname'];
    $lastname     = $_POST['lastname'];
    $useremail    = $_POST['useremail'];
    $phonenumber  = $_POST['phonenumber']; 
    $password     = $_POST['password'];
    $password1    = $_POST['password1'];
    $enc_password = md5($password);

    if($username && $firstname && $lastname && $useremail && $phonenumber &&$password && $password1)
    {
         if(strlen($username)>10)
         {
            echo "Your username is too long";
         }
         
         if(strlen($firstname)>15)
         {
            echo "Your firstname is too long";
         }
         
         if(strlen($lastname)>15)
         {
            echo "Your lastname is too long";
         }

         if(strlen($phonenumber)>20)
         {
            echo "Your phone number is too long";
         }
         
         else
         {
            if(strlen($password)>15 || strlen($password)<6)
            {
                echo "Your password must be betewwn 6 and 15 characters";  
            }
            
            if($password == $pasword1)
            {
                //require "db.php";
                $query = mysql_query("INSERT INTO users VALUES ('', '$username', '$firstname', '$lastname', '$useremail', '$phonenumber', '$enc_password')"); 
                die("Registration Complete! <a href='login.php'>Click here to login</a>");
            }
            else
            {
                echo "Passwords must match";
            }
            
         }
         
     } 
     else echo "All fields are required";
}

?>

<html>
     
     <form id='register' action="register.php" method="POST" accept-charset='UTF-8'>
     
     <legend>REGISTRATION</legend><br/>   
     
     <div class='short_explanation'>* required fields</div><br/>

         <label for='username'>Username*:</label>  
         <input type="text" name="username" value="<?php echo "$username"; ?>" maxlength="10"> <p>

         <label for='firstname'>First Name*:</label>
         <input type="text" name="firstname" value="<?php echo "$firstname"; ?>" maxlength="15"> <p>

         <label for='lastname'>Last Name*:</label>
         <input type="text" name="lastname" value="<?php echo "$lastname"; ?>" maxlength="15"> <p>

         <label for='useremail'>E-mail*:</label>
         <input type="email" name="useremail"> <p>

         <label for='phonenumber'>Phone Number*:</label>
         <input type="tel" name="phonenumber" value="<?php echo "$phonenumber"; ?>" maxlength="20"> <p>

         <label for='password'>Password*:</label>
         <input type="password" name="password"> <p>

         <label for='password1'>Re-Enter Password*:</label>
         <input type="password" name="password1"> <p>

         <input type="submit" name="submit" value="Register">
    
     </form>

</html>
