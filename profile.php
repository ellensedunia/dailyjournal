<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}

include "koneksi.php";

//ambil data dari session
$username = $_SESSION['username'];
//$role = $_SESSION['role'];
$stmt = $conn->prepare("SELECT foto FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $_SESSION['foto'] = $row['foto']; // Simpan data foto ke session
} else {
    $_SESSION['foto'] = 'pp.jpg'; // Default jika data foto tidak ditemukan
}
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$username = $_SESSION['username'];

    // Proses ganti password
    if (!empty($_POST['new_password'])) {
        $new_password = md5($_POST['new_password']);
        $stmt = $conn->prepare("UPDATE user SET password=? WHERE username=?");
        $stmt->bind_param("ss", $new_password, $username);
        if ($stmt->execute()) {
            echo "<script>alert('Password telah diganti'); window.location.href = 'profile.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat mengganti password'); window.location.href = 'profile.php';</script>";
        }
        $stmt->close();
    }

    // Proses ganti foto profil
    if (!empty($_FILES['foto']['name'])) {
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);
        $upload_ok = 1;

        // Validasi tipe file
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($image_file_type, $allowed_types)) {
            echo "<script>alert('Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.'); window.location.href = 'profile.php';</script>";
            $upload_ok = 0;
        }

        // Upload file jika valid
        if ($upload_ok && move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            //update foto di database
            $stmt = $conn->prepare("UPDATE user SET foto = ? WHERE username = ?");
            //$role = $_SESSION['role'] ?? 'user';
            $stmt->bind_param("ss", $target_file, $username);
            if ($stmt->execute()) {
                $_SESSION['foto'] = $target_file; // Perbarui foto di session
                echo "<script>alert('Foto profil berhasil diubah'); window.location.href = 'profile.php';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan saat mengubah foto profil'); window.location.href = 'profile.php';</script>";;
            }
            $stmt->close();
        } else {
            echo "<script>alert('Gagal mengunggah file'); window.location.href = 'profile.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User</title>
    <link rel="icon" href="img/logo.png" />
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
    /> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <style>  
        html {
            position: relative;
            min-height: 100%;
        }
        body {
            margin-bottom: 100px; /* Margin bottom by footer height */
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 120px; /* Set the fixed height of the footer here */ 
        }
    </style>
</head>
<body>
    <!-- nav begin -->
    <nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top bg-danger-subtle">
    <div class="container">
        <a class="navbar-brand" target="_blank" href=".">My Daily Journal</a>
        <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
            <li class="nav-item">
                <a class="nav-link" href="admin.php?page=dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.php?page=article">Article</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="admin.php?page=gallery">Gallery</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link fw-bold" href="index.php">Homepage</a>
            </li> 
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-danger fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['username']?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="profile.php">Profile <?php echo $_SESSION['username']; ?> </a></li> 
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li> 
                </ul>
            </li> 
        </ul>
        </div>
    </div>
    </nav>
    <!-- nav end -->
     <!--content begin -->
    <section id="content" class="p-5">
    <div class="container">
    <h4 class="lead display-6 pb-2 border-bottom border-danger-subtle">Profile</h4>
        <form action="profile.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="new_password" class="form-label">Ganti Password</label>
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Tuliskan Password Baru Jika Ingin Mengganti Password Saja">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Ganti Foto Profil</label>
            <input type="file" class="form-control" id="foto" name="foto">
        </div>
        <div class="mb-3">
            <label class="form-label">Foto Profil Saat Ini</label><br>
            <img src="<?= isset($_SESSION['foto']) ? $_SESSION['foto'] : 'pp.jpg' ?>" alt="Foto Profil" width="100">

        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
    </div>
</section>
<!-- content end -->

<!--footer begin-->
<footer class="text-center p-5 bg-danger-subtle">
        <div>
            <a href="https://www.instagram.com/f1"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
            <a href="https://x.com/F1"><i class="bi bi-twitter-x h2 p-2 text-dark"></i></a>
            <a href="https://www.youtube.com/user/Formula1"><i class="bi bi-youtube h2 p-2 text-dark"></i></a>
            <a href="https://www.facebook.com/Formula1"><i class="bi bi-facebook h2 p-2 text-dark"></i></a>
        </div>
        <div>Copyright - helena sedunia &copy; 2024</div>

    </footer>
    <!--footer end-->

    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"
    ></script>
</body>
</html> 
    