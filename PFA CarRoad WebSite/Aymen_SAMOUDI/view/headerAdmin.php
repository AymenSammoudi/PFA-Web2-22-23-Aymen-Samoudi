
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    
   
    <title> <?php echo $pagetitle; ?> </title>
    <link rel="icon" href="image/logo.svg">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    
    
     <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/stylesheet.css">
       <link rel="stylesheet" href="css/test/bootstrap.min.css">
  
  
  </head>
  <body>

    <div class="wrapper d-flex align-items-stretch">
     
      
        <nav id="sidebar">
           <div id="sidebar-wrapper"> 
           
        <div class="p-4 pt-5">
          <img src="image/logo.svg" alt="logo CAR ROAD" class="logoimage">
            <ul class="list-unstyled components">
               <?php 
               if(isset($_SESSION['idAdmin'])){
              ?>
              <li class="nav-item">
                <a class="nav-link text-dark" href="index.php?controller=admin&action=clients">
                  <i class="fas fa-users fa-lg"></i>
                  Clients
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="index.php?controller=admin&action=agences">
                  <i class="fas fa-users-cog fa-lg"></i>
                  Agences
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="index.php?controller=admin&action=list_confirmer">
                  <i class="fas fa-check-double fa-lg"></i>
                  Transaction Confirmer
                </a>
              </li>
              <?php } ?>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-dark">
              <span style="color: #007bff;">Espace d'administrateur</span>
              <a class="d-flex align-items-center text-dark" href="#">
                <span data-feather="plus-circle"></span>
              </a>
            </h6>
           </ul>

            </div>
        </div>
        </nav>
  
     <div id="content">
       
     <nav class="navbar navbar-expand-lg navimg">
      
        <div class="container-fluid">
       
      <button type="button" id="sidebarCollapse" class="btn btn-outline-light">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
    
          <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-light" href="#">CAR ROAD</a>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
         <ul class="nav navbar-nav ml-auto">
            <?php if(isset($_SESSION['idAdmin'])){
          echo '<li class="nav-item"><form action="index.php?controller=admin&action=loggedoutadmin" method="post">
                 <div class="text-light font-weight-bold"><i class="fas fa-user-tie fa-lg"></i> '.$_SESSION['pseuAdmin'].'&nbsp;
          <button type="submit" name="logout-admin-submit" class="btn btn-warning btn-sm"><i class="fas fa-sign-out-alt"></i></button></div>
        
           </form>
           </li>';
        }
       ?>
         </ul>
    </div>

</div>
    
</nav>


