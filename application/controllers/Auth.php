<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        // untuk memanggil data outlet dari tabel outlet menggunakan model 
        $data['outlet'] = $this->Outlet_m->get_outlet();
        $this->load->view('templates/header_landing', $data);
        $this->load->view('auth/index', $data);
        $this->load->view('templates/footer_landing');
    }

    public function registration()
    {

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules(
            'password',
            'required|trim|matches[password]'
        );
        $this->form_validation->set_rules('password', 'password', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Registration Pages';
            $this->load->view('auth/registrasi', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars(
                    $this->input->post('username', true)
                ),
                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
                'id_outlet' => 1,
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert-success" role="alert">
            Selamat, registrasi akun berhasil. Silahkan Login!
            </div>'
            );
            redirect('auth/login');
        }
    }


    public function login()
    {

        // jika id user dari tabel user tidak kosong, maka akan masuk ke halaman dashboard
        if ($this->session->userdata('id_user') != '') {
            redirect('dashboard');
        }

        $valid = $this->form_validation;

        $valid->set_rules('username', 'Username', 'required');
        $valid->set_rules('password', 'Password', 'required');

        if ($valid->run()) {
            $post = $this->input->post();

            $this->db->where('username', $post['username']);
            $user = $this->db->get('tb_user')->row_array();

            if ($user) {
                if (password_verify($post['password'], $user['password'])) {

                    $array = array(
                        'id_user' => $user['id_user'],
                        'id_outlet' => $user['id_outlet'],
                        'nama' => $user['nama'],
                        'role' => $user['role'],
                    );

                    $this->session->set_userdata($array);
                    $this->session->set_flashdata('success', 'Login Berhasil');
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Password anda salah');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Username tidak ditemukan');
                redirect('auth/login');
            }
        }

        $this->load->view('auth/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        session_destroy();
        redirect('auth/login');
    }
}
