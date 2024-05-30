<?php
include('../admin/include/config.php');
include('../admin/include/header.php');
?>
<link rel="stylesheet" href="./assets/styles.css">
<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f0;
    color: #333;
}

/* Container styling */
.container-fluid {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

h1 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #333;
}

.breadcrumb {
    background-color: transparent;
    padding: 0;
    margin-bottom: 20px;
}

.breadcrumb-item.active {
    color: #666;
}

/* Row and Column styling */
.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.col-xl-3, .col-md-6 {
    flex: 1;
    min-width: 250px;
    max-width: 300px;
    display: flex;
    justify-content: center;
}

.card {
    width: 100%;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
    text-align: center;
}

.card-body {
    padding: 20px;
    font-size: 1.2rem;
    color: #333;
    flex-grow: 1;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-footer {
    padding: 10px 20px;
    background-color: #4e73df;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.card-footer a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.card-footer a:hover {
    color: #ddd;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Colored Borders */
.card-border-free-courses {
    border-top: 5px solid #4caf50;
}

.card-border-news {
    border-top: 5px solid #2196f3;
}

.card-border-messages {
    border-top: 5px solid #ff9800;
}

.card-border-users {
    border-top: 5px solid #f44336;
}

.card-border-advertisement {
    border-top: 5px solid #9c27b0;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .container-fluid {
        padding: 10px;
    }

    h1 {
        font-size: 1.5rem;
    }

    .breadcrumb {
        margin-bottom: 10px;
    }

    .col-xl-3, .col-md-6 {
        min-width: 100%;
        flex-basis: 100%;
    }

    .card-body {
        font-size: 1rem;
    }

    .card-footer {
        padding: 5px 10px;
    }
}


</style>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard:</h1>
   
    <div class="row">
        <div class="col-xl-3 col-md-6">
        <?php
        $query = "SELECT COUNT(*) AS total_courses FROM courses";
        $result = mysqli_query($con, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $total_courses = $row['total_courses'];
    ?>
                                <div class="card card-border-free-courses">
                                    <div class="card-body">Free Courses: <?php echo $total_courses; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="add-courses.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                                <?php
        } else {
        }
    ?>
        </div>
        <div class="col-xl-3 col-md-6">  <?php
        $query = "SELECT COUNT(*) AS total_news FROM news";
        $result = mysqli_query($con, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $total_news = $row['total_news'];
    ?>
                                <div class="card card-border-news">
                                    <div class="card-body">News: <?php echo $total_news; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="Addnews.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                                <?php
        } else {
        }
    ?>
        </div>
        <div class="col-xl-3 col-md-6">
        <?php
        $query = "SELECT COUNT(*) AS total_msg FROM contact";
        $result = mysqli_query($con, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $total_msg = $row['total_msg'];
    ?>
                                <div class="card card-border-messages">
                                    <div class="card-body">Messages: <?php echo $total_msg; ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="ad-contact.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                                <?php
        } else {
        }
    ?>
        </div>
        <div class="col-xl-3 col-md-6">
    <?php
        $query = "SELECT COUNT(*) AS total_accounts FROM user";
        $result = mysqli_query($con, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $total_accounts = $row['total_accounts'];
    ?>
            <div class="card card-border-users">
                <div class="card-body">Users: <?php echo $total_accounts; ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="ad-user.php">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
    <?php
        } else {
        }
    ?>
        </div>
        <div class="col-xl-3 col-md-6">
    <?php
        $query = "SELECT COUNT(*) AS total_advr FROM advertisement";
        $result = mysqli_query($con, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $total_advr = $row['total_advr'];
    ?>
            <div class="card card-border-advertisement">
                <div class="card-body">Advertisements: <?php echo $total_advr; ?></div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
    <?php
        } else {
        }
    ?>
        </div>
</div>
<?php
include('../admin/include/footer.php');
include('../admin/include/scripts.php');
?>

