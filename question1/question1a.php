<?php

class ProcessOrderCustomer {
    public function processOrder($fromDate, $toDate, $maxProfitRateNew) {
        $modelOder = new MstOrder;
        //return 100,000 records
        $dataOrder  = $modelOder->getOrder($fromDate, $toDate);
        $modelLog = new Log; // Remove here
        foreach ($dataOrder as $order) {
            $priceInvoice = $order->price_invoice;
            /* Change here, we don't need to create new $maxProfitRateOld */
            /* Change == => === because I assume $order->max_profit_rate is null and $maxProfitRateNew is 0  and also improve performance */
            if ($maxProfitRateNew !== $order->max_profit_rate)
            {
                $maxProfitRate = $priceInvoice / (1 - $maxProfitRateNew);
                $modelOder->update($order, $maxProfitRate);
                // We can move to Job
                $modelLog->insert($order, $maxProfitRate);
            }
        }
    }
}

