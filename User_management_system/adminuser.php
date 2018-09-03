<?php
    require_once ("baseclass.php");
    class AdminUser extends BaseClass
    {
        protected static $db_table = "admin";
        protected static $db_fields = array('email','password');
        public $id;
        public $email;
        public $password;

        public static function verify_admin_user($email,$password)
        {
            global $database;
            $email = $database->escape_string($email);
            $password = $database->escape_string($password);
            $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
            $sql .= "email = '{$email}' ";
            $sql .= "AND password = '{$password}'";
            $the_result_array = self::find_by_query($sql);
            return !empty($the_result_array) ? array_shift($the_result_array) : false;
        }
    }
 ?>