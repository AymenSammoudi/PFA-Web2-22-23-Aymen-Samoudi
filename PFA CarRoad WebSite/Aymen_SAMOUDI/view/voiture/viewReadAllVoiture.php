 
 <div class="container">

        <div class="row">

            <div class="col-lg-12">
             <!--Filtre les voitures --->           
             <ul class="filters text-center">
               <li class="active" data-filter="*"><a href="#!">Tout</a></li>
               <li data-filter=".Economique"><a href="#!">Economique</a></li>
               <li data-filter=".Intermediaire"><a href="#!">Intermediaire</a></li>
               <li data-filter=".Premium"><a href="#!">Premium</a></li>
            </ul> 
     <!------les grid------> 
       <div class="projects">
            <div class="row">
<?php
if (is_array($voit) || is_object($voit))
{
  foreach ($voit as $voiture){ ?>   
    
  <div class="item <?= $voiture->genre()?> col-md-4">
 <a href="index.php?controller=voiture&action=detail&id=<?=$voiture->id_voiture()?>">
  <div class="card cardstyle" style="width: auto;">
    
    <!---formulaire pour ajout une voiture a réservation dans fichier cart.php----->
    
      <form method="post" action="index.php?controller=client&id=<?=$voiture->id_voiture()?>&action=semi_reservation">
        
           
             <div class="card-head">
               <img class="card-img-top" src=<?= $voiture->img() ?> >
                 
             </div>
            
            
            
           <div class="card-body">
            <div class="inlinetext">
                <font class="text-capitadivlize"><?= $voiture->marque() ?></font>
                <font class="textfont-right"><?= $voiture->prix_parj()." DT"  ?></font>
          
            </div> 
             
            <?php if($voiture->statut() == 'Occupee'){ ?>
                   <p class="text-danger text-center font-weight-bold"><?= $voiture->statut() ?></p>

                <?php }
                else{  ?>
                  <p class="text-success text-center font-weight-bold"><?= $voiture->statut() ?></p>
             <?php }?>
         </div>
 
     
     </form> 

   </div>
 </a>
 </div>

<?php
  }
}
?>
   </div>
                 </div>

			 </div>
		</div>	   
  </div>
