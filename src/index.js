require("bootstrap");
import 'owl.carousel';
import './custom.javascript';
import { Modal } from 'bootstrap';

const modalMat = document.getElementById('modalMaterials');
if (modalMat) {
    // Hide modal after send request with option cookie
    const myModal = new Modal(document.getElementById('modalMaterials'));

    // Funkcja do sprawdzania, czy istnieje ciasteczko o nazwie "modalShown"
    function checkModalCookie() {
        return document.cookie.split(';').some((item) => item.trim().startsWith('modalShown='));
    }
    // Funkcja do ustawiania ciasteczka o nazwie "modalShown" na wartość "true" na 7 dni
    function setModalCookie() {
        const d = new Date();
        d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000));
        const expires = "expires=" + d.toUTCString();
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
    wpcf7Elm.addEventListener('wpcf7mailsent', function (event) {
        setTimeout(function () {
            myModal.hide();
            setModalCookie();
            contentbeforeModal.classList.remove('blurred-content');
        }, 3000);
    }, false);
}

function copyFunction() {
    var copyText = document.getElementById("copy-1");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
}

const faqbutton = document.getElementById('btn-copy-email');
faqbutton.addEventListener('click', function () {
    copyFunction();
});