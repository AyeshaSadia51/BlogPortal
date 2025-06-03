<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog Portal</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="auth_Style.css" />

  </head>
  <body>
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <header style="font-weight: bold">
          <a class="navbar-brand" href="index.php">Blog Portal</a>
        </header>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="allpost.php">All Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AboutUsPage.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faqPage.php">FAQ</a>
            </li>
            <?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])): ?>
            <li class="nav-item">
              <a class="nav-link" href="myblogs.php">My Blogs</a>
            </li>
            <?php endif; ?>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo isset($_SESSION['email']) && !empty($_SESSION['email']) ? 'logout.php' : 'registration.php'; ?>">
                <?php echo isset($_SESSION['email']) && !empty($_SESSION['email']) ? "Logout" : 'Signup'; ?>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Main container for the login page -->
    <div class="container mt-5">
      <div class="row d-flex align-items-center p-4">
        <!-- Left column: Form section -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
          <div style="width: 90%; max-width: 400px">
            <h2 class="text-center mb-4">Login</h2>
            <!-- Login form starts -->
            <form action="loginAuth.php" method="post"id="loginForm">
              <!-- Email input field -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required />
              </div>
              <!-- Password input field -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  required
                />
              </div>
              <br />
              <!-- Login button -->
              <button type="submit" class="btn w-100" name="login">Login</button>
            </form>
          </div>
        </div>

        <!-- Right column: Image form -->

        <div
          class="col-md-6 d-flex flex-column justify-content-center align-items-center"
        >
          <img
            class="img-fluid"
            src="images/login.jpg"
            alt="image"
            style="object-fit: cover"
          />
          <!-- Text link below the image -->
          <div class="text-center">
            <a href="registration.php"> Create an Account</a>
          </div>
        </div>
      </div>
    </div>
  </body>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</html>
