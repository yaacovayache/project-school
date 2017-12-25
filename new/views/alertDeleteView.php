<div class="alert alert-danger">
  <strong>You ask to delete !</strong>
</div>

<div class="container">
  <div class="modal-body">
    <h3>Are you sure? </h3>
    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="<?= $confirm ?>(<?= $id ?>)">Confirm</button>
    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="<?= $cancel ?>(<?= $id ?>)">Close</button>
</div>
</div>


