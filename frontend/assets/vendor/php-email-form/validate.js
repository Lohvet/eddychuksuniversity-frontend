(function () {
  "use strict";

  let forms = document.querySelectorAll('.php-email-form');

  forms.forEach(function (e) {
    e.addEventListener('submit', function (event) {
      event.preventDefault();

      let thisForm = this;
      let action = thisForm.getAttribute('action');

      if (!action) {
        displayError(thisForm, 'The form action property is not set!');
        return;
      }

      thisForm.querySelector('.loading').style.display = 'block';
      thisForm.querySelector('.error-message').style.display = 'none';
      thisForm.querySelector('.sent-message').style.display = 'none';

      let formData = new FormData(thisForm);

      fetch(action, {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
        .then(response => response.text())
        .then(data => {
          thisForm.querySelector('.loading').style.display = 'none';
          if (data.trim() === 'OK') {
            thisForm.querySelector('.sent-message').style.display = 'block';
            thisForm.reset();
          } else {
            displayError(thisForm, data);
          }
        })
        .catch(error => {
          displayError(thisForm, error.message || error);
        });
    });
  });

  function displayError(thisForm, error) {
    thisForm.querySelector('.loading').style.display = 'none';
    thisForm.querySelector('.error-message').innerHTML = error;
    thisForm.querySelector('.error-message').style.display = 'block';
  }

})();
