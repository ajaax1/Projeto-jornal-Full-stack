<?php
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}

if (isset($_SESSION['accept_message'])) {
  $error_message = $_SESSION['accept_message'];
  unset($_SESSION['accept_message']);
}
if(!isset($_SESSION['logged'])) {
  header("Location:/");
} 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    
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
              <h2 class="text-uppercase text-center mb-3">Create an account</h2>

              <form method="POST" action="/register">
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

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>
                <p class="text-center text-muted mt-3 mb-0">Already have an account? <a href="/login" class="fw-bold text-body"><u>Log in here</u></a></p>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

