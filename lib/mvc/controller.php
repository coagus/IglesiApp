<?php
require_once __DIR__ . '/../vcl/controller.php';

class ControllerMVC extends Controller {
  protected $object = null;
  protected $objectList = null;
  protected $title;

  protected function view($view = '') {
    $view = $view == '' ? $this->action : $view;
    $dir = __DIR__ . "/../../vie/$this->controller/$view.phtml";

    if (file_exists($dir)) {
      require_once $dir;
    } else {
      if (file_exists(__DIR__  . "/$view.phtml")) {
        if (!is_null($this->object))
        {
          require_once __DIR__ . "/$view.phtml";
        } else {
          echo "NO SE INICIALIZA EL OBJETO: <br>". var_dump($this->object);
        }
      } else {
        echo "No se encuentra la vista $view";
      }
    }
  }

  public function index() {
    $this->objectList = $this->object->getList();
    $this->view();
  }

  public function edit() {
    $view = '';

    if (isset($_REQUEST['Id'])) {
      foreach ($this->object as $key => $value) {
        if ($key == 'Id') {
          $this->object->Id = $_REQUEST['Id'] == "0" ? '' : $_REQUEST['Id'];
        } else {
          $this->object->$key = $_REQUEST[$key];
        }
      }

      $this->object->save();

      $this->objectList = $this->object->getList();
      $view             = 'index';
    }

    if (isset($_REQUEST['IdEdit'])) {
      $this->object = $this->object->getById($_REQUEST['IdEdit']);
    }

    $this->view($view);
  }

  public function delete() {
    if (isset($_REQUEST['Id'])) {
      $this->object->delete($_REQUEST['Id']);
    }

    $this->objectList = $this->object->getList();
    $this->view('index');
  }

  public function is_Date($str) {
    $stamp = strtotime($str);

    if (is_numeric($stamp)) {
      $month = date('m', $stamp);
      $day   = date('d', $stamp);
      $year  = date('Y', $stamp);

      return checkdate($month, $day, $year);
    }

    return false;
  }
}
?>
