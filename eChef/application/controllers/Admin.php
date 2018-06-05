<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Korisnik
 */
class Admin  extends CI_Controller{
    
    
    
     public function __construct() {
       
        
       /*(session_start();
        if(!isset($_SESSION['korisnik'])
        * header("Location:?controller=Gost&akcija=index");
        * else if(isset($_SESSION[kuvar]== 1)
        *header("Location:?controller=Kuvar&akcija=index");
         else if(isset($_SESSION[admin]== 1)
        *   header("Location:?controller=Admin&akcija=index");
         */
		 
		   parent::__construct();
                   
                   
                   
                   $this->load->model('Jelo');
          if (($this->session->userdata('korisnik')) == NULL) {
            redirect("Gost");
          }
          if ($this->session->userdata('korisnik')->oznaka == 'a') {
            redirect("Admin");
          }
          if ($this->session->userdata('korisnik')->oznaka == 'k'){
                 redirect("Kuvar");
          }
		 
    }
  
    
     private function prikazi($glavniDeo, $data){
       
        $data['controller']='Registrovani';
        $this->load->view("sablon/admin_header.php", $data);
        $this->load->view($glavniDeo, $data);
        $this->load->view("sablon/footer.php");
    }
    
    
    public function index(){
       $podaci=[];
       $this->prikazi("home.php",$podaci);
    }
    
    public function pretraga(){
        //uzme podatak 
        $search = $this->input->get('searchBox');
        $data = [];
        $data['jela'] = $this->Jelo->dohvatiJeloIme($search);
        $this->prikazi("rezultatipretrage.php",$data);
        // uradi pretragu 
        //poziva metodu prikazi za jela sto je dobio.
         // $this->prikazi("jelo stranica",array rezultata);
    }
    
    
     public function prikazipretraga(){
        $data=[];
        $this->prikazi("search.php",$data);
    }
    
    
     public function ukloniKomentar($idK,$idR){
        $this->Jelo->ukloniKomentar($idK);
        $this->prikaziJelo($idR);
    }
    
    
      public function prikaziPrilika(){
          
    }
    
    public function prikaziPoSastojku(){
        // uzme podatak preko geta sto se setovo kad je klikno dal 
        // je to beef ili chicken ili lunch ili whatever
        // vrsi pretragu  i ispisuje.. 
        // pozivajuci metodu prikazi sa array podatakama.
    }
    
     public function prikaziKategoriju(){
        // uzme podatak preko geta sto se setovo kad je klikno dal 
        // je to dorucak ili rucak ili sta god.
        // vrsi pretragu  i ispisuje.. 
        // pozivajuci metodu prikazi sa array podatakama.
    }
    public function logout(){
        // ubija sesiju
        //preusmeri na gosta.
    }
    public function odobriKuvara(){
        
    
    }
    
}
