<?php
    class BaseClass
    {
        public static function find_all()
        {
            return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
        }
        public static function find_by_id()
        {
            $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id =  $id");
            return !empty($the_result_array) ? array_shift($the_result_array) : false;
        }
        public static function find_by_query($sql)
        {
            global $database;
            $result_set = $database->query($sql);
            $the_object_array = array();
            while ($row = mysqli_fetch_array($result_set)) {
                $the_object_array[] = static::array_conversion($row);
            }
            return $the_object_array;
        }
        public static function array_conversion($the_records)
        {
            $calling_class = get_called_class();
            $the_object = new $calling_class;
            foreach ($the_records as $the_attribute => $value) {
                if ($the_object->has_attribute_of_class($the_attribute)) {
                    $the_object->$the_attribute = $value;
                }
            }
            return $the_object;
        }
        private function has_attribute_of_class($the_attribute)
        {
            $object_properties = get_object_vars($this);
            return array_key_exists($the_attribute, $object_properties);
        }
        protected function matching_keys_values_converted_arrays()
        {
            $properties = array();
            foreach (static::$db_table_fields as $db_field) {
                if (property_exists($this,$db_field)) {
                    $properties[$db_field] = $this->$db_field;
                }
            }
            return $properties;
        }
        protected function clean_properties()
        {
            global $database;
            $clean_properties = array();
            foreach ($this->matching_keys_values_converted_arrays() as $key=>$value) {
                $clean_properties[$key] = $database->escape_string($value);
            }
            return $clean_properties;
        }
        public function save_object()
        {
            return isset($this->id) ? $this->update_object() : $this->create_object();
        }
        public function create_object()
        {
            global $database;
            $properties = $this->clean_properties();
            $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
            $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";
            if ($database->query($sql)) {
                $this->id = $database->insert_the_id();
                return true;
            }
            else {
                return false;
            }
        }
        public function update_object()
        {
            global $database;
            $properties_pairs = array();
            $properties = $this->clean_properties();
            foreach ($properties as $key => $value) {
                $properties_pairs[] = "{$key} = '{$value}'";
            }
            $sql = "UPDATE " .static::$db_table . " SET ";
            $sql .= "WHERE id = " .$database->escape_string($this->id);
            $database->query($sql);
            return (mysqli_affected_rows($database->connection) == 1) ? true : false;
        }
        public function delete_object()
        {
            global $database;
            $sql = "DELETE FROM " .static::$db_table . " ";
            $sql.= "WHERE id =" . $database->escape_string($this->id);
            $database->query($sql);
            return (mysqli_affected_rows($database->connection) == 1) ? true:false;
        }
    }
?>