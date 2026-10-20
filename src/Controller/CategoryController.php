<?php

namespace App\Controller;

use App\Controller\AbstractController;

class CategoryController extends AbstractController
{
    public function addCategory() {

        if (isset($_POST["submit"])) {
            if (!empty($_POST["category_name"])) {
                $data["msg"] = "Vous avez ajouté la catégorie " . $_POST["category_name"] . ".";
            } else {
                $data["msg"] = "Veuillez remplir le champ.";
            }
        } else { $data["msg"] = "";}

        return $this->render('add_category', 'Catégorie', $data);
    }
}