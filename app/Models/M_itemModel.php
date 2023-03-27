<?php

namespace App\Models;

use CodeIgniter\Model;

class M_itemModel extends Model
{
    protected $table = 'm_item';
    protected $allowedFields = ['item', 'date_created', 'date_modified'];

    public function getItem($id = false)
    {
        if ($id == false) {
            $data = "SELECT
            m_item.id,
            m_item.item,
            m_item.date_created,
            m_item.date_modified,
        CASE
                
                WHEN t3.in_stock - t3.out_stock IS NULL THEN
                0 ELSE t3.in_stock - t3.out_stock 
            END stock 
        FROM
            m_item
            LEFT JOIN (
            SELECT
                t1.id,
                t1.id_item,
                ( SELECT SUM( t2.amount ) FROM m_transaction t2 WHERE t2.flag = 1 AND t2.id_item = t1.id_item ) in_stock,
                (
                SELECT
                CASE
                        
                    WHEN
                        SUM( t2.amount ) IS NULL THEN
                            0 ELSE SUM( t2.amount ) 
                        END out_stock 
        FROM
            m_transaction t2 
        WHERE
            t2.flag = 2 
            AND t2.id_item = t1.id_item 
            ) out_stock 
        FROM
            m_transaction t1 
        GROUP BY
            t1.id_item 
            ) t3 ON t3.id_item = m_item.id";
            $query = $this->db->query($data);
            return $query->getResultArray();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }
}
