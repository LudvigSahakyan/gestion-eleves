<?php
include __DIR__ . "/../shared/header.html.php";
?>

<div class="container">
    <h5 class="text-secondary">Mettre à jour les données</h5>
    <br />

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nationalite</th>
                <th scope="col">Formation</th>
                <th scope="col">Formateurs par date</th>
                <th scope="col">Mise à jour</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i <= count($listeDesStagiaires) - 1; $i++) {
                ?>
                <tr>
                    <form action="" method="post">
                        <input type="hidden" name="id_stagiaire" value="<?= $listeDesStagiaires[$i]->getIdStagiaire(); ?>">
                        <td>

                            <input type="text" class="form-control" name="nom" value="<?= $listeDesStagiaires[$i]->getNomStagiaire(); ?>" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="prenom" value="<?= $listeDesStagiaires[$i]->getPrenomStagiaire(); ?>" required>
                        </td>
                        <td>
                            <select class="form-control" name="nationalite" required>
                                <?php
                                    for ($a = 0; $a <= count($listeDesNationalites) - 1; $a++) { ?>
                                    <option value="<?= $listeDesNationalites[$a]->getIdNationalite() ?>" <?php if ($listeDesStagiaires[$i]->getLibelleNationalite() == $listeDesNationalites[$a]->getLibelleNationalite()) {
                                                                                                                        echo "selected";
                                                                                                                    } ?>>
                                        <?= $listeDesNationalites[$a]->getLibelleNationalite(); ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="formation" required>
                                <?php
                                    for ($b = 0; $b <= count($listeDesFormations) - 1; $b++) { ?>
                                    <option value="<?= $listeDesFormations[$b]->getIdFormation() ?>" <?php if ($listeDesStagiaires[$i]->getLibelleFormation() == $listeDesFormations[$b]->getLibelleFormation()) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
                                        <?= $listeDesFormations[$b]->getLibelleFormation(); ?></option>
                                <?php } ?>
                            </select>

                        </td>
                        <td>
                            <?php
                                for ($c = 0; $c <= count($listeDesCours) - 1; $c++) { ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="cours[]" multiple="multiple" value="<?= $listeDesCours[$c]->getIdCours() ?>" <?php for ($d = 0; $d <= count($listeDesCoursStagiaires) - 1; $d++) {
                                                                                                                                                                                    if ($listeDesStagiaires[$i]->getIdStagiaire() === $listeDesCoursStagiaires[$d]->getIdStagiaire()) {
                                                                                                                                                                                        if ($listeDesCours[$c]->getIdCours() === $listeDesCoursStagiaires[$d]->getIdCours()) {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        }
                                                                                                                                                                                    }
                                                                                                                                                                                } ?>>
                                    <label class="form-check-label"><?= " "
                                                                                . $listeDesCours[$c]->getNomFormateur()
                                                                                . " dans la salle "
                                                                                . $listeDesCours[$c]->getSalleCours()
                                                                                . " du "
                                                                                . $listeDesCours[$c]->getDateDebut()
                                                                                . " au "
                                                                                . $listeDesCours[$c]->getDateFin()
                                                                            ?></label>

                                </div><?php } ?>
                        </td>
                        <td><input type="submit" name='update' value="modifier" class="btn btn-primary"></td>
                    </form>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php
include __DIR__ . "/../shared/footer.html.php";
?>