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
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDaFbSOerPJ0NF5IArDBvQ_dX3ODWnln5c&language=ar"></script>
<script src="{{ asset("js/search_address.js") }}"></script>
<script src="{{asset('js/intlTelInput.min.js')}}" type="text/javascript"></script>

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
            url: "search_supplier",
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

    $('.search_prosupplier').on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
//        var formData = $('.search_supplier').serialize();
        var arr = [];
        var supplier_name = $('#supplier_name').val();
//
        $.each($("input[name='supplierpro_name']:checked"), function () {
            arr.push($(this).val());
        });
        $.ajax({
            type: 'POST',
            url: "/search_prosupplier",
            data: {supplier_name: supplier_name, arr: arr},

            success: function (data) {
                if (data[0] == 0) {
                    document.getElementById('product_details').innerHTML = '';
                    var no_result = '';
                    no_result += '<h1 align="right">' + data[1] + '</h1>';
                    $('#product_details').append(no_result);
                }

                if (data[0] == 1) {
                    console.log(data[12]);
                    var detail_product = '{{route("website.detail_product",":name")}}';
                    detail_product = detail_product.replace(':name', data[1].name);
                    document.getElementById('product_details').innerHTML = '';
                    var str = '';
                    str += '<div class="row">' +
                        ' <div class="col-lg-6 pro-head">';
                    if (data[3]) {
                        str += '<h3 class="pro-title wow fadeIn">' + (data[2] ? data[1].en_name : data[1].name) +
                            '<span></span></h3>';
                    } else if (data[4]) {
                        str += '<h3 class="pro-title wow fadeIn">' + (data[2] ? data[1].en_name : data[1].name) +
                            '<span></span></h3>';
                    } else if (data[5]) {
                        str += '<h3 class="pro-title wow fadeIn">' + (data[2] ? data[1].en_name : data[1].name) +
                            '<span></span></h3>';
                    }

                    if (data[6]) {
                        str += '<span class="pro-price wow fadeIn">' + data[7] + data[1].get_supplier.get_user.username + '</span>';

                    } else if (data[8]) {
                        str += '<span class="pro-price wow fadeIn">' + data[7] + data[1].get_supplier.get_user.username + '</span>';
                    } else if (data[9]) {
                        str += '<span class="pro-price wow fadeIn">' + data[7] + data[1].get_supplier.get_user.username + '</span>';
                    }
                    str += '</div>' +
                        '<div class="col-lg-6 pro-soc wow fadeIn">' +
                        '<div class="social-icons-pro">' +
                        ' <ul class="list-inline"><li class="share-soc">' +
                        '<a href="#" class="share_product" product_id="' + data[1].id + '">' +
                        '<i class="fa fa-share-alt"></i></a></li>' +
                        ' <li class="tw-soc"><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=' + detail_product + '">' +
                        '<i class="fa fa-twitter"></i></a></li><li class="goo-soc">' +
                        '<a href="https://plus.google.com/share?url=' + detail_product + '"><i class="fa fa-google-plus"></i></a></li>' +
                        '<li class="fc-soc"><a href="https://www.facebook.com/sharer/sharer.php?u=' + detail_product + '" class="social-button " id=""><i class="fa fa-facebook"></i></a></li>' +
                        '<li class="whats-soc"><a href="https://wa.me/?text=' + detail_product + '">' +
                        '<i class="fa fa-whatsapp"></i></a></li>' +
                        '<li class="fav-icon ' + (data[10] ? "red-fav" : "") + '"><a href="#" class="like_product" onclick="return  false;" product_id="' + data[1].id + '"><i class="fa fa-heart"></i></a></li>' +
                        '</ul>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="row border-div">';
                    if (data[11]) {
                        str += '<div class="col-lg-6 no-padd wow fadeIn">\n' +
                            '                                <div id="owl-demo"\n' +
                            '                                     class="text-center owl-carousel owl-theme first-owl product-carousel">';
                        var image = '{{asset("uploads/".":image")}}';
                        for (i = 0; i < data[12].length; i++) {

                            image = image.replace(':image', data[12][i].image);

                            str += '<div class="item"><a href="' + image + '" class="html5lightbox  pro-plus">' +
                                '<i class="fa fa-search-plus"></i></a><div class="pro-div">' +
                                '<div class="pro-img">' +
                                ' <a href="' + image + '" class="html5lightbox"><img src="' + image + '" alt="product"></a>' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>';
                        }
                        str += '</div></div>';
                    } else if (data[13]) {
                        str += '<div class="col-lg-6 no-padd wow fadeIn">' +
                            '                                <div id="owl-demo"' +
                            '                                     class="text-center owl-carousel owl-theme first-owl product-carousel">';
                        for (i = 0; i < data[12].length; i++) {
                            var img = '{{asset("uploads/".":image")}}';
                            img = img.replace(':image', data[12][i].image);

                            str += '<div class="item"><a href="' + img + '" class="html5lightbox  pro-plus">' +
                                '<i class="fa fa-search-plus"></i></a><div class="pro-div">' +
                                '<div class="pro-img">' +
                                ' <a href="' + img + '" class="html5lightbox"><img src="' + img + '" alt="product"></a>' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>';
                        }
                        str += '</div></div>';

                    } else if (data[5]) {
                        str += '<div class="col-lg-6 no-padd wow fadeIn">\n' +
                            '                                <div id="owl-demo"\n' +
                            '                                     class="text-center owl-carousel owl-theme first-owl product-carousel">';
                        for (i = 0; i < data[12].length; i++) {
                            var imge = '{{asset("uploads/".":image")}}';
                            imge = imge.replace(':image', data[12][i].image);

                            str += '<div class="item"><a href="' + imge + '" class="html5lightbox  pro-plus">' +
                                '<i class="fa fa-search-plus"></i></a><div class="pro-div">' +
                                '<div class="pro-img">' +
                                ' <a href="' + imge + '" class="html5lightbox"><img src="' + imge + '" alt="product"></a>' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>';
                        }
                        str += '</div></div>';

                    }


                    var save_order = "{{route('save_order')}}";
                    var token = '<input type="hidden" name="_token" value="' + data[56] + '">';
                    str += '<div class="col-lg-6 no-padd">' +
                        '<div class="left-product-details wow fadeIn"><div class="inner-pro-descripe">' +
                        '<span class="pro-gram">' + data[15] + '</span><div class="row"><div class="form-group col-md-3">' +
                        '<input type="text" value="' + data[1].weight_product + data[16] + '" style="background-color: white; border: hidden" id="weight_pro" disabled>' +
                        '</div><div class="form-group col-md-9">';
                    if (data[17]) {
                        if (data[1].quantity !== 0) {
                            str += '<form action="' + save_order + '" method="post">' +
                                token +
                                '<input type="hidden" name="product_id" value="' + data[1].id + '">' +
                                '<input type="hidden" name="product_name" value="' + data[1].name + '">' +
                                '<input type="hidden" name="qty" value="1">' +
                                '<button type="submit" class="dark_btn custom_btn big-btn" style="width: 250px;">' + data[18] + '</button>' +
                                '</form>';
                        }
                    }
                    str += '</div></div><h3>' + data[19] + '</h3><div class="text-center"><ul class="list-unstyled products-btns">';
                    if (data[20]) {
                        for (i = 0; i < data[21].length; i++) {
                            var attachment = '{{route("website.viewAttach",":attach")}}';
                            attachment = attachment.replace(':attach', data[21][i].attachment);

                            str += '<li><span>' + data[22] + ':' + '</span><a href="' + attachment + '" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i>' +
                                data[22] + '</a></li>';
                        }
                    } else if (data[23]) {
                        for (i = 0; i < data[21].length; i++) {
                            var attach = '{{route("website.viewAttach",":attach")}}';
                            attach = attach.replace(':attach', data[21][i].attachment);

                            str += '<li><span>' + data[22] + ':' + '</span><a href="' + attach + '" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i>' +
                                data[22] + '</a></li>';
                        }

                    } else if (data[24]) {
                        for (i = 0; i < data[21].length; i++) {
                            var attachs = '{{route("website.viewAttach",":attach")}}';
                            attachs = attachs.replace(':attach', data[21][i].attachment);

                            str += '<li><span>' + data[22] + ':' + '</span><a href="' + attachs + '" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i>' +
                                data[22] + '</a></li>';
                        }
                    }


                    str += '</ul></div></div></div></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-12">' +
                        '<div class="main-product-details wow fadeIn">' +
                        '                                <h3>' + data[25] + '</h3>' +
                        '                                <div class="inner-product-pro row">' +
                        '                                    <div class="col-lg-7">' +
                        '                                        <h4>' + data[26] + '</h4>';
                    if (data[27]) {
                        str += '<p>' + (data[2] ? data[1].descr_en : data[1].descr) + '</p>';
                    } else if (data[28]) {
                        str += '<p>' + (data[2] ? data[1].descr_en : data[1].descr) + '</p>';
                    } else if (data[29]) {
                        str += '<p>' + (data[2] ? data[1].descr_en : data[1].descr) + '</p>';
                    }
                    str += '<h4>' + data[30] + '</h4><ul class="list-unstyled pro-list wow fadeIn">';
                    if (data[31]) {
                        for (i = 0; i < data[32].length; i++) {

                            str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[32][i]["name"] + '</span>' +
                                '<span class="main-left-desc">' + (data[2] ? data[32][i]["pivot"]["attribute_value_en"] : data[32][i]["pivot"]["attribute_value"]) + '</span>' +
                                '</li>';
                        }
                    } else if (data[33]) {
                        for (i = 0; i < data[32].length; i++) {

                            str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[32][i]["name"] + '</span>' +
                                '<span class="main-left-desc">' + (data[2] ? data[32][i]["pivot"]["attribute_value_en"] : data[32][i]["pivot"]["attribute_value"]) + '</span>' +
                                '</li>';
                        }
                    } else if (data[34]) {
                        for (i = 0; i < data[32].length; i++) {

                            str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[32][i]["name"] + '</span>' +
                                '<span class="main-left-desc">' + (data[2] ? data[32][i]["pivot"]["attribute_value_en"] : data[32][i]["pivot"]["attribute_value"]) + '</span>' +
                                '</li>';
                        }
                    }

                    if (data[6]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[35] + '</span>' +
                            '<span class="main-left-desc">' + data[1].get_supplier.get_user.username + '</span>' +
                            '</li>';
                    } else if (data[8]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[35] + '</span>' +
                            '<span class="main-left-desc">' + data[1].get_supplier.get_user.username + '</span>' +
                            '</li>';
                    } else if (data[9]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[35] + '</span>' +
                            '<span class="main-left-desc">' + data[1].get_supplier.get_user.username + '</span>' +
                            '</li>';
                    }

                    if (data[36]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[37] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].get_categories.en_name : data[1].get_categories.name) + '</span>' +
                            '                                                </li>';
                    } else if (data[38]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[37] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].get_categories.en_name : data[1].get_categories.name) + '</span>' +
                            '                                                </li>';
                    } else if (data[9]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[37] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].get_categories.en_name : data[1].get_categories.name) + '</span>' +
                            '                                                </li>';
                    }

                    if (data[39]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[15] + '</span>' +
                            '<span class="main-left-desc">' + data[1].weight_product + '</span></li>';
                    } else if (data[40]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[15] + '</span>' +
                            '<span class="main-left-desc">' + data[1].weight_product + '</span></li>';
                    } else if (data[9]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[15] + '</span>' +
                            '<span class="main-left-desc">' + data[1].weight_product + '</span></li>';
                    }

                    if (data[41]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[42] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].fill_product_en : data[1].fill_product) + '</span>' +
                            '</li>';
                    } else if (data[43]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[42] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].fill_product_en : data[1].fill_product) + '</span>' +
                            '</li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[42] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].fill_product_en : data[1].fill_product) + '</span>' +
                            '</li>';
                    }

                    if (data[44]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[45] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].organic == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    } else if (data[46]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[45] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].organic == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[45] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].organic == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    }

                    if (data[47]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[48] + '</span>\n' +
                            '<span class="main-left-desc">' + (data[1].free_sugar == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';

                    } else if (data[49]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[48] + '</span>\n' +
                            '<span class="main-left-desc">' + (data[1].free_sugar == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[48] + '</span>\n' +
                            '<span class="main-left-desc">' + (data[1].free_sugar == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    }

                    if (data[50]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[51] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].free_lactose == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            '</li>';
                    } else if (data[52]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[51] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].free_lactose == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            '</li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[51] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].free_lactose == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            '</li>';
                    }

                    if (data[53]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[54] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].under_expire == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            ' </li>';
                    } else if (data[55]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[54] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].under_expire == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            ' </li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[54] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].under_expire == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            ' </li>';
                    }

                    str += '</ul>' +
                        '</div>' +
                        '</div>' +
                        ' </div>' +
                        '</div>' +
                        '                    </div>';
                    $('#product_details').append(str);
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
    $('.searchpro_categories').on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
