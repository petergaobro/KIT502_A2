const buttons = document.querySelector('explore_btn');
buttons.forEach(btn => {
    btn.addEventListener('click', function(e) {
        let x = e.clientX - e.target.offetLeft;
        let y = e.clientY - e.target.offetLeft;

        let ripples = document.createElement('span');
        ripples.style.left = x + 'px';
        ripples.style.top = y + 'px';
        this.appendChild(ripples);
    })
})