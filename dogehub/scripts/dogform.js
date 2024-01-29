const dogForm = document.querySelector('#showdogform');
const dogFormView = document.querySelectorAll('.viewmore'); 
const closeButtons = document.querySelectorAll('.iconx');

dogForm.addEventListener('click', function() {
  document.querySelector('.dog-form').classList.add('active');
});

dogFormView.forEach(button => {
  button.addEventListener('click', function() {
    document.querySelector('.dog-form-view').classList.add('active');
  });
});

closeButtons.forEach(button => {
  button.addEventListener('click', function() {
    document.querySelector('.dog-form').classList.remove('active');
    document.querySelector('.dog-form-view').classList.add('closed');
  });
});




