<?php
    class DeliveryOrder{
        function DeliveryOrder($delivery_order_id, $delivery_order_date, $order_status){
            $this->DeliveryOrderId = $delivery_order_id;
            $this->DeliveryOrderDate = $delivery_order_date;
            $this->OrderStatus = $order_status;
        }
    }
?>