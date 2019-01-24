<?php
session_start();

include('includes/functions.php');
 // connect to database
include('includes/connection.php');

$_SESSION['loggedInUser'] = "";
$formEmail = "";
$loginError = "";

// if login form was submitted
if( isset( $_POST['login'] ) ) { 
    
    // create variables
    
    // wrap data with validate function
    $formEmail = validateFormData( $_POST['email'] );
    $formPass = validateFormData( $_POST ['password'] );
    
    
    // create query
    $query = "SELECT email, password FROM users WHERE email='$formEmail'";
    
    // store the result
    $result = mysqli_query( $conn, $query);
    
    // verify if result is returned
    if( mysqli_num_rows($result) > 0 ) {
        
        //store basic user data in variables
        while( $row = mysqli_fetch_assoc($result ) ) {
            
            $name = $row['email'];
            $hashedPass = $row['password'];
        }
        
        // verify hashed password with submitted password
        if( password_verify( $formPass, $hashedPass )) {
            
            // correct login details!
            // store data in SESSION variables
            $_SESSION['loggedInUser'] = $name;
            
            // redirect user to clients page
            header( "Location: clients.php");
       
        } else {
            
            // hashed password didn't verify
            
            // error message
            $loginError= "<div class='alert alert-danger'>Wrong username / password combination.Try again. <a class='close' data-dismiss='alert'>&times;</a> </div>";
           
            
        }
        
        } else {
             
           $loginError = "<div class='alert alert-danger'>No such user in database. Please try again. <a class='close' data-dismiss='alert'> &times;</a></div>";
             
    }
    
}

// close mysql connection
//mysqli_close($conn);

include('includes/header.php');
//$password = password_hash("abc123", PASSWORD_DEFAULT);
//echo $password;

?>
    
<!DOCTYPE html> 
<html>
    
      <link href = "index.css" rel ="stylesheet">


         <div id ="container">
        
        <h1>Client Address book</h1>
        <p class="lead">Log in to your account.</p>
             
    <?php            
       echo $loginError;        
    ?>


             <form class="" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method = "post">
                 
                <div class="form-group">
                    <label for="login-email" class="sr-only">Email</label>
                    <input type="text" class="form-control" id="login-email" placeholder="email"  name="email" value = "<?php echo $formEmail; ?>">
                 
                </div>
             
                   
                <div class="form-group">
                    <label for="login-password" class="sr-only">Password</label>
                    <input type="password" class="form-control" id="login-password" placeholder="password" name="password">
                 
                </div>
            
                 <button id="button" type="submit" class="btn btn-primary" name="login">Login</button>
            
             </form>
        
            </div>
      
        
               <script src ="jquery-2.1.4.js">
    </script>      
    
        <script src= "bootstrap-3.3.5-dist/js/bootstrap.js"></script>

    
</html>
        <?php
        
        include('includes/footer.php');
        ?>
        
    
    
        
