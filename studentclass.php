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
		$this->db = new PDO('mysql:host=localhost;dbname=rotary', $user, $pass);

    }
    public function getMessage()
    {
        return $this->message;
    }
    public function login($email_form, $password_form)
    {
        //query die de gegevens na leest
        $sql = "SELECT * FROM huiswerkheroes WHERE email = :email AND password = :pass";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(":email", $email_form);
        $statement->bindParam(":pass", $password_form);
        $statement->execute();
        $database_gegevens = $statement->fetchALL(PDO::FETCH_ASSOC);

        

        //checked of databasegegevens een array is maar ook of het gevult is met data
        if(is_array($database_gegevens) && !empty($database_gegevens)){
            $this->message = 'Gebruiker bestaat';
            //check of het ingevulde wachtwoord gelijk is aan dat van het wachtwoord van de gebruikers
            if($database_gegevens['password'] == $password_form){
                $this->message =  'De gebruiker is succesvol ingelogd';
                //ingelogd
                session_start();
                
                $_SESSION["user"] = $database_gegevens['id'];
                $_SESSION["email"] = $database_gegevens['email'];
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
			$sql2 = "INSERT INTO pdo (voornaam, email, username, password) VALUES (:naam, :email, :username, :pass)";
			$statement = $this->db->prepare($sql2); //stuur naar mysql.
			$statement->bindParam(":naam", $naam );
            $statement->bindParam(":email", $email);
            $statement->bindParam(":username", $username);
			$statement->bindParam(":pass", $password);
			$statement->execute();
    }
    public function update($naam, $email, $password, $niveau)
	{
	        //query waarmee een gebruiker data in de database doet zodat hij zichzelf kan registreren
			$sql2 = "UPDATE huiswerkheroes SET voornaam=:voornaam, email=:email, password=:pass, niveau=:niveau WHERE id={$_SESSION['user']})";
			$statement = $this->db->prepare($sql2); //stuur naar mysql.
			$statement->bindParam(":voornaam", $naam );
            $statement->bindParam(":email", $email);
            $statement->bindParam(":pass", $password);
			$statement->bindParam(":niveau", $niveau);
			$statement->execute();
    }
}
?>