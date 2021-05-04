$(Document).ready(function() {
    $("#name").on('change', function() {
        $(".data").hide();
        $("#" + $(this).val()).fadeIn();
    }).change();
});

$(Document).ready(function() {
    $("#name1").on('change', function() {
        $(".data1").hide();
        $("#" + $(this).val()).fadeIn();
    }).change();
});
