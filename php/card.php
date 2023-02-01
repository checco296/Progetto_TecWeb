<?php

class Card {
    public $id;
    public $foto;
    public $nome;
    public $sesso;
    public $nascita;
    public $richiesta;
    public $stato;
    
    public function __construct(&$array){
        
        $this->id=$array['id'];
        $this->nome=$array['nome'];
        $this->sesso=$array['sesso'];
        $this->nascita=$array['data_nascita'];
        $this->richiesta = $array['richiesta'];
        $this->foto=$array['path'];
    }

   
    public function makeCard(){

        $pagina=file_get_contents("../html/card.html");
        $pagina=str_replace('%id%',$this->id,$pagina);
        $pagina=str_replace('%nome%',$this->nome,$pagina);
        $pagina=str_replace('%sesso%',$this->sesso,$pagina);
        $pagina=str_replace('%nascita%',$this->nascita,$pagina);
        $parte_foto = "<img src='../images/" . $this->foto . "' />";
        $pagina = str_replace('%foto%', $parte_foto, $pagina);
        return $pagina;
    }

    public function makeCard_register(){

        $pagina=file_get_contents("../html/card_register.html");
        $pagina=str_replace('%id%',$this->id,$pagina);
        $pagina=str_replace('%nome%',$this->nome,$pagina);
        $pagina=str_replace('%sesso%',$this->sesso,$pagina);
        $pagina=str_replace('%nascita%',$this->nascita,$pagina);
        $parte_foto = "<img src='../images/" . $this->foto . "' />";
        $pagina = str_replace('%foto%', $parte_foto, $pagina);
        return $pagina;
    }

    public function makeCard_admin(){

        $pagina=file_get_contents("../html/card_admin.html");
        $pagina=str_replace('%id%',$this->id,$pagina);
        $pagina=str_replace('%nome%',$this->nome,$pagina);
        $pagina=str_replace('%sesso%',$this->sesso,$pagina);
        $pagina=str_replace('%nascita%',$this->nascita,$pagina);
        $parte_foto = "<img src='../images/" . $this->foto . "' />";
        if($this->richiesta==null){
            $pagina=str_replace('<input type="submit" value="%richiesta%" class="button" name="adotta" />','<span>Nessuna richiesta</span>',$pagina);
        } else {
            $pagina=str_replace('%richiesta%',$this->richiesta,$pagina);
        }
        $pagina = str_replace('%foto%', $parte_foto, $pagina);
        return $pagina;
    }

    public function makeCard_user(){
        $pagina=file_get_contents("../html/card_user.html");
        $pagina=str_replace('%id%',$this->id,$pagina);
        $pagina=str_replace('%nome%',$this->nome,$pagina);
        $pagina=str_replace('%sesso%',$this->sesso,$pagina);
        $pagina=str_replace('%nascita%',$this->nascita,$pagina);
        $parte_foto = "<img src='../images/" . $this->foto . "' />";
        $pagina = str_replace('<img src="%foto%" class="immagine" />', $parte_foto, $pagina);
        return $pagina;
    }
}
?>