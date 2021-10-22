<?php

require "scripts/functions.php";

logout();



session_destroy();


header("Location: index.php");






?>