<?php 
    class ProductLine{
        function ProductLine($product_line_id, $name, $price){
            $this->ProductLineId = $product_line_id;
            $this->Name = $name;
            $this->Price = $price;
        }

        function ProductLine2($product_line_id, $name, $price, $stock){
            $this->ProductLineId = $product_line_id;
            $this->Name = $name;
            $this->Price = $price;
            $this->Stock = $stock;
        }
    }
?>