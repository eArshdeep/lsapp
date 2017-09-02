$('#pageDeleteBtn').on('click',function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "Are you sure?",
        text: "Think before you act. This action cannot be undone!",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Nevermind",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Delete Post!"
    }, function(deleteConfirmed){
        if (deleteConfirmed) form.submit();
    });
});