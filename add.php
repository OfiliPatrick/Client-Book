<?php
session_start();

$nameError= "";
$emailError = "";

// if user is not logged in
if( !$_SESSION[ 'loggedInUser']) {
    
    // send them to the login page
    header("Location: index.php");
}
  
// connect to database
include('includes/connection.php');

// include functions file
include('includes/functions.php');


// if add button  was submitted

if( isset( $_POST['add'] ) ) { 
    
    // set all variables to empty by default
    $clientName = $clientEmail = $clientPhone = $clientAddress = $clientCompany = $clientNotes = "";
    
    // check to see if inputs are empty
    // create to variables with form data
    // wrap the data with our function
    
    if( !$_POST["clientName"] ) {
        
        $nameError = "<div class='alert alert-danger'>Please enter a name  <a class='close' data-dismiss='alert'> &times;</a></div>";
    } else {
        $clientName = validateFormData( $_POST["clientName"]);
    }
    
    
     
    if( !$_POST["clientEmail"] ) {
        
        $emailError = "<div class='alert alert-danger' >Please enter an email<a class='close' data-dismiss='alert'> &times;</a></div>";
    } else {
        $clientEmail = validateFormData( $_POST["clientEmail"]);
    }
    
    // these inputs are not required
    // so we'll just store whatever has been entered
    
    $clientPhone = validateFormData( $_POST["clientPhone"]);
    
    $clientAddress = validateFormData ( $_POST["clientAddress"]);
    
    $clientCompany = validateFormData( $_POST["clientCompany"]);
    
    $clientNotes = validateFormData ( $_POST["clientNotes"]);
    
    // if required fields have data
    if( $clientName && $clientEmail ) {
        
        // create query
        $query = "INSERT INTO clients (id, name, email, phone, address, company, notes, date_added) VALUES (NULL, '$clientName', '$clientEmail','$clientPhone', '$clientAddress', '$clientCompany','$clientNotes', CURRENT_TIMESTAMP)";
        
        $result = mysqli_query( $conn, $query);
        
        // if query was successful
        if( $result) {
            
            // refresh page with query string
            header( "Location: clients.php?alert=success");
            
        } else {
            
            // something went wrong
            echo "Error: ". $query. "<br>". mysqli_error($conn);
        }
        
    }
}
    

include('includes/header.php');
?>

<!DOCTYPE html> 

<html>

<link href = "index.css" rel ="stylesheet">
    
<div id="container">    
<h1>Add Client</h1>

     
    
      
    
<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method = "post" class="row">
  
     <?php echo $nameError; ?>  <br>
      <?php echo $emailError; ?>
  
    <div class="form-group col-sm-6">
       <label for = "client-name">Name *</label><input type="text" class="form-control input-lg" id="client-name" name="clientName" value="">
    
    </div>
    
  
    
    <div class="form-group col-sm-6">
        <label for="client-email">Email *</label>
        <input type= "text" class="form-control input-lg" id= "client-email" name="clientEmail" value="">
    
    
    </div>
    
      <div class="form-group col-sm-6">
        <label for="client-address">Phone</label>
        <input type= "text" class="form-control input-lg" id= "client-phone" name="clientPhone" value="">
    
    
    </div>
    
    <div class="form-group col-sm-6">
        <label for="client-address">Address</label>
        <input type= "text" class="form-control input-lg" id= "client-address" name="clientAddress" value="">
    
    
    </div>
    
     
    <div class="form-group col-sm-6">
        <label for="client-company">Company</label>
        <input type= "text" class="form-control input-lg" id= "client-company" name="clientCompany" value="">
    
    
    </div>
    
    
    <div class="form-group col-sm-6">
        <label for="client-address">Notes</label>
        <input type= "text" class="form-control input-lg" id= "client-notes" name="clientNotes" value="">
    
      
    </div>
    
     <div class="col-sm-12">
       <a href="clients.php" type="button" class="btn btn-lg btn-default">Cancel</a>
         <button type="submit" class="btn btn-lg btn-success pull-right" name="add">Add Client</button>
    
    </div>
     
</form>
    
    </div>
</html>

<?php
include('includes/footer.php');
?>