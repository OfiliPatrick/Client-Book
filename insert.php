 <?php 

include('includes/connection.php');
  $nameError = "";
  $emailError = "";
  $passwordError = "";
   


if( isset($_POST["add"])) {
    
    // build a function that validates data
    function validateFormData ( $formData ) {
        
        $formData = trim( stripslashes( htmlspecialchars( $formData) )) ;
        
        return $formData;
    }
    
    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with our function
    
    // Set variables to empty by default
    
    $name = $email = $password = '';
    if( !$_POST["name"] ) {
        $nameError = "Please enter your name <br>";
        
    } else {
      $name = validateFormData( $_POST ["name"] );
    }

    
    
    if ( !$_POST ["email"]) {
        $emailError = "Please enter your email<br>";
    
        
    }
    else {
        $email = validateFormData ( $_POST ["email"]);
        
    }

    
    if( !$_POST["password"] ) {
        $passwordError = "Please enter a password <br>";
        
    } else {
        $password = validateFormData( $_POST ["password"] );

    }

    // check to see if each variable has data
    if ($name && $email && $password) {
        
       
        $query = "INSERT INTO clients (id, name, email, password, phone)
        VALUES (NULL, '$name', '$email', '$password', 'NULL')";
    
        if( mysqli_query($conn, $query)) {
                 echo "<div class='alert alert-success'>New record in database!</div>";
        }else {
                 echo "Error: ". $query . "<br>" . mysqli_error($conn);
             }
         }

}

/* MYSQL INSERT QUERY

INSERT INTO users (id, username, password, email)
VALUES (NULL, 'OfiliPatrick', 'abc123', 'patrick@gmail.com', CURRENT_TIMESTAMP, 'Hello! I'm Jackson. This is my bio.');

*/

mysqli_close($conn);

?>

<!DOCTYPE html>

<html>

    <head>
          
     <meta charset="utf-8">
     <meta http-equiv = "X-UA-Compatible" content = "IE-edge">
     <meta name ='viewport' content = "width=device-width, initial-scale = 1">
    
        
    <title>MySQL Insert</title>
        
           <!-- Bootstrap -->
       <link href = "bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet"> 
       
      
   
    </head>
    
    <body>
         <div class="container">
           
         <h1>MySQL Insert</h1>
        
             
              <p class="text-danger">* Required fields</p>
          
             <form action = "<?php echo htmlspecialchars( $_SERVER["PHP_SELF"]); ?>" method="post">
                
                 <small class="text-danger">* <?php echo $nameError; ?></small>
                 <input type="text" placeholder="name" name="name"><br><br>
                 
                <small class="text-danger">* <?php echo $emailError; ?></small>
                 <input type="text" placeholder="Email" name="email"><br><br>
                 
                  <small class="text-danger">* <?php echo $passwordError; ?></small>
                 <input type="password" placeholder="Password" name="password"><br><br>
                 
              
               <input type="submit" name="add" value="Add Entry">
                 
             </form>
             
         </div>
        
<!--         <script src= "bootstrap-3.3.5-dist/js/bootstrap.js"></script>-->
    
        
        
    </body>



</html>