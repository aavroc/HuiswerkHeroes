<?php
class User
{
    protected $db;
    protected $message = '';

    //construct voor database inloggegevens variabelen.
    public function __construct()
    {
        session_start();

        // Define database.
        define('dbhost', 'localhost');
        define('dbuser', 'root');
        define('dbpass', '');
        define('dbname', 'rotary_huiswerkheroes');
        
        // Connecting database
        try {
            $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // catching exception errors
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
        
    }
    public function getMessage()
    {
        return $this->message;
    }
    //Login
    public function loginstudent($email_form, $password_form)
    {
    //checked if you pressed on login.
        if(isset($_POST['login'])) 
        {
            $errMsg = '';
    
            // Get data from FORM
            $username = $_POST['username'];
            $password = $_POST['password'];
    
    
            // check if fields are set
            if(empty($username) || empty($password))
            {
                $errMsg = 'Alle velden moeten ingevuld worden.';
            } 
            else
            {
                try
                {
                    // SQL query for login. Also grabs data that will later be used into sessions.
                    $sql = "SELECT * FROM user WHERE username = :gebruikersnaam";
                    $statement = $connect->prepare($sql);
                    $statement->bindParam(":gebruikersnaam", $username);
                    $statement->execute();
                    
                    $database_gegevens = $statement->fetch(PDO::FETCH_ASSOC); 
                    if($database_gegevens == FALSE)
                    {
                        header("location: login.php?error=dbconnFailed");
                        exit();
                    
                    }
                    else
                    {
                        // password and hashed password check if it's the same.
                        $passcheck = password_verify($password, $database_gegevens['password']);
                        if($passcheck == FALSE)
                        {
                            header("location: login.php?error=invalidLogin");
                            exit();
                        }
                        else if($passcheck == TRUE && $username = $database_gegevens['username'])
                        {
                            $_SESSION['fullname'] = $database_gegevens['fullname'];
                            $_SESSION['username'] = $database_gegevens['username'];
                            $_SESSION['niveau'] = $database_gegevens['niveau'];
                            $_SESSION['id'] = $database_gegevens['id'];
    
                            header("location: dashboard.php?login=succes");
                            exit();
                        }
                        else
                        {
                            
                            header("location: login.php?error=invalidData");
                            exit();
                        }
                        
                    }
                }
                catch(PDOException $e)
                {
                    echo $e->getMessage();
                }
            }
            
        }
        //checked of databasegegevens een array is maar ook of het gevult is met data
        if (is_array($database_gegevens) && !empty($database_gegevens)) {
            $this->message = 'Gebruiker bestaat';
            //check of het ingevulde wachtwoord gelijk is aan dat van het wachtwoord van de gebruikers
            if ($database_gegevens['password'] == $password_form) {
                $this->message =  'De gebruiker is succesvol ingelogd';
                //ingelogd
                session_start();

                $_SESSION["user"] = $database_gegevens['id'];
                $_SESSION["email"] = $database_gegevens['email'];
                $_SESSION["status"] = TRUE;

                //stuurt de gebruiker door naar de stellingen pagina
                header("Location: dashboard.php");
            }
        } else {
            echo "werkt niet";
        }
    }
    public function registerstudent($naam, $email, $username, $password, $niveau)
    {
        //query waarmee een gebruiker data in de database doet zodat hij zichzelf kan registreren
        $sql2 = "INSERT INTO pdo (voornaam, email, username, password, niveau) VALUES (:naam, :email, :username, :pass, :niveau)";
        $statement = $this->db->prepare($sql2); //stuur naar mysql.
        $statement->bindParam(":naam", $naam);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":pass", $password);
        $statement->bindParam(":niveau", $niveau);
        $statement->execute();
    }
    public function updatestudent($naam, $email, $password, $niveau)
    {
        //query waarmee een gebruiker data in de database doet zodat hij zichzelf kan registreren
        $sql2 = "UPDATE huiswerkheroes SET voornaam=:voornaam, email=:email, password=:pass, niveau=:niveau WHERE id={$_SESSION['user']})";
        $statement = $this->db->prepare($sql2); //stuur naar mysql.
        $statement->bindParam(":voornaam", $naam);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":pass", $password);
        $statement->bindParam(":niveau", $niveau);
        $statement->execute();
    }
    public function logout()
    {
        //log uit functie. maakt een einde aan de session waar alle waardes instaan van de ingelogte gebruikers.
        session_start();
        session_destroy();
        echo 'je bent uitgelogt. <a href="login.php">Ga terug</a>';
    }
    public function registerdocent($naam, $email, $username, $password, $niveau)
    {
        //query waarmee een gebruiker data in de database doet zodat hij zichzelf kan registreren. dit is voor leraren er moet nog data beveiligt worden doormiddel van hashen. de database naam moet ook nog worden bepaald
        $sql2 = "INSERT INTO docent (voornaam, email, username, password, niveau) VALUES (:naam, :email, :username, :pass, :niveau)";
        $statement = $this->db->prepare($sql2); //stuur naar mysql.
        $statement->bindParam(":naam", $naam);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":username", $username);
        $statement->bindParam(":pass", $password);
        $statement->bindParam(":niveau", $niveau);
        $statement->execute();
    }
    public function logindocent($email_form, $password_form)
    {
        //query die de gegevens na leest
        $sql = "SELECT * FROM docent WHERE email = :email AND password = :pass";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(":email", $email_form);
        $statement->bindParam(":pass", $password_form);
        $statement->execute();
        $database_gegevens = $statement->fetchALL(PDO::FETCH_ASSOC);



        //checked of databasegegevens een array is maar ook of het gevult is met data
        if (is_array($database_gegevens) && !empty($database_gegevens)) {
            $this->message = 'Gebruiker bestaat';
            //check of het ingevulde wachtwoord gelijk is aan dat van het wachtwoord van de gebruikers
            if ($database_gegevens['password'] == $password_form) {
                $this->message =  'De gebruiker is succesvol ingelogd';
                //ingelogd
                session_start();

                $_SESSION["user"] = $database_gegevens['id'];
                $_SESSION["email"] = $database_gegevens['email'];
                $_SESSION["status"] = TRUE;

                //stuurt de gebruiker door naar de stellingen pagina
                header("Location: dashboard.php");
            }
        } else {
            echo "werkt niet";
        }
    }
    public function updatedocent($naam, $email, $password, $niveau)
    {
        //query waarmee een gebruiker data in de database doet zodat hij zichzelf kan registreren
        $sql2 = "UPDATE docent SET voornaam=:voornaam, email=:email, password=:pass, niveau=:niveau WHERE id={$_SESSION['user']})";
        $statement = $this->db->prepare($sql2); //stuur naar mysql.
        $statement->bindParam(":voornaam", $naam);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":pass", $password);
        $statement->bindParam(":niveau", $niveau);
        $statement->execute();
    }
}
