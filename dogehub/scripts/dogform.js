const dogForm = document.querySelector('#showdogform')
const dogFormClose = document.querySelector('#closebutton')

dogForm.addEventListener('click', function() {
  document.querySelector(".dog-form").classList.add('active');
})

dogFormClose.addEventListener('click', function() {
  document.querySelector(".dog-form").classList.remove('active');
})