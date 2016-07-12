<?php
    class Model_ItemService {
        private $itemDb;
        public function __construct(){
            $this->itemDb = new Model_ItemDb();

        }
        public function inquireAll(){
            return $this->itemDb->fetchAll();
        }
        public function insert($item){
            $data = array('name'=>$item->name,
                           'type'=>$item->type,
                            'color'=>$item->color,
                            'description'=>$item->description,
                            'notes'=>$item->notes,
                            'creation_date'=>$item->date->toString('YYYY-MM-dd HH:mm:ss')
            );
            return $this->itemDb->insert($data);

        }

        public function inquireByPage($pageNo = 1){

            $query = $this->itemDb->select()->order('creation_date desc');
            $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbTableSelect($query));
            $paginator->setItemCountPerPage(2);
            $paginator->setCurrentPageNumber($pageNo);
            return $paginator;
        }
    }



