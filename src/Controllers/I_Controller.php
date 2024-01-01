<?php
namespace OlineShop\Controllers;

interface I_Controller
{
    public function indexAction(): string; //GET request
    public function editAction(): void; //POST request
    public function deleteAction($id): void; //GET request
    public function addAction(): void; //POST request

}
