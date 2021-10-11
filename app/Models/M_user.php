<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Session\Session;

class M_user extends Model
{
    public function get_data($email, $password)
    {
        return $this->db->table('admin')->where(array('email' => $email, 'password' => $password))
            ->get()->getRowArray();
    }
    public function getOne($id)
    {
        return $this->db->table('admin')->where(array('id_admin' => $id))->get()->getResultArray();
    }
    public function edit($id, $data)
    {
        return $this->db->table('admin')->update($data, ['id_admin' => $id]);
    }

    //--------------------------------------------------------------------

}
