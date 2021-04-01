<?php

Class StringHelper {
    static function capitalizeFirst($string){
        return ucwords(strtolower($string));
    }
}