<?php
 require "libs/rb.php";

 R::setup( 'mysql:host=localhost;dbname=memorize',
    'mysql', 'mysql' );

 session_start();
