    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>

    <?php
    if (isset($_GET['error'])) {

        $error = $_GET['error'];
        $error = base64_decode($error);
        echo "<script> errorMessage('" . $error . "'); </script>";
    } else {
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            $msg = base64_decode($msg);
            echo "<script> successMessage('" . $msg . "'); </script>";
        }
    }
    ?>

    </html>