/* ------------------------------------------------------------------------------
 *
 *  # Modal dialogs and extensions
 *
 *  Specific JS code additions for components_modals.html page
 *
 *  Version: 1.0
 *  Latest update: Aug 1, 2015
 *
 * ---------------------------------------------------------------------------- */

$(function () {



    // Bootbox extension
    // ------------------------------

    // Alert dialog
    $('#alert').on('click', function () {
        bootbox.alert("Native alert dialog has been replaced with Bootbox alert box.");
    });

    // Confirmation dialog
    $('#confirm').on('click', function () {
        bootbox.confirm("Native confirm dialog has been replaced with Bootbox confirm box.", function (result) {
            bootbox.alert("Confirm result: " + result)
        });
    });

    // Prompt dialog
    $('#prompt').on('click', function () {
        bootbox.prompt("Please enter your name", function (result) {
            if (result === null) {
                bootbox.alert("Prompt dismissed");
            } else {
                bootbox.alert("Hi <b>" + result + "</b>");
            }
        });
    });


    // Modal callbacks
    // ------------------------------

    // onShow callback
    $('#onshow_callback').on('click', function () {
        $('#modal_default').on('show.bs.modal', function () {
            alert('onShow callback fired.')
        });
    });

    // onShown callback
    $('#onshown_callback').on('click', function () {
        $('#modal_form_vertical').on('shown.bs.modal', function () {
            alert('onShown callback fired.')
        });
    });

    // onHide callback
    $('#onhide_callback').on('click', function () {
        $('#modal_subtitle').on('hide.bs.modal', function () {
            alert('onHide callback fired.')
        });
    });

    // onHidden callback
    $('#onhidden_callback').on('click', function () {
        $('#modal_theme_success').on('hidden.bs.modal', function () {
            alert('onHidden callback fired.')
        });
    });


    // Sweet Alert extension
    // ------------------------------

    // Basic
    $('#sweet_basic').on('click', function () {
        swal({
            title: "Here's a message!",
            confirmButtonColor: "#2196F3"
        });
    });

    // With title
    $('#sweet_title_text').on('click', function () {
        swal({
            title: "Here's a message!",
            text: "It's pretty, isn't it?",
            confirmButtonColor: "#2196F3"
        });
    });

    // Auto closing
    $('#sweet_auto_closer').on('click', function () {
        swal({
            title: "Auto close alert!",
            text: "I will close in 2 seconds.",
            confirmButtonColor: "#2196F3",
            timer: 2000
        });
    });

    // HTML message
    $('#sweet_html').on('click', function () {
        swal({
            title: "HTML <small>small subtitle</small>",
            text: "A custom <span style='color:#F8BB86'>html<span> message.",
            html: true,
            confirmButtonColor: "#2196F3"
        });
    });

    // Prompt
    $('#sweet_prompt').on('click', function () {
        swal({
                title: "An input!",
                text: "Write something interesting:",
                type: "input",
                showCancelButton: true,
                confirmButtonColor: "#2196F3",
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Write something"
            },
            function (inputValue) {
                if (inputValue === false) return false;
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }
                swal({
                    title: "Nice!",
                    text: "You wrote: " + inputValue,
                    type: "success",
                    confirmButtonColor: "#2196F3"
                });
            });
    });

    // AJAX loader
    $('#sweet_loader').on('click', function () {
        swal({
                title: "Ajax request example",
                text: "Submit to run ajax request",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                confirmButtonColor: "#2196F3",
                showLoaderOnConfirm: true
            },
            function () {
                setTimeout(function () {
                    swal({
                        title: "Ajax request finished!",
                        confirmButtonColor: "#2196F3"
                    });
                }, 2000);
            });
    });


    //
    // Contextual alerts
    //

    // Success alert
    $('#sweet_success').on('click', function () {
        swal({
            title: "Good job!",
            text: "You clicked the button!",
            confirmButtonColor: "#66BB6A",
            type: "success"
        });
    });

    // Error alert
    $('#sweet_error').on('click', function () {
        swal({
            title: "Oops...",
            text: "Something went wrong!",
            confirmButtonColor: "#EF5350",
            type: "error"
        });
    });

    // Warning alert
    // $('#sweet_warning').on('click', function() {
    //     swal({
    //         title: "هل انت متأكد ؟",
    //         text: "سيتم الحذف بشكل نهائي ولن تكون قادرا على استعادة المعلومات",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#FF7043",
    //         confirmButtonText: "Yes, delete it!"
    //     });
    // });

    // Info alert
    $('#sweet_info').on('click', function () {
        swal({
            title: "For your information",
            text: "This is some sort of a custom alert",
            confirmButtonColor: "#2196F3",
            type: "info"
        });
    });

    // Alert combination
    $(document).on("click", ".sweet_warning", function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        var id = $(this).attr('object_id');
        var d_url = $(this).attr('delete_url');
        var elem = $(this).parent('td').parent('tr');

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
                        type: 'DELETE',
                        url: d_url + id,
                        data: {id: id},
                        contentType: 'application/json',

                        beforeSend: function (xhr) {
                            xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));
                        },

                        success: function (result) {


                        }
                    });
                    elem.remove();

                    swal({
                        title: "تم الحذف ",
                        text: "تمت عملية الحذف بشكل نهائي !",
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

    // Alert combination
    $(document).on("click", ".block_user", function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        var id = $(this).attr('object_id');
        var d_url = $(this).attr('delete_url');
        var elem = $(this).parent('li').parent('ul').parent('td').parent('tr');
        var token = $('meta[name="_token"]').attr('content');
        swal({
                title: "هل انت متأكد ؟",
                text: "سيتم حظر العضو ولن يتمكن من التفاعل على الموقع",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "نعم ، قم بالحظر !",
                cancelButtonText: "الغاء الحظر",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {


                if (isConfirm) {


                    $.ajax({
                        url: d_url,
                        type: "GET",
                        data: "",
                        success: function (result) {
                        }
                    });
                    //elem.hide(1000);

                    swal({
                        title: "تم الحظر ",
                        text: "تمت عملية الحظر بشكل نهائي !",
                        confirmButtonColor: "#66BB6A",
                        type: "success",
                        timer: 10000
                    })
                    // window.location.replace('/admin/users');
                    // location.reload();
                    $('.confirm').click(function () {
                        window.location = '/admin/users';
                    });

                }
                else {
                    swal({
                        title: "تم الغاء الطلب",
                        text: "تم الغاء طلب الحظر بنجاح !",
                        confirmButtonColor: "#2196F3",
                        type: "error"
                    });
                }
            });
    });


});

