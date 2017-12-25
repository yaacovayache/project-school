<h4>AddAdmin/EditAdmin</h4>
<form action="#" id="AdminForm">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="AdminName" value="<?= $AdminName ?>">
    </div>
    <div class="form-group">
        <label for="role">Role:</label>
        <select class="form-control" id="role" name="AdminRole" value="<?= $AdminRole ?>">
          <?php foreach($roles as $role) {
              $isSelected = (($AdminRole == $role) ? " selected" : "");
              echo "<option" . $isSelected . ">" . $role . "</option>";
          }?>
        </select>
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" class="form-control" id="phone" name="AdminPhone" value="<?= $AdminPhone ?>">
    </div>
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" name="AdminEmail" value="<?= $AdminEmail ?>">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="AdminPassword" value="<?= $AdminPassword ?>">
    </div>

    <?php if(!empty($AdminImage)) { ?>
        <img style="width:150px; height:150px;" src="<?=$AdminImage?>" alt="Photo not available">
    <? } ?>
    <input type="hidden" id="imageUrlInputAdmin" name="AdminImage" value="<?= $AdminImage ?>">

    <div>
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-secondary fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Select picture...</span>
            <!-- The file input field used as target for the file upload widget -->
            <input id="fileuploadAdmin" type="file" name="files[]" multiple>
        </span>
        <br>
        <br>
        <!-- The global progress bar -->
        <div id="progressAdmin" class="progress">
            <div class="progress-bar progress-bar-success"></div>
        </div>
        <!-- The container for the uploaded files -->
        <div id="filesAdmin" class="files"></div>
    </div>

    <button type="submit" class="btn btn-success" onclick="saveAdmin(<?= $AdminId ?>); return false;">
        Save
    </button>
</form>
<br/>


<script>
    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = 'upload.php';
        $('#fileuploadAdmin').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                console.log(data.result.files[0].url);
                $("#imageUrlInputAdmin").val(data.result.files[0].url);

                $.each(data.result.files, function (index, file) {
                    $('<p/>').text(file.name).appendTo('#filesAdmin');
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progressAdmin .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>