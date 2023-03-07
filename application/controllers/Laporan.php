<?php

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        // untuk memanggil nama model
        $this->load->model('Laporan_m');
        $this->load->model('Outlet_m');
        $this->load->model('Paket_m');
        $this->load->model('Transaksi_m');
       
    }

    public function index()
    {

        $dari = $this->input->get('dari');
        $sampai = $this->input->get('sampai');
        $id_paket = $this->input->get('id_paket');
        $id_outlet = $this->input->get('id_outlet');

        $data['title'] = 'Data Laporan';
        // memanggil data laporan dari tabel laporan menggunakan model 
        $data['laporan'] = $this->Laporan_m->get_laporan($dari, $sampai, $id_paket, $id_outlet);
        $data['outlet'] = $this->Outlet_m->get_outlet();
        $data['paket'] = $this->Paket_m->get_paket();
        $data['transaksi'] = $this->Transaksi_m->get_transaksi();


        $this->load->view('templates/header', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
}
