<?php
class User {
    protected $pseudo;
    protected $password;
    protected $firstname;
    protected $lastname;
    protected $mail;
    protected $phone;
    protected $registerdate;
    protected $town;
    protected $birth;
    protected $adress;
    protected $diplome;
    protected $descript;
    protected $image;
    protected $statut;
    
    public function __construct($pseudo, $password, $firstname, $lastname, $mail, $phone, $registerdate, $town, $birth = null, $adress = null, $diplome = null, $descript = "Cette personne n'a pas encore écrit de présentation.", $image = null, $statut = "user") {
    $this->pseudo = $pseudo;
    $this->password = $password;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->mail = $mail;
    $this->phone = $phone;
    $this->registerdate = $registerdate;
    $this->town = $town;
    $this->birth = $birth;
    $this->adress = $adress;
    $this->diplome = $diplome;
    $this->descript = $descript;
    $this->image = $image;
    $this->statut = $statut;
    }

    public function set_birth($birth) {
        $this->birth = $birth;
    }

    public function set_adress($adress) {
        $this->adress = $adress;
    }

    public function set_diplome($diplome) {
        $this->diplome = $diplome;
    }

    public function set_descript($descript) {
        $this->descript = $descript;
    }

    public function set_image($image) {
        $this->image = $image;
    }

    public function set_statut($statut) {
        $this->statut = $statut;
    }

    public function get_pseudo() {
        return $this->pseudo;
    }

    public function stock() {
        $data = serialize($this);
        $newFile = fopen("user/".$this->pseudo.".txt", "w");
        fwrite($newFile, $data);
        fclose($newFile);
    }

    public function afficheProfil() {
        echo "<section class='profil'>";
        echo "<h2>".$this->pseudo."</h2>";
        echo "<p>".$this->firstname."</p>";
        echo "<p>".$this->lastname."</p>";
        echo "<p>".$this->mail."</p>";
        echo "<p>".$this->phone."</p>";
        echo "<p>".$this->town."</p>";
        echo "<p>".$this->registerdate."</p>";
        echo "</section>";
    }

}