<?php
use app\database\models\querys\SelectAdmins;

$this->layout('admin/adminMaster', ['title' => $title]);
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
if (isset($_SESSION['accept_message'])) {
    $accept_message = $_SESSION['accept_message'];
    unset($_SESSION['accept_message']);
}
?>
    <div id="adminRegister">  
        <div id="formAddAdmin">
            <h2 class="text-uppercase text-center mb-3">Create an admin</h2>
            <form method="POST" action="/admin/register">
                <div class="form-outline mb-2 d-flex" style="gap:1rem;">
                    <input type="text" id="form3Example1cg" placeholder="First Name"  name="name" class="form-control form-control-lg" />
                    <input type="text" id="form3Example1cg" placeholder="Second Name"  name="name2" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-2">
                    <input type="email" id="form3Example3cg" placeholder="Email"  name="email" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-2">
                    <input type="password" id="password" id="form3Example4cg" placeholder="Password" name="password" class="form-control form-control-lg" />
                </div>
                <div id="requirements">
                    <div style="color:black;" >Password must contain:</div>
                    <div id="requirement-length">At least 7 letters</div>
                    <div id="requirement-uppercase">A capital letter</div>
                    <div id="requirement-lowercase">A lowercase letter</div>
                </div>

                <div class="form-outline mb-2">
                    <input type="password" id="password2" id="form3Example4cg" placeholder="Confirm your password" name="password2" class="form-control form-control-lg" />
                </div>
                <div id="requirements2">
                    <div style="color:black;">Password must contain:</div>
                    <div id="same-passwords">The password must be the same</div>
                </div>
                <?php if (isset($error_message)) : ?>
                    <p style="color: red; text-align: center;"><?php echo $error_message?></p>
                <?php endif; ?>
                <?php if (isset($accept_message)) : ?>
                    <p style="color: green; text-align: center;"><?php echo $accept_message?></p>
                <?php endif; ?>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>
            </form>
        </div>
    </div>
<script>
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
</script>