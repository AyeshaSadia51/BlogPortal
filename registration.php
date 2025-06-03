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
      <?php
          session_start();
        ?>
      <div class="container-fluid">
        <header style="font-weight: bold">
          <a class="navbar-brand" href="index.php">Blog Portal</a>
        </header>
        <!-- Toggle button for responsive navigation -->
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
            <!-- Navigation links for different pages -->
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
              <a
                class="nav-link"
                href="<?php echo isset($_SESSION['email']) && !empty($_SESSION['email']) ? 'logout.php' : 'login.php'; ?>"
              >
                <?php echo isset($_SESSION['email']) && !empty($_SESSION['email']) ? "Logout" : 'Login'; ?>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <div class="container mt-5">
      <!-- Row for image and form -->
      <div class="row d-flex align-items-center">
        <!-- Left column: Form section -->
        <div class="col-md-6 d-flex justify-content-center align-items-center">
          <div style="width: 90%; max-width: 400px">
            <h4 class="text-center mb-4">Create an Account</h4>
            <!-- Registration form starts -->
            <form id="registrationForm">
              <div class="mb-1">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" required />
              </div>
              <div class="mb-1">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required />
              </div>
              <div class="mb-1">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" required />
              </div>
              <div class="mb-1">
                <label for="password" class="form-label">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  required
                />
              </div>
              <div class="mb-1">
                <label for="confirmPassword" class="form-label"
                  >Confirm Password</label
                >
                <input
                  type="password"
                  class="form-control"
                  id="confirmPassword"
                  name="confirmPassword"
                  required
                />
              </div>
              <br />
              <button type="submit" class="btn btn-primary w-100">
                Register
              </button>
            </form>
            <!-- Registration form end -->
          </div>
        </div>

        <!-- Right column: Image section -->
        <div
          class="col-md-6 d-flex flex-column justify-content-center align-items-center"
        >
          <img
            class="img-fluid"
            src="images/registration.jpg"
            alt="image"
            style="object-fit: cover"
          />
          <!-- Text link below the image -->
          <div class="text-center mt-3">
            Already have an Account? <a href="login.php">Login</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Link to external JavaScript file for form handling -->
    <script src="RegistrationScript.js"></script>
  </body>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</html>


