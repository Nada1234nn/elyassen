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

                }
                else {
                    // $(this).color('#c5140f');
                    // $('.like_product i').css('Color','#c5140f');
                    $('.fav-icon').addClass('red-fav');

                    // clicked.style.backgroundColor = '#c5140f';
                    // console.log(clicked);

                }
            }

        })
    })

    $('.order_product').on('click', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $(this).attr('product_id');
        var weight_pro = $('#weight_pro').val();

        $.ajax({
            type: 'POST',
            url: "/order_pro",
            data: {product_id: product_id, weight_pro: weight_pro},

            success: function (data) {
                if (data == 0) {
                    $('#must-loginshare-modal').modal('show');

                }

                else {
                    $('#orderpro-success-modal').modal('show');
                    $('.order_product').hide(100);

                }
            }
        })
    });

    $('.remove_order').on('click', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $(this).attr('product_id');

        $.ajax({
            type: 'POST',
            url: "/remove_order",
            data: {product_id: product_id},

            success: function (data) {
                if (data == 0) {
                    $('#must-loginshare-modal').modal('show');

                }

                else {

                    document.getElementById('total').innerHTML = '';
                    $('#total').append(data[3] + data[1] + '');
                    $('#remove_button').css('display', 'none');

                }
            }
        })
    });

    // $("input[name='search_title']:checked").each( function (e) {
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //
    //     var search = $('#search_input3').val();
    //     var search_title = $(this).val();
    //
    //     $.ajax({
    //         type: 'POST',
    //         url: "/search_title",
    //         data: {search: search,search_title:search_title},
    //
    //         success: function (data) {
    //
    //         }
    //     })
    //
    // });


    // $('.quantity').on('click', function (e) {
    //     console.log('dd');
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //
    //     var qty = $('.qty').val();
    //     var product_id = $('.product_id').val();
    //
    //     $.ajax({
    //         type: 'POST',
    //         url: "/save_order",
    //         data: {qty: qty,product_id:product_id},
    //
    //         success: function (data) {
    //
    //         }
    //     })
    // });

    $('.request_order').on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // var name = $('#name').val();
        // var phone = $('#phone').val();
        // var area = $('#area').val();
        // var address = $('#address').val();
        // var location = $('#location').val();
        // var latitude = $('#latitude').val();
        // var longitude = $('#longitude').val();
        // var email = $('#email').val();
        // var name_file =document.getElementById('chooseFile');
        // var chooseFile=name_file.files.item(0).name;
        // var information_additional = $('#information_additional').val();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "/order_pro",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                if (data == 0) {
                    $('#must-loginshare-modal').modal('show');

                }

                else {
                    $('#orderpro-success-modal').modal('show');
                    document.getElementById('cart_num').innerHTML = '';
                    $('#cart_num').hide(100);
                    $('#caret-item').hide();
                    document.getElementById('total').innerHTML = '';
                    $('#total').append(' 0' + data[1] + '');
                    $('.remove-icon').parent().remove();
                    $('#remove_button').css('display', 'none');
                }
            }
        })
    })



})

