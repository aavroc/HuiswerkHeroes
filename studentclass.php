<?php 
class User
{
	protected $db;
	protected $message = '';
	
	//construct voor database inloggegevens variabelen
	public function __construct()
	{
		$user = 'root';
		$pass = '';
		$this->db = new PDO('mysql:host=localhost;dbname=huiswerkheroes', $user, $pass);

    }
    public function getMessage()
    {
        return $this->message;
    }
    public function login($email_form, $password_form)
    {
        //query die de gegevens na leest
        $sql = "SELECT * FROM pdo WHERE 'username' = :username AND 'password' = :pass";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(":username", $email_form);
        $statement->bindParam(":pass", $password_form);
        $statement->execute();
        $database_gegevens = $statement->fetch(PDO::FETCH_ASSOC);

        

        //checked of databasegegevens een array is maar ook of het gevult is met data
        if(is_array($database_gegevens) && !empty($database_gegevens)){
            $this->message = 'Gebruiker bestaat';
            //check of het ingevulde wachtwoord gelijk is aan dat van het wachtwoord van de gebruikers
            if($database_gegevens['password'] == $password_form){
                $this->message =  'De gebruiker is succesvol ingelogd';
                //ingelogd
                session_start();
                
                $_SESSION["user"] = $database_gegevens['id'];
                $_SESSION["email"] = $database_gegevens['username'];
                $_SESSION["status"] = TRUE;
                
                //stuurt de gebruiker door naar de stellingen pagina
                header( "Location: dashboard.php" );
            }
        }
        else{
            echo "werkt niet";
        }
    }
    public function register($naam, $email, $username, $password)
	{
	        //query waarmee een gebruiker data in de database doet zodat hij zichzelf kan registreren
			$sql2 = "INSERT INTO inloggegevens (fullname, email, username, 'password') VALUES (:naam, :email, :username, :password)";
			$statement = $this->db->prepare($sql2); //stuur naar mysql.
			$statement->bindParam(":naam", $naam );
            $statement->bindParam(":email", $email);
            $statement->bindParam(":username", $username);
			$statement->bindParam(":password", $password);
			$statement->execute();
	}
}
?>