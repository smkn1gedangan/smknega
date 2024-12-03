import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css';

import Swal from 'sweetalert2';


window.Swal = Swal;
const successMessage = window?.Laravel?.successMessage ?? ""
if (successMessage) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: successMessage,
        showConfirmButton: false,
        timer: 2000
    }).then(() => {
        // Hapus flash session dari local storage jika ada.
        localStorage.removeItem('alertShown');
    });
}



AOS.init();

window.Alpine = Alpine;

Alpine.start();
