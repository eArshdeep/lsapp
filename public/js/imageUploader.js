$('#imageInput').on('change', function() {

    var file = document.getElementById('imageInput').files[0];

    $('#fileName').text(file.name);

    reader = new FileReader();
    reader.onload = function (e) {
        $('.card-img-top').attr('src', e.target.result);
    }
    reader.readAsDataURL(file);

});

function restoreImg ( orgURL ) {
    $("#imageInput").val("");
    $('.card-img-top').attr('src', orgURL);
}

function removeImg() {
  $("#imageInput").val("");
  $('.card-img-top').attr('src', '/storage/cover_images/noimage.jpg');
  $( ".card-footer" ).append( "<input type='hidden' name='removeImg' value='true'>" );
}