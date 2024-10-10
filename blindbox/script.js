
/*login&register*/
var wrapper = document.querySelector('.wrapper');
var loginLink1 = document.querySelector('.login-link1');
var loginLink2 = document.querySelector('.login-link2');
var registerLink1 = document.querySelector('.register-link1');
var registerLink2 = document.querySelector('.register-link2');
var loginPopup = document.querySelector('.login-popup');
var iconClose = document.querySelector('.icon-close');

registerLink1.addEventListener('click', () => {
    wrapper.classList.add('active1');
});
registerLink2.addEventListener('click', () => {
    wrapper.classList.add('active2');
});

loginLink1.addEventListener('click', () => {
    wrapper.classList.remove('active1');

});
loginLink2.addEventListener('click', () => {
    wrapper.classList.remove('active2');

});
loginPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
    loginPopup.style.display = 'none';

});

iconClose.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
    loginPopup.style.display = 'block';
});
function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var content1 = document.querySelector(".content1");

    if (sidebar.style.width === "250px") {
        sidebar.style.width = "0";
        content1.style.marginLeft = "0";
    } else {
        sidebar.style.width = "250px";
        content1.style.marginLeft = "250px";
    }
}
function toggleSidebar2() {
    var sidebar2 = document.getElementById("sidebar2");
    var content2 = document.querySelector(".content2");

    if (sidebar2.style.width === "250px") {
        sidebar2.style.width = "0";
        content2.style.marginRight = "0";
    } else {
        sidebar2.style.width = "250px";
        content2.style.marginRight = "250px";
    }
}
function goback() {
    window.history.back();
}
function gochicken() {
    window.location.href = 'chicken.php';
}
function goorder() {
    window.location.href = 'order.php';
}
function successorder() {
    alert('您已成功下訂單並於20:40分前完成取餐！\n即將為您打開導航路線')
    var targetURL = 'https://reurl.cc/g4kR8Q';
    window.open(targetURL, '_blank');
    window.location.href = 'index.php';

}