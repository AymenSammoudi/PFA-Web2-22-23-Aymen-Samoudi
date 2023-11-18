<div class="container" style="margin-top: 4rem;">
    <h1 style="margin-bottom: 3rem;">Insérée Une Voiture</h1>
    <form method="post" action="index.php?controller=agence&action=insertsubmit" enctype="multipart/form-data">

      <div class="row flex">
        <div class="col"> 
          <div class="form-group row">
            <div class="col-md-6">
              <label style="color: #cb1703;" for="marque">Marque</label>
              <input type="text" name="marquev" class="form-control" id="marque" aria-describedby="marqueHelp" placeholder="Votre Marque">
          </div>
            <div class="col-md-6">
              <label for="Immat" style="color: #cb1703;">Immatriclation</label>
              <input type="text" name="immatri" class="form-control" id="Immat" aria-describedby="ImmatriculationHelp" placeholder="Votre Immatriclation" pattern="[0-9]{3} Tun [0-9]{4}">
              <small>Exemple: 100 Tun 1100<br></small>
            </div>
          </div>
          
          <div class="form-group row">
            <div class="col-md-6">
              <label for="prix" style="color: #cb1703;">Prix Par Jour</label>
              <input type="number" name="prixj" min="1" step="0.5" class="form-control" id="prix" aria-describedby="prixpjourHelp" placeholder="Le prix par jours">
            </div>
            <div class="col-md-6">
              <label for="exampleFormControlSelect1" style="color: #cb1703;">Genre</label>
              <select class="form-control" id="exampleFormControlSelect1" name="genre">
                <option>Economique</option>
                <option>Intermediaire</option>
                <option>Premium</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label for="descri" style="color: #cb1703;">Description</label>
              <textarea class="form-control" name="descri" id="descri" rows="5" placeholder="Votre Description"></textarea>
            </div>
            <div class="col-md-6">
              <div class="custom-file" style="margin-top: 2rem;">
                <input type="file" class="custom-file-input" id="img" name="img">
                <label class="custom-file-label" style="color: #cb1703;" for="img">Choisir votre image</label>
              </div>
            </div>
          </div>

          <div style="margin-top: 3rem;">
            <button type="submit" name="testdb" class="btn btn-primary btn-md active" >Enregistré</button>
          </div>
        </div>
      </div>
  </form>
</div>




