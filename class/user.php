<!DOCTYPE html>
<html lang="fr">
<?php
class User {
    protected $pseudo;
    protected $password;
    protected $firstname;
    protected $lastname;
    protected $mail;
    protected $phone;
    protected $registration_date;
    protected $town;
    protected $birth;
    protected $adress;
    protected $diplome;
    protected $descript;
    protected $image;
    protected $statut;

    public function __construct($pseudo, $password, $firstname, $lastname, $mail, $phone, $registration_date, $town, $birth = null, $adress = null, $diplome = null, $descript = "Cette personne n'a pas encore écrit de présentation.", $image = null, $statut = "user") {
    $this->pseudo = $pseudo;
    $this->password = $password;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->mail = $mail;
    $this->phone = $phone;
    $this->registration_date = $registration_date;
    $this->town = $town;
    $this->birth = $birth;
    $this->adress = $adress;
    $this->diplome = $diplome;
    $this->descript = $descript;
    $this->image = $image;
    $this->statut = $statut;
    }
    
        public function set_pseudo($pseudo) {
        $this->pseudo = $pseudo;
        return $this;
    }

    public function set_password($password) {
        $this->password = $password;
        return $this;
    }

    public function set_firstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function set_lastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function set_mail($mail) {
        $this->mail = $mail;
        return $this;
    }

    public function set_phone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function set_town($town) {
        $this->town = $town;
        return $this;
    }

    public function set_birth($birth) {
        $this->birth = $birth;
        return $this;
    }

    public function set_adress($adress) {
        $this->adress = $adress;
        return $this;
    }

    public function set_diplome($diplome) {
        $this->diplome = $diplome;
        return $this;
    }

    public function set_descript($descript) {
        $this->descript = $descript;
        return $this;
    }

    public function set_image($image) {
        $this->image = $image;
        return $this;
    }

    public function set_statut($statut) {
        $this->statut = $statut;
        return $this;
    }
    
    public function get_pseudo() {
        return $this->pseudo;
    }

    public function get_password() {
        return $this->password;
    }

    public function get_firstname() {
        return $this->firstname;
    }

    public function get_lastname() {
        return $this->lastname;
    }

    public function get_mail() {
        return $this->mail;
    }

    public function get_phone() {
        return $this->phone;
    }

    public function get_registration_date() {
        return $this->registration_date;
    }

    public function get_town() {
        return $this->town;
    }

    public function get_birth() {
        return $this->birth;
    }

    public function get_adress() {
        return $this->adress;
    }

    public function get_diplome() {
        return $this->diplome;
    }

    public function get_descript() {
        return $this->descript;
    }

    public function get_image() {
        return $this->image;
    }

    public function get_statut() {
        return $this->statut;
    }

}
?>
</html>