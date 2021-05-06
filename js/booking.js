$(document).ready(function() {
    var minDate = new Date();
    $("#checkin").datepicker({
        showAnim: 'drop',
        numberOfMonth: 1,
        minDate: minDate,
        dateFormat: 'yy-mm-dd',
        OnClose: function(selectedDate) {
            $('#checkout'), datepicker("option", "minDate", selectedDate)
        }
    });
    $("#checkout").datepicker({
        showAnim: 'drop',
        numberOfMonth: 1,
        minDate: minDate,
        dateFormat: 'yy-mm-dd',
        OnClose: function(selectedDate) {
            $('#checkin'), datepicker("option", "minDate", selectedDate)
        }
    });
});