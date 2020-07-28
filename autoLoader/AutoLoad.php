<?php
    /**
     * Load controllers and models
     *
     * @return none
     */
    function app_autoloader(){
        $filesFound = 0;

        // Controllers
        if(file_exists(HTTP_PATH_HOST_PRINCIPAL."controllers/Controllers.php")){
            require_once(HTTP_PATH_HOST_PRINCIPAL."controllers/Controllers.php");
            $filesFound++;
        }
        if(file_exists(HTTP_PATH_HOST_PRINCIPAL."controllers/DeleteController.php")){
            require_once(HTTP_PATH_HOST_PRINCIPAL."controllers/DeleteController.php");
            $filesFound++;
        }
        if(file_exists(HTTP_PATH_HOST_PRINCIPAL."controllers/GetController.php")){
            require_once(HTTP_PATH_HOST_PRINCIPAL."controllers/GetController.php");
            $filesFound++;
        }
        if(file_exists(HTTP_PATH_HOST_PRINCIPAL."controllers/PostController.php")){
            require_once(HTTP_PATH_HOST_PRINCIPAL."controllers/PostController.php");
            $filesFound++;
        }
        if(file_exists(HTTP_PATH_HOST_PRINCIPAL."controllers/PutController.php")){
            require_once(HTTP_PATH_HOST_PRINCIPAL."controllers/PutController.php");
            $filesFound++;
        }

        // Models
        if(file_exists(HTTP_PATH_HOST_PRINCIPAL."models/Models.php")){
            require_once(HTTP_PATH_HOST_PRINCIPAL."models/Models.php");
            $filesFound++;
        }
        if(file_exists(HTTP_PATH_HOST_PRINCIPAL."models/DeleteModel.php")){
            require_once(HTTP_PATH_HOST_PRINCIPAL."models/DeleteModel.php");
            $filesFound++;
        }
        if(file_exists(HTTP_PATH_HOST_PRINCIPAL."models/GetModel.php")){
            require_once(HTTP_PATH_HOST_PRINCIPAL."models/Model.php");
            $filesFound++;
        }
        if(file_exists(HTTP_PATH_HOST_PRINCIPAL."models/PostModel.php")){
            require_once(HTTP_PATH_HOST_PRINCIPAL."models/PostModel.php");
            $filesFound++;
        }
        if(file_exists(HTTP_PATH_HOST_PRINCIPAL."models/PutModel.php")){
            require_once(HTTP_PATH_HOST_PRINCIPAL."models/PutModel.php");
            $filesFound++;
        }

        if ($filesFound !== 10){
            trigger_error("AutoLoad error");
        }
    }

    spl_autoload_register('app_autoloader');