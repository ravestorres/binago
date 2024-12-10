<?php
require_once '../server/DBConnector.php';
require_once '../server/company.php';
require_once '../server/jobseeker.php';
require_once 'functions.php';

use server\DbConnector;

$dbcon = new DbConnector();
session_start();

// Check if the jobseeker session variables are set 
if (!isset($_SESSION["userID"]) || !isset($_SESSION["username"]) || !isset($_SESSION["email"])) {
    header("Location: ../Login.php");
    exit;
}

$id = $_SESSION["userID"];
$username = $_SESSION["username"];
$email = $_SESSION["email"];
$searchjobCategory = isset($_POST['searchjobCategory']) ? $_POST['searchjobCategory'] : null;

try {
    $con = $dbcon->getConnection();
    $query = "SELECT * FROM jobseeker WHERE userID = ?";
    $pstmt = $con->prepare($query);
    $pstmt->bindValue(1, $id);
    $pstmt->execute();
    $rs = $pstmt->fetchAll(PDO::FETCH_OBJ);

    if (empty($rs)) {
        exit;
    }

    foreach ($rs as $row) {
        $userID = $row->userID;
        $username = $row->username;
        $firstname = $row->firstname;
        $lastname = $row->lastname;
        $email = $row->email;
        $phoneNo = $row->phoneNo;
        $dateofbirth = $row->dateofbirth;
        $address = $row->address;
        $education = $row->education;
        $description = $row->description;
        $about = $row->about;
        $password = $row->password;
        $profilePic = $row->profilePic;
        $gender = $row->gender;
    }

    include 'headerfeed.php';
?>

<!-- Main content -->
<div class="container-fluid">
    <div class="row">
        <!-- Left side -->
        <div class="col-12 col-lg-3">
            <div class="d-none scrallbar d-xxl-block h-100 fixed-top ms-4 mt-4" style="max-width: 360px;width: 100%;z-index: 4;padding-top: 56px;">
                <div class="bg-white rounded mx-4 px-4">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <div class="mt-4 p-3" type="button">
                            <a href="./userProfile.php" class="" type="button"> 
                                <img src="<?php echo profilepath($profilePic); ?>" alt="avatar" class="rounded-circle me-2" style="width: 200px; height: 200px; object-fit: cover" data-bs-toggle="tooltip" data-bs-title="See your profile" data-bs-placement="bottom" />
                            </a>
                        </div>
                        <h3 class="text-center m-0"><?php echo htmlspecialchars($username); ?></h3>
                        <p class="text-muted text-center m-0"><?php echo htmlspecialchars($description); ?></p>
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fa fa-envelope fs-7 me-1 mb-3"></i>
                            <p><?php echo htmlspecialchars($email); ?></p>
                        </div>
                    </div>
                    <a href="./userProfile.php">
                        <button type="button" class="btn btn-outline-primary mb-3 w-100">Preview Profile</button>
                    </a>
                    <div class="px-2">
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold m-0">Age</p>
                            <p class="ms-3 m-0"><?php echo calculateAge($dateofbirth); ?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold m-0">Gender</p>
                            <p class="ms-3 m-0"><?php echo htmlspecialchars($gender); ?></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="fw-bold m-0">Phone</p>
                            <p class="ms-3 m-0"><?php echo htmlspecialchars($phoneNo); ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <h4>Education</h4>
                        <p class="fw-bold m-0"><?php echo htmlspecialchars($education); ?></p>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <h4>About</h4>
                        <p class="m-0"><?php echo htmlspecialchars($about); ?></p>
                    </div>
                    <hr>
                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between mb-3">
                            <h4>Skills</h4>
                        </div>
                        <?php
                        $conskill = $dbcon->getConnection();
                        $queryskill = "SELECT * FROM skill WHERE userID = ?;";
                        $pstmtskill = $conskill->prepare($queryskill);
                        $pstmtskill->bindValue(1, $id);
                        $pstmtskill->execute();
                        $skills = $pstmtskill->fetchAll(PDO::FETCH_OBJ);
                        foreach ($skills as $skill) {
                            $skillname = $skill->skillName;
                            $skillrange = $skill->skillLevel;
                        ?>
                            <div class="m-0">
                                <div class="d-flex justify-content-between">
                                    <p class="m-0"><?php echo htmlspecialchars($skillname); ?></p>
                                </div>
                                <div class="progress" role="progressbar" aria-label="Example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                                    <div class="progress-bar" style="width: <?php echo htmlspecialchars($skillrange . "%"); ?>"></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main timeline -->
        <div class="col-12 col-lg-6 pb-5">
            <div class="d-flex justify-content-center flex-column w-100 mx-auto mt-3" style="padding-top: 56px; max-width: 680px;">
                <?php
                if ($searchjobCategory) {
                    echo "<h3 class='mt-2'>" . htmlspecialchars($searchjobCategory) . '</h3>';
                }
                ?>
                <?php
                try {
                    $conpost = $dbcon->getConnection();
                    if ($searchjobCategory) {
                        $querypost = "SELECT job.*, company.companyID, company.companyname, company.email, company.address, company.description, company.profilePic, company.coverPic, company.employee FROM job JOIN company ON job.companyID = company.companyID WHERE NOT EXISTS (SELECT 1 FROM application WHERE application.jobID = job.jobID AND application.userID = ?) AND job.jobcateogory = ? ORDER BY job.date DESC";
                        $pstmtpost = $conpost->prepare($querypost);
                        $pstmtpost->bindValue(1, $id);
                        $pstmtpost->bindValue(2, $searchjobCategory);
                    } else {
                        $querypost = "SELECT job.*, company.companyID, company.companyname, company.email, company.address, company.description, company.profilePic, company.coverPic, company.employee FROM job JOIN company ON job.companyID = company.companyID WHERE NOT EXISTS (SELECT 1 FROM application WHERE application.jobID = job.jobID AND application.userID = ?) ORDER BY job.date DESC";
                        $pstmtpost = $conpost->prepare($querypost);
                        $pstmtpost->bindValue(1, $id);
                    }

                    $pstmtpost->execute();
                    $posts = $pstmtpost->fetchAll(PDO::FETCH_OBJ);

                    foreach ($posts as $post) {
                        $jobID = $post->jobID;
                        $jobTitle = $post->jobTitle;
                        $jobcateogory = $post->jobcateogory;
                        $companyID = $post->companyID;
                        $date = $post->date;
                        $content = $post->content;
                        $postfilepath = $post->filePath;
                        $companyname = $post->companyname;
                        $comemail = $post->email;
                        $address = $post->address;
                        $description = $post->description;
                        $companyprofilePic = $post->profilePic;
                        $companycoverPic = $post->coverPic;
                        $employee = $post->employee;
                        ?>
                        <div class="bg-white shadow rounded mt-3 p-3">
                            <div class="d-flex justify-content-between p-2">
                                <div class="d-flex" data-bs-toggle="tooltip" data-bs-title="Click here to see the <?php echo htmlspecialchars($companyname); ?>'s profile">
                                    <img src="<?php echo profilepath($companyprofilePic); ?>" alt="avatar" class="rounded-circle me-2" style="width: 50px; height: 50px; object-fit: cover" />
                                    <h6 class="text-dark mb-0"><?php echo htmlspecialchars($companyname); ?></h6>
                                </div>
                                <p class="text-muted ms-5"><?php echo date('F d, Y', strtotime($date)); ?></p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <h5><?php echo htmlspecialchars($jobTitle); ?></h5>
                                <form action="apply.php" method="POST">
                                    <input type="hidden" name="jobID" value="<?php echo htmlspecialchars($jobID); ?>" />
                                    <input type="hidden" name="companyID" value="<?php echo htmlspecialchars($companyID); ?>" />
                                    <button type="submit" class="btn btn-outline-primary">Apply</button>
                                </form>
                            </div>
                            <hr class="mt-1">
                            <p class="text-muted mb-0"><?php echo htmlspecialchars($jobcateogory); ?></p>
                            <p class="mt-1"><?php echo htmlspecialchars($content); ?></p>
                        </div>
                    <?php } ?>
                <?php } catch (PDOException $e) { ?>
                    <div class="alert alert-danger" role="alert">
                        Error: <?php echo $e->getMessage(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- Right side (recommended job categories) -->
        <div class="col-12 col-lg-3">
            <div class="sticky-top">
                <h4>Recommended Categories</h4>
                <ul>
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Healthcare</a></li>
                    <li><a href="#">Education</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Marketing</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
    include 'footerfeed.php';
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
