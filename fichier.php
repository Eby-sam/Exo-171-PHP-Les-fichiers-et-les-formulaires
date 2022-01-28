<?php

$allowedMimeTypes = ["image/png", "image/jpeg", "image/gif"];
if (!is_dir("uploads")) {
    mkdir("uploads", "0755");
}

foreach ($_FILES as $file) {
    if ($file["error"] === 0) {
        if (in_array($file["type"], $allowedMimeTypes) && (int)$file["size"] <= (3 * 1024 *1024)) { //3Mo
            move_uploaded_file($file["tmp_name"], "uploads/".getRandomName($file["name"]));
        }
        else {
            echo "Vous avez fourni un mauvais type de fichier ou bien le fichier est trop volumineux !";
        }
        header("Location: index.php?s=c3VjY2Vzcwo=");
    }
    else {
        echo "Une erreur est survenu en uplodant le fichier".$file["name"];
        header("Location: index.php?e=ZXJyb3I=");
    }
}

function getRandomName(String $regularName): String {
    $infos = pathinfo($regularName);
    try {
        $bytes = random_bytes(15);
    }
    catch (Exception $e) {
        $bytes = openssl_random_pseudo_bytes(15);
    }
    return bin2hex($bytes).".".$infos["extension"];
}
