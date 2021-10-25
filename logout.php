<?php

require "scripts/functions.php";

logout();

echo mysqli_error($link);


session_destroy();


header("Location: index.php");






?>