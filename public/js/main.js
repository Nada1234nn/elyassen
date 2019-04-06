$(document).ready(function () {
    // Search
    $('.search .search-button').click(function () {
        $(this).parent().toggleClass('open');
        $('.open input').focus();
    });
    //language=JQuery-CSS
    $(".delete,.btn-danger,.text-danger-600 a").click(function () {
        swal({
                title: "تأكيد الحذف",
                text: "لن تستطيع إسترجاع العنصر المحذوف",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "نعم نفذ عملية الحذف",
                closeOnConfirm: false
            },
            function () {
                swal("تم", "تم حذف الملف بنجاح", "success");
            });
    });
});
// delete group with its item
$(document).on("click", ".destroyItemGroup", function () {
    // $('form').on('click', '.sweet_warning', function() {
//
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })

    var id = $(this).attr('object_id');
    console.log(id);
    var d_url = $(this).attr('delete_url');
    var elem = $(this).parent('div').parent('div').parent('.itemsContainer');
    console.log(elem);

    var token = $('meta[name="_token"]').attr('content');
    swal({
            title: "هل انت متأكد ؟",
            text: "سيتم الحذف بشكل نهائي ولن تكون قادرا على استعادة المعلومات",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "نعم ، قم بالحذف !",
            cancelButtonText: "الغاء الحذف",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {


            if (isConfirm) {


                $.ajax({
                    url: d_url,
                    type: "DELETE",
                    data: "",
                    success: function (result) {
                        // console.log(result);


                    }
                });
                elem.hide(1000);


                swal({
                    title: "تم الحذف ",
                    text: "نعم !",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });


            }
            else {
                swal({
                    title: "تم الغاء الطلب",
                    text: "تم الغاء طلب الحذف بنجاح !",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                });
            }
        });
});
// delete single item from group
$(document).on("click", ".destroyItem", function () {
    // $('form').on('click', '.sweet_warning', function() {
//
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    })

    var id = $(this).attr('object_id');
    var d_url = $(this).attr('delete_url');
    var elem = $(this).parent('div').parent('div');

    var token = $('meta[name="_token"]').attr('content');
    swal({
            title: "هل انت متأكد ؟",
            text: "سيتم الحذف بشكل نهائي ولن تكون قادرا على استعادة المعلومات",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "نعم ، قم بالحذف !",
            cancelButtonText: "الغاء الحذف",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {


            if (isConfirm) {


                $.ajax({
                    type: 'post',
                    url: d_url,
                    data: {id: id},
                    contentType: 'application/json',

                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                    },

                    success: function (result) {
                        elem.hide(100);


                    }
                });
                elem.hide(1000);


                swal({
                    title: "تم الحذف ",
                    text: "نعم !",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });


            }
            else {
                swal({
                    title: "تم الغاء الطلب",
                    text: "تم الغاء طلب الحذف بنجاح !",
                    confirmButtonColor: "#2196F3",
                    type: "error"
                });
            }
        });
});