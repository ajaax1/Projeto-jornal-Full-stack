const menuButtom = document.getElementById('menu');
const menu = document.getElementById('lateral_menu');
menuButtom.addEventListener('click', function() {
    if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'block';
        menuButtom.innerHTML = ('close');
    } else {
        menu.style.display = 'none';
        menuButtom.innerHTML = ('menu');
    }
}); 



