// KIT 502 
// Group 3 last edit 26/03/2021
var order_table = document.getElementById("order_table");
// ------------------------------create Row---------------------------
function create_order() {
    if (!validation()) {
        var newRow = order_table.insertRow(order_table.length),
            // insert the cell content into the new row
            cell1 = newRow.insertCell(0),
            cell2 = newRow.insertCell(1),
            cell3 = newRow.insertCell(2),
            cell4 = newRow.insertCell(3),
            cell5 = newRow.insertCell(4),
            cell6 = newRow.insertCell(5),
            cell7 = newRow.insertCell(6),

            edit_location = document.getElementById("edit_location").value,
            edit_price = document.getElementById("edit_price").value,
            edit_room = document.getElementById("edit_room").value,
            edit_bathroom = document.getElementById("edit_bathroom").value,
            edit_smoke = document.getElementById("edit_smoke").value,
            edit_garage = document.getElementById("edit_garage").value,
            edit_internet = document.getElementById("edit_internet").value;
        cell1.innerHTML = edit_location;
        cell2.innerHTML = edit_price;
        cell3.innerHTML = edit_room;
        cell4.innerHTML = edit_bathroom;
        cell5.innerHTML = edit_smoke;
        cell6.innerHTML = edit_garage;
        cell7.innerHTML = edit_internet;
    }
}

// --------------------------entry validation-----------------------
function validation() {
    var isEmpty = false;
    var edit_location = document.getElementById("edit_location").value,
        edit_price = document.getElementById("edit_price").value,
        edit_room = document.getElementById("edit_room").value,
        edit_bathroom = document.getElementById("edit_bathroom").value,
        edit_smoke = document.getElementById("edit_smoke").value,
        edit_garage = document.getElementById("edit_garage").value,
        edit_internet = document.getElementById("edit_internet").value;
    if (edit_location === "") {
        alert("Location entry Connot Be Empty");
        isEmpty = true;
    } else if (edit_price === "") {
        alert("Price entry Connot Be Empty");
        isEmpty = true;
    } else if (edit_room === "") {
        alert("Room entry Connot Be Empty");
        isEmpty = true;
    } else if (edit_bathroom === "") {
        alert("Bathroom Connot Be Empty");
        isEmpty = true;
    } else if (edit_smoke === "") {
        alert("Smoke Connot Be Empty");
        isEmpty = true;
    } else if (edit_garage === "") {
        alert("Garage Connot Be Empty");
        isEmpty = true;
    } else if (edit_internet === "") {
        alert("Internet Connot Be Empty");
        isEmpty = true;
    }
    return isEmpty;
}

// select row to edit
function select_edit() {

    for (var n = 1; n < order_table.rows.length; n++) {
        // select the row in host add table
        order_table.rows[n].onclick = function() {
            // get the seected row index
            temp = this.rowIndex;
            document.getElementById("edit_location").value = this.cells[0].innerHTML;
            document.getElementById("edit_price").value = this.cells[1].innerHTML;
            document.getElementById("edit_room").value = this.cells[2].innerHTML;
            document.getElementById("edit_bathroom").value = this.cells[3].innerHTML;
            document.getElementById("edit_smoke").value = this.cells[4].innerHTML;
            document.getElementById("edit_garage").value = this.cells[5].innerHTML;
            document.getElementById("edit_internet").value = this.cells[6].innerHTML;
        };
    }
}
select_edit();

function edit_order() {
    var edit_location = document.getElementById("edit_location").value,
        edit_price = document.getElementById("edit_price").value,
        edit_room = document.getElementById("edit_room").value,
        edit_bathroom = document.getElementById("edit_bathroom").value,
        edit_smoke = document.getElementById("edit_smoke").value,
        edit_garage = document.getElementById("edit_garage").value,
        edit_internet = document.getElementById("edit_internet").value;

    if (!validation()) {
        order_table.rows[temp].cells[0].innerHTML = edit_location;
        order_table.rows[temp].cells[1].innerHTML = edit_price;
        order_table.rows[temp].cells[2].innerHTML = edit_room;
        order_table.rows[temp].cells[3].innerHTML = edit_bathroom;
        order_table.rows[temp].cells[4].innerHTML = edit_smoke;
        order_table.rows[temp].cells[5].innerHTML = edit_garage;
        order_table.rows[temp].cells[6].innerHTML = edit_internet;
    }
}