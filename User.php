<?php

require_once 'dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die ($conn->connect_error);

class User {
    public $user_id;
    public $email;
    public $roles = array();

    function __construct($email) {
        global $conn;
        $this->email = $email;

        $query = "SELECT user_id FROM users WHERE email = '$email'";
        $result = $conn->query($query);
        if (!$result) echo "ERROR1";

        $row = $result->fetch_array(MYSQLI_ASSOC);
        $this->user_id = $row['user_id'];

        $query = "SELECT role FROM roles WHERE user_id = '$this->user_id'";
        $result = $conn->query($query);
        if (!$result) echo "ERROR2";

        $rows = $result->num_rows;

        for ($i=0; $i<$rows; ++$i) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $roles[] = $row['role'];
            $this->roles = $roles;
        }
    }

    function get_roles() {
        return $this->roles;
    }
}

?>