import './bootstrap';
import 'flowbite';

import Alpine from 'alpinejs';
import AOS from 'aos';
import 'aos/dist/aos.css';

import Swal from 'sweetalert2';


// typed
import Typed from 'typed.js';

var typed = new Typed("#typed", {
    strings: ["sekolah unggulan yang menghasilkan tamatan berkualitas serta melahirkan tenaga kerja yang kompeten dan mandiri melalui pengembangan IPTEK dan IMTAQ.."], // Teks yang akan ditampilkan
    typeSpeed: 100, // Kecepatan pengetikan (dalam milliseconds)
    backSpeed: 10, // Kecepatan penghapusan teks (dalam milliseconds)
    loop: true, // Apakah teks akan diulang secara terus-menerus
    cursorChar: "",
  });

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
