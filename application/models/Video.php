<?php

/**
 * Classe responsável para conectar-se ao YouTube
 */
class Video {
    
    public $objyt;
    
    public function init() {
        $yt = new Zend_Gdata_YouTube();
        $yt->getRecentlyFeaturedVideoFeed();
        $this->objyt = $yt->getUserFavorites("deyvisonone");
    }
    
    public function listarVideos() {
        return $this->objyt;
    }

    public function recuperarUltimoVídeo() {
        $feed = $this->objyt;
        return $feed;
    }
    
}

?>
