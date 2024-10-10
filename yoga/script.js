
/*login&register*/
var wrapper = document.querySelector('.wrapper');
var loginLink = document.querySelector('.login-link');
var registerLink = document.querySelector('.register-link');
var loginPopup = document.querySelector('.login-popup');
var iconClose = document.querySelector('.icon-close');


registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');

});

loginPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
    loginPopup.style.display = 'none';

});

iconClose.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
    loginPopup.style.display = 'block';
});

