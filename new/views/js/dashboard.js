// School //

function loadSchool() {
    $.post("/api.php", "action=school", function(result) {
        $("#menu-left").html(result);
        sessionStorage.espace = "school";
    });
    $("#main-container").html('');
    
}


// Student //

function loadStudent(id) {
    $.post("/api.php", "action=student&studentId="+id, function(result) {
        $("#main-container").html(result);
    });
}

function loadStudentEditForm(id) {
    $.post("/api.php", "action=studentForm&studentId="+id, function(result) {
        $("#main-container").html(result);
    });
}

function saveStudent(id) {
    var action = (id > 0) ? "saveStudent" : "createStudent";

    var formData = $("#studentForm").serialize();
    var data = "action=" + action 
                + "&studentId=" + id
                + "&" + formData;

    $.post("/api.php", data, function(result) {
        $("#main-container").html(result);
    });

    refreshLeftMenu();
    return false;

    
}

function DeleteStudent(id) {
    $.post("/api.php", "action=deleteStudent&studentId="+id, function(result) {
        $("#main-container").html(result);
    });

    refreshLeftMenu();
}


// Course //

function loadCourse(id) {
    $.post("/api.php", "action=course&courseId="+id, function(result) {
        $("#main-container").html(result);
    });
}

function loadCourseEditForm(id) {
    $.post("/api.php", "action=courseForm&courseId="+id, function(result) {
        $("#main-container").html(result);
    });
}

function saveCourse(id) {
    var action = (id > 0) ? "saveCourse" : "createCourse";

    var formData = $("#courseForm").serialize();
    var data = "action=" + action 
                + "&courseId=" + id
                + "&" + formData;

    $.post("/api.php", data, function(result) {
        $("#main-container").html(result);
    });

    refreshLeftMenu();
}

function DeleteCourse(id) {
    $.post("/api.php", "action=deleteCourse&courseId="+id, function(result) {
        $("#main-container").html(result);
    });

    refreshLeftMenu();
}

// Admin //

function loadAdmin(id) {
    $.post("/api.php", "action=Admin&AdminId="+id, function(result) {
        $("#main-container").html(result);
    });
}

function loadAdmins() {
    $.post("/api.php", "action=Admins", function(result) {
        $("#menu-left").html(result);
        sessionStorage.espace = "Admin";
    });
    $("#main-container").html('');
    
}

function loadAdminEditForm(id) {
    $.post("/api.php", "action=AdminForm&AdminId="+id, function(result) {
        $("#main-container").html(result);
    });
}

function saveAdmin(id) {
    var action = (id > 0) ? "saveAdmin" : "createAdmin";

    var formData = $("#AdminForm").serialize();
    var data = "action=" + action 
                + "&AdminId=" + id
                + "&" + formData;

    $.post("/api.php", data, function(result) {
        $("#main-container").html(result);
    });

    refreshLeftMenu();  
}

function DeleteAdmin(id) {
    $.post("/api.php", "action=deleteAdmin&AdminId="+id, function(result) {
        $("#main-container").html(result);
    });

    refreshLeftMenu();
}





// refresh left menu

function refreshLeftMenu() {
    if(sessionStorage.espace != undefined)
    {
        if(sessionStorage.espace == "Admin")
            loadAdmins();
        else if (sessionStorage.espace == "school")
            loadSchool();
    }
}

// choice to delete 

function choiceDelete(confirm, cancel, id) {
    $.post("/api.php", "action=choiceDelete&id="+id+"&confirm="+confirm+"&cancel="+cancel, function(result) {
        $("#main-container").html(result);
    });
}