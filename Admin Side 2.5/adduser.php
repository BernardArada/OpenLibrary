<?php
// Move all PHP processing code here at the end
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    header("Location: loginADMIN.php");
    exit();
}

// Database connection and rest of the PHP code...
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>User Management</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+SC&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="assets/css/Ultimate-Sidebar-Menu-BS5.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f6fa;
            color: #2d3436;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,.05);
            background: #fff;
            margin-top: 2rem;
        }

        .card-header {
            background: linear-gradient(45deg, #dc3545, #ff4757);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 1rem 1.5rem;
        }

        .card-header h4 {
            font-weight: 600;
            margin: 0;
            font-size: 1.2rem;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #e1e1e1;
            padding: 0.6rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }

        label {
            font-weight: 500;
            color: #2d3436;
            margin-bottom: 0.5rem;
        }

        .btn {
            border-radius: 8px;
            padding: 0.6rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-success {
            background: #00b894;
            border: none;
        }

        .btn-success:hover {
            background: #00a187;
            transform: translateY(-1px);
        }

        .btn-danger {
            background: #ff4757;
            border: none;
        }

        .btn-danger:hover {
            background: #ff3545;
            transform: translateY(-1px);
        }

        .form-divider {
            height: 1px;
            background: #e1e1e1;
            margin: 2rem 0;
        }

        .nav-items .nav-link {
            font-size: 15px;
        }
    </style>
</head>

<body class="text-start">
    <a class="btn btn-primary btn-customized open-menu" role="button"><i class="fa fa-navicon"></i>&nbsp;Menu</a>
    <header></header>
    <nav class="navbar navbar-light navbar-expand-md bg-danger">
        <div class="container-fluid">
    
            <img src="assets/img/Batangas_State_Logo.png" width="95" height="70">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#" style="line-height: 27px;">BatState-U<br>Library</a></li>
                <li class="nav-item"><a class="nav-link" href="#"></a></li>
                <li class="nav-item"><a class="nav-link" href="#"></a></li>
            </ul>
            <div class="collapse navbar-collapse" id="navcol-1"></div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="fas fa-users me-2"></i>User Management</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" class="mb-4">
                            <div class="row align-items-end">
                                <div class="col-md-3">
                                    <label for="firstName"><i class="fas fa-user me-2"></i>First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="lastName"><i class="fas fa-user me-2"></i>Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="userId"><i class="fas fa-id-card me-2"></i>User ID</label>
                                    <input type="text" class="form-control" id="userId" name="student_id" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                                    <input type="password" class="form-control" id="password" name="user_password" required>
                                </div>
                                <div class="col-md-1">
                                    <label><i class="fas fa-user-tag me-2"></i>Type</label>
                                    <select class="form-select" name="user_type" required>
                                        <option value="">Select</option>
                                        <option value="faculty">Faculty</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" name="add_button" class="btn btn-success w-100">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="form-divider"></div>

                        <form method="post" action="">
                            <div class="row align-items-end">
                                <div class="col-md-2">
                                    <label for="deleteUserId"><i class="fas fa-id-card me-2"></i>User ID</label>
                                    <input type="text" class="form-control" id="deleteUserId" name="student_id" required>
                                </div>
                                <div class="col-md-2">
                                    <label><i class="fas fa-user-tag me-2"></i>User Type</label>
                                    <select class="form-select" name="user_type" required>
                                        <option value="">Select</option>
                                        <option value="faculty">Faculty</option>
                                        <option value="student">Student</option>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" name="delete_button" class="btn btn-danger w-100">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="sidebar">
            <div class="dismiss"><i class="fa fa-caret-left"></i></div>
            <div class="BatState-U"><a class="navbar-brand" href="loginADMIN.php">Menu</a></div>
            <nav class="navbar navbar-dark navbar-expand">
            <div class="container-fluid">
            <ul class="navbar-nav flex-column me-auto">
            <li class="nav-items"><a class="nav-link" href="#hit"><?php echo $username; ?></a></li>
            <li class="nav-item"><a class="nav-link" href="main.php">Search Book</a></li>
                    <li class="nav-item"><a class="nav-link" href="logs.php">Logs</a></li>
                    <li class="nav-item"><a class="nav-link" href="mainaddbook.php">Add Books</a>
                    <li class="nav-item"><a class="nav-link" href="addstaff.php">Add Staff</a></li>
                    <li class="nav-item"><a class="nav-link" href="adduser.php">Add User</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php">Logout</a>
                </ul>
                </div>
            </nav>
        </div>
        <div class="overlay"></div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Ultimate-Sidebar-Menu-BS5.js"></script>
</body>
</html>