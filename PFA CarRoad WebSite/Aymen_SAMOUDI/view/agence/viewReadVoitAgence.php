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
  foreach ($voit as $voiture){
    ?>   
   
  <div class="item <?= $voiture->genre()?> col-lg-4">
  <div class="card cardstyle" style="width: 19rem;">
 
      <form method="post" action="index.php?controller=agence&action=readVoit&delt=supprimer&id=<?=$voiture->id_voiture()?>">
            <center>
      
         <img class="card-img-top" style="height: 180px" src=<?= $voiture->img() ?> >
      
         <div class="card-body">
             <h5 class="card-title"><?= $voiture->marque() ?></h5>
              <h6 class="card-text"><?= $voiture->prix_parj()." DT" ?></h6>
          
             
              <p class="card-text"><?php if($voiture->statut() == 'Occupee'){ ?>
                   <p class="text-danger"><?= $voiture->statut() ?></p>
                     
                <?php }
                else{  ?>
                  <p class="text-success"><?= $voiture->statut() ?></p> 
              </p>   
             <?php }?>
             <?php if($voiture->statut() == 'Libre'){ ?>
             <button class="btn btn-danger" type="submit" name="suppvoit" title="Supprimer" onclick="return confirm('Vous avez supprimer?')"><i class="fas fa-trash-alt"></i></button>
              
      <!-- Button trigger modal -->
           <a href="index.php?controller=agence&action=ediit&id=<?=$voiture->id_voiture()?>" class="btn btn-success" title="Modifier"><i class="fas fa-edit"></i></a>

           <?php } if($voiture->statut() == 'Occupee'){ 
          
              
              Model::check_statut_voiture($voiture->id_voiture());
            if($_SESSION['stat']=='En attent'){ ?>
            
          <a class="btn btn-success" type="button" href="index.php?controller=agence&action=accept&id=<?= $voiture->id_voiture() ?>" title="Accepter" onclick="return confirm('Vous avez accepter')"><i class="fas fa-check-square"></i></a>  
          <a class="btn btn-danger" type="button" href="index.php?controller=agence&action=annuler&id=<?= $voiture->id_voiture() ?>" title="Annuler" onclick="return confirm('Vous avez annuler')"><i class="fas fa-window-close"></i></a>

      <?php
           } ?>
           <a class="btn btn-primary" type="button" href="index.php?controller=agence&action=sync&id=<?= $voiture->id_voiture() ?>" title="Mise a Jours Votre Voiture"><i class="fas fa-sync"></i></a>

          <a class="btn btn-info" type="button" href="index.php?controller=agence&action=info_client&id=<?= $voiture->id_voiture() ?>" title="Information de client loyer"><i class="fas fa-info-circle"></i></a>
         
            <?php } ?>

     <!-- Modal -->

    
    <!--------------------------------------------------->



       

    </center>
      </form>
  
</div>
 </div>

<?php
  }
?></div><?php
}
?>
  </div>
                 </div>

       </div>
    </div>     
