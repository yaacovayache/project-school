<?php if( $_SESSION["role"] === "owner"  || $_SESSION["role"] === "manager"){ ?>
<button class="btn btn-primary" onclick="loadCourseEditForm(<?= $course->id ?>)">Edit</button>
<button class="btn btn-danger" onclick="choiceDelete('DeleteCourse','loadCourse', <?= $course->id ?>)">Delete</button>
<?php } ?>
<h1><?= $course->name ?></h1>
<h2><?= $course->description ?></h2>
<ul class="list-group">
  <li class="list-group-item disabled">Students List</li>
        <?php foreach ($rows as $row) { ?>
  <li class="list-group-item"><?= $row->id ?> - <?= $row->name ?></li>
        <?php } ?>
</ul>

<?php if(!empty($course->image)) { ?>
      <img style="width:150px; height:150px;" src="<?= $course->image ?>" alt="Photo not available">
<?php } ?>
    
