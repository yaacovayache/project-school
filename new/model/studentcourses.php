<?php
    // require_once 'model.php';
    // require_once '../data/DAL.php';
    
    class studentcourses implements JsonSerializable {
        private $id_student;
        private $id_course;


        function __construct($params) {
            // parent::__construct('Customer');
            
            $this->tableName = 'studentcourses';
            $this->id_student = $params["id_student"];
            $this->id_course = $params["id_course"];

             
        }

        public function jsonSerialize() {
            return [
                "id_student" => $this->id_student,
                "id_course" => $this->id_course        
            ];
        }
    }

?>