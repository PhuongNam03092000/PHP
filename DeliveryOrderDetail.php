<?php
class DeliveryOrderDetail
{
    function DeliveryOrderDetail($delivery_order_id=null, $product_instance_id=null, $product_id=null,$is_checked=null, $product_name=null, $quantity=null)
    {
        $this->DeliveryOrderId = $delivery_order_id;
        $this->ProductInstanceId = $product_instance_id;
        $this->ProductId = $product_id;
        $this->IsChecked = $is_checked;
        $this->ProductName = $product_name;
        $this->Quantity = $quantity;
    }
}
?>