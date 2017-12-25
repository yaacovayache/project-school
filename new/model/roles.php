<?php
    // require_once 'model.php';
    // require_once '../data/DAL.php';
    
    class roles implements JsonSerializable {
        private $id;
        private $name;

        function __construct($params) {
            // parent::__construct('Customer');
            
            $this->tableName = 'roles';
            $this->id = $params["id"];
            $this->name = $params["name"];
              
        }

        public function jsonSerialize() {
            return [
                "id" => $this->id,
                "name" => $this->name,
            ];
        }
    }

?>