<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jelo
 *
 * @author Korisnik
 */
           // SVI PODACI IDU PREKO POSTA.
class Jelo extends CI_Controller {
    //put your code here
    
       // ovde se prikazuje jelo.
    private function prikazi($glavniDeo, $data){
    // $this->load->view("sablon/header_korisnik.php", $data);
        $this->load->view($glavniDeo, $data);
        $this->load->view("sablon/footer.php");
    }
    
    public function dodajOcenu(){
        //gleda dal logovan itd.
        // oceni 
        // prikazi opet to jelo.
        // znaci pozove prikazi
    }
    
    public function ukloniOcenu(){
        //gleda dal logovan itd
        // gledaj dal je ocenjivo do sad.
        // ukloni ocenu
        // prikaze opet to jelo
        //znaci pozove prikazi.
    }
    
    public function dodajKomentar(){
        //gleda dal logovan itd.
        // doda komentar
        // prikazi opet to jelo.
        // znaci pozove prikazi
    }
    
    public function ukloniKomentar(){
        //gleda dal logovan itd
        // gledaj dal je komentariso do sad.
        // ukloni ocenu
        // prikaze opet to jelo
        //znaci pozove prikazi.         
    }
    
    public function dodajUKnjigu(){
        //proveri dal logovan itd.
        //proveri dal ima vec u knjigu
        // dodaj mu i nista nek ostane na tu stranicu
    }
    public function ukloniIzKnjige(){
        // proveri dal logovan itd.
        //proveri dal ima vec u knjigu
        // ukloni 
    }
    
    
}
