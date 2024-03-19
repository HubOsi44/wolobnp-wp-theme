require("bootstrap");
import 'owl.carousel';
import './custom.javascript';
import { Modal } from 'bootstrap';
// const myModal = new Modal(document.getElementById('modalMaterials'));
// const myBtnhidemodal = document.getElementById('closeModal');
// window.addEventListener('DOMContentLoaded', () => {
//     myModal.show();
// });

// var wpcf7Elm = document.querySelector('.wpcf7');

// wpcf7Elm.addEventListener('wpcf7mailfailed', function (event) {
//     setTimeout(function () {
//         myModal.hide();
//     }, 3000);
// }, false);

// Hide modal after send request with option cookie
const myModal = new Modal(document.getElementById('modalMaterials'));


// Funkcja do sprawdzania, czy istnieje ciasteczko o nazwie "modalShown"
function checkModalCookie() {
    return document.cookie.split(';').some((item) => item.trim().startsWith('modalShown='));
}

// Funkcja do ustawiania ciasteczka o nazwie "modalShown" na wartość "true" na 7 dni
function setModalCookie() {
    const d = new Date();
    d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000)); // Ciasteczko ważne przez 7 dni
    const expires = "expires="+ d.toUTCString();
    document.cookie = "modalShown=true;" + expires + ";path=/";
}

// Sprawdzanie, czy modal powinien zostać pokazany na podstawie ciasteczka
var contentbeforeModal = document.querySelector('.content-before-modal');
window.addEventListener('DOMContentLoaded', () => {
    if (!checkModalCookie()) {
        myModal.show();
        contentbeforeModal.classList.add('blurred-content');
    }
});

// Ukrycie modala po naciśnięciu przycisku zamykającego
const wpcf7Elm = document.querySelector('.wpcf7');
wpcf7Elm.addEventListener('wpcf7mailfailed', function (event) {
    setTimeout(function () {
        myModal.hide();
        setModalCookie(); // Ustawienie ciasteczka po wystąpieniu błędu
        contentbeforeModal.classList.remove('blurred-content');
    }, 3000);
}, false);