<?php
// include'index.php';

class payroll
{
    private $server = "mysql:hose=localhost;dbname=server_pms";
    private $user = "root";
    private $pass = "";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $con;

    public function openConnection()
    {
        try {
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->con;
        } catch (PDOException $e) {
            echo "Error in connection: " . $e->getMessage();
        }
    }


    public function classConnection()
    {
        $this->con = null;
    }

    public function login()
    {
        if (isset($_POST['submit'])) {

            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $stmt->execute([$email, $password]);
            $total = $stmt->rowCount();
            $user = $stmt->fetch();
            if ($total > 0) {

                $this->setUserData($user);
                header("Location: http://localhost:3000/");
            } else {
                echo "Login Failed";
            }

        }
    }


    public function setUserData($array)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['users'] = array(
            "Fillname" => $array['name'],
            "access" => $array['type']
        );

        return $_SESSION['users'];


    }

    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['users'] = null;
        unset($_SESSION['users']);
    }
    
}
$payroll = new payroll();