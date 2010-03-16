<?php
class home_controller {
  public function index() {
    view::render('home', array(
      'msg'=>'I am home to pifty'
    ));
  }
}