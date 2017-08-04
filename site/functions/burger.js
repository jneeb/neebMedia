$(document).ready(function () {
    $("#burger").click(function () {
        if($("#burger").hasClass("isOpen")) {
            $(this).removeClass("isOpen");
        } else {
            $(this).addClass("isOpen");
        }
    });
});
