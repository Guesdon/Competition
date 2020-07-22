<?php
    /**
     * Load controllers and models
     *
     * @return none
     */
    function app_autoloader(){
        $filesFound = 0;

        // Controllers
        if(file_exists("../controllers/Controllers.php")){
            require_once("../controllers/Controllers.php");
            $filesFound++;
        }
        if(file_exists("../controllers/DeleteController.php")){
            require_once("../controllers/DeleteController.php");
            $filesFound++;
        }
        if(file_exists("../controllers/GetController.php")){
            require_once("../controllers/GetController.php");
            $filesFound++;
        }
        if(file_exists("../controllers/PostController.php")){
            require_once("../controllers/PostController.php");
            $filesFound++;
        }
        if(file_exists("../controllers/PutController.php")){
            require_once("../controllers/PutController.php");
            $filesFound++;
        }

        // Models
        if(file_exists("../models/Models.php")){
            require_once("../models/Models.php");
            $filesFound++;
        }
        if(file_exists("../models/DeleteModel.php")){
            require_once("../models/DeleteModel.php");
            $filesFound++;
        }
        if(file_exists("../models/GetModel.php")){
            require_once("../models/Model.php");
            $filesFound++;
        }
        if(file_exists("../models/PostModel.php")){
            require_once("../models/PostModel.php");
            $filesFound++;
        }
        if(file_exists("../models/PutModel.php")){
            require_once("../models/PutModel.php");
            $filesFound++;
        }

        if ($filesFound !== 10){
            trigger_error("AutoLoad error");
        }
    }

    spl_autoload_register('app_autoloader');