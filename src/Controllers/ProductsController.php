<?php

namespace OlineShop\Controllers;

class ProductsController
{
    public function indexAction(): string
    {
        $id = $this->getRequestParameter('id');
        $product = new Products();
        $this->dataToRender['product'] = $product->findById($id);
        echo $this->view->render("index", $this->dataToRender);
    }
    public function editAction(): void
    {
        //TODO: implements editAction() method

    }
    public function deleteAction($id): void
    {
        //TODO: implements deleteAction() method

    }
    public function addAction(): void
    {
        //TODO: implements addAction() method

    }

}