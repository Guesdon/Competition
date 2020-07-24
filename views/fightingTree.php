<?php
    $nbPlayers = 16;

    $nbColumns = 2 * (log($nbPlayers,2)) + 1;

    $nbLignes = $nbPlayers*2;

    $tree = [];

    echo($nbColumns. "<br>");
    echo($nbLignes. "<br>");

    $players = true;
    $xPart = 0;
    for($i = 0; $i < $nbColumns; $i++){
        $column = [];
        $margeTop = pow(2,$xPart);
        $margeBot = pow(2,$xPart)-1;
        $yFrom = "P";
        $yPart = "T";
        $yState = 1;
        $branch = "start";
        //echo($margeTop." ".$margeBot. "<br>");
        for ($j = 0; $j < $nbLignes; $j++){

            $type="";

            switch($yPart){
                case "T":
                    if($players){
                        $type = "void";
                        if($yState < $margeTop){
                            $yState++;
                        }else{
                            $yPart="P";
                            $yState=1;
                        }
                    }else{
                        switch($yFrom){
                            case "P":
                                if($branch === "start"){
                                    $type = "void";
                                }else{
                                    $type="cross";
                                }
                                if($yState < $margeTop){
                                    $yState++;
                                }else{
                                    $yPart="P";
                                    $yFrom="T";
                                    $yState=1;
                                }
                            break;
                            case "T":
                                if($branch === "start"){
                                    $type = "void";
                                }else{
                                    $type="bar";
                                }
                                if($yState < $margeTop){
                                    $yState++;
                                    $yFrom="T";
                                }else{
                                    $yPart="P";
                                    $yFrom="T";
                                    $yState=1;
                                }
                            break;
                            case "B":
                                if($branch === "start"){
                                    $type = "void";
                                }else{
                                    $type="cross";
                                }
                                if($yState < $margeTop){
                                    $yState++;
                                    $yFrom="T";
                                }else{
                                    $yPart="P";
                                    $yFrom="T";
                                    $yState=1;
                                }
                            break;
                        }
                    }
                break;

                case "P":
                    if($players){
                        $type = "player";
                        if ($margeBot>0){
                            $yPart="B";
                        }else{
                            $yPart="T";
                        }
                    }else{
                        if($branch === "start"){
                            $type = "left to bot";
                            $branch = "end";
                        }else{
                            $type = "left to top";
                            $branch = "start";
                        }
                        
                        if ($margeBot>0){
                            $yPart="B";
                            $yFrom="P";
                        }else{
                            $yFrom="P";
                            $yPart="T";
                        }
                    }
                break;

                case "B":
                    if($players){
                        $type = "void";
                        if($yState < $margeBot){
                            $yState++;
                        }else{
                            $yPart="T";
                            $yState=1;
                        }
                    }else{
                        if($branch === "start"){
                            $type = "void";
                        }else{
                            $type = "bar";
                        }
                        if($yState < $margeBot){
                            $yState++;
                        }else{
                            $yFrom="B";
                            $yPart="T";
                            $yState=1;
                        }
                    }
                break;
            }

            //echo($type . "<br>");

            switch ($type){
                case "void":
                    array_push($column, "0");
                break;

                case "cross":
                    array_push($column, "x");
                break;

                case "left to bot":
                    array_push($column, "\\");
                break;

                case "left to top":
                    array_push($column, "/");
                break;

                case "bar":
                    array_push($column, "|");
                break;

                case "player":
                    array_push($column, "J");
                break;

                default : 
                    array_push($column, "N");
                break;
            }
        }

        array_push($tree, $column);

        if ($players === true){
            $players = false;
        }else{
            $players = true;
            $xPart++;
        }
    }
    for ($j = 0; $j < $nbLignes; $j++){
        for($i = 0; $i < $nbColumns; $i++){
            echo($tree[$i][$j]. " ");
        }
        echo('<br>');
    }
    