$(document).ready(function () {
    $("#burger").click(function () {
        if($("#burger").hasClass("isOpen")) {
            $(this).removeClass("isOpen");
            $("#mobileSlider").removeClass("isOpen");
        } else {
            $(this).addClass("isOpen");
            $("#mobileSlider").addClass("isOpen");
        }
    });
});
