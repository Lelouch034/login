<?php

   session_start();
   session_unset();
   session_destroy();
   header("Location: /projet_cinema/index.php");
        exit();