<?php

require_once "DAL.php";

class BL
{

    private $db = "";

    function __construct() {
        $this->db = new DAL();
    }

    function login($username,$password)
    {
           
         $statement = $this->db->executeStatement("SELECT * FROM Admins WHERE name = '$username' AND password  = '".md5($password)."'");
         
         foreach ($statement as $row)
         {    
            
            $_SESSION["role"]       =  $row['role'];
            $_SESSION["username"]   =  $row['name'];
            $_SESSION['connected']  =  true;
            
            echo json_encode(
                array(
                    "error" => false
                )
            );

            die();                                 
         }

         // dans le cas on aucune row n'est trouvee
         echo json_encode(
            array(
                "error" => true,
                "error_msg" => "username or pass not valid"
            )
        );                       
    }

    function logout()
    {
        // on ferme la session
        $_SESSION = [];
        $_SESSION['connected']  =  false;

        header("Location: ../index.php");
        die();
    }

     /** Courses Methods */

    public function allCourses()
    {
             $statement = $this->db->executeStatement("SELECT * FROM courses");
             $data = [];
             foreach ($statement as $row)
             {   
                 $data[] = $row;
             
             }

             return json_encode(
                 array(
                     "error"=>false,
                     "courses" => $data
                 )
             );

    }

    function allCourseForStudent($studentId)
    {
        $statement = $this->db->executeStatement("SELECT `c`.* FROM `studentCourse` `sc` INNER JOIN `courses` `c` ON `sc`.`courseId`=`c`.`id` WHERE `sc`.`studentId` = $studentId");
        $data = [];
        foreach ($statement as $row)
        {   
            $data[] = $row;
        
        }

        return json_encode(
            array(
                "error"=>false,
                "courses" => $data
            )
        );

    }

    function chooseCourse($courseId)
    {                 
         
         $statement = $this->db->executeStatement("SELECT * FROM courses WHERE id = '$courseId'");
 
         $course = $statement->fetch();
 
         return json_encode(
             array(
                 "error"=>false,
                 "course" => $course
             )
         );
    }


     /** Students Methods */

    public function allStudents()
    {
         $statement = $this->db->executeStatement("SELECT * FROM students");
         $data = [];
         foreach ($statement as $row)
         {   
             $data[] = $row;
         
         }

         return json_encode(
             array(
                 "error"=>false,
                 "students" => $data
             )
         );

    }

    function allStudentForCourse($courseId)
    {
       $statement = $this->db->executeStatement("SELECT `s`.* FROM `studentCourse` `sc` INNER JOIN `students` `s` ON `sc`.`studentId`=`s`.`id` WHERE `sc`.`courseId` = $courseId");
       $data = [];
       foreach ($statement as $row)
       {   
           $data[] = $row;
       
       }

       return json_encode(
           array(
               "error"=>false,
               "students" => $data
           )
       );

    }

    function chooseStudent($studentId)
    {                 
        
        $statement = $this->db->executeStatement("SELECT * FROM students WHERE id = '$studentId'");

        $student = $statement->fetch();

        return json_encode(
            array(
                "error"=>false,
                "student" => $student
            )
        );
    }

    //** Admin Methods */

    public function allAdmins()
    {
        $statement = $this->db->executeStatement("SELECT * FROM Admins");
        $data = [];
        foreach ($statement as $row)
        {   
            $data[] = $row;
        
        }

        return json_encode(
            array(
                "error"=>false,
                "Admins" => $data
            )
        );

   }

   function chooseAdmin($AdminId)
   {                 
       
       $statement = $this->db->executeStatement("SELECT * FROM Admins WHERE id = '$AdminId'");

       $Admin = $statement->fetch();

       return json_encode(
           array(
               "error"=>false,
               "Admin" => $Admin
           )
       );
   }

     // Chargement des vues
    
    // School //
     function school()
    {
        $coursesList = json_decode( $this->allCourses() )->courses;
        $studentsList = json_decode( $this->allStudents() )->students;        
        require_once "views/schoolView.php";
    }

