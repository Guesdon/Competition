<?php
    session_start();

    header("Content-Type: text/html; charset=utf-8");

    require_once ("../conf/generalConf.php");

    require_once (PATH_MACHINE . "autoLoader/AutoLoad.php");

    


    require_once ("header.php");

    require_once ("body.php");

    require_once ("footer.php");