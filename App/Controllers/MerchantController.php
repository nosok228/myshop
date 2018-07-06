<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\MerchantModel;


class MerchantController extends Controller
{
    public function cartAction()
    {
        $merchantModel = new MerchantModel();
        
        $products = $merchantModel->getCartProducts();

        $this->view->render('cart', ['products' => $products]);

        return true;
    }

    public function buyAction()
    {

    }
}