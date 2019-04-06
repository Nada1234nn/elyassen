<!--Scripts
         ================-->

<script type="text/javascript" src="{{asset('js/html5shiv.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/respond.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jPages.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/snake.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/html5lightbox.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('js/custom.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/share.js') }}"></script>
<script src="{{asset('js/index.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $('.search_supplier').on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
//        var formData = $('.search_supplier').serialize();
        var arr = [];
        var supplier_id = $('#search_input3').val();
//
        $.each($("input[name='supplier_name']:checked"), function () {
            arr.push($(this).val());
        });
        $.ajax({
            type: 'POST',
            url: "/search_supplier",
            data: {supplier_id: supplier_id, arr: arr},

            success: function (data) {
                if (data[0] == 0) {
                    document.getElementById('itemContainer').innerHTML = '';
                    var no_result = '';
                    no_result += '<h1>' + data[1] + '</h1>';
                    $('#itemContainer').append(no_result);
                }

                if (data[4] == 4) {
                    document.getElementById('itemContainer').innerHTML = '';
                    var str = '';
                    for (i = 0; i < data[0].length; i++) {
                        var detail_product = '{{route("website.detail_product",":name")}}';
                        detail_product = detail_product.replace(':name', data[0][i].name);
                        var detail_product_en = '{{route("website.detail_product",":en_name")}}';
                        detail_product_en = detail_product_en.replace(':en_name', data[0][i].en_name);
                        var detail_supplier = '{{route("website.detail_supplier",":supplier_name")}}';
                        detail_supplier = detail_supplier.replace(':supplier_name', data[0][i].get_supplier.get_user.username);
                        var image_product = '{{asset("uploads/".":image")}}';
                        image_product = image_product.replace(':image', data[0][i].image);

                        str += '                        <div class="col-lg-4 col-sm-6 col-6 wow fadeIn">\n';
                        if (data[1] == 'true') {
                            str += '<a href="' + detail_product_en + '" >';
                        } else {
                            str += '<a href="' + detail_product + '" >';
                        }
                        str += '<div class="pro-div"><div class="pro-img"><img src="' + image_product + '" alt="product"><span class="more-pro">' +
                            data[5] + '</span></div>';
                        if (data[1] == 'true') {
                            str += '<h3 class="pro-title">' + data[0][i].en_name + '</h3>';
                        } else {
                            str += '<h3 class="pro-title">' + data[0][i].name + '</h3>';
                        }

                        str += '<a href="' + detail_supplier + '" class="pro-price">' + data[2] + ':' + data[0][i].get_supplier.get_user.username + ' </a>' +
                            '                                    <span class="pro-price pro-made">' + data[3] + ':' + data[0][i].get_supplier.national + '</span>\n' +
                            '\n' +
                            '                                </div>\n' +
                            '</a></div>';
                    }

                    $('#itemContainer').append(str);
                }
            }

        })
    });
    $('.search_categories').on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
//        var formData = $('.search_supplier').serialize();
        var arr = [];
        var category_name = $('#search_input4').val();
//
        $.each($("input[name='category_name']:checked"), function () {
            arr.push($(this).val());
        });
        $.ajax({
            type: 'POST',
            url: "/search_category",
            data: {category_name: category_name, arr: arr},

            success: function (data) {

                if (data[0] == 0) {
                    document.getElementById('itemContainer').innerHTML = '';
                    var no_result = '';
                    no_result += '<h1>' + data[1] + '</h1>';
                    $('#itemContainer').append(no_result);
                }

                if (data[4] == 4) {
                    document.getElementById('itemContainer').innerHTML = '';
                    var str = '';
                    for (i = 0; i < data[0].length; i++) {
                        var detail_product = '{{route("website.detail_product",":name")}}';
                        detail_product = detail_product.replace(':name', data[0][i].name);
                        var detail_product_en = '{{route("website.detail_product",":en_name")}}';
                        detail_product_en = detail_product_en.replace(':en_name', data[0][i].en_name);
                        var detail_supplier = '{{route("website.detail_supplier",":supplier_name")}}';
                        detail_supplier = detail_supplier.replace(':supplier_name', data[0][i].get_supplier.get_user.username);
                        var image_product = '{{asset("uploads/".":image")}}';
                        image_product = image_product.replace(':image', data[0][i].image);

                        str += '                        <div class="col-lg-4 col-sm-6 col-6 wow fadeIn">\n';
                        if (data[1] == 'true') {
                            str += '<a href="' + detail_product_en + '" >';
                        } else {
                            str += '<a href="' + detail_product + '" >';
                        }
                        str += '<div class="pro-div"><div class="pro-img"><img src="' + image_product + '" alt="product"><span class="more-pro">' +
                            data[5] + '</span></div>';
                        if (data[1] == 'true') {
                            str += '<h3 class="pro-title">' + data[0][i].en_name + '</h3>';
                        } else {
                            str += '<h3 class="pro-title">' + data[0][i].name + '</h3>';
                        }

                        str += '<a href="' + detail_supplier + '" class="pro-price">' + data[2] + ':' + data[0][i].get_supplier.get_user.username + ' </a>' +
                            '                                    <span class="pro-price pro-made">' + data[3] + ':' + data[0][i].get_supplier.national + '</span>\n' +
                            '\n' +
                            '                                </div>\n' +
                            '</a></div>';
                    }

                    $('#itemContainer').append(str);
                }
            }

        })
    });
    $('.search_subcategories').on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
