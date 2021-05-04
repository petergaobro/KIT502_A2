const open = document.getElementById("open");
const search_container = document.getElementById("search_container");
const close = document.getElementById("close");

open.addEventListener('click', () => {
    search_container.classList.add('show');
})


close.addEventListener('click', () => {
    search_container.classList.remove('show');
})