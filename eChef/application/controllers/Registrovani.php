<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Registrovani
 *
 * @author Korisnik
 */
class Registrovani extends CI_Controller {
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
    // samo poziva prikazi sa drugim podacima..
    //isto kao i kod gosta samo se loaduje novi novi header.  
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
    
    
    public function predloziJelo(){
     
        
    }    
    // -- metoda koja ako nije ulogovan trazi loguj se ako jeste napravi mu meni ili ako ga vec ima prikaze. 
    // ako vec ulogovan preusmeri u kontroler korisnik akcija predlozi jelo.
	// CHEVU 
    
    public function izradiPlanIshrane(){
        // proveri dal ima vec plan. 
        // ukoliko ima tj nije jos istekao
        // onda pozove prikaz njegov
        // ukoliko nema generisi jela pa prikazi
        // sa odgovarajucim prikazom i podacima
    }
    
     public function knijga(){
     // proveri dal validan korisnik itd.
     // dohvati njegove knjige i prosledi u prikazi sa odgovar
     //jucom stranicom.
    }
    
    
    
    public function oceni($idK,$ocena,$idR)
    {
        $this->Jelo->dodajOcenu($idK,$ocena,$idR);
        $this->prikaziJelo($idR);
    }
    
    public function ukloniOcenu(){
        //gleda dal logovan itd
        // gledaj dal je ocenjivo do sad.
        // ukloni ocenu
        // prikaze opet to jelo
        //znaci pozove prikazi.
    }
    
    
    public function dodajKomentar()
    { 
        $data = array
        (
            'idKorisnika'=> $this->session->userdata('korisnik')->idK,
            'sadrzaj' => $this->input->get('comment'),
            'idR' => $this->input->get('idr')
        );
        
        $this->Jelo->dodajKomentar($data);
        $this->prikaziJelo($data['idR']);
        
    }
    
    
    
    
    
    
    
    public function ukloniKomentar($idK,$idR){
        $this->Jelo->ukloniKomentar($idK);
        $this->prikaziJelo($idR);
    }
    
    public function dodajUKnjigu(){
        
    }
    public function ukloniIzKnjige(){
        // proveri dal logovan itd.
        //proveri dal ima vec u knjigu
        // ukloni 
    }
    
    
    
    
    private function prikazi($glavniDeo, $data){
       
        $data['controller']='Registrovani';
        $this->load->view("sablon/registrovan_header.php", $data);
        $this->load->view($glavniDeo, $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function logout(){
        // ubija sesiju
        //preusmeri na gosta.
    }
    
    
    
     public function prikaziJelo($id){
     $data=[];
     $data['jelo']=$this->Jelo->dohvatiJeloId($id);
     $data['sastojci']= $this->Jelo->dohvatiSastojkeJela($id);
     $data['komentari']= $this->Jelo->dohvatiKomentareJela($id);
     $data['ocene']= $this->Jelo->dohvatiOceneJela($id);
       //$data = $this->Jelo->dohvatiPodatkeJelo($id);
       $this->prikazi("recipe_demo.php",$data);
    }
    public function prikaziPrilika($prilika){
        $data = [];
        $data['jela'] = $this->Jelo->dohvatiJeloPrilika($prilika);
        $this->prikazi("rezultatipretrage.php",$data);
    }
    
    public function prikaziPoSastojku($sastojak){
        $data = [];
        $data['jela'] = $this->Jelo->dohvatiJeloSastojak($sastojak);
        $this->prikazi("rezultatipretrage.php",$data);
    }
    
     public function prikaziKategoriju($kategorija){
        $data = [];
        $data['jela'] = $this->Jelo->dohvatiJeloKategorija($kategorija);
        $this->prikazi("rezultatipretrage.php",$data);
    }
    
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     

