<?php

function searchUser($searchArray){

    return function($taskItem) use ($searchArray){

        $sanitizeSearchName = strtolower($searchArray['firstName']);
        $sanitizeItemName = strtolower($taskItem['firstName']);
        $sanitizeSearchLastn = strtolower($searchArray['lastName']);
        $sanitizeItemLastn = strtolower($taskItem['lastName']);

        if ($sanitizeItemName === $sanitizeSearchName) {
            if ($sanitizeItemLastn === $sanitizeSearchLastn){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    };
};




function searchUserName($search){

    return function($taskItem) use ($search){
        $sanitizedSearchName = strtolower($search);
        $sanitizedItemName = strtolower($taskItem['firstName']);

        if ($sanitizedItemName === $sanitizedSearchName) {
            return true;
        }else{
            return false;
        }
    };
}


function searchUserLastname($search){

    return function($taskItem) use ($search){
        $sanitizedSearchLastn = strtolower($search);
        $sanitizedItemLastn = strtolower($taskItem['lastName']);

        if ($sanitizedItemLastn === $sanitizedSearchLastn) {
            return true;
        }else{
            return false;
        }
    };
}