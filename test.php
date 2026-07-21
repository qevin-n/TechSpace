<?php

require 'vendor/autoload.php';

use App\Models\Database;

$db = Database::connect();

echo "Database connected successfully!";