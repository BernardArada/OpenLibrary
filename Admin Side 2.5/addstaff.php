<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Staff Management</title>
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

<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    header("Location: loginADMIN.php");
    exit();
}
?>

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

    <div>
        <div class="sidebar">
            <div class="dismiss">
            <i class="fa fa-caret-left"></i></div>
            <a class="nav-link" href="#hit">Menu</a></li>
            <nav class="navbar navbar-dark navbar-expand">
            <div class="container-fluid">
                    <ul class="navbar-nav flex-column me-auto">
                    <li class="nav-items"><a class="nav-link" href="#hit"><?php echo $username;?></a></li>
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

    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="fas fa-users-cog me-2"></i>Staff Management</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" class="mb-4">
                            <div class="row align-items-end">
                                <div class="col-md-3">
                                    <label for="firstName"><i class="fas fa-user me-2"></i>First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="staff_first_name" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="lastName"><i class="fas fa-user me-2"></i>Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="staff_last_name" required>
                                </div>
                                <div class="col-md-1">
                                    <label for="staffId"><i class="fas fa-id-card me-2"></i>ID</label>
                                    <input type="text" class="form-control" id="staffId" name="staff_id" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="password"><i class="fas fa-lock me-2"></i>Password</label>
                                    <input type="password" class="form-control" id="password" name="staff_password" required>
                                </div>
                                <div class="col-md-2">
                                    <label><i class="fas fa-user-tag me-2"></i>Staff Type</label>
                                    <select class="form-select" name="staff_user_type" required>
                                        <option value="">Select Type</option>
                                        <option value="administrator">Administrator</option>
                                        <option value="Librarian">Librarian</option>
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
                                    <label for="deleteStaffId"><i class="fas fa-id-card me-2"></i>Staff ID</label>
                                    <input type="text" class="form-control" id="deleteStaffId" name="staff_id" required>
                                </div>
                                <div class="col-md-2">
                                    <label><i class="fas fa-user-tag me-2"></i>Staff Type</label>
                                    <select class="form-select" name="staff_user_type" required>
                                        <option value="">Select Type</option>
                                        <option value="administrator">Administrator</option>
                                        <option value="Librarian">Librarian</option>
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

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Ultimate-Sidebar-Menu-BS5.js"></script>
</body>
</html>
<?php
// Database connection
$host = 'localhost';
$database = 'db_nt3102';
$username = 'root';
$password = '';

$connection = new mysqli($host, $username, $password, $database);

// Log function
function logAction($action, $entityType, $entityID) {
    global $connection;
    $logSql = "INSERT INTO updatelog (action, entityType, entityID, timestamp) VALUES (?, ?, ?, NOW())";
    $stmt_log = $connection->prepare($logSql);
    
    if ($stmt_log) {
        $stmt_log->bind_param("ssi", $action, $entityType, $entityID);
        $stmt_log->execute();
        $stmt_log->close();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_button'])) {
        $staff_id = $_POST['staff_id'];
        $staff_first_name = $_POST['staff_first_name'];
        $staff_last_name = $_POST['staff_last_name'];
        $staff_password = $_POST['staff_password'];
        $staff_user_type = $_POST['staff_user_type'];

        // Check if employee exists in tbemployee
        $check_emp_query = "SELECT * FROM tbemployee WHERE empid = ? AND firstname = ? AND lastname = ?";
        $stmt_emp = $connection->prepare($check_emp_query);
        
        if ($stmt_emp) {
            $stmt_emp->bind_param("iss", $staff_id, $staff_first_name, $staff_last_name);
            $stmt_emp->execute();
            $result_emp = $stmt_emp->get_result();

            if ($result_emp->num_rows > 0) {
                // Check if already exists in administrator or librarian
                $check_existing = "SELECT COUNT(*) as count FROM librarian WHERE empid = ? 
                                 UNION 
                                 SELECT COUNT(*) as count FROM administrator WHERE empid = ?";
                $stmt_check = $connection->prepare($check_existing);
                $stmt_check->bind_param("ii", $staff_id, $staff_id);
                $stmt_check->execute();
                $result_check = $stmt_check->get_result();
                $row_check = $result_check->fetch_assoc();

                if ($row_check['count'] > 0) {
                    echo "<script>alert('This Employee is already added as either librarian or administrator')</script>";
                } else {
                    // Add new staff
                    if ($staff_user_type === 'administrator') {
                        $insert_query = "INSERT INTO administrator (empid, administratorPassword) VALUES (?, ?)";
                    } else {
                        $insert_query = "INSERT INTO librarian (empid, librarianPassword) VALUES (?, ?)";
                    }

                    $stmt_insert = $connection->prepare($insert_query);
                    if ($stmt_insert) {
                        $stmt_insert->bind_param("is", $staff_id, $staff_password);
                        if ($stmt_insert->execute()) {
                            logAction('Add', $staff_user_type, $staff_id);
                            echo "<script>
                                alert('Staff added successfully');
                                window.location.href = 'addstaff.php';
                            </script>";
                        } else {
                            echo "<script>alert('Failed to add staff')</script>";
                        }
                        $stmt_insert->close();
                    }
                }
                $stmt_check->close();
            } else {
                echo "<script>alert('Employee not found in database')</script>";
            }
            $stmt_emp->close();
        }
    } elseif (isset($_POST['delete_button'])) {
        $staff_id = $_POST['staff_id'];
        $staff_user_type = $_POST['staff_user_type'];

        if ($staff_user_type === 'administrator') {
            $delete_query = "DELETE FROM administrator WHERE empid = ?";
        } else {
            $delete_query = "DELETE FROM librarian WHERE empid = ?";
        }

        $stmt_delete = $connection->prepare($delete_query);
        if ($stmt_delete) {
            $stmt_delete->bind_param("i", $staff_id);
            if ($stmt_delete->execute()) {
                logAction('Delete', $staff_user_type, $staff_id);
                echo "<script>
                    alert('Staff deleted successfully');
                    window.location.href = 'addstaff.php';
                </script>";
            } else {
                echo "<script>alert('Failed to delete staff')</script>";
            }
            $stmt_delete->close();
        }
    }
}
?>