//        var formData = $('.search_supplier').serialize();
        var arr = [];
        var category_name = $('#search_namecategory').val();
//
        $.each($("input[name='category_name']:checked"), function () {
            arr.push($(this).val());
        });
        $.ajax({
            type: 'POST',
            url: "/searchpro_categories",
            data: {category_name: category_name, arr: arr},

            success: function (data) {

                if (data[0] == 0) {
                    document.getElementById('product_details').innerHTML = '';
                    var no_result = '';
                    no_result += '<h1 align="right">' + data[1] + '</h1>';
                    $('#product_details').append(no_result);
                }

                if (data[0] == 1) {
                    console.log(data[12]);
                    var detail_product = '{{route("website.detail_product",":name")}}';
                    detail_product = detail_product.replace(':name', data[1].name);
                    document.getElementById('product_details').innerHTML = '';
                    var str = '';
                    str += '<div class="row">' +
                        ' <div class="col-lg-6 pro-head">';
                    if (data[3]) {
                        str += '<h3 class="pro-title wow fadeIn">' + (data[2] ? data[1].en_name : data[1].name) +
                            '<span></span></h3>';
                    } else if (data[4]) {
                        str += '<h3 class="pro-title wow fadeIn">' + (data[2] ? data[1].en_name : data[1].name) +
                            '<span></span></h3>';
                    } else if (data[5]) {
                        str += '<h3 class="pro-title wow fadeIn">' + (data[2] ? data[1].en_name : data[1].name) +
                            '<span></span></h3>';
                    }

                    if (data[6]) {
                        str += '<span class="pro-price wow fadeIn">' + data[7] + data[1].get_supplier.get_user.username + '</span>';

                    } else if (data[8]) {
                        str += '<span class="pro-price wow fadeIn">' + data[7] + data[1].get_supplier.get_user.username + '</span>';
                    } else if (data[9]) {
                        str += '<span class="pro-price wow fadeIn">' + data[7] + data[1].get_supplier.get_user.username + '</span>';
                    }
                    str += '</div>' +
                        '<div class="col-lg-6 pro-soc wow fadeIn">' +
                        '<div class="social-icons-pro">' +
                        ' <ul class="list-inline"><li class="share-soc">' +
                        '<a href="#" class="share_product" product_id="' + data[1].id + '">' +
                        '<i class="fa fa-share-alt"></i></a></li>' +
                        ' <li class="tw-soc"><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=' + detail_product + '">' +
                        '<i class="fa fa-twitter"></i></a></li><li class="goo-soc">' +
                        '<a href="https://plus.google.com/share?url=' + detail_product + '"><i class="fa fa-google-plus"></i></a></li>' +
                        '<li class="fc-soc"><a href="https://www.facebook.com/sharer/sharer.php?u=' + detail_product + '" class="social-button " id=""><i class="fa fa-facebook"></i></a></li>' +
                        '<li class="whats-soc"><a href="https://wa.me/?text=' + detail_product + '">' +
                        '<i class="fa fa-whatsapp"></i></a></li>' +
                        '<li class="fav-icon ' + (data[10] ? "red-fav" : "") + '"><a href="#" class="like_product" onclick="return  false;" product_id="' + data[1].id + '"><i class="fa fa-heart"></i></a></li>' +
                        '</ul>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="row border-div">';
                    if (data[11]) {
                        str += '<div class="col-lg-6 no-padd wow fadeIn">\n' +
                            '                                <div id="owl-demo"\n' +
                            '                                     class="text-center owl-carousel owl-theme first-owl product-carousel">';
                        var image = '{{asset("uploads/".":image")}}';
                        for (i = 0; i < data[12].length; i++) {

                            image = image.replace(':image', data[12][i].image);

                            str += '<div class="item"><a href="' + image + '" class="html5lightbox  pro-plus">' +
                                '<i class="fa fa-search-plus"></i></a><div class="pro-div">' +
                                '<div class="pro-img">' +
                                ' <a href="' + image + '" class="html5lightbox"><img src="' + image + '" alt="product"></a>' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>';
                        }
                        str += '</div></div>';
                    } else if (data[13]) {
                        str += '<div class="col-lg-6 no-padd wow fadeIn">' +
                            '                                <div id="owl-demo"' +
                            '                                     class="text-center owl-carousel owl-theme first-owl product-carousel">';
                        for (i = 0; i < data[12].length; i++) {
                            var img = '{{asset("uploads/".":image")}}';
                            img = img.replace(':image', data[12][i].image);

                            str += '<div class="item"><a href="' + img + '" class="html5lightbox  pro-plus">' +
                                '<i class="fa fa-search-plus"></i></a><div class="pro-div">' +
                                '<div class="pro-img">' +
                                ' <a href="' + img + '" class="html5lightbox"><img src="' + img + '" alt="product"></a>' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>';
                        }
                        str += '</div></div>';

                    } else if (data[5]) {
                        str += '<div class="col-lg-6 no-padd wow fadeIn">\n' +
                            '                                <div id="owl-demo"\n' +
                            '                                     class="text-center owl-carousel owl-theme first-owl product-carousel">';
                        for (i = 0; i < data[12].length; i++) {
                            var imge = '{{asset("uploads/".":image")}}';
                            imge = imge.replace(':image', data[12][i].image);

                            str += '<div class="item"><a href="' + imge + '" class="html5lightbox  pro-plus">' +
                                '<i class="fa fa-search-plus"></i></a><div class="pro-div">' +
                                '<div class="pro-img">' +
                                ' <a href="' + imge + '" class="html5lightbox"><img src="' + imge + '" alt="product"></a>' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>';
                        }
                        str += '</div></div>';

                    }


                    var save_order = "{{route('save_order')}}";
                    var token = '<input type="hidden" name="_token" value="' + data[56] + '">';
                    str += '<div class="col-lg-6 no-padd">' +
                        '<div class="left-product-details wow fadeIn"><div class="inner-pro-descripe">' +
                        '<span class="pro-gram">' + data[15] + '</span><div class="row"><div class="form-group col-md-3">' +
                        '<input type="text" value="' + data[1].weight_product + data[16] + '" style="background-color: white; border: hidden" id="weight_pro" disabled>' +
                        '</div><div class="form-group col-md-9">';
                    if (data[17]) {
                        if (data[1].quantity !== 0) {
                            str += '<form action="' + save_order + '" method="post">' +
                                token +
                                '<input type="hidden" name="product_id" value="' + data[1].id + '">' +
                                '<input type="hidden" name="product_name" value="' + data[1].name + '">' +
                                '<input type="hidden" name="qty" value="1">' +
                                '<button type="submit" class="dark_btn custom_btn big-btn" style="width: 250px;">' + data[18] + '</button>' +
                                '</form>';
                        }
                    }
                    str += '</div></div><h3>' + data[19] + '</h3><div class="text-center"><ul class="list-unstyled products-btns">';
                    if (data[20]) {
                        for (i = 0; i < data[21].length; i++) {
                            var attachment = '{{route("website.viewAttach",":attach")}}';
                            attachment = attachment.replace(':attach', data[21][i].attachment);

                            str += '<li><span>' + data[22] + ':' + '</span><a href="' + attachment + '" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i>' +
                                data[22] + '</a></li>';
                        }
                    } else if (data[23]) {
                        for (i = 0; i < data[21].length; i++) {
                            var attach = '{{route("website.viewAttach",":attach")}}';
                            attach = attach.replace(':attach', data[21][i].attachment);

                            str += '<li><span>' + data[22] + ':' + '</span><a href="' + attach + '" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i>' +
                                data[22] + '</a></li>';
                        }

                    } else if (data[24]) {
                        for (i = 0; i < data[21].length; i++) {
                            var attachs = '{{route("website.viewAttach",":attach")}}';
                            attachs = attachs.replace(':attach', data[21][i].attachment);

                            str += '<li><span>' + data[22] + ':' + '</span><a href="' + attachs + '" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i>' +
                                data[22] + '</a></li>';
                        }
                    }


                    str += '</ul></div></div></div></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-12">' +
                        '<div class="main-product-details wow fadeIn">' +
                        '                                <h3>' + data[25] + '</h3>' +
                        '                                <div class="inner-product-pro row">' +
                        '                                    <div class="col-lg-7">' +
                        '                                        <h4>' + data[26] + '</h4>';
                    if (data[27]) {
                        str += '<p>' + (data[2] ? data[1].descr_en : data[1].descr) + '</p>';
                    } else if (data[28]) {
                        str += '<p>' + (data[2] ? data[1].descr_en : data[1].descr) + '</p>';
                    } else if (data[29]) {
                        str += '<p>' + (data[2] ? data[1].descr_en : data[1].descr) + '</p>';
                    }
                    str += '<h4>' + data[30] + '</h4><ul class="list-unstyled pro-list wow fadeIn">';
                    if (data[31]) {
                        for (i = 0; i < data[32].length; i++) {

                            str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[32][i]["name"] + '</span>' +
                                '<span class="main-left-desc">' + (data[2] ? data[32][i]["pivot"]["attribute_value_en"] : data[32][i]["pivot"]["attribute_value"]) + '</span>' +
                                '</li>';
                        }
                    } else if (data[33]) {
                        for (i = 0; i < data[32].length; i++) {

                            str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[32][i]["name"] + '</span>' +
                                '<span class="main-left-desc">' + (data[2] ? data[32][i]["pivot"]["attribute_value_en"] : data[32][i]["pivot"]["attribute_value"]) + '</span>' +
                                '</li>';
                        }
                    } else if (data[34]) {
                        for (i = 0; i < data[32].length; i++) {

                            str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[32][i]["name"] + '</span>' +
                                '<span class="main-left-desc">' + (data[2] ? data[32][i]["pivot"]["attribute_value_en"] : data[32][i]["pivot"]["attribute_value"]) + '</span>' +
                                '</li>';
                        }
                    }

                    if (data[6]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[35] + '</span>' +
                            '<span class="main-left-desc">' + data[1].get_supplier.get_user.username + '</span>' +
                            '</li>';
                    } else if (data[8]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[35] + '</span>' +
                            '<span class="main-left-desc">' + data[1].get_supplier.get_user.username + '</span>' +
                            '</li>';
                    } else if (data[9]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[35] + '</span>' +
                            '<span class="main-left-desc">' + data[1].get_supplier.get_user.username + '</span>' +
                            '</li>';
                    }

                    if (data[36]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[37] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].get_categories.en_name : data[1].get_categories.name) + '</span>' +
                            '                                                </li>';
                    } else if (data[38]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[37] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].get_categories.en_name : data[1].get_categories.name) + '</span>' +
                            '                                                </li>';
                    } else if (data[9]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[37] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].get_categories.en_name : data[1].get_categories.name) + '</span>' +
                            '                                                </li>';
                    }

                    if (data[39]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[15] + '</span>' +
                            '<span class="main-left-desc">' + data[1].weight_product + '</span></li>';
                    } else if (data[40]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[15] + '</span>' +
                            '<span class="main-left-desc">' + data[1].weight_product + '</span></li>';
                    } else if (data[9]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[15] + '</span>' +
                            '<span class="main-left-desc">' + data[1].weight_product + '</span></li>';
                    }

                    if (data[41]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[42] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].fill_product_en : data[1].fill_product) + '</span>' +
                            '</li>';
                    } else if (data[43]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[42] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].fill_product_en : data[1].fill_product) + '</span>' +
                            '</li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[42] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].fill_product_en : data[1].fill_product) + '</span>' +
                            '</li>';
                    }

                    if (data[44]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[45] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].organic == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    } else if (data[46]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[45] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].organic == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[45] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].organic == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    }

                    if (data[47]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[48] + '</span>\n' +
                            '<span class="main-left-desc">' + (data[1].free_sugar == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';

                    } else if (data[49]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[48] + '</span>\n' +
                            '<span class="main-left-desc">' + (data[1].free_sugar == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[48] + '</span>\n' +
                            '<span class="main-left-desc">' + (data[1].free_sugar == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    }

                    if (data[50]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[51] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].free_lactose == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            '</li>';
                    } else if (data[52]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[51] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].free_lactose == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            '</li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[51] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].free_lactose == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            '</li>';
                    }

                    if (data[53]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[54] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].under_expire == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            ' </li>';
                    } else if (data[55]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[54] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].under_expire == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            ' </li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[54] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].under_expire == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            ' </li>';
                    }

                    str += '</ul>' +
                        '</div>' +
                        '</div>' +
                        ' </div>' +
                        '</div>' +
                        '                    </div>';
                    $('#product_details').append(str);
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
    $('.search_prosubcategories').on('submit', function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
//        var formData = $('.search_supplier').serialize();
        var arr = [];
        var subcategory_name = $('#search_namesubcategory').val();
//
        $.each($("input[name='subcategory_name']:checked"), function () {
            arr.push($(this).val());
        });
        $.ajax({
            type: 'POST',
            url: "/search_prosubcategories",
            data: {subcategory_name: subcategory_name, arr: arr},

            success: function (data) {

                if (data[0] == 0) {
                    document.getElementById('product_details').innerHTML = '';
                    var no_result = '';
                    no_result += '<h1 align="right">' + data[1] + '</h1>';
                    $('#product_details').append(no_result);
                }

                if (data[0] == 1) {
                    console.log(data[12]);
                    var detail_product = '{{route("website.detail_product",":name")}}';
                    detail_product = detail_product.replace(':name', data[1].name);
                    document.getElementById('product_details').innerHTML = '';
                    var str = '';
                    str += '<div class="row">' +
                        ' <div class="col-lg-6 pro-head">';
                    if (data[3]) {
                        str += '<h3 class="pro-title wow fadeIn">' + (data[2] ? data[1].en_name : data[1].name) +
                            '<span></span></h3>';
                    } else if (data[4]) {
                        str += '<h3 class="pro-title wow fadeIn">' + (data[2] ? data[1].en_name : data[1].name) +
                            '<span></span></h3>';
                    } else if (data[5]) {
                        str += '<h3 class="pro-title wow fadeIn">' + (data[2] ? data[1].en_name : data[1].name) +
                            '<span></span></h3>';
                    }

                    if (data[6]) {
                        str += '<span class="pro-price wow fadeIn">' + data[7] + data[1].get_supplier.get_user.username + '</span>';

                    } else if (data[8]) {
                        str += '<span class="pro-price wow fadeIn">' + data[7] + data[1].get_supplier.get_user.username + '</span>';
                    } else if (data[9]) {
                        str += '<span class="pro-price wow fadeIn">' + data[7] + data[1].get_supplier.get_user.username + '</span>';
                    }
                    str += '</div>' +
                        '<div class="col-lg-6 pro-soc wow fadeIn">' +
                        '<div class="social-icons-pro">' +
                        ' <ul class="list-inline"><li class="share-soc">' +
                        '<a href="#" class="share_product" product_id="' + data[1].id + '">' +
                        '<i class="fa fa-share-alt"></i></a></li>' +
                        ' <li class="tw-soc"><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=' + detail_product + '">' +
                        '<i class="fa fa-twitter"></i></a></li><li class="goo-soc">' +
                        '<a href="https://plus.google.com/share?url=' + detail_product + '"><i class="fa fa-google-plus"></i></a></li>' +
                        '<li class="fc-soc"><a href="https://www.facebook.com/sharer/sharer.php?u=' + detail_product + '" class="social-button " id=""><i class="fa fa-facebook"></i></a></li>' +
                        '<li class="whats-soc"><a href="https://wa.me/?text=' + detail_product + '">' +
                        '<i class="fa fa-whatsapp"></i></a></li>' +
                        '<li class="fav-icon ' + (data[10] ? "red-fav" : "") + '"><a href="#" class="like_product" onclick="return  false;" product_id="' + data[1].id + '"><i class="fa fa-heart"></i></a></li>' +
                        '</ul>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="row border-div">';
                    if (data[11]) {
                        str += '<div class="col-lg-6 no-padd wow fadeIn">\n' +
                            '                                <div id="owl-demo"\n' +
                            '                                     class="text-center owl-carousel owl-theme first-owl product-carousel">';
                        var image = '{{asset("uploads/".":image")}}';
                        for (i = 0; i < data[12].length; i++) {

                            image = image.replace(':image', data[12][i].image);

                            str += '<div class="item"><a href="' + image + '" class="html5lightbox  pro-plus">' +
                                '<i class="fa fa-search-plus"></i></a><div class="pro-div">' +
                                '<div class="pro-img">' +
                                ' <a href="' + image + '" class="html5lightbox"><img src="' + image + '" alt="product"></a>' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>';
                        }
                        str += '</div></div>';
                    } else if (data[13]) {
                        str += '<div class="col-lg-6 no-padd wow fadeIn">' +
                            '                                <div id="owl-demo"' +
                            '                                     class="text-center owl-carousel owl-theme first-owl product-carousel">';
                        for (i = 0; i < data[12].length; i++) {
                            var img = '{{asset("uploads/".":image")}}';
                            img = img.replace(':image', data[12][i].image);

                            str += '<div class="item"><a href="' + img + '" class="html5lightbox  pro-plus">' +
                                '<i class="fa fa-search-plus"></i></a><div class="pro-div">' +
                                '<div class="pro-img">' +
                                ' <a href="' + img + '" class="html5lightbox"><img src="' + img + '" alt="product"></a>' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>';
                        }
                        str += '</div></div>';

                    } else if (data[5]) {
                        str += '<div class="col-lg-6 no-padd wow fadeIn">\n' +
                            '                                <div id="owl-demo"\n' +
                            '                                     class="text-center owl-carousel owl-theme first-owl product-carousel">';
                        for (i = 0; i < data[12].length; i++) {
                            var imge = '{{asset("uploads/".":image")}}';
                            imge = imge.replace(':image', data[12][i].image);

                            str += '<div class="item"><a href="' + imge + '" class="html5lightbox  pro-plus">' +
                                '<i class="fa fa-search-plus"></i></a><div class="pro-div">' +
                                '<div class="pro-img">' +
                                ' <a href="' + imge + '" class="html5lightbox"><img src="' + imge + '" alt="product"></a>' +
                                '                                                </div>\n' +
                                '                                            </div>\n' +
                                '                                        </div>';
                        }
                        str += '</div></div>';

                    }


                    var save_order = "{{route('save_order')}}";
                    var token = '<input type="hidden" name="_token" value="' + data[56] + '">';
                    str += '<div class="col-lg-6 no-padd">' +
                        '<div class="left-product-details wow fadeIn"><div class="inner-pro-descripe">' +
                        '<span class="pro-gram">' + data[15] + '</span><div class="row"><div class="form-group col-md-3">' +
                        '<input type="text" value="' + data[1].weight_product + data[16] + '" style="background-color: white; border: hidden" id="weight_pro" disabled>' +
                        '</div><div class="form-group col-md-9">';
                    if (data[17]) {
                        if (data[1].quantity !== 0) {
                            str += '<form action="' + save_order + '" method="post">' +
                                token +
                                '<input type="hidden" name="product_id" value="' + data[1].id + '">' +
                                '<input type="hidden" name="product_name" value="' + data[1].name + '">' +
                                '<input type="hidden" name="qty" value="1">' +
                                '<button type="submit" class="dark_btn custom_btn big-btn" style="width: 250px;">' + data[18] + '</button>' +
                                '</form>';
                        }
                    }
                    str += '</div></div><h3>' + data[19] + '</h3><div class="text-center"><ul class="list-unstyled products-btns">';
                    if (data[20]) {
                        for (i = 0; i < data[21].length; i++) {
                            var attachment = '{{route("website.viewAttach",":attach")}}';
                            attachment = attachment.replace(':attach', data[21][i].attachment);

                            str += '<li><span>' + data[22] + ':' + '</span><a href="' + attachment + '" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i>' +
                                data[22] + '</a></li>';
                        }
                    } else if (data[23]) {
                        for (i = 0; i < data[21].length; i++) {
                            var attach = '{{route("website.viewAttach",":attach")}}';
                            attach = attach.replace(':attach', data[21][i].attachment);

                            str += '<li><span>' + data[22] + ':' + '</span><a href="' + attach + '" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i>' +
                                data[22] + '</a></li>';
                        }

                    } else if (data[24]) {
                        for (i = 0; i < data[21].length; i++) {
                            var attachs = '{{route("website.viewAttach",":attach")}}';
                            attachs = attachs.replace(':attach', data[21][i].attachment);

                            str += '<li><span>' + data[22] + ':' + '</span><a href="' + attachs + '" class="dark_btn custom_btn"><i class="fa  fa-file-pdf-o"></i>' +
                                data[22] + '</a></li>';
                        }
                    }


                    str += '</ul></div></div></div></div>' +
                        '</div>' +
                        '<div class="row">' +
                        '<div class="col-12">' +
                        '<div class="main-product-details wow fadeIn">' +
                        '                                <h3>' + data[25] + '</h3>' +
                        '                                <div class="inner-product-pro row">' +
                        '                                    <div class="col-lg-7">' +
                        '                                        <h4>' + data[26] + '</h4>';
                    if (data[27]) {
                        str += '<p>' + (data[2] ? data[1].descr_en : data[1].descr) + '</p>';
                    } else if (data[28]) {
                        str += '<p>' + (data[2] ? data[1].descr_en : data[1].descr) + '</p>';
                    } else if (data[29]) {
                        str += '<p>' + (data[2] ? data[1].descr_en : data[1].descr) + '</p>';
                    }
                    str += '<h4>' + data[30] + '</h4><ul class="list-unstyled pro-list wow fadeIn">';
                    if (data[31]) {
                        for (i = 0; i < data[32].length; i++) {

                            str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[32][i]["name"] + '</span>' +
                                '<span class="main-left-desc">' + (data[2] ? data[32][i]["pivot"]["attribute_value_en"] : data[32][i]["pivot"]["attribute_value"]) + '</span>' +
                                '</li>';
                        }
                    } else if (data[33]) {
                        for (i = 0; i < data[32].length; i++) {

                            str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[32][i]["name"] + '</span>' +
                                '<span class="main-left-desc">' + (data[2] ? data[32][i]["pivot"]["attribute_value_en"] : data[32][i]["pivot"]["attribute_value"]) + '</span>' +
                                '</li>';
                        }
                    } else if (data[34]) {
                        for (i = 0; i < data[32].length; i++) {

                            str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[32][i]["name"] + '</span>' +
                                '<span class="main-left-desc">' + (data[2] ? data[32][i]["pivot"]["attribute_value_en"] : data[32][i]["pivot"]["attribute_value"]) + '</span>' +
                                '</li>';
                        }
                    }

                    if (data[6]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[35] + '</span>' +
                            '<span class="main-left-desc">' + data[1].get_supplier.get_user.username + '</span>' +
                            '</li>';
                    } else if (data[8]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[35] + '</span>' +
                            '<span class="main-left-desc">' + data[1].get_supplier.get_user.username + '</span>' +
                            '</li>';
                    } else if (data[9]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[35] + '</span>' +
                            '<span class="main-left-desc">' + data[1].get_supplier.get_user.username + '</span>' +
                            '</li>';
                    }

                    if (data[36]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[37] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].get_categories.en_name : data[1].get_categories.name) + '</span>' +
                            '                                                </li>';
                    } else if (data[38]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[37] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].get_categories.en_name : data[1].get_categories.name) + '</span>' +
                            '                                                </li>';
                    } else if (data[9]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[37] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].get_categories.en_name : data[1].get_categories.name) + '</span>' +
                            '                                                </li>';
                    }

                    if (data[39]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[15] + '</span>' +
                            '<span class="main-left-desc">' + data[1].weight_product + '</span></li>';
                    } else if (data[40]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[15] + '</span>' +
                            '<span class="main-left-desc">' + data[1].weight_product + '</span></li>';
                    } else if (data[9]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[15] + '</span>' +
                            '<span class="main-left-desc">' + data[1].weight_product + '</span></li>';
                    }

                    if (data[41]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[42] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].fill_product_en : data[1].fill_product) + '</span>' +
                            '</li>';
                    } else if (data[43]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[42] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].fill_product_en : data[1].fill_product) + '</span>' +
                            '</li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[42] + '</span>' +
                            '<span class="main-left-desc">' + (data[2] ? data[1].fill_product_en : data[1].fill_product) + '</span>' +
                            '</li>';
                    }

                    if (data[44]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[45] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].organic == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    } else if (data[46]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[45] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].organic == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[45] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].organic == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    }

                    if (data[47]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[48] + '</span>\n' +
                            '<span class="main-left-desc">' + (data[1].free_sugar == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';

                    } else if (data[49]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[48] + '</span>\n' +
                            '<span class="main-left-desc">' + (data[1].free_sugar == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[48] + '</span>\n' +
                            '<span class="main-left-desc">' + (data[1].free_sugar == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") + '</span>' +
                            '</li>';
                    }

                    if (data[50]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[51] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].free_lactose == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            '</li>';
                    } else if (data[52]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[51] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].free_lactose == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            '</li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[51] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].free_lactose == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            '</li>';
                    }

                    if (data[53]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[54] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].under_expire == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            ' </li>';
                    } else if (data[55]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[54] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].under_expire == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            ' </li>';
                    } else if (data[5]) {
                        str += '<li class="wow fadeInUp"><span class="main-right-desc">' + data[54] + '</span>' +
                            '<span class="main-left-desc">' + (data[1].under_expire == 2 ? "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>") +
                            '</span>' +
                            ' </li>';
                    }

                    str += '</ul>' +
                        '</div>' +
                        '</div>' +
                        ' </div>' +
                        '</div>' +
                        '                    </div>';
                    $('#product_details').append(str);
                }
            }

        })
    });
    $('.search_product').on('submit', function (e) {
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
@yield('script')