<!DOCTYPE html>
<html lang="fr">
<?php
class Announce {
    private $file_name;
    private $user;
    private $title;
    private $descript;
    private $tag;
    private $pictur;
    private $publication_date;
    
    public function __construct($file_name, $user, $title, $descript, $tag, $pictur, $publication_date) {
        $this->file_name = $file_name;
        $this->user = $user;
        $this->title = $title;
        $this->descript = $descript;
        $this->tag = $tag;
        $this->pictur = $pictur;
        $this->publication_date = $publication_date;
    }
    
    public function get_file_name() {
        return $this->file_name;
    }

    public function get_user() {
        return $this->user;
    }

    public function get_title() {
        return $this->title;
    }

    public function get_descript() {
        return $this->descript;
    }

    public function get_tag() {
        return $this->tag;
    }

    public function get_picture() {
        return $this->picture;
    }

    public function get_publication_date() {
        return $this->publication_date;
    }
    
    public function set_file_name($file_name) {
        $this->file_name = $file_name;
        return $this;
    }

    public function set_user($user) {
        $this->user = $user;
        return $this;
    }

    public function set_title($title) {
        $this->title = $title;
        return $this;
    }

    public function set_descript($descript) {
        $this->descript = $descript;
        return $this;
    }

    public function set_tag($tag) {
        $this->tag = $tag;
        return $this;
    }

    public function set_picture($picture) {
        $this->pictur = $picture;
        return $this;
    }

    public function set_publication_date($publication_date) {
        $this->publication_date = $publication_date;
        return $this;
    }

}
?>
</html>