//        var formData = $('.search_supplier').serialize();
        var arr = [];
        var subcategory_name = $('#search_input5').val();
//
        $.each($("input[name='subcategory_name']:checked"), function () {
            arr.push($(this).val());
        });
        $.ajax({
            type: 'POST',
            url: "/search_subcategory",
            data: {subcategory_name: subcategory_name, arr: arr},

            success: function (data) {

                if (data[0] == 0) {
                    document.getElementById('itemContainer').innerHTML = '';
                    var no_result = '';
                    no_result += '<h1>' + data[1] + '</h1>';
                    $('#itemContainer').append(no_result);
                }

                if (data[4] == 4) {
                    document.getElementById('itemContainer').innerHTML = '';
                    var str = '';
                    for (i = 0; i < data[0].length; i++) {
                        var detail_product = '{{route("website.detail_product",":name")}}';
                        detail_product = detail_product.replace(':name', data[0][i].name);
                        var detail_product_en = '{{route("website.detail_product",":en_name")}}';
                        detail_product_en = detail_product_en.replace(':en_name', data[0][i].en_name);
                        var detail_supplier = '{{route("website.detail_supplier",":supplier_name")}}';
                        detail_supplier = detail_supplier.replace(':supplier_name', data[0][i].get_supplier.get_user.username);
                        var image_product = '{{asset("uploads/".":image")}}';
                        image_product = image_product.replace(':image', data[0][i].image);

                        str += '                        <div class="col-lg-4 col-sm-6 col-6 wow fadeIn">\n';
                        if (data[1] == 'true') {
                            str += '<a href="' + detail_product_en + '" >';
                        } else {
                            str += '<a href="' + detail_product + '" >';
                        }
                        str += '<div class="pro-div"><div class="pro-img"><img src="' + image_product + '" alt="product"><span class="more-pro">' +
                            data[5] + '</span></div>';
                        if (data[1] == 'true') {
                            str += '<h3 class="pro-title">' + data[0][i].en_name + '</h3>';
                        } else {
                            str += '<h3 class="pro-title">' + data[0][i].name + '</h3>';
                        }

                        str += '<a href="' + detail_supplier + '" class="pro-price">' + data[2] + ':' + data[0][i].get_supplier.get_user.username + ' </a>' +
                            '                                    <span class="pro-price pro-made">' + data[3] + ':' + data[0][i].get_supplier.national + '</span>\n' +
                            '\n' +
                            '                                </div>\n' +
                            '</a></div>';
                    }

                    $('#itemContainer').append(str);
                }
            }

        })
    });
    $('.form-inline').on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var search_pro = $('#search_product').val();

        $.ajax({
            type: 'POST',
            url: "/search_product",
            data: {search_pro: search_pro},

            success: function (data) {

                if (data[0] == 0) {
                    document.getElementById('itemContainer').innerHTML = '';
                    var no_result = '';
                    no_result += '<h1>' + data[1] + '</h1>';
                    $('#itemContainer').append(no_result);
                }

                if (data[4] == 4) {
                    document.getElementById('itemContainer').innerHTML = '';
                    var str = '';
                    for (i = 0; i < data[0].length; i++) {
                        var detail_product = '{{route("website.detail_product",":name")}}';
                        detail_product = detail_product.replace(':name', data[0][i].name);
                        var detail_product_en = '{{route("website.detail_product",":en_name")}}';
                        detail_product_en = detail_product_en.replace(':en_name', data[0][i].en_name);
                        var detail_supplier = '{{route("website.detail_supplier",":supplier_name")}}';
                        detail_supplier = detail_supplier.replace(':supplier_name', data[0][i].get_supplier.get_user.username);
                        var image_product = '{{asset("uploads/".":image")}}';
                        image_product = image_product.replace(':image', data[0][i].image);

                        str += '                        <div class="col-lg-4 col-sm-6 col-6 wow fadeIn">\n';
                        if (data[1] == 'true') {
                            str += '<a href="' + detail_product_en + '" >';
                        } else {
                            str += '<a href="' + detail_product + '" >';
                        }
                        str += '<div class="pro-div"><div class="pro-img"><img src="' + image_product + '" alt="product"><span class="more-pro">' +
                            data[5] + '</span></div>';
                        if (data[1] == 'true') {
                            str += '<h3 class="pro-title">' + data[0][i].en_name + '</h3>';
                        } else {
                            str += '<h3 class="pro-title">' + data[0][i].name + '</h3>';
                        }

                        str += '<a href="' + detail_supplier + '" class="pro-price">' + data[2] + ':' + data[0][i].get_supplier.get_user.username + ' </a>' +
                            '                                    <span class="pro-price pro-made">' + data[3] + ':' + data[0][i].get_supplier.national + '</span>\n' +
                            '\n' +
                            '                                </div>\n' +
                            '</a></div>';
                    }

                    $('#itemContainer').append(str);
                }
            }

        })
    });

</script>