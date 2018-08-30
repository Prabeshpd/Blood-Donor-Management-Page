<?php
    class Session
    {
        private $admin_signed_in = false;
        public $admin_id;
        public $message;

        function __construct()
        {
            session_start();
            $this->check_the_login();
            $this->check_message();
        }
        public function message ($msg = "")
        {
            if (!empty($msg = "")) {
                $_SESSION['message'] = $msg;
            }
            else {
                return $this->message;
            }
        }
        private function check_message()
        {
            if (isset ($_SESSION['message'])) {
                unset ($_SESSION['message']);
            } else {
                $this->messagge = "";
            }
        }
        public function is_admin_signed_in()
        {
            return $this->admin_signed_in;
        }
        public function login_the_admin($user)
        {
            if ($user) {
                $this->admin_id = $_SESSION['admin_id'] = $user->id;
                $this->admin_signed_in = true;
            }
        }
        public function logout_the_admin()
        {
            unset ($_SESSION['admin_id']);
            unset ($this->user_id);
            $this->admin_signed_in =false;
        }
        private function check_the_login()
        {
            if (isset($_SESSION['admin_id'])) {
                $this->admin_id = $_SESSION['admin_id'];
                $this->admin_signed_in = true;
            } else {
                unset($this->admin_id);
                $this->admin_signed_in = false;
            }
        }
    }

    $session = new Session();


?>