<?php include('header.php'); ?>

<div class="container d-flex flex-column flex-lg-row justify-content-evenly mt-5 pt-5" style="padding-top: 10rem;">
  <div class="text-center text-lg-center mt-lg-5 pt-lg-5">
    <img src="../img/logo.png" width="688px" height="216px" alt="HireSpot" />
    <p class="w-75 mx-auto ma-lg-0 fs-4">
      Unleash your potential, embrace the extraordinary!
    </p>
  </div>

  <div style="max-width: 28rem; width: 100%">
    <?php
      // Handle error messages
      if (isset($_GET['error'])) {
          // Display appropriate error messages
          if ($_GET['error'] == 1) {
              echo "<div class='alert alert-danger py-2' role='alert'>Please Fill All Fields to Register!</div>";
          } elseif ($_GET['error'] == 2) {
              echo "<div class='alert alert-danger py-2' role='alert'>Your Email or Password Incorrect!</div>";
          }
      }
    ?>

    <div class="bg-white shadow rounded p-3 input-group-lg">
      <form action="./server/userRegistrationProcess.php" method="POST">
        <h1 class="text-center">Sign up</h1>
        <div class="row">
          <div class="col">
            <input type="text" name="FirstName" class="form-control my-3" placeholder="First Name" required />
          </div>
          <div class="col">
            <input type="text" name="LastName" class="form-control my-3" placeholder="Last Name" required />
          </div>
        </div>

        <input type="text" name="UserName" class="form-control my-3" placeholder="Username" required />
        <input type="email" name="Email" class="form-control my-3" placeholder="Email" required />

        <div class="row">
          <div class="col">
            <label class="form-check-label" for="flexRadioDefault1">Gender</label>
            <div class="d-flex justify-content-evenly mt-2">
              <div>
               
                <input class="form-check-input" type="radio" name="Gender" value="Male" checked />Male
              </div>
              <div>
               
                <input class="form-check-input" type="radio" name="Gender" value="Female" />Female
              </div>
            </div>
          </div>
          <div class="col">
            <span class="text-muted fs-7">Date Of Birth</span>
            <input type="date" name="dateofbirth" class="form-control" required />
          </div>
        </div>

        <input type="tel" name="Phone" class="form-control my-3" placeholder="Phone No" required />
        <input type="password" name="Password" class="form-control my-3" placeholder="Password" required />
        <input type="text" name="Address" class="form-control my-3" placeholder="Address" required />
        <input type="text" name="Education" class="form-control my-3" placeholder="Education" required />

        <textarea class="form-control my-3" name="Description" placeholder="Bio (max 200 characters)" maxlength="200"></textarea>
        <textarea class="form-control my-3" name="about" placeholder="About me (max 200 characters)" maxlength="200"></textarea>

        <div class="text-center">
          <button type="submit" class="btn btn-outline-primary my-3">
            Sign up
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
