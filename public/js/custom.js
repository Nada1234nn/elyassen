//wow
new WOW().init();


//responsive nav
$(".nav-icon").click(function () {
    $(".nav-grid,.fixed-dash-menu").toggleClass("open-nav");
    $(this).toggleClass("active-bar");
    $(".top-pg").addClass("hide-top-pg");
});





$(function () {
    var $win = $(window); // or $box parent container
    var $box = $(".nav-icon,.nav-grid,.fixed-dash-menu");
    $win.on("click.Bst", function (event) {
        if (
            $box.has(event.target).length === 0 && //checks if descendants of $box was clicked
            !$box.is(event.target) //checks if the $box itself was clicked
        ) {

            $(".nav-grid,.fixed-dash-menu").removeClass("open-nav");
            $(".nav-icon").removeClass("active-bar");
            $(".top-pg").removeClass("hide-top-pg");

        }
    });
});




//nav scroll
$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    var headheight = 40;
    //>=, not <=
    if (scroll >= headheight) {
        //clearHeader, not clearheader - caps H
        $(".main-header").addClass("header-fixed");
        $('.slider,.pages-header').css('margin-top',"0");
        $('.main-header').css('top', '0');




    } else {
        $(".main-header").removeClass("header-fixed");
    var headerHeight = $('.top-pg').outerHeight();
    var headerHeight2 = $('.main-header').outerHeight();
    $('.main-header').css('top', headerHeight);
    $('.slider,.pages-header').css('margin-top', headerHeight2);
    
    }
});

//snake
$(function () {
$(".snake").snakeify({speed: 200});
});


//header height
$(document).ready(function () {
    var headerHeight = $('.top-pg').outerHeight();
    var headerHeight2 = $('.main-header').outerHeight();
    $('.main-header').css('top', headerHeight);
    $('.slider,.pages-header').css('margin-top', headerHeight2);

});


//login
$(".login-head").click(function () {
    $(".login-div ul").toggleClass("open-login");
});



$(function () {
    var $winq = $(window); // or $box parent container
    var $boxq = $(".login-div");
    $winq.on("click.Bst", function (event) {
        if (
            $boxq.has(event.target).length === 0 && //checks if descendants of $box was clicked
            !$boxq.is(event.target) //checks if the $box itself was clicked
        ) {

            $(".login-div ul").removeClass("open-login");
        }
    });
});




//pagination

$(function () {

    /* initiate the plugin */
    $("div.holder1").jPages({
        containerID: "itemContainer",
    });
    $("div.holder2").jPages({
        containerID: "itemContainer2",
        perPage:5
    });

    $("div.holder3").jPages({
        containerID: "itemContainer3",
        perPage:6
    });
  
  

});

//img src change
$(".converted-img").each(function(i, elem) {
    var img_conv = $(elem);
       img_conv.parent(".full-width-img").css({
        backgroundImage: "url(" + img_conv.attr("src") + ")"
    });
  });


//card
$(".card-header h2").click(function () {
    $(this).parent().toggleClass("card-header-active");
    $(this).parent().parent().siblings().find(".card-header").removeClass("card-header-active");
});

//fav
// $(".fav-icon").click(function () {
//     $(this).toggleClass("red-fav");
// });


//soc

$(".social-icons-pro li").on({
    mouseenter: function () {
        $(this).siblings().addClass("soc-opacity");
    },
    mouseleave: function () {
        $(this).siblings().removeClass("soc-opacity");
    }
});


//file-upload

$('#chooseFile').bind('change', function () {
    var filename = $("#chooseFile").val();
    if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $("#noFile").text("");
    } else {
        $(".file-upload").addClass('active');
        $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
    }
});

$('#chooseFile2').bind('change', function () {
    var filename2 = $("#chooseFile2").val();
    if (/^\s*$/.test(filename2)) {
        $(".file-upload2").removeClass('active');
        $("#noFile2").text("");
    } else {
        $(".file-upload2").addClass('active');
        $("#noFile2").text(filename2.replace("C:\\fakepath\\", ""));
    }
});


$('#chooseFile3').bind('change', function () {
    var filename3 = $("#chooseFile3").val();
    if (/^\s*$/.test(filename3)) {
        $(".file-upload3").removeClass('active');
        $("#noFile3").text("");
    } else {
        $(".file-upload3").addClass('active');
        $("#noFile3").text(filename3.replace("C:\\fakepath\\", ""));
    }
});


$('#chooseFile4').bind('change', function () {
    var filename4 = $("#chooseFile4").val();
    if (/^\s*$/.test(filename4)) {
        $(".file-upload4").removeClass('active');
        $("#noFile4").text("");
    } else {
        $(".file-upload4").addClass('active');
        $("#noFile4").text(filename4.replace("C:\\fakepath\\", ""));
    }
});




//open caret

