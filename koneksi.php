<?php

$host = getenv('DB_HOST');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_NAME');
$port = getenv('DB_PORT');
$connectionString = "host=${host} port=${port} dbname=${database} user=${user} password=${password}";

$link = pg_connect($connectionString);