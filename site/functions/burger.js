$(document).ready(function () {
    $("#burger").click(function () {
        if($("#burger").hasClass("isOpen")) {
            $(this).removeClass("isOpen");
        } else {
            $(this).addClass("isOpen");
        }
    });
});

(function yesJS() {
	var noJS = document.getElementsByClassName("noJS");
	for (var i = noJS.length - 1; i >= 0; i--) {
		noJS[i].style.display = "none";
	}
})();