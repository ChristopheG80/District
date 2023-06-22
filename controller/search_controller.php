<?php

// Charger les libellés des catégories actives et des plats actifs.
// Mettre dans 2 tableaux
// Charger dans la page en javascript
$catnamejs = [];
$conn = connect_bd();
$req="SELECT DISTINCT `libelle` FROM categorie WHERE active='Yes' ORDER BY `libelle`";
if(!$conn->query($req)) echo "pas d'accès à la table";
else{
    foreach($conn->query($req) as $row){
        array_push($catnamejs,$row['libelle']);
    }
}

$platnamejs = [];
$req = "SELECT DISTINCT `libelle` FROM plat ORDER BY `libelle`;";
if(!$conn->query($req)) echo "pas d'accès à la table";
else{
    foreach($conn->query($req) as $row){
        array_push($platnamejs,$row['libelle']);
    }
}
?>
<script>
    let catnamejs=<?= $catnamejs;?>;
    let platnamejs=<?= $platnamejs;?>;
</script>