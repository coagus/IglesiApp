<?php
class Controller {
  protected $controller;
  protected $action;

  public function __CONSTRUCT($controller, $action) {
    $this->controller = $controller;
    $this->action     = $action;
  }

  protected function view($view = '') {
    $view = $view == '' ? $this->action : $view;
    $view = __DIR__ . "/../../vie/$this->controller/$view.phtml";

    if (file_exists($view)) {
      require_once $view;
    } else {
      echo "No se encuentra la vista $view";
    }
  }
}
?>
