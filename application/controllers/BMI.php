<?php
defined('BASEPATH') OR exit('No direct script access allowe
d');
class BMI extends CI_Controller {

    public function index() {
        
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
        $this->pasien3->id=3;
        $this->pasien3->kode="003";
        $this->pasien3->nama='David Octavyanto';
        $this->pasien3->gender='L';
        $this->pasien3->tmp_lahir='Boyolali';
        $this->pasien3->tgl_lahir='15-10-2001';
//=========================================================
        $this->load->model('bmipasien_model', 'bmipasien1');
        $this->bmipasien1->id=1;
        $this->bmipasien1->tanggal='2021-04-11';
        $this->bmipasien1->pasien='Gisela Pradealpa';
        $this->bmipasien1->bmi='';

        $this->load->model('bmipasien_model', 'bmipasien2');
        $this->bmipasien2->id=2;
        $this->bmipasien2->tanggal='2021-05-11';
        $this->bmipasien2->pasien='Pandan Wangi';
        $this->bmipasien2->bmi='';

        $this->load->model('bmipasien_model', 'bmipasien3');
        $this->bmipasien3->id=3;
        $this->bmipasien3->tanggal='2021-06-11';
        $this->bmipasien3->pasien='David Octavyanto';
        $this->bmipasien3->bmi='';

//=========================================================
        $this->load->model('bmi_model', 'bmi1');
        $this->bmi1->berat=35.6;
        $this->bmi1->tinggi=169;
        $this->bmi1->nilaiBMI(); // sebenernya cukup ini aja gausa kasih di bmi2 3
        $this->bmi1->statusBMI(); // ini

        $this->load->model('bmi_model', 'bmi2');
        $this->bmi2->berat=49.6;
        $this->bmi2->tinggi=152;
        // $this->bmi1->nilaiBMI(); 
        // $this->bmi1->statusBMI();
        
        $this->load->model('bmi_model', 'bmi3');
        $this->bmi3->berat=47;
        $this->bmi3->tinggi=158;
        // $this->bmi1->nilaiBMI(); 
        // $this->bmi1->statusBMI();
        
        $list_pasien = [$this->pasien1, $this->pasien2, $this->pasien3];
        $list_bmipasien = [$this->bmipasien1, $this->bmipasien2, $this->bmipasien3];
        $list_bmi = [$this->bmi1, $this->bmi2, $this->bmi3];
        
        $data['list_pasien']=$list_pasien;
        $data['list_bmipasien']=$list_bmipasien;
        $data['list_bmi']=$list_bmi;
        
        $this->load->view('header');
        $this->load->view('bmi/index', $data);
        $this->load->view('footer');
    }
        public function list(){
            $this->load->model('bmi_model');//load model
            $data['bmi']=$this->bmi_model->getAll();//query

            $this->load->view('header');
            $this->load->view('bmi/list', $data);
            $this->load->view('footer');
        }

         public function view($id){
            $this->load->model('bmi_model');
            $data['bmi']=$this->bmi_model->findById($id);

            $this->load->view('header');
            $this->load->view('bmi/view', $data);
            $this->load->view('footer');
        }
}
?>