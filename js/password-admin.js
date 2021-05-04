// ------host login------
const login_admin_hst_emil = document.getElementById('login_admin_hst_emil')
const login_admin_pws = document.getElementById('login_admin_pws')
const login_admin_abn = document.getElementById('login_admin_abn')
const admin_log_form = document.getElementById('admin_log_form')
const login_host_form = document.getElementById('login_host_form')
const host_pws_format = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%])[A-Za-z\d!@#$%]{6,12}$/
const host_email_format = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
const ABN_valid = /^(\d *?){11}$/
const isvalid = false
admin_log_form.addEventListener('submit', (e) => {
    e.preventDefault()
    if (login_admin_hst_emil.value === '' || login_admin_hst_emil.value == null) {
        alert('Please enter Email Address!');
        isvalid = true;
    } else if (!host_email_format.test(login_admin_hst_emil.value)) {
        alert('Invalid email format');
    } else if (login_admin_pws.value.length <= 5 || login_admin_pws.value.length >= 13) {
        alert('Password must be longer than 6 characters and Password must be less than 12 characters.Also it must contain at least 1 lower case letter,1 uppercase letter,1 number and the following special charaters(!@#$%)');
    } else if (!host_pws_format.test(login_admin_pws.value)) {
        alert('Password must contain at least 1 lower case letter,1 uppercase letter,1 number and the following special charaters(!@#$%)');
    } else if (!ABN_valid.test(login_admin_abn.value)) {
        alert('Please check your ABN number,it must be 11 numbers');
    } else if (host_pws_format.test(login_admin_pws.value) && host_email_format.test(login_admin_hst_emil.value)) {
        alert('Login in successfull.');
        window.location.href = "../html/host_dashboard.html";
    }
    return isvalid;
})


// ------system manager login------
const login_admin_sys_email = document.getElementById('login_admin_sys_email')
const login_admin_sys_pws = document.getElementById('login_admin_sys_pws')
const login_admin_form = document.getElementById('login_admin_form')
const sys_pws_format = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%])[A-Za-z\d!@#$%]{6,12}$/
login_admin_form.addEventListener('submit', (e) => {
    e.preventDefault()
    if (login_admin_sys_email.value === '' || login_admin_sys_email.value == null) {
        alert('Please enter Email Address!');
        isvalid = true;
    } else if (login_admin_sys_pws.value.length <= 5 || login_admin_sys_pws.value.length >= 13) {
        alert('Password must be longer than 6 characters and Password must be less than 12 characters.Also it must contain at least 1 lower case letter,1 uppercase letter,1 number and the following special charaters(!@#$%)');
    } else if (!sys_pws_format.test(login_admin_sys_pws.value)) {
        alert('Password must contain at least 1 lower case letter,1 uppercase letter,1 number and the following special charaters(!@#$%)');
    } else if (sys_pws_format.value = "systemer@gmail.com") {
        alert('Login in successfull.');
        window.location.href = "../html/dashboard.html";
    }
    return isvalid;
})

function pws_macth() {
    var reg_sys_pws = document.getElementById("reg_sys_pws");
    var reg_sys_conpws = document.getElementById("reg_sys_conpws");
    if (reg_sys_pws.value != reg_sys_conpws.value) {
        alert("passwprd not match");
    } else if (ureg_sys_pws.value != "" || reg_sys_conpws.value != "") {
        alert("please enterlonger than 6 characters and Password must be less than 12 characters.Also it must contain at least 1 lower case letter,1 uppercase letter,1 number and the following special charaters(!@#$%) ")
    } else {
        location.href = "../html/login_admin.html"
    }
}

function host_pws_macth() {
    var reg_host_pws = document.getElementById("reg_host_pws");
    var reg_host_confpws = document.getElementById("reg_host_confpws");
    if (reg_host_pws.value != reg_host_confpws.value) {
        alert("passwprd not match");
    } else if (reg_host_pws.value != "" || reg_host_confpws.value != "") {
        alert("please enterlonger than 6 characters and Password must be less than 12 characters.Also it must contain at least 1 lower case letter,1 uppercase letter,1 number and the following special charaters(!@#$%) ")
    } else {
        location.href = "../html/login_admin.html"
    }
}