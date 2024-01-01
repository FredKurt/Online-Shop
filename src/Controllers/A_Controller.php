<?php

namespace OlineShop\Controllers;

use OlineShop\App\View;

abstract class A_Controller implements I_Controller
{
const ONLINE_SHOP = " Online Shop LaFabrik of Maryah";
protected View $view;
protected array $dataToRender = [];
public function __construct(View $view) {
    $this->view = $view;
    $this->dataToRender["pageTitle"] = self::ONLINE_SHOP;
}

abstract protected function indexAction(): void; //GET request
abstract protected function editAction(): void; //POST request
abstract protected function deleteAction(): void; //GET request;
abstract protected function addAction(): void;//POST request;

    protected function checkAccess() {
        if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
            header('location: /login');
        }
    }

public function __call($name, $args)
{
    if(method_exists($this, $name))
    {

        //Input data validation
        $this->validateInputs();
        $this->view->setActionNameForViews(str_replace('Action', '', $name));
        $classNameSpaceWithName = get_class($this);
        $className = str_replace('OlineShop\Controllers\\', $classNameSpaceWithName);
        $this->view->setClassNameForViews(str_replace('Controller', '', get_class($this)));
        return call_user_func_array(array($this, $name), $args);
    }
}

private function validateInputs(): void
{
    if(!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $value = htmlspecialchars($value);
            $_POST[$key] = $value;
        }
    }

}

protected function getRequestParameter(string $param) {
        $paramToReturn = '';
        $requestUrl = $_SERVER['REQUEST_URL'];
        $regExp = "^/{".$param."}$";
        if(preg_match($regExp, $requestUrl, $match)) {
            $paramToReturn = $match[1] ?? '';

        }
        return $paramToReturn;
}

}
