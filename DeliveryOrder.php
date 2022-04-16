<?php
    class DeliveryOrder{
        function DeliveryOrder($delivery_order_id, $delivery_order_date, $order_status, $expected_quanlity, $actual_quanlity){
            $this->DeliveryOrderId = $delivery_order_id;
            $this->DeliveryOrderDate = $delivery_order_date;
            $this->OrderStatus = $order_status;
            $this->ExpectedQuanlity = $expected_quanlity;
            $this->ActualQuanlity = $actual_quanlity;
        }
    }
?>