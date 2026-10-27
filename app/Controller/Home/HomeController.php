<?php

namespace App\Controller\Home;

use App\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index(array $requestData): void
    {
        $this->render('home/home.php');
    }
}

?>
