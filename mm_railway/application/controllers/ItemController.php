<?php
    class ItemController extends Zend_Controller_Action{

        public function newAction(){
            $item = new Model_Item();
            // $item->name="test";
            // $item->type=125;
            // $item->color="read";
            // $item->description="testDescription";
            // $item->notes = "testNotes";
            // $itemService = new Model_ItemService();
            // $this->view->newItem = $itemService->insert($item);

        }

        public function indexAction(){
            
            $pageNo = $this->getRequest()->getParam('page');
            $itemDb = new Model_ItemService();
            //$paginator=$itemDb->inquireByPage($pageNo);

            //$this->view->items = $paginator;

        }

    }
?>