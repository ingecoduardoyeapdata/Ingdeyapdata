window.addEventListener('DOMContentLoaded', function(){
    // añade clase para animaciones si hace falta
    document.documentElement.classList.add('loaded');
    // pequeño foco en primer campo (si existe)
    const el = document.querySelector('.form-auth input[autofocus]') || document.querySelector('.form-auth input');
    if(el) setTimeout(()=> el.focus(), 80);
});
