<?php
require_once __DIR__ . '/../lib/vcl/controller.php';

class CalendarController extends Controller {
    public $url;
    
    public function __CONSTRUCT($action = 'index') {
        parent::__construct('calendar', $action);
    }

    public function index() {
        $this->view();
    }
  
    public function detail() {
        $id_cal = "";
        if ($_REQUEST['cal']=="coro1") {
            $id_cal = "8vfkt0dsl4kr99o5gl3ls4o8h4%40group.calendar.google.com";
        } else if ($_REQUEST['cal']=="coro2") {
            $id_cal = "uouskn5366sr94s0726kp03l1k%40group.calendar.google.com";
        } else if ($_REQUEST['cal']=="coro3") {
            $id_cal = "e7evnmapvqde269t19pujbu70k%40group.calendar.google.com";
        } else if ($_REQUEST['cal']=="coro4") {
            $id_cal = "icb911hs2fk4g8g1ei9fsah6ng%40group.calendar.google.com";
        }
        $this->url = "https://calendar.google.com/calendar/embed?src=".$id_cal."&amp;ctz=America%2FGuatemala&amp;showPrint=0&amp;mode=AGENDA&amp;showTitle=1&amp;showTz=0&amp;showTabs=1&amp;showCalendars=0&amp;wkst=7&amp;hl=es";
        $this->view();
    }
}
?>