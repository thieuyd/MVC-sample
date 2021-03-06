<?php

class Product extends Model
{

    /**
     * Table name and primary table
     */
    protected static $tableName = 'product';
    protected static $primaryKey = 'pd_id';
    protected static $columnName = 'pd_name';


    /**
     * Get all record of product table
     */
    public static function get_list($limit)
    {
        return self::getAllRecord($limit);
    }

    /**
     * Count all record of product table
     */
    public static function count()
    {
        return self::countRecord();
    }


    /**
     * Get Product by id
     */
    public static function getProduct($pd_id)
    {
        return self::getItemById($pd_id);
    }

    public static function getIdProduct($pd_id)
    {
        return self::getIdItem($pd_id);
    }

    /**
     * Update product contain add and edit
     */
    public static function updateProductProcess($data = array(), $pd_id = null)
    {
        return self::updateItem($data, $pd_id);
    }


    /**
     * Count record by condition
     */
    public static function count_colum($column, $value)
    {
        return self::countRowByColumn($column, $value);
    }

    /**
     * Active record
     */
    public static function update_active($pd_id, $value)
    {
        $db = Database::getInstance();
        $data = array(
            'pd_status' => $value,
            'pd_time_updated' => date("Y-m-d h:i:s")

        );

        $result = self::activeRecord($pd_id, 'pd_id', $data, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Sord record
     */
    public static function sort_item($item, $typesort, $limit)
    {
        return self::sort($item, $typesort, $limit);
    }

    /**
     * Search and sort data
     */
    public static function sort_search($string, $item = null, $typesort = null, $limit = null)
    {
        $column = array(
            'pd_name' => 'pd_name',
            'pd_price' => 'pd_price',
            'pd_id' => 'pd_id'
        );
        return self::search_sort($item, $typesort, $limit, $string, $column);
    }
}