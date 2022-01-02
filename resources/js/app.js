require('./bootstrap');

$(document).ready(function() {
    document.getElementsByClassName("desc").hidden = true;
    $("input[name$='flexRadioDefault']").click(function() {
        var test = $(this).val();
        $("#flexRadioDefault" + test).show();
    });
});