<h2>Produits</h2>

<div class="row">
  <!-- Filtres -->
  <div class="col-lg-3">

    <p class="lead">Recherche</p>
    <input type="text" class="form-control" placeholder="Rechercher un produit"/>
    <hr/>

    <p class="lead">Catégorie</p>
    <!-- TODO: afficher toutes les catégories de la base de données -->
    <hr/>

    <p class="lead">Prix</p>
    <input type="radio" name="prix" value="asc"> Croissant<br/>
    <input type="radio" name="prix" value="desc"> Décroissant<br/>
  </div>

  <!-- Liste -->
  <div class="col-lg-9">
    <div class="card-columns">

      <!-- TODO: générer des "card" comme ci-dessous pour chaque produit de la base de données -->
      <div class="card">
        <img class="card-img-top" src="#" alt="Image produit" style="padding: 1em" />
        <div class="card-body">
          <h6 class="card-subtitle text-muted">Categorie</h6>
          <h5 class="card-title">Produit</h5>
          <p class="font-weight-light float-left" style="font-size:1.5em">Prix €</p>
          <p class="float-right">
            <a href="#" class="btn btn-primary"><span class="oi oi-eye"></span></a>
          </p>
        </div>
      </div>

    </div>
  </div>
</div>
