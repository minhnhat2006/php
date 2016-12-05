<?php

$dir_paths = [CONTROLLER_PATH, MODEL_PATH, UTIL_PATH];

foreach ($dir_paths as $path) {
    foreach (glob($path . "/*.php") as $file_name) {
        include $file_name;
    }
}