<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class AdminModel_model extends Model
{
    public function getInfo()
    {
        return $this->db->table('prod')->get_all();
    }
    public function getCat()
    {
        return $this->db->table('cat')->get_all();
    }
    public function searchInfo($id)
    {
        return $this->db->table('prod')->where('id', $id)->get();
    }

    public function getSales()
    {
        return $this->db->table('purchase_items')->get_all();
        // return $this->db->table('purchase_items')->order_by('order_at', 'DESC')->get_all();
    }

    public function topProduct()
    {
        return $this->db->raw('
        SELECT
        Item_name,
        MAX(prize) AS max_prize,
        MAX(Item_image) AS max_image,
        SUM(quantity) AS total_quantity,
        SUM(total_price) AS total_sales
    FROM
        purchase_items
    WHERE
        YEAR(order_at) = YEAR(CURDATE())
    GROUP BY
        Item_name
    ORDER BY
    total_quantity DESC
    LIMIT 10;
            ');
        //Order by Items sold
    }

}
?>