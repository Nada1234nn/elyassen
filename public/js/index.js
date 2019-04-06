$(document).ready(function (e) {
    $('.share_product').on('click', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $(this).attr('product_id');

        $.ajax({
            type: 'POST',
            url: "/share_product",
            data: {product_id: product_id},

            success: function (data) {
                if (data == 0) {
                    $('#must-loginshare-modal').modal('show');

                }
                if (data == 1) {
                    $('#product-found-before-modal').modal('show');
                }
                else {
                    $('#success-share-product-modal').modal('show');
                }
            }

        })
    })
    $('.like_product').on('click', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $(this).attr('product_id');
        var clicked = $(this)[0];

        $.ajax({
            type: 'POST',
            url: "/like_product",
            data: {product_id: product_id},

            success: function (data) {
                if (data == 0) {
                    $('#must-loginshare-modal').modal('show');

                }
                if (data == 1) {

                    // clicked.style.backgroundColor = '#555';
                    // console.log(clicked);
                    $('.fav-icon').removeClass('red-fav');

                    console.log('dd');
                }
                else {
                    // $(this).color('#c5140f');
                    // $('.like_product i').css('Color','#c5140f');
                    $('.fav-icon').addClass('red-fav');
                    console.log('ss');

                    // clicked.style.backgroundColor = '#c5140f';
                    // console.log(clicked);

                }
            }

        })
    })
})

