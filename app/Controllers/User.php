<?php

namespace App\Controllers;

use CodeIgniter\CodeIgniter;
use CodeIgniter\Database\Query;
use CodeIgniter\Exceptions\PageNotFoundException;

class User extends BaseController
{
    protected $db, $builder;
    function __construct()
   {
       $this->db = \Config\Database::connect();
       $this->builder = $this->db->table('users');
       
   }
   public function index()
   {
       $this->builder = $this->db->table('users');
       $this->builder->select('users.id as userid, username, email, name, auth_groups.name as role_name'); // Menambahkan nama grup
       $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
       $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');

       // Contoh data, sesuaikan dengan data sebenarnya dari database
        $data['password'] = "aabweureeka"; // Ganti dengan query untuk password
        $data['kode_aktivasi'] = "eureeka123";     // Ganti dengan query untuk kode aktivasi


       $query = $this->builder->get();
       $data['users'] = $query->getResultObject();
       return view('user/index', $data);
   }

   public function edit($id)
   {
       $this->builder = $this->db->table('users');
       $this->builder->select('users.id as userid, username, email, name, auth_groups_users.group_id as role_id');
       $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
       $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
       $this->builder->where('users.id', $id);
       $query = $this->builder->get();

       $data['user'] = $query->getRow();
       $data['roles'] = $this->db->table('auth_groups')->get()->getResult(); // Mendapatkan semua peran
       return view('user/edit', $data);
   }

   public function update($id)
   {
    // Mengambil role ID dari form
    $roleId = $this->request->getPost('role');

    // Memastikan bahwa role yang diberikan valid
    if ($roleId) {
        // Mengupdate role user di tabel auth_groups_users
        $data = [
            'group_id' => $roleId
        ];

        $this->db->table('auth_groups_users')
            ->where('user_id', $id) // Pastikan untuk menggunakan user_id untuk mengupdate
            ->update($data);
        
        session()->setFlashdata('success', 'User role updated successfully.');
    } else {
        session()->setFlashdata('error', 'Invalid role selected.');
    }

    return redirect()->to('/user');
    }


}
   


