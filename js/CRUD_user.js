// ----------------------------------------------------host part---------------------------------
//  create row
function create_user() {
    var user_table = document.getElementById("user_table");
    if (!valid_user()) {
        var newRow = user_table.insertRow(user_table.length),
            cell1 = newRow.insertCell(0),
            cell2 = newRow.insertCell(1),
            cell3 = newRow.insertCell(2),
            cell4 = newRow.insertCell(3),
            cell5 = newRow.insertCell(4),
            cell6 = newRow.insertCell(5),
            cell7 = newRow.insertCell(6),
            edit_u_type = document.getElementById("edit_u_type").value,
            edit_u_fname = document.getElementById("edit_u_fname").value,
            edit_u_lname = document.getElementById("edit_u_lname").value,
            edit_u_email = document.getElementById("edit_u_email").value,
            edit_u_abn = document.getElementById("edit_u_abn").value,
            edit_u_add = document.getElementById("edit_u_add").value,
            edit_u_pn = document.getElementById("edit_u_pn").value;
        cell1.innerHTML = edit_u_type;
        cell2.innerHTML = edit_u_fname;
        cell3.innerHTML = edit_u_lname;
        cell4.innerHTML = edit_u_email;
        cell5.innerHTML = edit_u_abn;
        cell6.innerHTML = edit_u_add;
        cell7.innerHTML = edit_u_pn;
    }
}


// --------------------------valid_user-----------------------

function valid_user() {
    var email_valid = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var isEmpty = false,
        edit_u_type = document.getElementById("edit_u_type").value,
        edit_u_fname = document.getElementById("edit_u_fname").value,
        edit_u_lname = document.getElementById("edit_u_lname").value,
        edit_u_email = document.getElementById("edit_u_email").value,
        edit_u_abn = document.getElementById("edit_u_abn").value,
        edit_u_add = document.getElementById("edit_u_add").value,
        edit_u_pn = document.getElementById("edit_u_pn").value;

    if (edit_u_type == "") {
        alert("Type of user entry Connot Be Empty");
        isEmpty = true;
        console.log('obj');
    } else if (edit_u_email == "") {
        alert("Email entry Connot Be Empty");
        isEmpty = true;

    } else if (edit_u_fname == "") {
        alert("First name entry Connot Be Empty");
        isEmpty = true;
    } else if (edit_u_lname == "") {
        alert("Last name entry Connot Be Empty");
        isEmpty = true;
    } else if (edit_u_abn == "") {
        alert("ABN Connot Be Empty");
        isEmpty = true;
    } else if (edit_u_pn.length != "10") {
        alert("Please enter 10 letter!");
        isEmpty = true;
    } else if (edit_u_add == "") {
        alert("Address entry Connot Be Empty!");
        isEmpty = true;
    } else if (!email_valid.test(edit_u_email)) {
        alert("Email should be correct format");
        isEmpty = true;
    }
    return isEmpty;
}

var temp;

// select row to edit
function select_edit() {
    var user_table = document.getElementById('user_table');
    for (var n = 1; n < user_table.rows.length; n++) {
        user_table.rows[n].onclick = function() {
            temp = this.rowIndex;
            document.getElementById("edit_u_type").value = this.cells[0].innerHTML;
            document.getElementById("edit_u_fname").value = this.cells[1].innerHTML;
            document.getElementById("edit_u_lname").value = this.cells[2].innerHTML;
            document.getElementById("edit_u_email").value = this.cells[3].innerHTML;
            document.getElementById("edit_u_abn").value = this.cells[4].innerHTML;
            document.getElementById("edit_u_add").value = this.cells[5].innerHTML;
            document.getElementById("edit_u_pn").value = this.cells[6].innerHTML;
        };
    }
}
select_edit();


function edit_user() {
    var user_table = document.getElementById("user_table");
    var edit_u_type = document.getElementById("edit_u_type").value,
        edit_u_fname = document.getElementById("edit_u_fname").value,
        edit_u_lname = document.getElementById("edit_u_lname").value,
        edit_u_email = document.getElementById("edit_u_email").value,
        edit_u_abn = document.getElementById("edit_u_abn").value,
        edit_u_add = document.getElementById("edit_u_add").value,
        edit_u_pn = document.getElementById("edit_u_pn").value;
    if (!valid_user()) {
        user_table.rows[temp].cells[0].innerHTML = edit_u_type;
        user_table.rows[temp].cells[1].innerHTML = edit_u_fname;
        user_table.rows[temp].cells[2].innerHTML = edit_u_lname;
        user_table.rows[temp].cells[3].innerHTML = edit_u_email;
        user_table.rows[temp].cells[4].innerHTML = edit_u_abn;
        user_table.rows[temp].cells[5].innerHTML = edit_u_add;
        user_table.rows[temp].cells[6].innerHTML = edit_u_pn;
    }
}

// delete the user details
function delete_user() {
    // get variable and call the id from html realated table
    var user_table = document.getElementById('user_table');
    // var host_add_table = document.getElementById('host_add_table');
    // search table row by step by step
    for (var i = 1; i < user_table.rows.length; i++) {
        // click the row delete button and delete the related row
        user_table.rows[i].cells[7].onclick = function() {
            // popup window show the warning Message
            var pop_window = confirm("Delete the detail, are you sure?");
            // valid the delete button and delete it the userinterface (html)_
            if (pop_window === true) {
                temp = this.parentElement.rowIndex;
                // host_add_table.insertRow(temp);
                user_table.deleteRow(temp);
            }
        };
    }
}

// delete row in the review table
function delete_review() {
    // get variable and call the id from html realated table
    var review_table = document.getElementById('review_table');
    // var host_add_table = document.getElementById('host_add_table');
    // search table row by step by step
    for (var i = 1; i < review_table.rows.length; i++) {
        // click the row delete button and delete the related row
        review_table.rows[i].cells[3].onclick = function() {
            // popup window show the warning Message
            var pop_window = confirm("Delete the review detail, are you sure?");
            // valid the delete button and delete it the userinterface (html)_
            if (pop_window === true) {
                temp = this.parentElement.rowIndex;
                // host_add_table.insertRow(temp);
                review_table.deleteRow(temp);
            }
        };
    }
}