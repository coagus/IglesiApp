<?php
require_once __DIR__ . '/../lib/vcl/controller.php';
require_once __DIR__ . '/../mdl/usuario.php';

class HomeController extends Controller {
  public $error = '';

  public function __CONSTRUCT($action = 'index') {
    parent::__construct('home', $action);
  }

  public function index() {
    $this->view();
  }
  
  public function login() {
      $this->view();
  }

  public function setLogin() {
    $view = 'login';

    if (isset($_REQUEST['Email'])) {
      $usr = $_REQUEST['Email'];
      $pwd = isset($_REQUEST['Password']) ? $_REQUEST['Password'] : '';

      if ($this->validaUsuario($usr,$pwd)) {
        $view = 'index';
      } else {
        $this->error = 'Usuario incorrecto.';
      }
    }
    $this->view($view);
  }

  public function validaUsuario($usr,$pwd) {
    if (trim($usr) == '' || trim($pwd) == '') {
      return false;
    }

    $usuario = new Usuario();
    $usuario->Email = $usr;
    $usuario->Password = $pwd;
    $usr = $usuario->getWhere();
    $valido = count($usr) == 1;

    if ($valido) {
      $_SESSION["Id"] = $usr[0]->Id;
      $_SESSION["Email"] = $usr[0]->Email;
    }
    
    return $valido;
  }

  public function logout() {
    session_destroy();
    $this->view('login');
  }
}
?>
