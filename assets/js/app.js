'use strict';
// toggle Menu it in index.php small munu bar
const toggleBtn = document.querySelector('#toggle');
const categoryBody = document.querySelector('.home-category');

toggleBtn.addEventListener('click', () => {
  categoryBody.classList.toggle('toggle');
});


