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
    <link rel="stylesheet" href="blogPost.css" />
  </head>
  <body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <?php
          session_start();
          $email = $_SESSION['email']
        ?>
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
    <!-- main Section -->
    <section class="blogpost-section py-5">
      <div class="container">
        <div class="d-flex justify-content-center">
          <div class="col-lg-6">
            <div class="card shadow border-0">
              <div class="card-body">
                <form action="blogpostAction.php" method="post"  enctype="multipart/form-data">
                  <h1 class="text-center">Share Your Knowledge To Everyone</h1><br>
                  <div class="mb-3">
                    <label for="contenttitle" class="form-label">Title</label>
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      placeholder="Your blog title"
                      name="contenttitle"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category" required>
              <option value="" disabled selected>Select a Category</option>
              <option>Technology</option>
              <option>Blogs</option>
              <option>News</option>
            </select>
                  </div>
                  <div class="mb-3">
                    <label for="p_name" class="form-label">Published By</label>
                    <input
                      type="tel"
                      class="form-control"
                      id="phone"
                      placeholder="Publisher name"
                      name="p_name"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input
                      type="file"
                      class="form-control"
                      name="image"
                      required
                    />
                  </div>
                  <div class="mb-3">
                    <label for="blog" class="form-label">Blog</label>
                    <textarea
                      class="form-control"
                      id="message"
                      rows="5"
                      name="blog"
                      placeholder="Type your blog"
                      required
                    ></textarea>
                  </div>
                  <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>" />

                  <!-- Submit button for the form -->
                  <button type="submit" class="btn w-100" name="blogpost">Published</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
      &copy; 2025 Blog Portal. All rights reserved.
    </footer>
    <!-- Link to external JavaScript file for form handling -->
    <script src="blogpost.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
