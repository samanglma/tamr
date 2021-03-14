// $(window).resize(function() {
//     var newHeight;
//     newHeight = $(window).width();
//     newHeight = newHeight / 2.25
//     newHeight = parseInt(newHeight);
//     // alert(newHeight);
//     $('#layerslider').css('height', newHeight);
// });
setTimeout(function(){
    var newHeight;
    newHeight = $(window).width();
    newHeight = newHeight / 2.25
    newHeight = parseInt(newHeight);
    // alert(newHeight);
    $('#layerslider').css('height', newHeight);
},900);
$(document).ready(function () {
    var newHeight;
    newHeight = $(window).width();
    newHeight = newHeight / 2.25
    newHeight = parseInt(newHeight);
    // alert(newHeight);
    $('#layerslider').css('height', newHeight);
    $('#layerslider').layerSlider({
        autoStart: true,
        navButtons: false,
        navStartStop: false,
        showCircleTimer: false,
        responsive: true,
        // responsiveUnder: 1280,
        layersContainer: 1200
        // Please make sure that you didn't forget to add a comma to the line endings
        // except the last line!
    });


    $('#owl-malls').owlCarousel({
        loop: true,
        items: 1,
        nav: false,
        dots: true,
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
        ],
        autoplay: true,
        autoplayHoverPause: false,
        thumbs: true,
        autoplayTimeout:5000,
        thumbsPrerendered: true
    });
    $('#owl-community-centers').owlCarousel({
        loop: true,
        items: 1,
        nav: false,
        dots: true,
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
        ],
        autoplay: true,
        autoplayHoverPause: false,
        thumbs: true,
        thumbsPrerendered: true
    });
    $('#owl-markets').owlCarousel({
        loop: true,
        items: 1,
        nav: false,
        dots: true,
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
        ],
        autoplay: true,
        autoplayHoverPause: false,
        thumbs: true,
        thumbsPrerendered: true
    });
    $('#owl-lifestyle').owlCarousel({
        loop: true,
        items: 1,
        nav: false,
        dots: true,
        navText: [
            "<i class='fa fa-caret-left'></i>",
            "<i class='fa fa-caret-right'></i>"
        ],
        autoplay: true,
        autoplayHoverPause: false,
        thumbs: true,
        thumbsPrerendered: true
    })
    var i = $(".footprint-details .right .content").height();
    var j = $(".footprint-details .right .content .property-contact-info").height();
    var height = 0;
    height = i-j-30;
    $(".footprint-details .left .text-div").css("height",height);
    $(".footprint-details .right .content .property-contact-info .property-contact-info-div").css("height",$(".footprint-details .right .content .property-contact-info").height());
});


$(window).resize(function(){
var i = $(".footprint-details .right .content").height();
var j = $(".footprint-details .right .content .property-contact-info").height();
var height = 0;
height = i-j-30;
$(".footprint-details .left .text-div").css("height",height);

});

$("#openBtn").click(function () {
    $("#myOverlay").slideDown();
});
$(".closebtn").click(function () {
    $("#myOverlay").slideUp();
});
$("#openAssets").click(function () {
    $("#myOverlayAssets").slideToggle();
    $('.collapse').collapse("hide");
});
$("#openmblmenu").click(function () {
    $('.collapse').collapse("toggle");
});
