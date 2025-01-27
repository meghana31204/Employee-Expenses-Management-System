<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Dashboard</title>
    <link rel="stylesheet" href="supervisor_dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<script src="supervisor_dashboard.js"> </script>

</head>

<body>
<section>
    <nav class="navbar">
        <div class="logo">E<sup>2</sup>MS</div>
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Profile Icon">
    </nav>
	<section>
    <div class="dashboard-title">Dashboard</div>

    <div class="wel_sup_box">
        <div class="wel_sup">
            <div class="welcome-text">
                <h1 class="welcome" style="color:black; text-align:center"><b>Welcome Supervisor!</b></h1>
                <h4 class="welcome">Manage and approve employee vouchers efficiently.</h4>
            </div>
        </div>
    </div>
	
    <div class="container mt-4">
        <div class="card">
            <a href="Supervisor.php" class="btn stretched-link"></a>
            <img class="card-img-top" src="https://cdn.iconscout.com/icon/free/png-256/free-pending-icon-download-in-svg-png-gif-file-formats--wait-time-revise-unfinish-essential-web-5-pack-miscellaneous-icons-861794.png?f=webp&w=256" alt="Pending Vouchers">
            <div class="card-body">
                <h4 class="card-title">Pending Vouchers</h4>
                <p class="card-text">You can approve or reject the pending vouchers.</p>
            </div>
        </div>
        <div class="card">
            <a href="Supervisor.php" class="btn stretched-link"></a>
            <img class="card-img-top" src="https://cdn-icons-png.freepik.com/512/7595/7595571.png" alt="Approved Vouchers">
            <div class="card-body">
                <h4 class="card-title">Approved Vouchers</h4>
                <p class="card-text">View the approved vouchers.</p>
            </div>
        </div>
        <div class="card">
            <a href="Supervisor.php" class="btn stretched-link"></a>
            <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/256/1024/1024824.png" alt="Vouchers History">
            <div class="card-body">
                <h4 class="card-title">Vouchers History</h4>
                <p class="card-text">Past vouchers.</p>
            </div>
        </div>
    </div>
	</section>
    <div class="announcements-container">
        <h2 class="announcements-title">Important Announcements</h2>
        <div class="announcement-card">
            <h4>New Feature Update</h4>
            <p>A new filter feature is added, allowing users to easily select the date based on voucher requirements.</p>
            <p class="announcement-date">Date: 28-09-2024</p>
        </div>
        <div class="announcement-card">
            <h4>Budget Approval</h4>
            <p>The budget for the next quarter has been approved. Please check your emails for details.</p>
            <p class="announcement-date">Date: 28-09-2024</p>
        </div>
        <div class="announcement-card">
            <h4>Holiday Notice</h4>
            <p>On 2nd October, the office remains closed on the occasion of Gandhi Jayanti.</p>
            <p class="announcement-date">Date: 27-09-2024</p>
        </div>
    </div>
</body>

</html>
