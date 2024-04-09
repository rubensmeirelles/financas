let menu = document.querySelector('.menu');
let sidebar = document.querySelector('.sidebar');
let topHeader = document.querySelector('.top-header');
let content = document.querySelector('.content');
let userData = document.querySelector('.user-data');
let itemMenu = document.querySelectorAll('.item-menu');

menu.addEventListener('click', function (){
    sidebar.classList.toggle('width-70');
    topHeader.classList.toggle('left-70');
    content.classList.toggle('left-70');
    userData.classList.toggle('hidden');
    for(let i = 0; i < itemMenu.length; i++){
        itemMenu[i].classList.toggle('hidden');
    }
});

let checkbox = document.querySelector('#gridCheck');
let qtdParcelas = document.querySelector('.parcelas');

checkbox.addEventListener('click', function() {
    qtdParcelas.classList.toggle('hidden')
})
