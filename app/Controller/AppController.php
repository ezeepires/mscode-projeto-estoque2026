<?php

namespace App\Controller;

class AppController extends AbstractController
{
    public function index(array $requestData): void
    {
        $this->render('login/login.php', [
            // passar dados para a view
        ]);
    }
}
