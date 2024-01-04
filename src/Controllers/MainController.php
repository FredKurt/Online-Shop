<?php

namespace OlineShop\Controllers;
use OlineShop\Entities\Products;
use OlineShop\Entities\Users;



class MainController extends A_Controller
{
    const NUMBER_OF_PRODUCTS_ON_THE_MAIN_PAGE = 9;
    protected function indexAction(): string
    {

        $products = new Products();
        $productList = $products->findALL();
        $productList = array_slice($productList, 0, self::NUMBER_OF_PRODUCTS_ON_THE_MAIN_PAGE);
        $this->dataToRender['products'] = $productList;
        $this->view->render('index', $this->dataToRender);
    }
    protected function editAction(): void
    {
        //TODO: implements editAction() method
    }
    protected function deleteAction($id): void
    {
        //TODO: implements deleteAction() method

    }
    protected function addAction(): void
    {
        //TODO: implements addAction() method

    }

    protected function pageNotFoundAction(): void
    {
        $this->dataToRrender['pageTitle'] = "page not found!!";
        $this->view->render('404', $this->dataToRender);
    }

}