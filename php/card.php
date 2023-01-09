<?php

class Card {
    public $id;
    public $foto;
    public $nome;
    public $sesso;
    public $nascita;
    public $stato;
    
    public function __construct(&$array){
        
        $this->id=$array['id'];
        $this->foto=$array['foto'];
        $this->nome=$array['nome'];
        $this->sesso=$array['sesso'];
        $this->nascita=$array['nascita'];
        $this->stato=$array['stato'];
    }

   
    public function makeCard(){
        $pagina=file_get_contents("../html/card.html");
        $pagina=str_replace('%id%',$this->id,$pagina);
        $pagina=str_replace('%foto%',$this->foto,$pagina);
        $pagina=str_replace('%nomeCane%',$this->nome,$pagina);
        $pagina=str_replace('%sessoCane%',$this->sesso,$pagina);
        $pagina=str_replace('%nascita%',$this->nascita,$pagina);
        $pagina=str_replace('%stato%',$this->stato,$pagina);
        return $pagina;
    }
}
?>