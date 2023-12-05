<?php
if (isset($_SESSION['accept_message'])) {
    $accept_message = $_SESSION['accept_message'];
    unset($_SESSION['accept_message']);
}
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
if (isset($_SESSION['logged'])) {
  $url = "/admin/" . $_SESSION['name'] . "/" . $_SESSION['id'];
  header("Location:$url");
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<main>
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-3">
              <div class="d-flex justify-content-md-center">
                <a style="font-size:2rem;text-decoration:none;color:#3f403f;cursor:pointer;" href="/"><b>Fake</b> <i>Newspaper</i></a>
              </div>
              <h2 class="text-uppercase text-center mb-3">Sign in</h2>
              <form method="POST" action="/admin/login">
                <div class="form-outline mb-2">
                  <input type="email" id="form3Example3cg"  name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-2">
                  <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <?php if (isset($error_message)) : ?>
                  <p style="color: red; text-align: center;"><?php echo $error_message?></p>
                <?php endif; ?>

                <?php if (isset($accept_message)) : ?>
                  <p style="color: blue; text-align: center;"><?php echo $accept_message?></p>
                <?php endif; ?>

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Sign in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
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