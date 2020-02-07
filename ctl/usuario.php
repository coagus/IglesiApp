<?php
require_once __DIR__ . '/../lib/mvc/controller.php';
require_once __DIR__ . '/../mdl/usuario.php';

class UsuarioController extends ControllerMVC {
  public function __CONSTRUCT($action = 'index') {
    parent::__construct('usuario', $action);
    $this->object = new Usuario();
    $this->title = "Usuario";
  }
}
?>
