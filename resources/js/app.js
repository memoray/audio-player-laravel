import './bootstrap';

window.onload = () => {
    document.querySelectorAll('.delsoft')
         .forEach(item => item.onclick = () => confirm('Daten wirklich löschen?'));
}
