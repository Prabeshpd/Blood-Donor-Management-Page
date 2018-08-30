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
    }




?>