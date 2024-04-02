let menu = document.querySelector('.menu');
let sidebar = document.querySelector('.sidebar');
let topHeader = document.querySelector('.top-header');
let content = document.querySelector('.content');

menu.addEventListener('click', function (){
    sidebar.classList.toggle('width-70');
    topHeader.classList.toggle('left-70');
    content.classList.toggle('left-70');
});
