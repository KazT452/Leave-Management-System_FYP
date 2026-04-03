$(document).ready(function(){
    var count = 0;

    $('#addMark').click(function(){
        $('#examModal').modal('show');
        $('#examModal').trigger("reset");
        $('.modal-title').html("<i class='fa fa-plus'></i> Student Exam Marks");
        $('#save').show();
        $('#update').hide();
    });

    $(document).on('click','.view_mark', function(){
        var row_id = $(this).attr("id");
        var Name = $('#'+row_id).children('td[data-target=NAME]').text();
        var COUR = $('#'+row_id).children('td[data-target=COURSE]').text();
        var VALID = $('#'+row_id).children('td[data-target=req]').text();
        $('#examModal').modal('show');
        $('#exformID').val(row_id);
        $('#exStudent_fname').val(Name);
        $('#subject_id').prop(COUR);
        if(VALID == 'valid') {
            $('#valid').prop("checked", true);
        } else if(VALID == 'Not valid') {
            $('#nvalid').prop("checked", true);
        }
        $('#update').show();
        $('#save').hide();
        $('.modal-title').html("<i class='fa fa-wrench'></i> Edit Student Marks");
    });
});