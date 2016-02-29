<?php
/**
 * Created by PhpStorm.
 * User: abhi-panchal
 * Date: 2/25/16
 * Time: 9:47 AM
 */
function flash($title=null, $message=null){
    $flash=app('App\Http\Flash');
    if(func_num_args()==0){
        return $flash;
    }

    return $flash;

}