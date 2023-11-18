
  <body class="bgimg">

   <div class="container">
      <div class="card mx-auto col-lg-4" style="background-color: rgba(0, 0, 0, 0.678); width: 400px !important">
        <div class="card-header text-center" style="color: white;">Connecter en tant que agence</div>
        <br>
        <div class="text-center">
          <img src="image/avatar-icon2.png" class="rounded" width="304" height="300" alt="avatar utilisateur">
        </div>
        <div class="card-body">
   
             <form action="index.php?controller=agence&action=formlogin_agence" method="post">
             <div class="form-group">
                <label for="" style="color: #cb1703;">Email</label>
                <input type="text" name="mailpseudo_ag" class="form-control" placeholder="Addresse mail..." />
            </div>
            <div class="form-group">
                <label for="" style="color: #cb1703;">Mot de passe</label>
                <input type="password" name="pwdin_ag" class="form-control" placeholder="Mot de passe..." />
           </div>
           <div class="text-center">
             <button type="submit" class="btn btn-default" style="color: #fff;" name="login_agence-submit">Login</button>
              <a href="index.php?controller=agence&action=registreag" class="btn btn-primary btn-md active">Registre</a>
            </div>
           </form> 
          

</div>
</div>
</div>
</body>

