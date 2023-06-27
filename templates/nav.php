<nav class="navbar navbar-expand-lg sticky-top">
<div class="container-fluid bg-district">
    <a class="navbar-brand" href="#"><img src="images_the_district/the_district_brand/logo.png" alt="The District" id="logo_nav"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link fw-bolder texte-blanc" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bolder texte-blanc" href="index.php?choix=cat">Catégories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bolder texte-blanc" href="index.php?choix=lesplats">Tous les plats</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bolder texte-blanc" href="index.php?choix=contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bolder texte-blanc" href="index.php?choix=Gestion">Gestion</a>
        </li>
      </ul>
    </div>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown3">
      <ul class="navbar-nav">
    
    <?php
        if($_SESSION['Auth'] == 'ok'){
          ?>
      <li class="nav-item">
          Bonjour <?= $_SESSION['firstname'];?>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bolder texte-noir" href="index.php?choix=deconnexion">Déconnexion</a>
        </li>
        <?php 
      }else{
?>
        <li class="nav-item">
          <a class="nav-link fw-bolder texte-blanc" href="index.php?choix=admin">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bolder texte-blanc" href="index.php?choix=show_panier">Panier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bolder texte-blanc" href="index.php?choix=signup">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bolder texte-vert" href="index.php?choix=connexion">Connexion</a>
        </li>

      </ul>
    </div>
    <?php
        } 
     ?>   
     <!-- <div class="justify-content-end" id="navbarNavDropdown4">
      
    </div> -->
  </div>
</nav>