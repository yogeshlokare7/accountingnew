$("#data tr").click(function() {
    var selected = $(this).hasClass("highlight");
    $("#data tr").removeClass("highlight");
    if (!selected)
        $(this).addClass("highlight");
});
$("#data").delegate("tr", "contextmenu", function(e) {
    var selected = $(this).hasClass("highlight");
    $("#data tr").removeClass("highlight");
    if (!selected)
        $(this).addClass("highlight");
});
function goPage(newURL) {
    if (newURL !== "") {
        if (newURL === "-") {
            resetMenu();
        }
        else {
            document.location.href = newURL;
        }
    }
}
function resetMenu() {
    document.gomenu.selector.selectedIndex = 2;
}
$(window).load(function() {
    $('#overlay1').fadeOut();
});


$(document).ready(function() {
    $('input').keyup(function(e) {
        if (e.which === 39) { // right arrow
            $(this).closest('td').next().find('input').focus();

        } else if (e.which === 37) { // left arrow
            $(this).closest('td').prev().find('input').focus();

        } else if (e.which === 40) { // down arrow
            $(this).closest('tr').next().find('td:eq(' + $(this).closest('td').index() + ')').find('input').focus();

        } else if (e.which === 38) { // up arrow
            $(this).closest('tr').prev().find('td:eq(' + $(this).closest('td').index() + ')').find('input').focus();
        }
    });
});