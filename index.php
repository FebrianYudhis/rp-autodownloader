<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Downloader</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/image/icon/app.ico" type="image/x-icon">
</head>

<body>
    <div class="container mt-4">

        <!-- Menambahkan Alert  -->
        <?php
        session_start();
        if (isset($_SESSION['pesan'])) : ?>

            <div class="alert alert-success"><?= $_SESSION['pesan']; ?></div>

        <?php
            unset($_SESSION['pesan']);
        endif; ?>
        <!-- ---- -->

        <div class="card">
            <div class="card-header">
                <h1 class="text-center font-weight-bold">Aplikasi Auto Downloader</h1>
            </div>
            <div class="card-body">
                <form action="download.php" method="POST" id="download">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lokasi">Lokasi Tempat Menyimpan</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" value="Download/" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="folder">Nama Folder</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="folder" placeholder="Masukkan Nama Folder" name="folder" REQUIRED>
                                    </div>
                                    <div class="col-md-3">
                                        <p class="btn btn-info w-50" id="today">Hari Ini</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100" id="submit">Download</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        let tanggal = new Date();
        let bulan = tanggal.getMonth() + 1;
        let hari = tanggal.getDate();
        let tahun = tanggal.getFullYear();

        today = hari + "-" + bulan + "-" + tahun;

        $("#today").click(function() {
            $("#folder").attr("value", today);
        });

        $("#download").submit(function() {
            $("#submit").removeClass("btn-primary")
            $("#submit").addClass("btn-secondary")
            $("#submit").attr('disabled', true)
            $("#submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span> Mengunduh..")
        });
    </script>
</body>

</html>