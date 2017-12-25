<h4>AddStudent/EditStudent</h4>
<form action="#" id="studentForm">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="studentName" id="name" value="<?= $studentName ?>">
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" class="form-control" name="studentPhone" id="phone" value="<?= $studentPhone ?>">
    </div>

    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" name="studentEmail" id="email" value="<?= $studentEmail ?>">
    </div>

    <div class="form-check form-check-inline">
        <label>Student's Course:</label><br/>
            <?php foreach ($coursesList as $row) { ?>
        <p  class="form-check-label">
            <input class="form-check-input" type="checkbox"  name="studentCourse[]" value="<?= $row->id ?>" <?php if(in_array($row->id, $studentCoursesListIds)) { echo 'checked'; } ?> > 
            <?= $row->name ?>
        </p>
            <?php } ?>
    </div><br/>

    <?php if(!empty($studentImage)) { ?>
        <img style="width:150px; height:150px;" src="<?=$studentImage?>" alt="Photo not available">
    <? } ?>
    <input type="hidden" id="imageUrlInputStudent" name="studentImage" value="<?= $studentImage ?>">

    <div>
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-secondary fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Select picture...</span>
            <!-- The file input field used as target for the file upload widget -->
            <input id="fileuploadStudent" type="file" name="files[]" multiple>
        </span>
        <br>
        <br>
        <!-- The global progress bar -->
        <div id="progressStudent" class="progress">
            <div class="progress-bar progress-bar-success"></div>
        </div>
        <!-- The container for the uploaded files -->
        <div id="filesStudent" class="files"></div>
    </div>

    <button type="submit" class="btn btn-success" onclick="saveStudent(<?= $studentId ?>); return false;">
        Save
    </button>
</form>
<br/>



<script>
    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = 'upload.php';
        $('#fileuploadStudent').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                console.log(data.result.files[0].url);
                $("#imageUrlInputStudent").val(data.result.files[0].url);

                $.each(data.result.files, function (index, file) {
                    $('<p/>').text(file.name).appendTo('#filesStudent');
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progressStudent .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>