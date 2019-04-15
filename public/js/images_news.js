$(".btn-success").click(function () {
    var html = $(".clone").html();
    $(".increment").after(html);
});

$("body").on("click", ".btn-danger", function () {
    $(this).parents(".control-group").remove();
});

// function chooseSlider() {
//     document.getElementById('image_slidershow').innerHTML='';
//     var str='';
//     str+='<div class="form-group col-12">\n' +
//  '<label>'+'اضف صوره الاسلايدر'+'</label>'+
//
//     '                        <input type="file" name="image_slider" id="chooseFile"\n' +
//         '                        value="" onchange="readURL(this);"\n' +
//         '                        class="form-control" >' +
//         '                        <div class="invalid-feedback">\n' +
//         '                        من فضلك أدخل ملف صحيح\n' +
//         '                        </div>\n' +
//         '                        </div>\n' +
//         '                        <hr>\n' +
//         '\n' +
//         '                        <div class="form-group col-12">\n' +
//         '                        <img width="150" height="100px" class="thumb-preview" id="blah" style="margin: auto auto 10px;\n' +
//         '                        display: block;" align="center" src=""' +
//         '                        alt=""/>\n' +
//         '\n' +
//         '                        </div>';
//     $('#image_slidershow').append(str);
//
//     $('.chooseLastNews').on('change',function (){
//         document.getElementById('image_slidershow').innerHTML='';
//         $('.chooseSlider').on('change',function () {
//             document.getElementById('image_slidershow').innerHTML='';
//             var str='';
//             str+='<div class="form-group col-12">\n' +
//                 '<label>'+'اضف صوره الاسلايدر'+'</label>'+
//
//                 '                        <input type="file" name="image_slider" id="chooseFile"\n' +
//                 '                        value="" onchange="readURL(this);"\n' +
//                 '                        class="form-control" >' +
//                 '                        <div class="invalid-feedback">\n' +
//                 '                        من فضلك أدخل ملف صحيح\n' +
//                 '                        </div>\n' +
//                 '                        </div>\n' +
//                 '                        <hr>\n' +
//                 '\n' +
//                 '                        <div class="form-group col-12">\n' +
//                 '                        <img width="150" height="100px" class="thumb-preview" id="blah" style="margin: auto auto 10px;\n' +
//                 '                        display: block;" align="center" src=""' +
//                 '                        alt=""/>\n' +
//                 '\n' +
//                 '                        </div>';
//             $('#image_slidershow').append(str);
//         });
//     });
// }
// function chooseLastNews() {
//     document.getElementById('image_slidershow').innerHTML='';
//     $('.chooseSlider').on('change',function () {
//         document.getElementById('image_slidershow').innerHTML='';
//         var str='';
//         str+='<div class="form-group col-12">\n' +
//             '<label>'+'اضف صوره الاسلايدر'+'</label>'+
//
//             '                        <input type="file" name="image_slider" id="chooseFile"\n' +
//             '                        value="" onchange="readURL(this);"\n' +
//             '                        class="form-control" >' +
//             '                        <div class="invalid-feedback">\n' +
//             '                        من فضلك أدخل ملف صحيح\n' +
//             '                        </div>\n' +
//             '                        </div>\n' +
//             '                        <hr>\n' +
//             '\n' +
//             '                        <div class="form-group col-12">\n' +
//             '                        <img width="150" height="100px" class="thumb-preview" id="blah" style="margin: auto auto 10px;\n' +
//             '                        display: block;" align="center" src=""' +
//             '                        alt=""/>\n' +
//             '\n' +
//             '                        </div>';
//         $('#image_slidershow').append(str);
//     });
//
// }


// // $(document).ready(function (e) {
// function readImageURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//
//         reader.onload = function (e) {
//             $('#image')
//                 .attr('src', e.target.result)
//                 .width(150)
//                 .height(200);
//         };
//
//         reader.readAsDataURL(input.files[0]);
//     }
// }
// // $(document).ready(function (e) {
// function readClONEURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//
//         reader.onload = function (e) {
//             $('#clone_image')
//                 .attr('src', e.target.result)
//                 .width(150)
//                 .height(200);
//         };
//
//         reader.readAsDataURL(input.files[0]);
//     }
// }