$(".crt-icon").click(function () {
    $(".caret-list").slideToggle();
});
$(function () {
    var $wine = $(window); // or $box parent container
    var $boxe = $(".caret-list,.crt-icon,.remove-icon");
    $wine.on("click.Bst", function (event) {
        if (
            $boxe.has(event.target).length === 0 && //checks if descendants of $box was clicked
            !$boxe.is(event.target) //checks if the $box itself was clicked
        ) {
            $(".caret-list").slideUp();

        }
    });
});




//remove caret
$(".remove-icon").click(function () {
    $(this).parent().remove();
});

//slide caret
$(".slide-icon").click(function () {
    $(this).toggleClass("close-slide-icon");
    $(this).parent().find(".owl-carousel,.inner-pro-descripe,.pro-price,.pro-quantity ").slideToggle();
    $(this).parent().find(".caret-grid-left").toggleClass("active-caret-grid-left");

    
});

//slide orders
$(".orders-div .contact-information").click(function () {
    $(this).find("li").slideToggle();
    $(this).toggleClass("contact-active");  
    
});

//slide jobs
$(".availabel-jobs .job-desciption > h2").click(function () {
    $(this).parent().find(".slide-jobs").slideToggle();
    $(this).parent().toggleClass("active-slide-jobs")
    
});

//form slide
$('.add-num').click(function() {
    $(this).parent().addClass("marg-form");
    $(this).parent().find(".slide-input").slideDown("slow");
    $(this).slideUp("fast");
});

//years slide
$(".year-div").click(function () {
    $(this).find(".months-list").slideDown();
    $(this).siblings().find(".months-list").slideUp();


});

$(".month-name").click(function () {
    $(this).next("ul").slideDown();
    $(this).parent().siblings("li").find("ul").slideUp();

});


//slide dash links
$(".main-menu-dash > li > a").click(function () {
    $(this).parent().toggleClass("active-slide-dash-menu").find(".slide-dash-menu").slideToggle();
    $(this).parent().siblings().removeClass("active-slide-dash-menu").find(".slide-dash-menu").slideUp()
    
});


//messages-div
$(".ms-text").click(function(){
    $(this).parent(".dash-messages").toggleClass("active-messages").find(".msg-list").slideToggle();

});
$(function () {
    var $wine = $(window); // or $box parent container
    var $boxe = $(".dash-messages");
    $wine.on("click.Bst", function (event) {
        if (
            $boxe.has(event.target).length === 0 && //checks if descendants of $box was clicked
            !$boxe.is(event.target) //checks if the $box itself was clicked
        ) {

            $(".dash-messages").removeClass("active-messages");
            $(".msg-list").slideUp();

        }
    });
});
//owl-carousel

$(".first-owl.owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    rtl: true,
    items: 1,
    dots:true,
    nav:true,
    autoplay: true,
    mouseDrag: true,
    touchDrag: true,
    autoplayTimeout:7000,
    autoplayHoverPause:true

});


$(".secondary-owl").owlCarousel({
    loop: true,
    items: 1,
    rtl:true,
    autoplay: true,
    nav: false,
    dots: true,
    touchDrag: true,
    mouseDrag: true
});




$(".third-owl").owlCarousel({
    loop: true,
    margin: 10,
    items: 3,
    rtl:true,
    nav: false,
    dots: true,
    autoplay: true,
    touchDrag: true,
    mouseDrag: true,
    responsive: {
        0: {
            items: 1
        },
        380: {
            items: 2,
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }

});


$(document).ready(function () {
    var thisrowfield;
    $('.qtyplus').click(function (e) {

        e.preventDefault();
        var qty = $('.qty').val();
        var main_qty = $('.main_qty').val();

        thisrowfield = $(this).parent().parent().parent().find('.qty');
        var currentVal = parseInt(thisrowfield.val());
        if (!isNaN(currentVal)) {
            thisrowfield.val(currentVal + 1);
        } else {
            thisrowfield.val(1);

        }
    });

    $(".qtyminus").click(function (e) {
        e.preventDefault();
        var qty = $('.qty').val();
        var main_qty = $('.main_qty').val();
        thisrowfield = $(this).parent().parent().parent().find('.qty');
        var currentVal = parseInt(thisrowfield.val());
        if (!isNaN(currentVal) && currentVal > 1) {
            thisrowfield.val(currentVal - 1);
        } else {
            thisrowfield.val(1);


        }
    });
});

//data-tables
$(document).ready(function() {
    $('#example').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"

        }
    });
});

//repeat filed
$(function () {
    $(".add_files").on('click', function (e) {
        e.preventDefault();
        var $self = $(this);
        $self.before($self.prev('.repeat-photo').clone());
        //$self.remove();
    });
});

//repeat filed
$(function () {

    $(".custom-repeat-btn").on('click', function (e) {
        e.preventDefault();
        var $self2 = $(this);
        var newaddress = $self2.before($self2.prev('.custom-repeat-div').clone());
        //$self.remove();
        // var i=0;
        // newaddress.find('input').each(function() {
        //     this.name= this.name.replace('[0]', '['+i+']');
        // });
        // $('#address').append(newaddress);

    });
});


//form validtion
(function () {
    'use strict';
    window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
