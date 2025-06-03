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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
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
                data-bs-target="#navbarNav">
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
                            href="<?php echo isset($_SESSION['email']) && !empty($_SESSION['email']) ? 'logout.php' : 'login.php'; ?>">
                            <?php echo isset($_SESSION['email']) && !empty($_SESSION['email']) ? "Logout" : 'Login'; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <?php
        if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
            echo "<p class='text-danger'>Please log in to view your blogs.</p>";
            exit();
        }

        $user_email = $_SESSION['email'];
        $conn = new mysqli("localhost", "root", "", "blogportal");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $result = mysqli_query($conn, "SELECT * FROM blogs WHERE email = '$user_email'");
        ?>

        <br>
        <h2 class="mb-4">My Blogs</h2>
        <div class="container my-5">
            <?php
            if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
                echo "<p class='text-danger'>Please log in to view your blogs.</p>";
                exit();
            }

            $user_email = $_SESSION['email'];
            $conn = new mysqli("localhost", "root", "", "blogportal");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $result = mysqli_query($conn, "SELECT * FROM blogs WHERE email = '$user_email'");
            ?>

            <!-- <h2 class="mb-4">My Blogs</h2> -->
            <div class="list-group">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                     <div class="list-group-item p-4 mb-3 border rounded shadow-sm">
    <div class="d-flex flex-wrap align-items-center justify-content-between">
        <!-- Left side: Image and content -->
        <div class="d-flex align-items-center">
            <img
                src="<?php echo htmlspecialchars($row['image']); ?>"
                alt="<?php echo htmlspecialchars($row['title']); ?>"
                class="rounded me-3"
                style="width: 120px; height: 80px; object-fit: cover;"
            />
            <div>
                <h5 class="mb-1 text-primary"><?php echo htmlspecialchars($row['title']); ?></h5>
                <p class="mb-0">
                    <strong>Category:</strong> <span style="color: purple; font-weight: bold;"><?php echo htmlspecialchars($row['category']); ?></span><br>
                    <strong>Published By:</strong> <span style="color: purple; font-weight: bold;"><?php echo htmlspecialchars($row['publisher_name']); ?></span><br>
                    <strong>Blog:</strong> 
                    <p><?php echo nl2br(htmlspecialchars(substr($row['blog'], 0, 150))); ?><?php echo strlen($row['blog']) > 150 ? '...' : ''; ?></p>
                </p>
            </div>
        </div>

        <!-- Right side: Buttons -->
        <div class="d-flex flex-wrap align-items-center">
            <button
                class="btn btn-primary btn-sm edit-btn"
                data-id="<?php echo $row['id']; ?>"
                data-title="<?php echo htmlspecialchars($row['title']); ?>"
                data-category="<?php echo htmlspecialchars($row['category']); ?>"
                data-blog="<?php echo htmlspecialchars($row['blog']); ?>"
            >
                Edit
            </button>
            <button
                class="btn btn-danger btn-sm delete-btn ms-2"
                data-id="<?php echo $row['id']; ?>"
            >
                Delete
            </button>
        </div>
    </div>
</div>


                <?php
                    }
                } else {
                    echo "<p>You have not published any blogs yet.</p>";
                }

                $conn->close();
                ?>
            </div>
        </div>

    </div>

    <!-- Edit Modal or popup -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Blog</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="edit-id" name="id">
                        <div class="mb-3">
                            <label for="edit-title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="edit-title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-category" class="form-label">Category</label>
                            <select class="form-select" name="category" required>
                                <option value="" disabled selected>Select a Category</option>
                                <option>Technology</option>
                                <option>Blogs</option>
                                <option>News</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit-blog" class="form-label">Blog</label>
                            <textarea class="form-control" id="edit-blog" name="blog" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3">
        &copy; 2025 Blog Portal. All rights reserved.
    </footer>
</body>
<!-- Scripts for catch current blog -->
<script>
    $(document).ready(function() {
        $(".edit-btn").click(function() {
            const id = $(this).data("id");
            const title = $(this).data("title");
            const category = $(this).data("category");
            const blog = $(this).data("blog");

            $("#edit-id").val(id);
            $("#edit-title").val(title);
            $("#edit-category").val(category);
            $("#edit-blog").val(blog);

            $("#editModal").modal("show");
        });

        $("#editForm").submit(function(e) {
            e.preventDefault();
            $.post("update_blog.php", $(this).serialize(), function(response) {
                alert(response);
                location.reload();
            });
        });

        $(".delete-btn").click(function() {
            const id = $(this).data("id");
            if (confirm("Are you sure you want to delete this blog?")) {
                $.post("delete_blog.php", {
                    id: id
                }, function(response) {
                    alert(response);
                    location.reload();
                });
            }
        });
    });
</script>

</html>