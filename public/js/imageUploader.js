$('#imageInput').on('change', function() {

    var file = document.getElementById('imageInput').files[0];

    $('#fileName').text(file.name);

    reader = new FileReader();
    reader.onload = function (e) {
        $('.card-img-top').attr('src', e.target.result);
    }
    reader.readAsDataURL(file);

});