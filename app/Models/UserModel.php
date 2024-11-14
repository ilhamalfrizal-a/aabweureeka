<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'auth_groups_users';
    protected $primaryKey = 'id'; // Jika ada, sesuaikan dengan kolom primary key Anda
    protected $allowedFields = ['user_id', 'group_id']; // Kolom yang bisa diisi

    // Fungsi untuk menambahkan pengguna ke grup
    public function addToGroup($userId, $groupId)
    {
        $data = [
            'user_id'  => $userId,
            'group_id' => $groupId,
        ];
        return $this->insert($data);
    }

    // Fungsi untuk menghapus pengguna dari grup
    public function removeFromGroup($userId, $groupId)
    {
        return $this->where('user_id', $userId)
                    ->where('group_id', $groupId)
                    ->delete();
    }
}
