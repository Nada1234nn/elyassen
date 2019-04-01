$(document).ready(function (e) {
    $('.category_id').change(function () {
        var category_id = $(this).val();
        $.ajax({
            url: '/getSubcategories/' + category_id,
            success: function (data) {
                document.getElementById('sub_category_id').innerHTML = '';
                var str = '';
                str += '<label>' + data[0] + '</label>' +
                    '      <select class="form-control category_id" name="subcategory_id" required >' +
                    '         <option >' + data[0] + '</option>';
                for (i = 0; i < data[1].length; i++) {
                    str += '<option value=' + data[1][i].id + '>' + data[1][i].name + '</option>'
                }
                str += '         </select>';
                $('.sub_category_id').append(str);

                document.getElementById('attribute_category').innerHTML = '';
                var str_attribute = '';
                for (i = 0; i < data[1].length; i++) {

                    str_attribute += '<div class="form-group col-md-3">\n' +
                        ' <label>' + data[1][i].name + '</label>\n' +
                        '                        <input type="text" class="form-control" name="' + data[1][i].name + '" value="" required>\n' +
                        '                        <div class="invalid-feedback">' +
                        '                            من فضلك أدخل لون المنتج\n' +
                        '                        </div>' +
                        '                    </div>\n' +
                        '<div class="form-group col-md-3">\n' +
                        ' <label>' + data[1][i].en_name + '</label>\n' +
                        '                        <input type="text" class="form-control" name="' + data[1][i].en_name + '" value="" required>\n' +
                        '                        <div class="invalid-feedback">\n' +
                        '                            من فضلك أدخل لون المنتج\n' +
                        '                        </div>' +
                        '                    </div>\n'
                }
                str_attribute += '                    <div class="form-group col-md-6">\n' +
                    '                        <div class="form-check form-check-inline">\n' +
                    '                            <input class="form-check-input custom-control-input" type="checkbox"\n' +
                    '                                   id="attribute_category_v_pro" value="1" name="attribute_category_v_pro" {{isset($product_role)?\'checked\':\'\'}}>\n' +
                    '                            <label class="form-check-label custom-control-label" for="attribute_category_v_pro">v</label>\n' +
                    '                        </div>\n' +
                    '                        <div class="form-check form-check-inline">\n' +
                    '                            <input class="form-check-input custom-control-input" type="checkbox"\n' +
                    '                                   id="attribute_category_c_pro" value="1" name="attribute_category_c_pro" {{isset($product_role)?\'checked\':\'\'}}>\n' +
                    '                            <label class="form-check-label custom-control-label" for="attribute_category_c_pro">c</label>\n' +
                    '                        </div>\n' +
                    '\n' +
                    '                        <div class="form-check form-check-inline">\n' +
                    '                            <input class="form-check-input custom-control-input" type="checkbox"\n' +
                    '                                   id="attribute_category_s_pro" value="1" name="attribute_category_s_pro" {{isset($product_role)?\'checked\':\'\'}}>\n' +
                    '                            <label class="form-check-label custom-control-label" for="attribute_category_s_pro">s</label>\n' +
                    '                        </div>\n' +
                    '\n' +
                    '                        <div class="form-check form-check-inline">\n' +
                    '                            <input class="form-check-input custom-control-input" type="checkbox"\n' +
                    '                                   id="attribute_category_e_pro" value="1" name="attribute_category_e_pro" {{isset($product_role)?\'checked\':\'\'}}>\n' +
                    '                            <label class="form-check-label custom-control-label" for="attribute_category_e_pro">e</label>\n' +
                    '                        </div>\n' +
                    '\n' +
                    '                    </div>\n';
                $('.attribute_category').append(str_attribute);
            }
        });

    });

})