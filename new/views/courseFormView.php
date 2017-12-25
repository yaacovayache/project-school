<h4>AddCourse/EditCourse</h4>
<form action="#" id="courseForm">
    <div class="form-group">
        <label for="name">Name of Course:</label>
        <input type="text" class="form-control" id="courseName" name="courseName" value="<?= $courseName ?>">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control" id="courseDescription" name="courseDescription" value="<?= $courseDescription ?>">
    </div>
    
    <?php if(!empty($courseImage)) { ?>
        <img style="width:150px; height:150px;" src="<?=$courseImage?>" alt="Photo not available">
    <? } ?>
    <input type="hidden" id="imageUrlInputCourse" name="courseImage" value="<?= $courseImage ?>">

    <div>
        <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-secondary fileinput-button">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Select picture...</span>
            <!-- The file input field used as target for the file upload widget -->
            <input id="fileuploadCourse" type="file" name="files[]" multiple>
        </span>
        <br>
        <br>
        <!-- The global progress bar -->
        <div id="progressCourse" class="progress">
            <div class="progress-bar progress-bar-success"></div>
        </div>
        <!-- The container for the uploaded files -->
        <div id="filesCourse" class="files"></div>
    </div>

    <button type="submit" class="btn btn-success" onclick="saveCourse(<?= $courseId ?>); return false; ">
        Save
    </button>
</form>
<br/>

<script>
    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = 'upload.php';
        $('#fileuploadCourse').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                console.log(data.result.files[0].url);
                $("#imageUrlInputCourse").val(data.result.files[0].url);

                $.each(data.result.files, function (index, file) {
                    $('<p/>').text(file.name).appendTo('#filesCourse');
                });
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progressCourse .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
</script>