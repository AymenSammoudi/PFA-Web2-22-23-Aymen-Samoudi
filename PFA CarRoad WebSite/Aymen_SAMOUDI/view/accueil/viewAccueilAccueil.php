
<main role="main">
	<!-------------------Carousel---------------->

  <div class="container">
  
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/slideImage1.jpg" class="d-block w-100 tales" alt="...">
      
    </div>
    <div class="carousel-item">
      <img src="image/slideImage2.jpg" class="d-block w-100 tales" alt="...">
      
    </div>
    <div class="carousel-item">
      <img src="image/slideImage3.jpg" class="d-block w-100 tales" alt="...">
     
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <i class="fas fa-arrow-circle-left fa-lg" aria-hidden="true"></i>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
     <i class="fas fa-arrow-circle-right fa-lg" aria-hidden="true"></i>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<!------------------------------------------------------------------>
   <div class="container marketing">
     <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
       
        <br>
        <h2 class="featurette-heading" style="color: #cb1703;">RÉSERVEZ UNE VOITURE DE LOCATION EN LIGNE AU MEILLEUR PRIX</h2>
        <p class="lead">Dans notre site vous déniche les meilleurs prix location voiture en tunisie sur des véhicules neufs. Pour un déplacement professionnel ou pour des vacances, faites votre réservation en ligne et sélectionnez l’offre qui vous convient le mieux.

        Partout où vous irez, Ce site vous offre le meilleur service pour une location auto pas cher qui vous permet de découvrir les différentes villes tunisiennes : Tunis, Hammamet, Sousse, Djerba, Monastir, Sfax, etc...</p>
      </div>
      <div class="col-md-5">
        <img src="image/rent_on.jpg" class="image-respon" alt="description de location">
      </div>
    </div>
     <hr class="featurette-divider">

       <div class="row featurette">
      <div class="col-md-7 order-md-2">
        
        <br>
        <h2 class="featurette-heading" style="color: #cb1703;">Louer un véhicule en Tunisie</h2>
        <p class="lead">Des vacances de rêve. Sans la contrainte du transport. Voilà ce que notre agence de location de voitures vous propose. Disposant d’un grand parc automobile réunissant toutes sortes de véhicules de location : premiums, citadines, utilitaires et voitures de luxe, CAR ROAD arrive à satisfaire une clientèle des plus exigeantes.</p>
      </div>
      <div class="col-md-5">
        <img src="image/woman-1853936__340.jpg" class="image-respon" alt="description de location">
      </div>
    </div>
    <hr class="featurette-divider">

<div class="row"> 
 <div class="col">
    <div class="roundstat"><p class="valuesstat" ><?= Model::count_client() ?></p></div>
    <p class="textalign" >Nombre De Client</p>
  </div>
   <div class="col">
    <div class="roundstat"><p class="valuesstat"><?= Model::count_agence() ?></p></div>
    <p class="textalign">Nombre D'agence</p>
  </div>
  <div class="col">
    <div class="roundstat"><p class="valuesstat" ><?php require_once('viewVisitorAccueil.php');?></p></div>
    <p class="textalign" >Visiteurs En Ligne</p>
  </div>
 </div>

<hr class="featurette-divider">
 </div>

</main>

<!-- Footer -->
<br>
<br>

<div class="container">
  <div class="back-footer">
<footer class="page-footer font-small unique-color-dark">

  <div style="background: #f8a807 !important;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0 text-white">Connectez-vous avec nous sur les réseaux sociaux!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f fa-lg text-white mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter fa-lg text-white mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g fa-lg text-white mr-4"> </i>
          </a>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  
<div class="container text-center text-md-left mt-5">
  
    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <img src="image/logo.svg" alt="logo CAR ROAD" class="logoimage">
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 240px;">

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Services Clients</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#" class="text-dark">Aide</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="#">Your Account</a>
        </p>
        <p>
          <a href="#">Help</a>
        </p>
        <p>
          <a href="index.php?controller=admin">Espace d'administrateur</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contactez-nous</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> Regueb Sidi Bouzid</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> aymen.samoudi@esen.tn</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 216 66 666 666
        </p>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->
   </div>
 
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">&copy; Tous droits réservés par CAR ROAD</div>
  <div class="footer-copyright text-center py-3">2022/2023 - Site de location en ligne développé par Aymen Samoudi</div>

  
  <!-- Copyright -->

</footer>
<!-- Footer -->
 </div>
</div>