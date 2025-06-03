<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Blog Portal</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="HomeStyle.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg">
    <?php session_start(); ?>
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
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="allpost.php"
              id="allPostDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="allPostDropdown">
              <li>
                <a style="color:purple; font-weight:bold" class="dropdown-item" href="allpost.php?category=Technology">Technology</a>
              </li>
              <li>
                <a style="color:purple; font-weight:bold" class="dropdown-item" href="allpost.php?category=Blogs">Blogs</a>
              </li>
              <li>
                <a style="color:purple; font-weight:bold" class="dropdown-item" href="allpost.php?category=News">News</a>
              </li>
            </ul>
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
              href="<?php echo isset($_SESSION['email']) && !empty($_SESSION['email']) ? 'logout.php' : 'login.php'; ?>">
              <?php echo isset($_SESSION['email']) && !empty($_SESSION['email']) ? "Logout" : 'Login'; ?>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Content Section -->
  <div class="container my-5">
    <?php
    // Database connection
    $conn = new mysqli("localhost", "root", "", "blogportal");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Fetch category filter from URL
    $categoryFilter = isset($_GET['category']) ? $_GET['category'] : null;

    // SQL query to filter by category if selected
    $sql = "SELECT title, category, publisher_name, image, blog FROM blogs";
    if ($categoryFilter) {
      $sql .= " WHERE category = '" . $conn->real_escape_string($categoryFilter) . "'";
    }
    $result = $conn->query($sql);
    ?>

    <!-- Title based on selected category -->
    <h3 class="text-center text-success mb-4 mt-4">
      <?php echo $categoryFilter ? "Posts in $categoryFilter Category" : "All Posts"; ?>
    </h3>

    <div class="row g-4">
      <?php
      if ($result->num_rows > 0) {
        // Loop through each post
        while ($row = $result->fetch_assoc()) {
          $title = $row['title'];
          $category = $row['category'];
          $publisher_name = $row['publisher_name'];
          $image = $row['image'];
          $blog = $row['blog'];
          $excerpt = implode(' ', array_slice(explode(' ', htmlspecialchars($blog)), 0, 20)) . '...';
      ?>
          <!-- Single Post Card -->
          <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
              <!-- Post Image -->
              <img
                src="<?php echo htmlspecialchars($image); ?>"
                alt="<?php echo htmlspecialchars($title); ?>"
                class="card-img-top"
                style="object-fit: cover; height: 200px;" />
              <div class="card-body">
                <!-- Post Title -->
                <h5 class="card-title text-primary fw-bold">
                  <?php echo htmlspecialchars($title); ?>
                </h5>
                <!-- Post Details -->
                <p class="card-text">
                  <strong>Category:</strong> <span class="text-success"> <?php echo htmlspecialchars($category); ?> </span><br />
                  <strong>Published By:</strong> <span class="text-success"> <?php echo htmlspecialchars($publisher_name); ?> </span>
                </p>
                <!-- Post Excerpt -->
                <p class="card-text text-muted">
                  <?php echo $excerpt; ?>
                </p>
                <a href="single_post.php?title=<?php echo urlencode($title); ?>" class="btn btn-primary btn-sm">Read More</a>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo "<p class='text-center'>No blog posts found in this category.</p>";
      }
      $conn->close();
      ?>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center py-3">
    &copy; 2025 Blog Portal. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
