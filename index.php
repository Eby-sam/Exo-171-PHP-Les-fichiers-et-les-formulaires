<?php

/**
 * 1. Créez un formulaire classique contenant un champs input de type file
 * 2. Faites pointer l'action sur la page fichier.php ( que vous créerez )
 * 3. Gérez l'upload du fichier, le fichier doit être stocké dans le répertoire upload de votre site
 * 4. Gérez tous les cas de figure:
 *    - Le fichier doit être une image
 *    - On ne peut pas uploader de fichier image de plus de 3Mo
 *    - Les fichiers doivent être renommés
 *    - Affichez les erreurs sur la page index.php s'il y en a ( fichier non présent, erreur d'upload, etc... )
 * ( BONUS )
 * 5. Une fois l'upload terminé, enregistrez le nom du fichier uploadé dans le fichier file.json ( que vous créerez s'il n'existe pas )
 *    Attention, trouvez une solution pour que le fichier contienne du JSON valide !
 * 6. Affichez sur la page index les fichiers ayant déjà été uploadés.
 */

?>

    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Les fichiers et les formulaires</title>
    </head>
    <body>

        <form action="fichier.php" method="post" enctype="multipart/form-data">
            <label for="id-fichier"> Choisissez une image</label>
            <input type="file" name="fichierUtilisateur" id="id-fichier" accept="image/png, image/jpeg, image/gif">
            &nbsp;(Max 3Mo)<br>
            <input type="submit" value="Envoyer">
        </form>

    </body>
    </html>

<?php
    if (isset($_GET['e'])) {
        echo "Une erreur est survenu en uplodant le fichier";
    }
    elseif (isset($_GET["s"])){
        echo "Le fichier a bien été uploder !";
    }