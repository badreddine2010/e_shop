<?php
require_once("../ctrl/init.ctrl.php");
require_once("../ctrl/header.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- AFFICHAGE DES CATEGORIES ---//
$categories_des_produits = executeRequete("SELECT DISTINCT categorie FROM produit");
echo '<div id="header">';
echo'<nav class="navbar navbar-expand-lg navbar-light bg-light">';
echo '<div class="container">';

while($cat = $categories_des_produits->fetch_assoc())
{
	echo"<a href='../vue/vitrine.php?categorie="	. $cat['categorie'] . "'>" . $cat['categorie'] . "</a>";
}

echo"</nav>";


//--- AFFICHAGE DES PRODUITS ---//
echo'<div class="boutique-milieu">';

if(isset($_GET['categorie']))
{
	$donnees = executeRequete("SELECT id_produit,reference,titre,photo,prix FROM produit WHERE categorie='$_GET[categorie]'");	
	while($produit = $donnees->fetch_assoc())
	{
	

echo'<div class="card" style="width: 16rem;">';
echo"<a href=\"fiche_produit.php?id_produit=$produit[id_produit]\"><img src=".RACINE_SITE.$produit['photo']." width=\"130\" height=\"188\" class='card-img-top'/></a>";
echo '<div class="card-body">';
echo "<h5 class='card-title'>$produit[titre]</h5>";
echo"<p>$produit[prix] €</p>";
echo'<a href="fiche_produit.php?id_produit=' . $produit['id_produit'] . '" class="btn btn-primary">Voir la fiche</a>';
echo'</div>';
echo'</div>';
	}}
?>
<head>
<link rel="stylesheet" href="<?php echo RACINE_SITE; ?>ctrl/css/style1.css" />
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<?php
 require_once("../ctrl/footer.php");?>




