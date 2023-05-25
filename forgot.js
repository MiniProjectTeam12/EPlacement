const submitBtn = document.querySelector('.btn-submit');
const vcodeInput = document.querySelector('#vcode');
const emailInput = document.querySelector('#email');
        
        submitBtn.addEventListener('click', (event) => {
          if (emailInput.validity.valid && vcodeInput.value !== '' && emailInput.value !== '') {
            window.location.href = '../reset-pass/reset.html';
          } else {
            event.preventDefault();
          }
        });