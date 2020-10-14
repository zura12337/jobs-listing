<?php

require "lib/get-user-info.php";
require_once "lib/routing.php";
include_once "lib/list-jobs.php";

registerRoute("", "main.php");
registerRoute("/", "main.php");
registerRoute("/login", "login.php");
registerRoute("/register", "register.php");


executeRoute($_SERVER["PATH_INFO"]);

