<?php
/**
 * Created by PhpStorm.
 * User: Judith
 * Date: 7/4/16
 * Time: 9:53
 */


class PagesProductModel extends Model{

    public function insertNewProduct($productname, $description, $price, $stock, $limit_date, $username, $image, $url)
    {
        if($productname && $description && $price && $stock && $limit_date && $username && $image && $url)
        {
            $query = <<<QUERY
        INSERT INTO product (name, description, price, stock, limit_date, usuari, image_path, URL)
        VALUES ("$productname", "$description", "$price","$stock", "$limit_date", "$username", "$image", "$url");
QUERY;


            $this->execute($query);
        }

    }

    public function updateProduct($productname, $description, $price, $stock, $limit_date, $image, $url, $last_url,$id)
    {
        $query = <<<QUERY
            UPDATE product SET name="$productname",
                               description="$description",
                               price="$price",
                               stock="$stock",
                               limit_date="$limit_date",
                               URL="$url",
                               image_path="$image",
                               last_URL="$last_url"
             WHERE id="$id";
QUERY;
        if($image == "" && $last_url == ""){
            $query = <<<QUERY
            UPDATE product SET name="$productname",
                               description="$description",
                               price="$price",
                               stock="$stock",
                               limit_date="$limit_date",
                               URL="$url"
             WHERE id="$id";
QUERY;
        }else if ($image != "" && $last_url == ""){
            $query = <<<QUERY
            UPDATE product SET name="$productname",
                               description="$description",
                               price="$price",
                               stock="$stock",
                               limit_date="$limit_date",
                               URL="$url",
                               image_path="$image"
             WHERE id="$id";
QUERY;
        }else if($image == "" && $last_url != "")
        {
            $query = <<<QUERY
            UPDATE product SET name="$productname",
                               description="$description",
                               price="$price",
                               stock="$stock",
                               limit_date="$limit_date",
                               URL="$url",
                               last_URL="$last_url"
             WHERE id="$id";
QUERY;
        }

        $this->execute($query);
    }

    public function searchProduct($search)
    {
        $query = <<<QUERY
            SELECT *
            FROM product
            WHERE UPPER(name) LIKE UPPER('%$search%')
                AND stock > 0 AND limit_date > CURRENT_DATE
            ORDER BY views DESC;
QUERY;
        return $this->getAll($query);
    }

    public function getProductByUrl($url)
    {
        $query = <<<QUERY
            SELECT *
            FROM product
            WHERE URL = "$url"
QUERY;

        return $this->getAll($query);
    }

    public function getProductByLastUrl($url)
    {
        $query = <<<QUERY
            SELECT *
            FROM product
            WHERE last_URL = "$url"
QUERY;
        return $this->getAll($query);
    }

    public function getProductById($id)
    {
        $query = <<<QUERY
            SELECT *
            FROM product
            WHERE id = "$id"
QUERY;
        return $this->getAll($query);
    }

    public function getAllProductsOrderByViews()
    {
        $query = <<<QUERY
             SELECT *
             FROM product
             WHERE stock > 0 AND limit_date > CURRENT_DATE
             ORDER BY views DESC;
QUERY;

         return $this->getAll($query);
     }

    public function getAllProducts()
    {
        $query = <<<QUERY
             SELECT *
             FROM product;
QUERY;

        return $this->getAll($query);
    }

    public function updateStock($id, $stock)
    {
        $query = <<<QUERY
            UPDATE product
            SET stock = "$stock"
            WHERE id = "$id"

QUERY;
        $this->execute($query);
    }

    public function updateViews($id, $views)
    {
        $query = <<<QUERY
            UPDATE product
            SET views = "$views"
            WHERE id = "$id"
QUERY;
        $this->execute($query);

    }

    public function getAllProductsByUser($username)
    {
        $query = <<<QUERY
            SELECT *
            FROM product
            WHERE usuari = '$username'
QUERY;
        return $this->getAll($query);

    }

    public function deleteProduct($id)
    {
        $query = <<<QUERY
            DELETE FROM product
            WHERE id = '$id';
QUERY;
        $this->execute($query);

    }

    public function getUserById($id)
    {
        $query = <<<QUERY
            SELECT usuari
            FROM product
            WHERE id = "$id"
QUERY;
        return $this->getAll($query);
    }

    public function getLastProductInserted()
    {
        $query = <<<QUERY
            SELECT MAX(id) as max
            FROM product
            WHERE stock > 0 AND limit_date > CURRENT_DATE

QUERY;
        $lastId = $this->getAll($query);
        $lastId = $lastId[0]['max'];

        $query = <<<QUERY
            SELECT *
            FROM product
            WHERE id = "$lastId";
QUERY;
        return $this->getAll($query);
    }

    public function getMostViewed(){
        $query = <<<QUERY
            SELECT *
            FROM product
            WHERE stock > 0 AND limit_date > CURRENT_DATE
            ORDER BY views DESC
QUERY;
        return $this->getAll($query);
    }

    public function getTotalViews()
    {
        $query = <<<QUERY
            SELECT SUM(views) as numViews
            FROM product
            WHERE stock > 0 AND limit_date > CURRENT_DATE
QUERY;
        return $this->getAll($query);

    }

}