document.getElementById('senhaCad').addEventListener('input', function() {
    var password = document.getElementById('senhaCad').value;
    var errorMessage = document.getElementById('error-message');
    
    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

    if (!passwordPattern.test(password) && password.length < 6) {
      errorMessage.style.display = 'inline';
  }
    else {
      errorMessage.style.display = 'none';
  }});

  document.getElementById('confirmCad').addEventListener('input', function() {
    var password = document.getElementById('senhaCad').value;
    var confirmPassword = document.getElementById('confirmCad').value;
    var errorConfirm = document.getElementById('error-confirm');

  if (password !== confirmPassword) {
      errorConfirm.style.display = 'inline';
  }
    else {
      errorConfirm.style.display = 'none';
  }});

  document.getElementById('formCad').addEventListener('submit', function(event) {
  var password = document.getElementById('senhaCad').value;
  var errorConfirm = document.getElementById('error-confirm');
  
  var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;

  if (!passwordPattern.test(password) && password.length < 6 && password !== confirmPassword ) {
      event.preventDefault(); 
  }
});

  document.addEventListener('DOMContentLoaded', (event) => {
    const emailInput = document.getElementById('email');
    const errorMessage = document.getElementById('error-email');

    emailInput.addEventListener('input', () => {
      if (emailInput.validity.valid) {
        errorMessage.style.display = 'none';
        emailInput.style.borderColor = 'green';
      } else {
        errorMessage.style.display = 'block';
        emailInput.style.borderColor = 'red';
      }
    });

  document.getElementById('emailForm').addEventListener('submit', (event) => {
    if (!emailInput.validity.valid) {
      errorMessage.style.display = 'block';
      emailInput.style.borderColor = 'red';
      event.preventDefault(); 
    }
  });
});
