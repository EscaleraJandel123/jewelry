<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class Reports_model extends Model
{
    public function getTodaySales()
    {
        $result = $this->db->raw('
            SELECT 
                SUM(total_price) AS today_sales 
            FROM 
                purchase_items 
            WHERE 
                DATE(order_at) = CURDATE()
        ');

        return $result[0]['today_sales'] ?? 0; // Access the result as an array
    }

    public function getMonthlySales()
    {
        $result = $this->db->raw('
            SELECT 
                SUM(total_price) AS monthly_sales 
            FROM 
                purchase_items 
            WHERE 
                MONTH(order_at) = MONTH(CURDATE()) 
                AND YEAR(order_at) = YEAR(CURDATE())
        ');

        return $result[0]['monthly_sales'] ?? 0;
    }

    public function getYearlySales()
    {
        $result = $this->db->raw('
            SELECT 
                SUM(total_price) AS yearly_sales 
            FROM 
                purchase_items 
            WHERE 
                YEAR(order_at) = YEAR(CURDATE())
        ');

        return $result[0]['yearly_sales'] ?? 0;
    }
    public function getWeeklySales()
    {
        $result = $this->db->raw('
            SELECT 
                SUM(total_price) AS weekly_sales 
            FROM 
                purchase_items 
            WHERE 
                YEARWEEK(order_at, 1) = YEARWEEK(CURDATE(), 1)
        ');

        return isset($result[0]['weekly_sales']) ? (float) $result[0]['weekly_sales'] : 0;
    }

    public function getOverallSales()
    {
        $result = $this->db->raw('
            SELECT 
                SUM(total_price) AS overall_sales 
            FROM 
                purchase_items
        ');

        return isset($result[0]['overall_sales']) ? (float) $result[0]['overall_sales'] : 0;
    }

}
?>
