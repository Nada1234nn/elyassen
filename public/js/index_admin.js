$(document).ready(function (e) {
    $('.category_id').change(function () {
        var category_id = $(this).val();
        $.ajax({
            url: '/getSubcategories/' + category_id,
            success: function (data) {
                $('.sub_category_id').html(data);

            }
        });

    });

})