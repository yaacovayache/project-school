<?php if( $_SESSION["role"] === "owner" || ($_SESSION["role"] === "manager" && $Admin->role == "sales")){ ?>
    <button class="btn btn-primary" onclick="loadAdminEditForm(<?= $Admin->id ?>)">Edit</button>
    <button class="btn btn-danger" onclick="choiceDelete('DeleteAdmin','loadAdmin', <?= $Admin->id ?>)">Delete</button>
<?php } ?>

<h1><?= $Admin->name ?></h1>
<h3><?= $Admin->role ?></h3>
<h2><?= $Admin->phone ?></h2>
<h2><?= $Admin->email ?></h2>

<?php if(!empty($Admin->image)) { ?>
<img style="width:150px; height:150px;" src= "<?=$Admin->image ?>" alt="Photo not available">
<?php } ?>

