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
    <link rel="stylesheet" href="faq.css" />
  </head>
  <body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg" id = "navTogg">
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

    <!-- FAQ Section -->
    <div class="container mt-5">
  <h1 class="text-center mb-4" style="margin-top: 50px;">Frequently Asked Questions</h1>
  <div class="accordion" id="faqAccordion">
    <!-- FAQ 1 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="faqHeading1">
        <button
          class="accordion-button"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#faqCollapse1"
          aria-expanded="true"
          aria-controls="faqCollapse1"
        >
          What is Blog Portal?
        </button>
      </h2>
      <div
        id="faqCollapse1"
        class="accordion-collapse collapse show"
        aria-labelledby="faqHeading1"
        data-bs-parent="#faqAccordion"
      >
        <div class="accordion-body">
          Blog Portal is an online platform where users can read, write, and share blogs on a variety of topics. It’s a community for writers, readers, and thought leaders.
        </div>
      </div>
    </div>
    <!-- FAQ 2 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="faqHeading2">
        <button
          class="accordion-button collapsed"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#faqCollapse2"
          aria-expanded="false"
          aria-controls="faqCollapse2"
        >
          How can I submit a blog?
        </button>
      </h2>
      <div
        id="faqCollapse2"
        class="accordion-collapse collapse"
        aria-labelledby="faqHeading2"
        data-bs-parent="#faqAccordion"
      >
        <div class="accordion-body">
          You can submit your blog after creating an account and navigating to the "Post Now" section. From Home
        </div>
      </div>
    </div>
    <!-- FAQ 3 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="faqHeading3">
        <button
          class="accordion-button collapsed"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#faqCollapse3"
          aria-expanded="false"
          aria-controls="faqCollapse3"
        >
          Is there a fee for using Blog Portal?
        </button>
      </h2>
      <div
        id="faqCollapse3"
        class="accordion-collapse collapse"
        aria-labelledby="faqHeading3"
        data-bs-parent="#faqAccordion"
      >
        <div class="accordion-body">
          No, Blog Portal is completely free to use. All features, including reading and publishing blogs, are available at no cost.
        </div>
      </div>
    </div>
    <!-- FAQ 4 -->
    <div class="accordion-item">
      <h2 class="accordion-header" id="faqHeading5">
        <button
          class="accordion-button collapsed"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#faqCollapse5"
          aria-expanded="false"
          aria-controls="faqCollapse5"
        >
          Can I edit or delete my blog after publishing it?
        </button>
      </h2>
      <div
        id="faqCollapse5"
        class="accordion-collapse collapse"
        aria-labelledby="faqHeading5"
        data-bs-parent="#faqAccordion"
      >
        <div class="accordion-body">
          Yes, you can edit or delete your blogs by visiting the "My Blogs" section and selecting the blog you want to modify.
        </div>
      </div>
    </div>
  </div>
</div>


   
    <!-- Footer -->
    <footer>
        &copy; 2025 Blog Portal. All rights reserved.
      </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
