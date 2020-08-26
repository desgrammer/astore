const fixedButton = document.querySelectorAll('.fixed-bar a');
const effect = document.querySelector('.effect');

fixedButton.forEach((item) => {
    item.addEventListener('click', (evt) => {
        const x = evt.target.offsetLeft;
        fixedButton.forEach((btn) => {
            btn.classList.remove('active');
            evt.target.classList.add('active');
            anime({
                targets: '.effect',
                left: `${x}px`,
                duration: 600,
            })
        });
    })
})