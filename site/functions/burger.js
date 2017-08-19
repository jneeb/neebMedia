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

(function yesJS() {
	var noJS = document.getElementsByClassName("noJS");
	for (var i = noJS.length - 1; i >= 0; i--) {
		noJS[i].style.display = "none";
	}
})();