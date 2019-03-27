document.querySelector('.sweet-2').onclick = function () {
    swal({
            title: "هل أنت متأكد؟",
            text: "لن تستطيع إستعادته مره اخري",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'حذف',
            cancelButtonText: "إلغاء",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {
            if (isConfirm) {
                swal({

                    title: "الحذف",
                    text: "تم الحذف بنجاح",
                    type: "success",
                    confirmButtonText: 'تم'
                });
            } else {
                swal({
                    title: "إلغاء",
                    text: "تم الإلغاء بنجاح",
                    type: "error",
                    confirmButtonText: 'تم',

                });
            }
        });
};

