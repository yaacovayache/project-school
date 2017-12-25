<?php 
    require_once "tools/session.php";
    require_once "data/bl.php";
    
    require_once "model/Admins.php";
    require_once "model/courses.php";
    require_once "model/roles.php";
    require_once "model/studentcourses.php";
    require_once "model/students.php";
    require_once 'model/model.php';

    $BL = new BL();



    // PARAMETRES

    $action = $_POST["action"];
    if(isset( $_POST["password"]))
    {
        $password = $_POST["password"];
        $_SESSION["password"] = $password;
    }
    
    if(isset( $_POST["username"]))
    {
        $username = $_POST["username"];
        $_SESSION["username"] = $username;
    }
    if(isset( $_POST["studentName"]))
    {
        $studentName = $_POST["studentName"];
        $_SESSION["studentName"] = $studentName;
    }
    if(isset( $_POST["studentPhone"]))
    {
        $studentPhone = $_POST["studentPhone"];
        $_SESSION["studentPhone"] = $studentPhone;
    }
    if(isset( $_POST["studentEmail"]))
    {
        $studentEmail = $_POST["studentEmail"];
        $_SESSION["studentEmail"] = $studentEmail;
    }
    
    
    // ROUTES
    switch($action)
    {
        case "login":
            $BL->login($username,$password);
            break;

        case "logout":
            $BL->logout();
            break;
    
        case "school":
            $BL->school();
            break;

        case "choiceDelete":
            $BL->choiceDelete($_POST["confirm"],$_POST["cancel"],$_POST["id"]);
            break;

            // School //

        case "course":
            $BL->course($_POST["courseId"]);
            break;

        case "student":
            $BL->student($_POST["studentId"]);
            break;


            // Student //

        case "students":
            $BL->students();
            break;
        
        case "createStudent":
            $BL->createStudent($_POST["studentName"],$_POST["studentEmail"],$_POST["studentPhone"],$_POST["studentCourse"],$_POST["studentImage"]);
            break;

        case "studentForm":
            if(intval($_POST['studentId']) > 0)
                $BL->editStudent($_POST['studentId']);
            else
                $BL->createStudentForm();
            break;
        
        case "saveStudent":
            $BL->updateStudent($_POST["studentId"],$_POST["studentName"],$_POST["studentEmail"],$_POST["studentPhone"],$_POST["studentCourse"],$_POST["studentImage"]);
            break;

        case "deleteStudent":
            $BL->deleteStudent($_POST["studentId"]);
            break;    

            // Course //

        case "courses":
            $BL->courses();
            break;
        
        case "createCourse":
            $BL->createCourse($_POST["courseId"],$_POST["courseName"],$_POST["courseDescription"],$_POST["courseImage"]);
            break;

        case "courseForm":
            $BL->editCourse($_POST['courseId']);
            break;
        
        case "saveCourse":
            $BL->updateCourse($_POST["courseId"],$_POST["courseName"],$_POST["courseDescription"],$_POST["courseImage"]);
            break;
        
        case "deleteCourse":
            $BL->deleteCourse($_POST["courseId"]);
            break;
            
            // Admin //

        case "Admin":
            $BL->Admin($_POST["AdminId"]);
            break;

        case "Admins":
            $BL->Admins();
            break;

        case "createAdmin":
            $BL->createAdmin($_POST["AdminName"],$_POST["AdminRole"],$_SPOST["AdminPhone"],$_POST["AdminEmail"],$_POST["AdminPassword"],$_POST["AdminImage"]);
            break;

        case "AdminForm":
            $BL->editAdmin($_POST['AdminId']);
            break;

        case "saveAdmin":
            $BL->updateAdmin($_POST["AdminId"],$_POST["AdminName"],$_POST["AdminRole"],$_POST["AdminPhone"],$_POST["AdminEmail"],$_POST["AdminPassword"],$_POST["AdminImage"]);
            break;

        case "deleteAdmin":
            $BL->deleteAdmin($_POST["AdminId"]);
            break;
    }

?>