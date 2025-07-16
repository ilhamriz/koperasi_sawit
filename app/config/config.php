<?php

// Detect environment
$server_name = $_SERVER['SERVER_NAME'] ?? 'localhost';

if ($server_name === 'localhost') {
  $envFile = __DIR__ . '/../../.env.local';
} else {
  $envFile = __DIR__ . '/../../.env.production';
}

$env = parse_ini_file($envFile);

define("BASEURL", $env['BASEURL']);
define("DB_HOST", $env['DB_HOST']);
define("DB_USER", $env['DB_USER']);
define("DB_PASS", $env['DB_PASS']);
define("DB_NAME", $env['DB_NAME']);
