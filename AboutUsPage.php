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
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="HomeStyle.css" />
  </head>
  <body>
    <!-- Navigation Bar -->
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
    
    <!-- Main Content -->
    <main class="container mt-5">
      <div class="row">
        <div class="col-md-8">
          <div class="About Us-section" style="background-color: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
    <!-- Section Title -->
    <h2 style="text-align: center; color: #660099; font-weight: bold; margin-bottom: 20px;">About Us Blog Portal</h2>
    
    <!-- Mission Statement -->
    <h3 style="text-align: center; color: #333; font-weight: 600; margin-bottom: 15px;">Our Mission</h3>
    <p style="line-height: 1.8; text-align: justify; color: #555;">
        Welcome to <strong>Blog Portal</strong>! We are a community-driven platform designed for sharing knowledge, ideas, and stories. Whether you're an expert, enthusiast, or someone with a unique perspective, this is the perfect space to showcase your thoughts and engage with a like-minded audience. 
    </p>
    
    <!-- Purpose -->
    <p style="line-height: 1.8; text-align: justify; color: #555;">
        Our purpose is to empower individuals to share their expertise, learn from others, and create meaningful connections. At <strong>Blog Portal</strong>, we believe everyone has something valuable to share, and by fostering an open environment, we aim to build a vibrant hub of diverse knowledge. From personal experiences to professional insights, this is your space to inspire and be inspired.
    </p>
    
    <!-- Gratitude -->
    <p style="line-height: 1.8; text-align: justify; color: #555;">
        Thank you for joining our journey! We are thrilled to have you as part of our community and look forward to seeing your contributions. Feel free to contact us with any questions, feedback, or suggestions—we’re here to help!
    </p>
    
    <!-- Closing Message -->
    <p style="font-weight: bold; text-align: center; font-size: 1.2rem; color: #333; margin-top: 20px;">
        Together, let’s make knowledge-sharing simple, impactful, and fun! ✨
    </p>
</div>

        </div>
        

        <!-- Sidebar Section -->
        <div class="col-md-4">
          <ul class="list-group">
            <li class="list-group-item">
              <h4>Website Owner Details</h4>
            </li>
            <br />
            <li class="list-group-item" style="font-weight: bold; color: rgb(5, 25, 41); margin-bottom: 30px;">
              <i class="fas fa-user" style="color: purple"></i>
              Ayesh Ferdous
            </li>
            <li class="list-group-item" style="font-weight: bold; color: rgb(5, 25, 41); margin-bottom: 30px;">
              <i class="fa fa-id-card"style="color: purple"></i>
              ID: 2122020010
            </li>
            <li class="list-group-item" style="font-weight: bold; color: rgb(5, 25, 41); margin-bottom: 30px;">
              <i class="fas fa-envelope" style="color: purple"></i>
              ayeshaferdous@gmail.com
            </li>
          </ul>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer>
      &copy; 2025 Blog Portal. All rights reserved.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
