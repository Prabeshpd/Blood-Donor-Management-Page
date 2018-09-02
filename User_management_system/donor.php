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
        $sql .= "AND address = '{$address}'";
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
        public static function update_user($id, $name, $blood_group, $contact_number, $address){
            global $database;
            $id = $database->escape_string($id);
            $name = $database->escape_string($name);
            $blood_group = $database->escape_string($blood_group);
            $contact_number = $database->escape_string($contact_number);
            $address = $database->escape_string($address);
            $sql = "UPDATE " . static::$db_table . " SET ";
            $sql .= "name = '{$name}', ";
            $sql .= "blood_group = '{$blood_group}', ";
            $sql .= "contact_number = '{$contact_number}', ";
            $sql .= "address = '{$address}' ";
            $sql .= "WHERE id = '{$id}'";
            $database->query($sql);
            return true;
        }
}
?>