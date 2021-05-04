var x = document.getElementById('login_form');
var y = document.getElementById('reg_form');
var z = document.getElementById('switch_btn');

function register() {
    x.style.left = '-400px';
    y.style.left = '50px';
    z.style.left = '110px';
}

function login() {
    x.style.left = '50px';
    y.style.left = '450px';
    z.style.left = '0px';
}

var a = document.getElementById('admin_log_form');
var b = document.getElementById('sys_reg_form');
var c = document.getElementById('switch_btn');

function admin_register() {
    a.style.left = '-400px';
    b.style.left = '50px';
    c.style.left = '110px';
}

function admin_login() {
    a.style.left = '50px';
    b.style.left = '450px';
    c.style.left = '0px';
}