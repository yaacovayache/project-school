
<div class="list-group">
  <button type="button" class="list-group-item list-group-item-action active">
    Admins
    <span type="button" class="glyphicon glyphicon-plus" onclick="loadAdminEditForm();" style="float:right;">
  </button>
        <?php foreach ($AdminsList as $row) { ?>
  <button type="button" class="list-group-item list-group-item-action" onclick='loadAdmin(<?= $row->id ?>)'> 
        <?= $row->id ?> <?= $row->name ?>
  </button>
        <?php } ?>
</div>

<div class="list-group">
  <button type="button" class="list-group-item list-group-item-action active">
    Courses
    <span type="button" class="glyphicon glyphicon-plus" onclick="loadCourseEditForm();" style="float:right;">
  </button>
        <?php foreach ($coursesList as $row) { ?>
  <button type="button" class="list-group-item list-group-item-action" onclick='loadCourse(<?= $row->id ?>)'> 
        <?= $row->id ?> <?= $row->name ?>
  </button>
        <?php } ?>
</div>

<div class="list-group">
  <button type="button" class="list-group-item list-group-item-action active">
    Students
    <span type="button" class="glyphicon glyphicon-plus" onclick="loadStudentEditForm();" style="float:right;">
  </button>
        <?php foreach ($studentsList as $row) { ?>
  <button type="button" class="list-group-item list-group-item-action" onclick='loadStudent(<?= $row->id ?>)'> 
        <?= $row->id ?> <?= $row->name ?>
  </button>
        <?php } ?>
</div>

