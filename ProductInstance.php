<?php 
    class ProductInstance{
        function ProductInstance($product_instance_id, $product_line_id, $is_purcharsed){
            $this->ProudctInstanceId = $product_instance_id;
            $this->ProductLineId = $product_line_id;
            $this->IsPurcharsed = $is_purcharsed;
        }
    }
?>