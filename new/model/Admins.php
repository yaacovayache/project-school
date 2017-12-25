<?php
    
    class Admins implements JsonSerializable {
        private $id;
        private $name;
        private $role;
        private $phone;
        private $email;
        private $password;


        function __construct($params) {
            
            $this->tableName = 'Admins';
            $this->id = $params["id"];
            $this->name = $params["name"];
            $this->role = $params["role"];
            $this->phone = $params["phone"];
            $this->email = $params["email"];
            $this->password = $params["password"];  
        }

        public function jsonSerialize() {
            return [
                "id" => $this->id,
                "name" => $this->name,
                "role"=> $this->role,
                "phone"=> $this->phone,
                "email"=> $this->email,
                "password"=> $this->password
            ];
        }
    }

?>