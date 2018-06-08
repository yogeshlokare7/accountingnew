$(function() {
    setTimeout(function() {
        $("#successMessage").hide('blind', {}, 100)
    }, 5000);
});

function convertFormToJSON(form) {
    var array = $(form).serializeArray();
    var json = {};

    jQuery.each(array, function() {
        json[this.name] = this.value || '';
    });

    return json;
}

function chkNumericKey(event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if ((charCode >= 48 && charCode <= 57) || charCode === 46 || charCode === 45) {
        return true;
    } else {
        return false;
    }
}

$(function() {
    $("#datepicker").datepicker({
        minDate: -20,
        maxDate: "+1M +360D"
    });
    $("#datepicker").datepicker("option", "dateFormat", "yy-mm-dd");
});

$(function() {
    $("#datepicker1").datepicker({
        minDate: -20,
        maxDate: "+1M +360D"
    });
    $("#datepicker1").datepicker("option", "dateFormat", "yy-mm-dd");
});
$(function() {
    $("#datepicker2").datepicker({
        minDate: -20,
        maxDate: "+1M +360D"
    });
    $("#datepicker2").datepicker("option", "dateFormat", "yy-mm-dd");
});