<?php
    // require_once 'model.php';
    // require_once '../data/DAL.php';
    
    class courses implements JsonSerializable {
        private $id;
        private $name;
        private $description;
        private $image;


        function __construct($params) {
            // parent::__construct('Customer');
            
            $this->tableName = 'courses';
            $this->id = $params["id"];
            $this->name = $params["name"];
            $this->description = $params["description"];
            $this->image = $params["image"];
              
        }

        public function jsonSerialize() {
            return [
                "id" => $this->id,
                "name" => $this->name,
                "description"=> $this->description,
                "image"=> $this->image
            ];
        }

    }

?>