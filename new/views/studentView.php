<button class="btn btn-primary" onclick="loadStudentEditForm(<?= $student->id ?>)">Edit</button>
<button class="btn btn-danger" onclick="choiceDelete('DeleteStudent','loadStudent', <?= $student->id ?>)">Delete</button>
<h1><?= $student->name ?></h1>
<h3><?= $student->email ?></h3>
<h><?= $student->phone ?></h3>
<ul class="list-group">
  <li class="list-group-item disabled">Courses List</li>
        <?php foreach ($rows as $row) { ?>
  <li class="list-group-item"><?= $row->id ?> - <?= $row->name ?></li>
        <?php } ?>
</ul>

<?php if(!empty($student->image)) { ?>
<img style="width:150px; height:150px;" src= "<?=$student->image ?>" alt="Photo not available">
<?php } ?>

    


