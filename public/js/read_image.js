$(function () {

    var files = {};

    $(document).on('change', '#file', function () {

        var index = $('.file-wrapper').length ? $('.file-wrapper:last-child').data('index') + 1 : 1;

        if (this.files && this.files[0]) {

            files[index] = this.files[0];

            var template =
                "<div id='file-wrapper-%d' class='file-wrapper' data-index='%d'>" +
                "<div class='image-wrapper'>" +
                "<a href='#' data-index='%d' title=' delete ' class='delete-image'>" +
                "<img src='https://cdn4.iconfinder.com/data/icons/simplicio/32x32/notification_error.png' alt=''/>" +
                "</a>" +
                "<img class='image-preview' alt='' src='%s' />" +
                "</div>" +
                "</div>";

            var reader = new FileReader();

            reader.onload = function (e) {

                $('#files-wrapper').append(template.replace(/(%d)/g, index).replace(/(%s)/g, reader.result));
                $("#file-wrapper-" + index).fadeIn(200);
            }

            reader.readAsDataURL(this.files[0]);

        }
    });

    $(document).on('click', '.delete-image', function (e) {
        e.preventDefault();
        var index = $(this).data('index');
        $('#file-wrapper-' + index).fadeOut(200, function () {
            $(this).remove();
            delete files[index];
        });
    });

    // see the demo for more code ....
});

// $(document).ready(function (e) {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

$(document).on('click', '.delete-img', function (e) {
    e.preventDefault();
    document.getElementById('img').remove();
});