<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>HireSpot | login</title>
  <!-- favicon -->
  <link rel="shortcut icon" href="../img/logo only.png" type="image/x-icon">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Main CSS -->
  <link rel="stylesheet" href="../css/maincss.css">
  
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #F1F0F0;
      overflow-x: hidden;
    }

    .fs-0 {
      font-size: 4rem;
    }

    .fs-7 {
      font-size: 0.8rem;
    }

    .active-quicklink:hover {
      color: blue !important;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-white fixed-top d-flex justify-content-center">
    <div class="container">
      <!-- Logo -->
      <a href="../index.php"><img src="../img/logo.png" width="137px" height="43px" alt="HireSpot" /></a>
    </div>
  </nav> 

  <!-- Main content -->
  <div class="container d-flex flex-column flex-lg-row justify-content-evenly mt-5 pt-5" style="padding-top: 10rem;">
    <!-- Heading -->
    <div class="text-center text-lg-center mt-lg-5 pt-lg-5">
      <img src="../img/logo.png" width="688px" height="216px" alt="HireSpot" />
      <p class="w-75 mx-auto ma-lg-0 fs-4">
        Unleash your potential, embrace the extraordinary! test
      </p>
    </div>

    <!-- Form -->
    <div style="max-width: 28rem; width: 100%">
      <!-- Display Error or Success Messages -->
      <?php
      if (isset($_GET['error'])) {
        if ($_GET['error'] == 1) {
          echo "<div class='alert alert-danger py-2' role='alert'>Please Fill All Fields to Register!</div>";
        }
        if ($_GET['error'] == 2) {
          echo "<div class='alert alert-danger py-2' role='alert'>Your Email or Password Incorrect!</div>";
        }
        if ($_GET['error'] == 3) {
          echo "<div class='alert alert-danger py-2' role='alert'>First You Need to Login Your Account to Preview your Profile.</div>";
        }
        if ($_GET['error'] == 4) {
          echo "<div class='alert alert-danger py-2' role='alert'>User not found. Create an account.</div>";
        }
        if ($_GET['error'] == 5) {
          echo "<div class='alert alert-danger py-2' role='alert'>Please Fill All Fields to login!</div>";
        }
      }

      if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<div class='alert alert-success py-2' role='alert'>You have successfully registered! Please Log In</div>";
      }

      if (isset($_GET['message'])) {
        echo "<div class='alert alert-danger py-2' role='alert'>" . $_GET['message'] . "</div>";
      }
      ?>
      
      <!-- Login Form -->
      <div class="bg-white shadow rounded p-3 input-group-lg">
        <form action="./server/userLoginProcess.php" method="post">
          <h1 class="text-center">Log in</h1>
          <div class="form-floating my-3">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com"
              style="background-color: #F4F4F4">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating my-3">
            <input type="password" name="Password" class="form-control" id="floatingPassword" placeholder="Password"
              style="background-color: #F4F4F4">
            <label for="floatingPassword">Password</label>
          </div>
          <button type="submit" class="btn btn-primary my-3 w-100">Login</button>
        </form>

        <a href="#" class="text-decoration-none text-center">
          <p>Forgotten password?</p>
        </a>

        <hr />
        <div class="text-center my-4">
          <button class="btn btn-outline-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create new Account
          </button>
        </div>
      </div>

      <div class="text-center my-5 pb-5">
        <p>
          Stay focused, stay motivated, and conquer your dream job.
        </p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-white p-4 text-muted fixed-bottom">
    <div class="container">
      <hr />
      <div class="d-flex flex-column align-items-center justify-content-center mt-3">
        <p class="mb-0 fs-7">
          <a href="" class="text-decoration-none text-muted active-quicklink fs-7">Privacy</a> |
          <a href="" class="text-decoration-none text-muted active-quicklink fs-7">Terms</a> |
          <a href="" class="text-decoration-none text-muted active-quicklink fs-7">Advertising</a> |
          <a href="" class="text-decoration-none text-muted active-quicklink fs-7">Ad Choices</a> |
          <a href="" class="text-decoration-none text-muted active-quicklink fs-7">Cookies</a>
        </p>
        <div class="d-flex">
          <a class="" href="../index.php"><img src="../img/logo.png" width="58px" height="16px" alt="HireSpot"
              class="mb-2" /></a>
          <p class="fs-7">&copy; 2023</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

  <!-- Main JS -->
  <script src="mainjs.js"></script>
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
  </script>
</body>

</html>
