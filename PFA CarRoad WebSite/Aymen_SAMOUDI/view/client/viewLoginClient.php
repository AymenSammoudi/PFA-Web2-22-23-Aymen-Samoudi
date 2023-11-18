

  <body class="bgimg">

   <div class="container">
      <div class="card mx-auto col-lg-4" style="background-color: rgba(0, 0, 0, 0.678); width: 400px !important">
        <div class="card-header text-center" style="color: white;">Connecter en tant que utilisateur</div>
       <br>
        <div class="text-center">
          <img src="image/avatar-icon-png-17.png" class="rounded" alt="avatar utilisateur">
        </div>

        <div class="card-body">
	 
             <form action="index.php?controller=client&action=formlogin" method="post" class="form-signin">
             <div class="form-group">
                <label for="" style="color: #cb1703;">Email</label>
                <input type="text" name="mailpseudo_c" class="form-control" placeholder="Addresse mail..." />
            </div>
            <div class="form-group">
                <label for="" style="color: #cb1703;">Mot de passe</label>
                <input type="password" name="pwdin_c" class="form-control" placeholder="Mot de passe..." />
           </div>
            <div class="text-center">
             <button type="submit" class="btn btn-default" style="color: #fff;" name="login_client-submit">Login</button>
              <a href="index.php?controller=client&action=registre" class="btn btn-primary btn-md active">Registre</a>
            </div>
           </form> 
        </div>
      </div>
   </div>
    </body>
