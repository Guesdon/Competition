<?php

class Controllers {

    /**
     * create a table to build a fighting tree
     *
     * @param int $nbColumns
     * @param int $nbLignes
     * @return array
     */
    public static function buildArrayTree($nbColumns, $nbLignes){
        $tree = [];
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
            for ($j = 0; $j < $nbLignes; $j++){
                switch($yPart){

                    // top of an element 
                    case "T":
                        if($players){
                            array_push($column, "0");
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
                                        array_push($column, "0");
                                    }else{
                                        array_push($column, "X");
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
                                        array_push($column, "0");
                                    }else{
                                        array_push($column, "|");
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
                                        array_push($column, "0");
                                    }else{
                                        array_push($column, "X");
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

                    // element player or cross or angle
                    case "P":
                        if($players){
                            array_push($column, "J");
                            if ($margeBot>0){
                                $yPart="B";
                            }else{
                                $yPart="T";
                            }
                        }else{
                            if($branch === "start"){
                                array_push($column, "\\");
                                $branch = "end";
                            }else{
                                array_push($column, "/");
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

                    // bot of an element
                    case "B":
                        if($players){
                            array_push($column, "0");
                            if($yState < $margeBot){
                                $yState++;
                            }else{
                                $yPart="T";
                                $yState=1;
                            }
                        }else{
                            if($branch === "start"){
                                array_push($column, "0");
                            }else{
                                array_push($column, "|");
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
            }
            array_push($tree, $column);
            if ($players === true){
                $players = false;
            }else{
                $players = true;
                $xPart++;
            }
        }
        return $tree;
    }

}