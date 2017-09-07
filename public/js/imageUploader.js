$('#imageInput').on('change', function() {
    var file = document.getElementById('imageInput').files[0];
    $('#fileName').text(file.name);
});