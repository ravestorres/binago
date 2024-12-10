<?php
function profilepath($path)
{
    if ($path === null) {
        echo '../../img/userDefault.jpg';
    } else {
        echo $path;
    }
}

function formatDateTime($datetimeStr)
{
    $datetime = new DateTime($datetimeStr);
    return $datetime->format("M jS g.i A");
}

function statusdisplay($status)
{
    switch ($status) {
        case 'Waiting':
            echo '<div class="alert alert-primary m-0 p-1 ms-1 text-center" role="alert"> Waiting </div>';
            break;
        case 'Reject':
            echo '<div class="alert alert-danger m-0 p-1 ms-1 text-center" role="alert"> Rejected </div>';
            break;
        case 'Accept':
            echo '<div class="alert alert-success m-0 p-1 ms-1 text-center" role="alert"> Selected </div>';
            break;
    }
}

function calculateAge($dateOfBirth)
{
    $dob = new DateTime($dateOfBirth);
    $today = new DateTime('today');
    return $dob->diff($today)->y;
}
?>