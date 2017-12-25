<?php
    // require_once 'model.php';
    // require_once '../data/DAL.php';
    
    class students implements JsonSerializable {
        private $id;
        private $name;
        private $phone;
        private $email;
        private $image;


        function __construct($params) {
            // parent::__construct('Customer');
            
            $this->tableName = 'students';
            $this->id = $params["id"];
            $this->name = $params["name"];
            $this->phone = $params["phone"];
            $this->email = $params["email"];
            $this->image = $params["image"];  
        }

        public function jsonSerialize() {
            return [
                "id" => $this->id,
                "name" => $this->name,
                "phone"=> $this->phone,
                "email"=> $this->email,
                "image"=> $this->image
            ];
        }
    }

?>