    // choice delete //
    function choiceDelete($confirm, $cancel, $id){
        require_once "views/alertDeleteView.php";
    }

    // Course //
    function course($courseId)
    {
        $course = json_decode( $this->chooseCourse($courseId) )->course;
        $rows = json_decode( $this->allStudentForCourse($courseId) )->students;
        require_once "views/courseView.php";
    }

    function courses() {
        $rows = json_decode( $this->allCourse() )->courses;
        require_once "views/coursesView.php";
    }

    function createCourse($courseId,$courseName,$courseDescription,$courseImage)
    {
        $statement = $this->db->prepareStatement("INSERT INTO courses(name, description, image)
        VALUES(:name,:description,:image)");


        $statement->execute(array(
            ":name" => $courseName,
            ":description" => $courseDescription,
            ":image" => $courseImage
        ));

        echo  $courseName . " has been created";
    }
    
    function updateCourse($courseId,$courseName,$courseDescription,$courseImage)
    {
        $statement = $this->db->executeStatement("UPDATE courses
                    SET  name = '$courseName', description = '$courseDescription', image = '$courseImage'
                    WHERE id = '$courseId'");

        echo  $courseName . " has been modified";
        
    }

    function editCourse($courseId)
    {
        $course = json_decode( $this->chooseCourse($courseId) )->course;
        $courseId = $course->id;
        $courseName = $course->name;
        $courseDescription = $course->description;
        $courseImage = $course->image;
        
        require_once "views/courseFormView.php";
    }

    function createCourseForm()
    {
        $courseId = 0;
        $courseName = "";
        $courseDescription = "";
        $courseImage = "";
        require_once "views/courseFormView.php";
    }

    function deleteCourse($courseId) {
        $statement = $this->db->prepareStatement("DELETE FROM courses WHERE id = :id");


        $statement->execute(array(
            ":id" => $courseId
        ));

        echo    " the Course has been deleted";
    }


    // Student //
    function student($studentId)
    {
        $student = json_decode( $this->chooseStudent($studentId) )->student;
        $rows = json_decode( $this->allCourseForStudent($studentId) )->courses;   
        require_once "views/studentView.php";
    }

    function students() {
        $rows = json_decode( $this->allStudents() )->students;
        require_once "views/studentsView.php";
    }

    function createStudent($studentName,$studentEmail,$studentPhone,$studentCourse,$studentImage)
    {
        $statement = $this->db->prepareStatement("INSERT INTO students(name,phone,email,image)
        VALUES(:name,:phone,:email,:image)");


        $statement->execute(array(
            ":name" => $studentName,
            ":phone" => $studentPhone,
            ":email" => $studentEmail,
            ":image" => $studentImage
        ));

        // recuperer le studentID du nouvel etudiant ou de l'etudiant existant
        $studentId = $this->db->lastInsertId();
        // pour chaque courseID dans $studentCourse
        foreach ($studentCourse as $courseId){
            // executer insert (studentId, courseId) dans studentCourse
            $this->db->executeStatement("INSERT INTO studentCourse(studentId,courseId) VALUES($studentId,$courseId)");
        }

        echo  $studentName . " has been created";
    }
    
    function updateStudent($studentId,$studentName,$studentEmail,$studentPhone,$studentCourse,$studentImage)
    {
        $statement = $this->db->executeStatement("UPDATE students
                    SET  name = '$studentName', email = '$studentEmail', phone ='$studentPhone', image='$studentImage'
                    WHERE id = '$studentId'");

        $this->db->executeStatement("DELETE FROM studentCourse WHERE studentId = $studentId"); 

        // pour chaque courseID dans $studentCourse
        foreach ($studentCourse as $courseId){
            // executer insert (studentId, courseId) dans studentCourse
            $this->db->executeStatement("INSERT INTO studentCourse(studentId,courseId) VALUES($studentId,$courseId)");
        }

        echo  $studentName . " has been modified";
        
    }

    function editStudent($studentId)
    {
        $student = json_decode( $this->chooseStudent($studentId) )->student;
        $studentId = $student->id;
        $studentName = $student->name;
        $studentPhone = $student->phone;
        $studentEmail = $student->email;
        $studentImage = $student->image;
        $coursesList = json_decode( $this->allCourses() )->courses;
        $studentCoursesList = json_decode( $this->allCourseForStudent($studentId))->courses;
        
        $studentCoursesListIds = [];
        foreach($studentCoursesList as $c)
            $studentCoursesListIds[] = $c->id;
        
        require_once "views/studentFormView.php";
    }

    function createStudentForm()
    {
        $studentId = 0;
        $studentName = "";
        $studentPhone = "";
        $studentEmail = "";
        $coursesList = json_decode( $this->allCourses() )->courses;
        $studentCoursesListIds = [];
        $studentImage = "";

        require_once "views/studentFormView.php";
    }

    function deleteStudent($studentId) {
        $statement = $this->db->prepareStatement("DELETE FROM students WHERE id = :id");

        $statement->execute(array(
            ":id" => $studentId
        ));
        
        echo    " the student has been deleted";
    }


    // Admin //
    function Admin($AdminId)
    {
        $Admin = json_decode( $this->chooseAdmin($AdminId) )->Admin;
        require_once "views/AdminView.php";
    }

    function Admins()
    {   
        $coursesList = json_decode( $this->allCourses() )->courses;
        $studentsList = json_decode( $this->allStudents() )->students;
        $AdminsList = json_decode( $this->allAdmins() )->Admins;
        require_once "views/AdminsView.php";  
    }

    function createAdmin($AdminName,$AdminRole,$AdminPhone,$AdminEmail,$AdminPassword,$AdminImage)
    {
        
        $statement = $this->db->prepareStatement("INSERT INTO `Admins` (name,role,phone,email,password,image)
        VALUES(:name,:role,:phone,:email,:password,:image)");


        $statement->execute(array(
            ":name" => $AdminName,
            ":role" => $AdminRole,
            ":phone" => $AdminPhone,
            ":email" => $AdminEmail,
            ":password" => md5($AdminPassword),
            ":image" => $AdminImage
        ));

        echo  $AdminName . " has been created";
    } 

    function updateAdmin($AdminId,$AdminName,$AdminRole,$AdminPhone,$AdminEmail,$AdminPassword,$AdminImage)
    {
        $sql = "UPDATE Admins SET  name = '$AdminName',role = '$AdminRole',phone ='$AdminPhone',email = '$AdminEmail'";
        $sql .= (!empty($AdminPassword)) ? ",password = '" . md5($AdminPassword) . "'" : "";
        $sql .= ",image = '$AdminImage' WHERE id = '$AdminId'";

        $statement = $this->db->executeStatement($sql);

        echo  $AdminName . " has been modified";
        
    }

    function editAdmin($AdminId)
    {
        $Admin = json_decode( $this->chooseAdmin($AdminId) )->Admin;
        $AdminId = $Admin->id;
        $AdminName = $Admin->name;
        $AdminRole = $Admin->role;
        $AdminPhone = $Admin->phone;
        $AdminEmail = $Admin->email;
        $AdminImage = $Admin->image;
        
        if( $_SESSION["role"] === "owner"){
            $roles= array("", "owner", "manager", "sales");
        }
        else $roles= array("", "manager", "sales");

        require_once "views/AdminFormView.php";
    }


    function createAdminForm()
    {
        $AdminId = 0;
        $AdminName = "";
        $AdminRole = "";
        $AdminPhone = "";
        $AdminEmail = "";
        $AdminPassword = "";
        $AdminImage = "";

        
        if( $_SESSION["role"] === "owner"){
            $roles= array("", "owner", "manager", "sales");
        }
        else $roles= array("", "manager", "sales");

        require_once "views/AdminFormView.php";
    }

    function deleteAdmin($AdminId) {
        $statement = $this->db->prepareStatement("DELETE FROM Admins WHERE id = :id");


        $statement->execute(array(
            ":id" => $AdminId
        ));

        echo    " the Admin has been deleted";
    }
}


?>