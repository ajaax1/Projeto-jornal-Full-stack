const passwordInput = document.getElementById('password');
const requirementsDiv = document.getElementById('requirements');
const requirementLength = document.getElementById('requirement-length');
const requirementUppercase = document.getElementById('requirement-uppercase');
const requirementLowercase = document.getElementById('requirement-lowercase');

passwordInput.addEventListener('focus', function() {
  requirementsDiv.style.display = 'block';
});

passwordInput.addEventListener('blur', function() {
  requirementsDiv.style.display = 'none';
});

passwordInput.addEventListener('input', function() {
  const password = passwordInput.value;
  if (password.length >= 7) {
    requirementLength.className = 'valid';
  } else {
    requirementLength.className = '';
  }

  if (/[A-Z]/.test(password)) {
    requirementUppercase.className = 'valid';
  } else {
    requirementUppercase.className = '';
  }

  if (/[a-z]/.test(password)) {
    requirementLowercase.className = 'valid';
  } else {
    requirementLowercase.className = '';
  }
});
const samePasswords = document.getElementById('same-passwords');
const passwordInput2 = document.getElementById('password2');
const requirementsDiv2 = document.getElementById('requirements2');

passwordInput2.addEventListener('focus', function() {
  requirementsDiv2.style.display = 'block';
});

passwordInput2.addEventListener('blur', function() {
  requirementsDiv2.style.display = 'none';
});

passwordInput2.addEventListener('input', function() {
   const password2 = passwordInput2.value;
   const password = passwordInput.value;
  if (password == password2) {
    samePasswords.className = 'valid';
  } else {
    samePasswords.className = '';
  }
});