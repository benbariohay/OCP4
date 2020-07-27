var arrow = document.getElementById('arrow');


function ArrowShowScroll() {
    if (window.pageYOffset >= 600) {
        arrow.style.display = "block";
    } 
};

function ArrowHideScroll() {
    if (window.pageYOffset < 600) {
        arrow.style.display = "none";
    }
};

window.addEventListener('scroll', ArrowShowScroll);
window.addEventListener('scroll', ArrowHideScroll);



arrow.addEventListener('click', () => window.scrollTo({
    top: 0,
    behavior: 'smooth',
  }));

