/**
 * Created by julien on 15/06/17.
 */
$(document).ready(function () {

    $('#dropzone').on('dragover', function (e) {
        e.preventDefault();
        $(this).css('border', '3px dashed lime');
    });

    $('#dropzone').on('drop', function (e) {
        e.preventDefault();
        e.stopPropagation();
        let files = e.originalEvent.dataTransfer.files;
        if ($('#form_file_name') === '' || $('#form_fie_name')=== undefined) {
            $('#form_file_name').val(files[0]);
        }
        $(this).css('border', '3px dashed blue');
    });

    $('#dropzone').on('dragleave', function (e) {
       $(this).css('border', '3px dashed black');
    });
});