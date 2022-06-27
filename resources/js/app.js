import './bootstrap';

window.onload = () => {
    document.querySelectorAll('.delsoft')
         .forEach(item => item.onclick = () => confirm('Daten wirklich löschen?'));

    // handle fadeout and closing of flash-masseges
    const flashMsg = document.querySelector('h3.alert');
    if(flashMsg) {
        const btnClose = flashMsg.querySelector('span .bi-x-circle-fill');
        btnClose.onclick = () => {
            flashMsg.style.display = "none";
        }
        const to = setTimeout(() => {
            flashMsg.classList.toggle('fadeout');
            const to1 = setTimeout(() => {
                flashMsg.style.display = "none";
                clearTimeout(to)
                clearTimeout(to1)
            }, 3000);
        }, 3000);
    }
}
