// KIT 502 
// Group 3 last edit 26/03/2021
// display the specific card that is related to user's entry
function client_tab() {
    document.getElementById('client_content').style.display = "block";
    document.getElementById('order_content').style.display = "none";
    document.getElementById('rate_content').style.display = "none";
    document.getElementById('q_n_a_content').style.display = "none";
}

function order_tab() {
    document.getElementById('client_content').style.display = "none";
    document.getElementById('order_content').style.display = "block";
    document.getElementById('rate_content').style.display = "none";
    document.getElementById('q_n_a_content').style.display = "none";
}

function rate_tab() {
    document.getElementById('client_content').style.display = "none";
    document.getElementById('order_content').style.display = "none";
    document.getElementById('rate_content').style.display = "block";
    document.getElementById('q_n_a_content').style.display = "none";
}

function q_n_a_tab() {
    document.getElementById('client_content').style.display = "none";
    document.getElementById('order_content').style.display = "none";
    document.getElementById('rate_content').style.display = "none";
    document.getElementById('q_n_a_content').style.display = "block";
}