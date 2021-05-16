<?php

Class ValidationHelper {
    static function checkIfEmpty($array){
        foreach ($array as $item){
            return ($item !== NULL && $item !== FALSE && $item !== "");
        }
    }
}
