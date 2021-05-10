<?php
defined('BASEPATH') OR exit('No direct script access allowe
d');

class pasien extends CI_Controller {

    public function index(){
        $this->load->model('pasien_model','pasien1');
        $this->pasien1->id=1;
        $this->pasien1->kode="001";
        $this->pasien1->nama='Gisela Pradealpa';
        $this->pasien1->gender='P';
        $this->pasien1->tmp_lahir='pagaralam';
        $this->pasien1->tgl_lahir='08-09-2002';

        $this->load->model('pasien_model','pasien2');
        $this->pasien2->id=2;
        $this->pasien2->kode="002";
        $this->pasien2->nama='Pandan Wangi';
        $this->pasien2->gender='P';
        $this->pasien2->tmp_lahir='Bogor';
        $this->pasien2->tgl_lahir='01-02-2002';

        $this->load->model('pasien_model','pasien3');
        $this->pasien3->id=2;
        $this->pasien3->kode="003";
        $this->pasien3->nama='David Octavyanto';
        $this->pasien3->gender='L';
        $this->pasien3->tmp_lahir='Boyolali';
        $this->pasien3->tgl_lahir='15-10-2001';

        $list_pasien = [$this->pasien1, $this->pasien2, $this->pasien3];
        $data['list_pasien']=$list_pasien;

        $this->load->view('header');
        $this->load->view('pasien/index',$data);
        $this->load->view('footer');
    }
    public function list(){
        $this->load->model('pasien_model');
        $data['pasien']=$this->pasien_model->getAll();//query
       
        $this->load->view('header');
        $this->load->view('pasien/list',$data);
        $this->load->view('footer');
    }
    public function view($id){
        $this->load->model('pasien_model');
        $data['pasien']=$this->pasien_model->findById($id);
        
        $this->load->view('header');
        $this->load->view('pasien/view',$data);
        $this->load->view('footer');
       }
       
}

    

