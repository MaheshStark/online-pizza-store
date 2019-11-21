<?php

require_once('config.php');

unset($_SESSION['username']);
redirect('login.php');