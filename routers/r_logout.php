<?php

            session_start();
            //menghapus session
            session_destroy();
            //fungsi untuk kembali ke halaman index.php
            header("location: ../index.php");

?>