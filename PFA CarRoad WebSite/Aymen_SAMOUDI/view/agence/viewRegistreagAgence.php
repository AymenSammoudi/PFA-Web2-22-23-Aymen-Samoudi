<body class="bgimg">

   <div class="container">
      <div class="card mx-auto col-lg-6" style="background-color: rgba(0, 0, 0, 0.678); width: 400px !important">
        <div class="card-header text-center" style="color: white;">Register Agence</div>
        <div class="card-body">
   <?php
if(isset($_GET['error'])){
 if ($_GET['error']=="emptyfields") {
   echo '<p style="color: red; text-align: center;"> Les champ est vide!</p>';
 }
 else if($_GET['error']=="invalidmailuname"){
     echo '<p style="color: red; text-align: center;"> Le Pseudo et le mail n\'est pas valide!</p>';
 }
  else if($_GET['error']=="invalidmail"){
     echo '<p style="color: red; text-align: center;"> Invalid email!!</p>';
 }
   else if($_GET['error']=="invaliduname"){
     echo '<p style="color: red; text-align: center;"> Invalid Username!!</p>';
 }
   else if($_GET['error']=="passwordcheck"){
     echo '<p style="color: red; text-align: center;"> Your password do not match!</p>';
 }
  else if($_GET['error']=="usertaken"){
     echo '<p style="color: red; text-align: center;"> Username is already taken!</p>';
 }
}
 else if(isset($_GET['signup'])){
     echo '<p style="color: green; text-align: center;"> Username is already taken!</p>';
}
?>
             <form action="index.php?controller=agence&action=formregistre_agence" method="post">
                <div class="form-group">
                    <label for="" style="color: #cb1703;">Pseudo</label>
                    <input type="text" name="pseudo_ag" class="form-control" placeholder="Pseudo..." />
                </div>
                <div class="form-group">
                    <label for="" style="color: #cb1703;">Nom de l'agnece</label>
                    <input type="text" name="nom_ag" class="form-control" placeholder="Nom..." />
                </div>
        
                  <div class="form-group">
                     <label for="" style="color: #cb1703;">Email</label>
                    <input type="text" name="email_ag" class="form-control" placeholder="Addresse mail..." />
                </div>
                <div class="form-group">
                     <label for="" style="color: #cb1703;">Numero de telephone</label>
                    <input type="text" name="num_ag" class="form-control" placeholder="Numero de telephone..." pattern="[2-9]{2}[0-9]{3}[0-9]{3}" required />
                </div>
                <div class="form-group">
                     <label for="" style="color: #cb1703;">Addresse</label>
                    <input type="text" name="addr_ag" class="form-control" placeholder="Addresse mail..." />
                </div>
                  <div class="form-group">
                    <label for="" style="color: #cb1703;">Mot de passe</label>
                    <input type="password" name="password_ag" class="form-control" placeholder="Mot de passe..." />
                </div>
                <div class="form-group">
                    <label for="" style="color: #cb1703;">Confirmez votre mot de passe</label>
                    <input type="password" name="password_confirm_ag" class="form-control" placeholder="Repetz mot de passe..." />
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-md active" name="registre_agence_submit">M'inscrire</button>
                </div>
              </form>
          

</div>
</div>
</div>
</body>

</html>