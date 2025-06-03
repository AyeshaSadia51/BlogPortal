// Added an event listener to handle the form submission
document
  .getElementById("registrationForm")
  .addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent the default form submission behavior

    // Retrieve user input values from the form fields
    const name = document.getElementById("fullname").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    // Check if any field is empty and alert the user
    if (
      !name ||
      !email ||
      !phone ||
      !password ||
      !confirmPassword
    ) {
      alert("Please fill all fields.");
      return;
    }

    const nameRegex = /^[A-Za-z\s]{10,30}$/;
    if (!nameRegex.test(name)) {
      alert("Please enter a valid Full Name (10-30 characters, letters only).");
      return;
    }

    const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    if (!emailRegex.test(email)) {
      alert("Please enter a valid email address.");
      return;
    }

    const phoneRegex = /^(?:\+88|88)?01[3-9]\d{8}$/;
    if (!phoneRegex.test(phone)) {
      alert(
        'Please enter a valid Bangladeshi phone number starting with 01 and containing 11 digits. You may optionally include "+88" or "88" as a prefix.'
      );
      return;
    }

    const passwordRegex =
      /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*,./;'])[a-zA-Z\d@#$%^&*,./;']{8,20}$/;
    if (!passwordRegex.test(password)) {
      alert(
        "Password must contain at least one digit, one lowercase, one uppercase, one special character, and be 8-20 characters long."
      );
      return;
    }

    if (password !== confirmPassword) {
      alert("Passwords do not match.");
      return;
    }

    // AJAX request to PHP backend
        let formData = new FormData(this);

        fetch('regAuth.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then( (data => {
            // Handle the response from the PHP script
            if (data.includes('This email has already taken')) {
                alert('This email has already taken!!');
                window.location.href = 'registration.php';
            } else {
                alert('Your account is successfully created'),
                window.location.href = 'login.php'
            }
        })).catch(error => console.error('Error:', error));
  });
