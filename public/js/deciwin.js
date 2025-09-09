// public/js/deciwin.js
// Pequeñas funciones utilitarias.
// - Soporte para submit de logout si alguna UI usa botón a secas.
// - Mejora pequeña: abrir foco en hero para accesibilidad.

document.addEventListener('DOMContentLoaded', function () {
    // Si hay un enlace con id "logout-link" lo transformamos en submit seguro (por si lo usas)
    var logoutLink = document.getElementById('logout-link');
    if (logoutLink) {
        logoutLink.addEventListener('click', function(e){
            e.preventDefault();
            var f = document.getElementById('logout-form');
            if(f) f.submit();
        });
    }

    // Enfocar primer control del hero si existe (no intrusivo)
    var heroInput = document.querySelector('.dw-hero input');
    if (heroInput) {
        setTimeout(function(){ heroInput.focus(); }, 200);
    }
});
