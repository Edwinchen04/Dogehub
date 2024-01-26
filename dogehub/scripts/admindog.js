const wrapper = document.querySelector('.wrapper');
const carousel = document.querySelector('.carousel');
const arrowButtons = document.querySelectorAll('.wrapper i');
const firstCardWidth = carousel.querySelector('.card').offsetWidth;
const carouselChildrens = [...carousel.children];


let isDragging = false, startX, startScrollLeft, timeoutID;

let cardPerView = Math.round(carousel.offsetWidth/ (firstCardWidth + 16));

carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
  carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
});


carouselChildrens.slice(0, cardPerView).reverse().forEach(card => {
  carousel.insertAdjacentHTML("beforeend", card.outerHTML);
});
  

arrowButtons.forEach(button => {
  button.addEventListener('click', () => {
    carousel.scrollLeft += button.id === 'left' ? - (firstCardWidth + 16) : firstCardWidth + 16;
  })
})

const dragStart = (mousemovement) => {
  isDragging = true;
  carousel.classList.add('dragging');
  startX = mousemovement.pageX;
  startScrollLeft = carousel.scrollLeft;


}

const dragging = (mousemovement) => {
  if (!isDragging) return false;
  carousel.scrollLeft = startScrollLeft - (mousemovement.pageX-startX);
}

const dragStop = () => {
  isDragging = false;
  carousel.classList.remove('dragging');

}

const infiniteScroll = () => {
  if(carousel.scrollLeft === 0) {
    carousel.classList.add('no-transition');
    carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
    carousel.classList.remove('no-transition');
  } else if (Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
    carousel.classList.add('no-transition');
    carousel.scrollLeft = carousel.offsetWidth;
    carousel.classList.remove('no-transition');
  }

  clearTimeout(timeoutID);
  if(!wrapper.matches(":hover")) autoPlay();
}

const autoPlay = () => {
  if(window.innerWidth < 800) return;
  timeoutID = setTimeout(() => 
    carousel.scrollLeft += (firstCardWidth + 16), 2500);

}
autoPlay();

carousel.addEventListener('mousemove', dragging);
carousel.addEventListener('mousedown', dragStart);
document.addEventListener('mouseup', dragStop);
carousel.addEventListener('scroll', infiniteScroll);
wrapper.addEventListener('mouseenter', () => clearTimeout(timeoutID));
wrapper.addEventListener('mouseleave', autoPlay);
