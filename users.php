<?php


class users
{

    public $name;
    public $surname;
    public $email;
    public $user_id;


    function welcome()
    {
        echo "Welcome $this->name $this->surname";
    }

    function goodbay()
    {
        echo "Bye $this->name $this->surname";
    }

    function set_email($email)
    {
        $this->email = $email;
    }

    function get_email()
    {
        return $this->email ?? '';
    }

    function get_name()
    {
        return $this->name;
    }

    function get_surname()
    {
        return $this->surname;
    }

    function set_name($name)
    {
        $this->name = $name;
    }
    function set_surname($surname)
    {
        $this->surname = $surname;
    }
    function set_user_id($user_id)
    {
        $this->user_id = $user_id;
    }

    function get_user_id()
    {
        return $this->user_id;
    }


}

if (!empty($_SESSION['user_email'])) {
    $users = new users();
    $users->set_email($_SESSION['user_email']);
    if (!empty($_SESSION['name'])) {
        $users->set_name($_SESSION['name']);
    };
    if (!empty($_SESSION['surname'])) {
        $users->set_surname($_SESSION['surname']);
    };
    if (!empty($_SESSION['user_id'])) {
        $users->set_user_id($_SESSION['user_id']);
    };
} else {
    $users = null;
}
