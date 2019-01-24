<?php
//session_start();

// This syntax messes up the address book
//$_SESSION['loggedInUser']= "";

?>

<head>
<!--      
     <meta charset="utf-8">
     <meta http-equiv = "X-UA-Compatible" content = "IE-edge">
     <meta name ='viewport' content = "width=device-width, initial-scale = 1">
    
        
-->
    <title>Client Address book</title>
        
           <!-- Bootstrap -->
       <link href = "bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet"> 
       
        <link href = "index.css" rel ="stylesheet">
      

</head>

        <body style="padding-top: 60px;">
         <nav class = "navbar navbar-fixed-top navbar-inverse" >
        
        <div class="container-fluid">
           
        <div class="navbar-header">
                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="clients.php">CLIENT<strong>MANAGER</strong></a>
             </div>
         
              <div class="collapse navbar-collapse" id="navbar-collapse">
                  
                  <?php
                  if($_SESSION['loggedInUser'] ) {
                      
                      // if user is logged in
                      
                      ?>
                <ul class="nav navbar-nav">
        
                  <li><a href="clients.php">My Clients</a></li>
                       <li><a href="add.php">Add Client</a></li>
                  
                  </ul> 
                  
                    <ul class="nav navbar-nav navbar-right">
        
                  <p class="navbar-text">Hello, Patrick!</p>
                       <li><a href="logout.php">Log out</a></li>
                  
                  </ul> 
                  <?php
                } else {
                  ?>
                    <ul class="nav navbar-nav navbar-right">
        
    
                       <li><a href="index.php">Log in</a></li>
                  
                  </ul> 
                  <?php
                  }
                  ?>
                  
                
            </div>
         
         </div>
     </nav>

    <br><br>
    