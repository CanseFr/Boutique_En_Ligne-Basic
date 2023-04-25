<?php

    $client = true;
    include_once("header.php");
    include_once("main.php");

    if(!empty($_POST["inputnom"]) && !empty($_POST["inputville"]) && !empty($_POST["inputtel"])){
        $query = "INSERT INTO client(nom,ville,telephone) VALUES (:nom,:ville,:tel)";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["nom"=>$_POST["inputnom"], "ville"=>$_POST["inputville"], "tel"=>$_POST["inputtel"]]);
        $pdostmt->closeCursor();
        header("Location:clients.php");
    }
 
?>

<h1 class="mt-5">Ajouter un client</h1>

<!--Formulaire-->
<form class="row g-3" method="POST">

    <div class="col-md-6">
        <input type="text" class="form-control" id="inputnom" name="inputnom" placeholder="Nom..." required>
    </div>

    <div class="col-md-6">
        <input type="text" class="form-control" id="inputville" name="inputville" placeholder="Ville..." required>
    </div>

    <div class="col-12">
        <input type="tel" class="form-control" id="inputtel" name="inputtel" placeholder="Téléphone..." required>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>

</form>

</div>
</main>

<?php

    include_once("footer.php")
    
?>