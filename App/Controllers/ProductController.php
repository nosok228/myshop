<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\ProductModel;

class ProductController extends Controller
{
    public function indexAction()
    {
        $productModel = new ProductModel();

        $categories = $productModel->getAllCategories();
        $products = $productModel->getAllProducts();

        $this->view->render('index', ['categories' => $categories, 'products' => $products]);

        return true;
    }

    public function categoryAction($id)
    {
        $productModel = new ProductModel();

        $products = $productModel->getProductsByCategoryId($id);
        $categories = $productModel->getAllCategories();

        $this->view->render('index', ['categories' => $categories, 'products' => $products]);
    }

    public function productAction($id)
    {
        $productModel = new ProductModel();

        $product = $productModel->getProductById($id);
        $categories = $productModel->getAllCategories();
        $products = $productModel->getProductByName($_POST['search']);

        if(!$product) {
            $this->view->sendResponce(404);
        }

        $this->view->render('product', ['product' => $product, 'categories' => $categories]);

         foreach($_POST as $key => $value){
             echo $key." => ".$value;
             $_SESSION['products'][$key] = $value;
    }

        return true;
    }

    public function searchAction()
    {
        $productModel = new ProductModel();

        $categories = $productModel->getAllCategories();
        $products = $productModel->getProductByName($_POST['search']);

        $this->view->render('index', ['categories' => $categories, 'products' => $products]);

        return true;
    }
}