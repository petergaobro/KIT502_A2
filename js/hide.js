var elem = document.getElementById("usertype");
elem.onchange = function(){
    var hiddenDiv = document.getElementById("abn");
    hiddenDiv.style.display = (this.value == "" || this.value=="System manager") ? "none":"block";
};