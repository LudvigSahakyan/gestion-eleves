<?php
include __DIR__ . "/../shared/header.html.php";
?>

<div class="container">
    <h5 class="text-secondary">Supprimer les données</h5>
    <br />
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nationalite</th>
                <th scope="col">Formation</th>
                <th scope="col">Formateurs par date</th>
                <th scope="col">Suppression</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i <= count($listeDesStagiaires) - 1; $i++) {
                ?>
                <tr>
                    <form action="" method="post">
                        <input type="hidden" name="id_stagiaire" value="<?= $listeDesStagiaires[$i]->getIdStagiaire(); ?>">
                        <td><?= $listeDesStagiaires[$i]->getNomStagiaire(); ?>
                        </td>
                        <td><?= $listeDesStagiaires[$i]->getPrenomStagiaire(); ?>
                        </td>
                        <td><?= $listeDesStagiaires[$i]->getLibelleNationalite(); ?>
                        </td>
                        <td><?= $listeDesStagiaires[$i]->getLibelleFormation(); ?>
                        </td>
                        <td><?php $listeDesCours = $repositoryB->selectById($listeDesStagiaires[$i]->getIdStagiaire());
                                for ($a = 0; $a <= count($listeDesCours) - 1; $a++) {

                                    if ($listeDesStagiaires[$i]->getIdStagiaire() === $listeDesCours[$a]->getIdStagiaire()) {
                                        ?>
                                    <?=
                                                    $listeDesCours[$a]->getNomFormateur()
                                                        . ", salle " . $listeDesCours[$a]->getSalleCours()
                                                        . ", du " . $listeDesCours[$a]->getDateDebut()
                                                        . " au " . $listeDesCours[$a]->getDateFin() . "<br/>"; ?>
                            <?php }
                                } ?></td>
                        <td><input type="submit" name='delete' value="supprimer" class="btn btn-primary"></td>
                    </form>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php
include __DIR__ . "/../shared/footer.html.php";
?>