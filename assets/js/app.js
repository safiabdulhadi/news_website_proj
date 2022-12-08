'use strict';
// toggle Menu
const toggleBtn = document.querySelector('#toggle');
const categoryBody = document.querySelector('.home-category');
toggleBtn.addEventListener('click', () => {
  categoryBody.classList.toggle('toggle');
});

