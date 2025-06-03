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
  <!-- Header: Introductory Banner Section -->
  <header class="intro-banner text-center">
    <div class="container">
      <?php
      session_start();
      ?>
      <h1>Welcome to Blog Portal</h1>
      <p>Explore the world of Knowledge. Join us and share your knowledge to all</p>
      <a href="<?php echo isset($_SESSION['email']) && !empty($_SESSION['email']) ? 'blogPost.php' : 'login.php'; ?>" class="btn"><?php echo isset($_SESSION['email']) && !empty($_SESSION['email']) ? "Post Now" : 'LOGIN'; ?></a>
    </div>
  </header>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-purple">
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
              href="<?php echo isset($_SESSION['email']) && !empty($_SESSION['email']) ? 'logout.php' : 'registration.php'; ?>">
              <?php echo isset($_SESSION['email']) && !empty($_SESSION['email']) ? "Logout" : 'Signup'; ?>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
  $conn = new mysqli("localhost", "root", "", "blogportal");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT title, category, publisher_name, image, blog FROM blogs";
  $result = $conn->query($sql);
  ?>
  <!-- Content -->
  <div class="container mt-5">
    <div class="row">
      <?php
      if ($result->num_rows > 0) {
        $postCount = 0;
        while ($row = $result->fetch_assoc()) {
          $postCount++;

          // Display only the first 5 posts
          if ($postCount > 5) {
            break;
          }

          $title = $row['title'];
          $category = $row['category'];
          $publisher_name = $row['publisher_name'];
          $image = $row['image'];
          $blog = $row['blog'];
      ?>
          <div class="col-md-6 col-lg-4 mb-4">
            <!-- Blog Post -->
            <div class="card">
              <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($title); ?>" class="card-img-top" style="height: 200px; object-fit: cover;" />
              <div class="card-body">
                <h5 class="card-title" style="color: purple;"><?php echo htmlspecialchars($title); ?></h5>
                <p class="card-text"><strong>Category:</strong> <?php echo htmlspecialchars($category); ?></p>
                <p class="card-text">
                  <?php
                  // Limit blog content to 30 words
                  $limitedBlog = implode(' ', array_slice(explode(' ', htmlspecialchars($blog)), 0, 30));
                  echo $limitedBlog . '...';
                  ?>
                </p>
                <a href="single_post.php?title=<?php echo urlencode($title); ?>" class="btn btn-primary">See More</a>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
        <div class="col-md-12 text-center mb-2 mt-2">
          <a style="background-color: #660099;" href="allPost.php" class="btn text-white">SEE ALL</a>
        </div>
      <?php
      } else {
        echo "<p>No blog posts published yet.</p>";
      }
      $conn->close();
      ?>
    </div>
  </div>

  <footer class="bg-dark text-white text-center py-3">
    &copy; 2025 Blog Portal. All rights reserved.
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
