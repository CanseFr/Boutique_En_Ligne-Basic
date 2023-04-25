<?php

    $client = true;
    include_once("header.php");
    include_once("main.php");

    if(!empty($_POST)){
        $query = "UPDATE client SET  nom=:nom, ville=:ville, telephone=:tel WHERE idclient=:id";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["nom"=>$_POST["inputnom"],"ville"=>$_POST["inputville"],"tel"=>$_POST["inputtel"],"id"=>$_POST["myid"]]);
        header("Location:clients.php");
        }

    if(!empty($_GET["id"])){
        $query = "SELECT * FROM client WHERE idclient=:id";
        $pdostmt = $pdo->prepare($query);
        $pdostmt->execute(["id"=>$_GET["id"]]);
        while($row=$pdostmt->fetch(PDO::FETCH_ASSOC)):
 
    ?>

    <h1 class="mt-5">Modifier un client</h1>

    <!--Formulaire-->
    <form class="row g-3" method="POST">

    <input type="hidden" name="myid" value="<?php echo $row["idclient"] ?>">

        <div class="col-md-6">
            <input type="text" class="form-control" id="inputnom" name="inputnom" placeholder="Nom..." value="<?php echo $row["nom"]?>" required>
        </div>

        <div class="col-md-6">
            <input type="text" class="form-control" id="inputville" name="inputville" placeholder="Ville..." value="<?php echo $row["ville"]?>" required>
        </div>

        <div class="col-12">
            <input type="tel" class="form-control" id="inputtel" name="inputtel" placeholder="Téléphone..." value="<?php echo $row["telephone"]?>" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>

    </form>

    </div>
    </main>

    <?php 
        endwhile;
        $pdostmt->closeCursor();
    }
    ?>

<?php

    include_once("footer.php")
    
?>