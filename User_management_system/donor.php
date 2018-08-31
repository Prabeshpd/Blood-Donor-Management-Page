<?php
    require_once ('baseclass.php');?>
<?php
    class Donor extends BaseClass
    {
        protected static $db_table = "donor";
        protected static $db_fields = array('name', 'blood_group', 'contact_number', 'address');
        public $id;
        public $name;
        public $blood_group;
        public $contact_number;
        public $address;

        public function get_address()
        {
            return $this->address;
        }




    public static function search_donor($by_blood, $by_address)
    {
        global $database;
        $blood_group = $by_blood;
        $address = $by_address;
        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "blood_group = '{$blood_group}' ";
        $sql .= "OR address = '{$address}'";
        $result = $database->query($sql);
        return $result;

    }
    public static function get_location()
    {
        global $database;
        $sql = "SELECT DISTINCT address FROM " .self::$db_table;
        $location = $database->query($sql);
        return $location;
    }

    public static function get_blood_group()
    {
        global $database;
        $sql = "SELECT DISTINCT blood_group FROM " .self::$db_table;
        $blood_group = $database->query($sql);
        return $blood_group;
    }
}



?>