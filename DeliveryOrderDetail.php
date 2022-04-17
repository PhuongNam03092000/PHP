<?php
class DeliveryOrderDetail
{
    function DeliveryOrderDetail($delivery_order_id, $product_instance_id, $is_checked, $product_name, $quantiy)
    {
        $this->DeliveryOrderId = $delivery_order_id;
        $this->ProductInstanceId = $product_instance_id;
        $this->IsChecked = $is_checked;
        $this->ProductName = $product_name;
        $this->Quantity = $quantiy;
    }
}
