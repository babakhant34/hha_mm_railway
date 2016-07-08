<?php
    class IndexController extends Zend_Controller_Action{
        public function init(){

        }

        public function indexAction(){
        	$this->view->hello = "hello world";
        }

        public function nmwAction(){
        	$this->views->ak = "hello world";
        }
    }
