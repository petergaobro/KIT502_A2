var elem = document.getElementById("status");
elem.onchange = function() {
    var hiddenDiv = document.getElementById("reason");
    hiddenDiv.style.display = (this.value == "In process" || this.value == "Approve" || this.value == "") ? "none" : "block";
};