<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog Post</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="HomeStyle.css" />
  <style>
    /* Add some spacing below the navbar */
    .container {
      margin-top: 20px; /* Adds space below the navbar */
    }

    img {
      margin-top: 20px; /* Prevents the image from touching the navbar */
      object-fit: cover;
      width: 100%;
      height: auto;
    }

    /* Ensure the image takes the full width of its container */
    .post-image {
      max-height: 500px;
      object-fit: cover; /* Ensures image covers its container without distortion */
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <header style="font-weight: bold">
        <a class="navbar-brand" href="index.php">Blog Portal</a>
      </header>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="allpost.php">All Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AboutUsPage.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faqPage.php">FAQ</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Single Post Section -->
  <div class="container my-5">
    <?php
    $conn = new mysqli("localhost", "root", "", "blogportal");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Get the post title from URL
    $postTitle = isset($_GET['title']) ? $conn->real_escape_string($_GET['title']) : null;

    if ($postTitle) {
      // Fetch the post details
      $sql = "SELECT title, category, publisher_name, image, blog FROM blogs WHERE title = '$postTitle'";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    ?>
        <div class="row">
          <div class="col-12">
            <!-- Post Image -->
            <img
              src="<?php echo htmlspecialchars($post['image']); ?>"
              alt="<?php echo htmlspecialchars($post['title']); ?>"
              class="img-fluid rounded mb-4 post-image" />
            <!-- Post Title -->
            <h1 class="text-primary fw-bold mb-3"> <?php echo htmlspecialchars($post['title']); ?> </h1>
            <!-- Post Metadata -->
            <p class="text-muted">
              <strong>Category:</strong> <span class="text-success"> <?php echo htmlspecialchars($post['category']); ?> </span> |
              <strong>Published By:</strong> <span class="text-success"> <?php echo htmlspecialchars($post['publisher_name']); ?> </span>
            </p>
            <!-- Post Content -->
            <p class="fs-5"> <?php echo nl2br(htmlspecialchars($post['blog'])); ?> </p>
          </div>
        </div>
    <?php
      } else {
        echo "<p class='text-center text-danger'>Post not found.</p>";
      }
    } else {
      echo "<p class='text-center text-danger'>No post selected.</p>";
    }

    $conn->close();
    ?>
  </div>

  <!-- Footer -->
  <footer class="text-center py-3">
    &copy; 2025 Blog Portal. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
