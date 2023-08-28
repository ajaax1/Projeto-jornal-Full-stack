<?php
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}

if (isset($_SESSION['accept_message'])) {
  $error_message = $_SESSION['accept_message'];
  unset($_SESSION['accept_message']);
}
if (isset($_SESSION['logged'])) {
  header("Location:/");
} 
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
              <h2 class="text-uppercase text-center mb-3">Create an account</h2>

              <form method="POST" action="/register">
                <div class="form-outline mb-2">
                  <input type="text" id="form3Example1cg" required name="name" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>
                
                <div class="form-outline mb-2">
                  <input type="email" id="form3Example3cg" required name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-2">
                  <input type="password" id="form3Example4cg" required name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-2">
                  <input type="password" id="form3Example4cg" required name="password2" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Confirm password</label>
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