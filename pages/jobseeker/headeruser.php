<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HireSpot</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="../../img/logo only.png" type="image/x-icon">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- main css -->
    <link rel="stylesheet" href="../../css/maincss.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="../../index.php"><img src="../../img/logo.png" width="137px" height="43px"
                    alt="HireSpot" /></a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <!-- search -->
                        <form class="d-flex" role="search" action="./feed.php" method="post">
                            <select class="form-control me-2 border-0" id="inputGroupSelect01" name="searchjobCategory"
                                style="border-radius: 50px;background-color: #F4F4F4;max-width: 20rem;">
                                <option disabled selected class="text-muted">
                                    <?php
                                    if (isset($_POST['searchjobCategory']) && !empty($_POST['searchjobCategory'])) {
                                        echo $searchjobCategory;
                                    } else {
                                        echo 'Search';
                                    }
                                    ?>
                                </option>
                                <option value="Information Technology (IT)">Information Technology (IT)</option>
                                <option value="Healthcare">Healthcare</option>
                                <option value="Finance">Finance</option>
                                <option value="Education">Education</option>
                                <option value="Marketing and Sales">Marketing and Sales</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                                <option value="Creative Arts">Creative Arts</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Construction and Trades">Construction and Trades</option>
                            </select>
                            <button class="btn btn-outline-primary" type="submit" style="border-radius: 50px;"><i
                                    class="fa fa-magnifying-glass"></i></button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_POST['searchjobCategory']) && !empty($_POST['searchjobCategory'])) {
                            echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="./feed.php">ALL</a></li>';
                        }
                        ?>
                    </li>
                </ul>
            </div>

            <div class="d-flex">
                <!-- notification -->
                <?php
                try {
                    $connotification = $dbcon->getConnection();
                    $querynotification = "SELECT application.applicationID, application.status, application.date, job.jobTitle, job.jobcateogory, job.content, company.companyname, company.profilePic FROM application JOIN job ON application.jobID = job.jobID JOIN company ON job.companyID = company.companyID WHERE application.userID = ? AND application.status != 'Waiting' ORDER BY application.date DESC;";
                    $pstmtnotification = $connotification->prepare($querynotification);
                    $pstmtnotification->bindValue(1, $id);
                    $pstmtnotification->execute();
                    $notifications = $pstmtnotification->fetchAll(PDO::FETCH_OBJ);
                    $count = $pstmtnotification->rowCount();
                ?>
                    <div class="dropdown">
                        <a class="navbar-brand position-relative" href="#" id="notify"
                            style="width: 38px; height: 38px; object-fit: cover" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fa-solid fa-bell" data-bs-toggle="tooltip" data-bs-title="See your Notification" data-bs-placement="bottom"></i>
                            <span class="position-absolute fs-7 p-1 translate-middle badge rounded-pill bg-danger">
                                <?php echo $count; ?>
                            </span>
                        </a>

                        <!-- notification dropdown -->
                        <ul class="dropdown-menu border-0 shadow p-2 px-0" aria-labelledby="notify"
                            style="min-width: 18rem; max-height: 600px; overflow-y: auto;">
                            <!-- header -->
                            <li class="p-1">
                                <h4 class="ms-2">Notification</h4>
                            </li>
                            <?php
                            foreach ($notifications as $notification) {
                                $notyapplicationID = $notification->applicationID;
                                $notystatus = $notification->status;
                                $notydate = $notification->date;
                                $notyjobTitle = $notification->jobTitle;
                                $notyjobcateogory = $notification->jobcateogory;
                                $notycontent = $notification->content;
                                $notycompanyname = $notification->companyname;
                                $notyprofilePic = $notification->profilePic;
                            ?>
                                <li class="my-1 p-2">
                                    <div class="d-flex align-items-center">
                                        <!-- avatar -->
                                        <div class="p-2">
                                            <img src="<?php profilepath($notyprofilePic); ?>" alt="company"
                                                 class="rounded-circle" style="width: 58px; height: 58px; object-fit: cover">
                                        </div>
                                        <!-- message -->
                                        <div>
                                            <div class="d-flex">
                                                <p class="fw-bold me-2 m-0"><?php echo $notyjobTitle; ?></p>|
                                                <span class="text-muted fs-7 mt-1 ms-2 m-0"><?php echo $notyjobcateogory; ?></span>
                                            </div>
                                            <div class="d-flex">
                                                <div>
                                                    <p class="fs-7 m-0"><?php echo $notycompanyname; ?></p>
                                                    <span class="fs-7 text-primary"><?php echo formatDateTime($notydate); ?></span>
                                                </div>
                                                <div class="ms-2">
                                                    <?php echo statusdisplay($notystatus); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </li>
                            <?php
                            }
                            if (empty($notifications)) {
                                echo "<p class='text-muted p-2 text-center' role='alert'>No Notifications available yet!</p>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- profile -->
            <div class="dropdown">
                <div class="d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?php profilepath($profilePic); ?>" alt="avatar" class="rounded-circle me-2"
                         style="width: 38px; height: 38px; object-fit: cover" data-bs-toggle="tooltip" data-bs-title="See your profile" data-bs-placement="bottom" />
                    <span class="fw-bold fs-6"><?php echo $username; ?></span>
                </div>
                <ul class="dropdown-menu border-0 shadow">
                    <!-- avatar -->
                    <li><a class="dropdown-item" href="./feed.php">
                            <div class="d-flex align-items-center">
                                <img src="<?php profilepath($profilePic); ?>" alt="avatar" class="rounded-circle me-2"
                                     style="width: 48px; height: 48px; object-fit: cover" />
                                <div class="d-flex flex-column mt-3 p-0">
                                    <span class="fw-bold fs-6"><?php echo $username; ?></span>
                                    <p class="text-muted fs-7">See your profile</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!-- logout -->
                    <li><a class="dropdown-item" href="../server/logout.php">
                            <div class="d-flex align-items-center me-2">
                                <i class="fa fa-sign-out justify-content-center fs-5"></i>
                                <p class="m-0 ms-2">Log out</p>
                            </div>
                        </a></li>
                </ul>
            </div>
        </div>
    </nav>
