<?php
include __DIR__ . "/../shared/header.html.php";
?>
<div class="container">
    <p id="demo"></p>
    <h5 class="text-secondary">Ajouter un nouveau stagiaire</h5>
    <br />
    <form action="" method="post">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="text-secondary">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="entrez le nom" required>
            </div>
            <div class="form-group col-md-6">
                <label class="text-secondary">Prenom</label>
                <input type="text" class="form-control" name="prenom" placeholder="entrez le prenom" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="text-secondary">Nationalite</label>
                <select id="mySelect" onchange="myFunction()" class="form-control" name="nationalite" required>
                    <option> </option>
                    <?php
                    for ($i = 0; $i <= count($listeDesNationalites) - 1; $i++) { ?>
                        <option value="
           <?= $listeDesNationalites[$i]->getIdNationalite() ?>
           ">
                            <?= $listeDesNationalites[$i]->getLibelleNationalite();
                                ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label class="text-secondary">Formation</label>
                <select id="f" onchange="myFunction()" class="form-control" name="formation" required>
                    <option> </option>
                    <?php
                    for ($i = 0; $i <= count($listeDesFormations) - 1; $i++) { ?>
                        <option value="
           <?= $listeDesFormations[$i]->getIdFormation() ?>
           ">
                            <?= $listeDesFormations[$i]->getLibelleFormation();
                                ?></option>
                    <?php } ?>
                </select>


            </div>
        </div>
        <div class="form-group">
            <label class="text-secondary">Formateurs par dates :</label>
            <?php
            for ($i = 0; $i <= count($listeDesCours) - 1; $i++) { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="cours[]" multiple="multiple" value="<?= $listeDesCours[$i]->getIdCours() ?>">
                    <input type="hidden" name="id_formation" value="<?= $listeDesCours[$i]->getIdFormation(); ?>">
                    <label class="form-check-label"><?= " "
                                                            . $listeDesCours[$i]->getNomFormateur()
                                                            . " dans la salle "
                                                            . $listeDesCours[$i]->getSalleCours()
                                                            . " du "
                                                            . $listeDesCours[$i]->getDateDebut()
                                                            . " au "
                                                            . $listeDesCours[$i]->getDateFin()
                                                        ?></label>

                </div><?php } ?>
        </div>
        <br />
        <input type="submit" name='insert' value="ajouter" class="btn btn-primary">

    </form>
</div>


<?php
include __DIR__ . "/../shared/footer.html.php";
?>