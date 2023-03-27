<?php

namespace App\Models;

use CodeIgniter\Model;

class M_transactionModel extends Model
{
    protected $table = 'm_transaction';
    protected $allowedFields = ['id_item', 'remarks', 'flag', 'amount', 'date_created', 'date_modified'];

    public function getTransactions($flag, $id = false)
    {
        if ($id == false) {
            $data = "SELECT
            m_transaction.id,
            m_transaction.remarks,
            m_transaction.amount,
            m_transaction.id_item,
            m_item.item
            FROM
            m_transaction
            LEFT JOIN m_item ON m_transaction.id_item = m_item.id
            WHERE m_transaction.flag = $flag
            ";
            $query = $this->db->query($data);
            return $query->getResultArray();
        } else {
            $data = "SELECT
            m_transaction.id,
            m_transaction.remarks,
            m_transaction.amount,
            m_transaction.id_item,
            m_transaction.date_created,
            m_transaction.date_modified,
            m_item.item
            FROM
            m_transaction
            LEFT JOIN m_item ON m_transaction.id_item = m_item.id
            WHERE m_transaction.id = $id 
            AND m_transaction.flag = $flag
            ";
            $query = $this->db->query($data);
            return $query->getResultArray();
            // return $this->where(['id' => $id])->first();
        }
    }
}
