<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//cek jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) {
  header("location:admin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];

//menggunakan fungsi enkripsi md5 supaya sama dengan password yang tersimpan di database
$password = md5($_POST['password']);

//prepared statement
$stmt = $conn->prepare("SELECT username FROM user WHERE username=? AND password=?");

//parameter binding
$stmt->bind_param("ss", $username, $password); //username dan password string

//database executes the statement
$stmt->execute();

//menampung hasil eksekusi
$hasil = $stmt->get_result();

//mengambil baris dari hasil sebagai array asosisatif
$row = $hasil->fetch_array(MYSQLI_ASSOC);

//cek apakah ada baris hasil data user yang cocok
if (!empty($row)) {
  //jika ada, simpan variabel username pada session
  $_SESSION['username'] = $row['username'];

  //mengalihkan ke halaman admin
  header("location:admin.php");
} else {
  //jika tidak ada (gagal), alihkan kembali ke halaman login
  header("location:login.php");
}

//menutup koneksi database
$stmt->close();
$conn->close();

} else {
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | My Daily Journal</title>
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
  </head>
  <body class="bg-danger-subtle">
  <div class="container mt-5 pt-5">
  <div class="row">
    <div class="col-12 col-sm-8 col-md-6 m-auto">
      <div class="card border-0 shadow rounded-5">
        <div class="card-body">
          <div class="text-center mb-3">
            <i class="bi bi-person-circle h1 display-4"></i>
            <p>Welcome to My Daily Journal</p>
            <hr />
          </div>
          <form action="" method="post">
            <input
              type="text"
              name="username"
              class="form-control my-4 py-2 rounded-4"
              placeholder="Username"
            />
            <input
              type="password"
              name="password"
              class="form-control my-4 py-2 rounded-4"
              placeholder="Password"
            />
            <div class="text-center my-3 d-grid">
              <button class="btn btn-danger rounded-4">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    
  </body>
</html>

<?php
}
?>