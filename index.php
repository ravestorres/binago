<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HireSpot | About</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/logo only.png" type="image/x-icon">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        /* Apply Poppins font globally */
        body {
            background-color: #F1F0F0;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .fs-0 {
            font-size: 4rem;
        }

        .fs-7 {
            font-size: 0.8rem;
        }

        .bg-darkgray {
            background-color: #D9D9D9 !important;
        }
    </style>
</head>


   <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="img/logo.png" width="137px" height="43px" alt="HireSpot" /></a>

        <!-- Profile -->
        <div>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="img/userDefault.jpg" alt="avatar" width="32" height="32" class="rounded-circle me-2">
                    <span class="fs-4">Log in as</span>
                </a>
                <ul class="dropdown-menu shadow">
                    <li><a class="dropdown-item" href="./pages/Login.php">Job seeker</a></li>
                    <li><a class="dropdown-item" href="./pages/LoginCompany.php">Company</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Slider -->
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="first-slide img-fluid w-100" src="./img/bg.png" alt="First slide">
            <div class="container">
                <div class="carousel-caption text-left">
                    <h1><img class="img-fluid mt-3" src="img/logo.png" height="400px" alt="HireSpot" /></h1>
                    <h1 class="text-dark">Empowering Your Career Journey</h1>
                    <h4 class="text-primary">Sign up today</h4>
                    <a class="btn btn-outline-primary btn-lg mt-3" data-bs-toggle="modal"
                       data-bs-target="#userModal" href="./pages/Login.php" role="button">As jobseeker</a>
                    <a class="btn btn-outline-primary btn-lg mt-3" data-bs-toggle="modal"
                       data-bs-target="#companyModal" href="./pages/LoginCompany.php" role="button">As company</a>
                    
                    <!-- User Modal -->
                    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="">
                                        <h1 class="modal-title text-dark fs-2" id="userModalLabel">Sign up as jobseeker</h1>
                                        <span class="text-muted fs-7">Join with us to discover something</span>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="./pages/server/userRegistrationProcess.php" method="POST">
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="FirstName" class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="col">
                                                <input type="text" name="LastName" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>

                                        <input type="text" name="UserName" class="form-control my-3" placeholder="Username" />
                                        <input type="email" name="Email" class="form-control my-3" placeholder="Email" />

                                        <div class="row">
                                            <div class="col">
                                                <div class="d-flex justify-content-evenly mt-2">
                                                    <div>
                                                        <label class="form-check-label" for="flexRadioDefault1">Male</label>
                                                        <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" value="Male" checked />
                                                    </div>
                                                    <div>
                                                        <label class="form-check-label" for="flexRadioDefault2">Female</label>
                                                        <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault2" value="Female" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <span class="text-muted fs-7">Date Of Birth</span>
                                                <input type="date" name="dateofbirth" class="form-control" />
                                            </div>
                                        </div>

                                        <input type="tel" name="Phone" class="form-control my-3" placeholder="Phone No" />
                                        <input type="password" name="Password" class="form-control my-3" placeholder="Password" />
                                        <input type="text" name="Address" class="form-control my-3" placeholder="Address" />
                                        <input type="text" name="Education" class="form-control my-3" placeholder="Education" />

                                        <textarea class="form-control my-3" id="description" name="Description" placeholder="Bio (e.g., tech enthusiast)" maxlength="200"></textarea>
                                        <textarea class="form-control my-3" id="description" name="about" placeholder="About me" maxlength="200"></textarea>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-outline-primary my-3" data-bs-dismiss="modal">Sign up</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Company Modal -->
                    <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="">
                                        <h1 class="modal-title text-dark fs-2" id="companyModalLabel">Sign up as company</h1>
                                        <span class="text-muted fs-7">Join with us to discover something</span>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="./pages/server/comapanyRegistrationProcess.php" method="post">
                                    <div class="modal-body">
                                        <input type="text" name="companyname" class="form-control my-3" placeholder="Company Name" />
                                        <input type="email" name="email" class="form-control my-3" placeholder="Email" />
                                        <input type="text" name="address" class="form-control my-3" placeholder="Address" />
                                        <textarea class="form-control my-3" id="description" name="description" placeholder="Description" maxlength="200"></textarea>
                                        <input type="password" name="password" class="form-control my-3" placeholder="Password" />
                                        <input type="text" name="employee" class="form-control my-3" placeholder="Number of Employees" />
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-outline-primary my-3" data-bs-dismiss="modal">Sign up</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container marketing p-3">
        <div class="row mt-4">
            <div class="col-lg-4 text-center">
                <img class="rounded mb-2" src="./img/search.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Find Your Job Easier</h2>
                <p>At Hirespot, we understand that finding the right job can be a challenging process...</p>
            </div>
            <div class="col-lg-4 text-center">
                <img class="rounded mb-2" src="./img/sign-language.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Easy Application Process</h2>
                <p>Applying for jobs shouldn't be a time-consuming and complicated process...</p>
            </div>
            <div class="col-lg-4 text-center">
                <img class="rounded mb-2" src="./img/shield.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Trust and Security</h2>
                <p>We understand that your trust and security are of utmost importance...</p>
            </div>
        </div>

        <div class="row featurette my-3 pt-5">
            <div class="col-md-7 d-flex align-items-center justify-content-center">
                <div>
                    <h2 class="featurette-heading">Our Story : <span class="text-muted">Driven by Passion and Purpose.</span></h2>
                    <p class="lead">Hirespot was born out of a passion for connecting talented individuals...</p>
                </div>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="https://img.freepik.com/free-vector/modern-resume-template_23-2147836674.jpg?size=626&ext=jpg&ga=GA1.2.1882095610.1686062107&semt=ais" alt="500x500" style="width: 500px; height: 500px;">
            </div>
        </div>

        <div class="row featurette my-3">
            <div class="col-md-7 order-md-2 d-flex align-items-center justify-content-center">
                <div>
                    <h2 class="featurette-heading">Our Vision : <span class="text-muted">Shaping the Future of Work.</span></h2>
                    <p class="lead">We envision a future where finding the perfect job is a seamless and empowering experience...</p>
                </div>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" src="https://img.freepik.com/free-vector/business-background-design_1200-89.jpg?size=626&ext=jpg&ga=GA1.1.1882095610.1686062107&semt=ais" alt="500x500" style="width: 500px; height: 500px;">
            </div>
        </div>

        <div class="row featurette my-3">
            <div class="col-md-7 d-flex align-items-center justify-content-center">
                <div>
                    <h2 class="featurette-heading">Our Values : <span class="text-muted">Transparency, Inclusivity, and Integrity</span></h2>
                    <p class="lead">We uphold the highest standards of transparency, inclusivity, and integrity...</p>
                </div>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="https://img.freepik.com/free-vector/choice-worker-concept_23-2148632123.jpg?size=626&ext=jpg&ga=GA1.1.1882095610.1686062107&semt=ais" alt="500x500" style="width: 500px; height: 500px;">
            </div>
        </div>
    </div>

    <footer class="bg-white p-4 text-muted">
        <div class="container">
            <hr />
            <div class="d-flex flex-column align-items-center justify-content-center mt-3">
                <p class="mb-0 fs-7">
                    <a href="#" class="text-decoration-none text-muted fs-7">Privacy</a> |
                    <a href="#" class="text-decoration-none text-muted fs-7">Terms</a> |
                    <a href="#" class="text-decoration-none text-muted fs-7">Advertising</a> |
                    <a href="#" class="text-decoration-none text-muted fs-7">Ad Choices</a> |
                    <a href="#" class="text-decoration-none text-muted fs-7">Cookies</a>
                </p>
                <div class="d-flex">
                    <a href="#"><img src="img/logo.png" width="58px" height="16px" alt="HireSpot" class="mb-2" /></a>
                    <p class="fs-7">&copy; 2023</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-d3vLpUe8OaB3CunZGEI7HX0d3hTzK73q2j5MGyz1jrXTUqkn3V6gd9Uaa5lf9a9h" crossorigin="anonymous"></script>
</body>

</html>