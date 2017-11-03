<?php
class base_qlsv
{
    static $_inst;
    function __construct()
    {
        $this->load_core();
    }
    function load_core()
    {
        session_start();
        include "./core/application/helper/base.php";
        include ("./core/application/model/manager_user.php");
        include "controller_Accout.php";
        include "controller_login.php";
       
        include "controller_quanlysv.php";


    }

    static function inst()
    {
        if (!self::$_inst) {
            self::$_inst = new self();
        }
        return self::$_inst;
    }
}
base_qlsv::inst();








