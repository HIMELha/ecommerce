const nav = document.querySelector('#navToggle');
navIcon = document.querySelector('#navToggle i');
menu = document.querySelector('.navMenu');

nav.addEventListener('click', () => {
    if (navIcon.classList.contains('fa-xmark')) {
        menu.classList.remove('active');
        navIcon.classList.remove('fa-xmark');
        navIcon.classList.add('fa-bars')
    } else {
        menu.classList.add('active');
        navIcon.classList.remove('fa-bars');
        navIcon.classList.add('fa-xmark');  
    }
});


function toast(type, message) {
    
};

// ajax starts from here 
