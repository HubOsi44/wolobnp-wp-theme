require("bootstrap");
import 'owl.carousel';
import './custom.javascript';
import { Modal } from 'bootstrap';
const myModal = new Modal(document.getElementById('modalMaterials'));
const myBtnhidemodal = document.getElementById('closeModal');
window.addEventListener('DOMContentLoaded', () => {
    myModal.show();
});

var wpcf7Elm = document.querySelector('.wpcf7');

wpcf7Elm.addEventListener('wpcf7mailfailed', function (event) {
    setTimeout(function () {
        myModal.hide();
    }, 3000);
}, false);