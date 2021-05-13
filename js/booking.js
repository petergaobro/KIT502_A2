function populateEndDate() {
    var date2 = $("#checkin").datepicker("getDate");
    date2.setDate(date2.getDate() + 1);
    $("#checkout").datepicker("setDate", date2);
    $("#checkout").datepicker("option", "minDate", date2);
}

$(document).ready(function() {
    $("#checkin")
        .datepicker({
            dateFormat: "dd-M-yy",
            minDate: "dateToday",
            onSelect: function(date) {
                populateEndDate();
            },
        })
        .datepicker("setDate", new Date());
    $("#checkout")
        .datepicker({
            dateFormat: "dd-M-yy",
            minDate: 1,
            onClose: function() {
                var dt1 = $("#checkin").datepicker("getDate");
                var dt2 = $("#checkout").datepicker("getDate");
                if (dt2 <= dt1) {
                    var minDate = $("#checkout").datepicker("option", "minDate");
                    $("#checkout").datepicker("setDate", minDate);
                }
            },
        })
        .datepicker("setDate", new Date());
});