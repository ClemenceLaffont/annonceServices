<?php
class Bdd {
    private $user;
    private $announce;

    public function set_user(User $user) {
        $this->user = $user;
    }

    public function set_announce(Announce $announce) {
        $this->announce = $announce;
    }

    public function stock_user() {
        if (is_file("user/".$this->user->get_pseudo().".txt")) {
            unlink("user/".$this->user->get_pseudo().".txt");
        }
        $data = serialize($this->user);
        $newFile = fopen("user/".$this->user->get_pseudo().".txt", "w");
        fwrite($newFile, $data);
        fclose($newFile);
    }

    public function stock_announce(Announce $announce) {
        if (is_file("announce/".$announce->$date_publication.".txt")) {
            unlink("announce/".$announce->$date_publication.".txt");
        }
        $data = serialize($announce);
        $newFile = fopen("announce/".$announce->date_publication.".txt", "w");
        fwrite($newFile, $data);
        fclose($newFile);
    }

    public function affiche_announce() {

    }
}
