// KIT 502 
// Group 3 last edit 26/03/2021

function user_tab() {
    document.getElementById('user_content').style.display = "block";
    document.getElementById('order_content').style.display = "none";
    document.getElementById('review_content').style.display = "none";
    document.getElementById('q_n_a_content').style.display = "none";
}


function order_tab() {
    document.getElementById('user_content').style.display = "none";
    document.getElementById('order_content').style.display = "block";
    document.getElementById('review_content').style.display = "none";
    document.getElementById('q_n_a_content').style.display = "none";
}


function review_tab() {
    document.getElementById('user_content').style.display = "none";
    document.getElementById('order_content').style.display = "none";
    document.getElementById('review_content').style.display = "block";
    document.getElementById('q_n_a_content').style.display = "none";
}

function q_n_a_tab() {
    document.getElementById('user_content').style.display = "none";
    document.getElementById('order_content').style.display = "none";
    document.getElementById('review_content').style.display = "none";
    document.getElementById('q_n_a_content').style.display = "block";
}