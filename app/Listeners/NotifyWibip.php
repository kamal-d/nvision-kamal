<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyWibip implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event): void
    {
        sleep(5);
        $response = Http::post('https://wibip.free.beeceptor.com/order', [
            'Order_ID' => $event->order->id,
            'Customer_Name' => $event->order->customer_name,
            'Order_Value' => $event->order->order_value,
            'Order_Date' => $event->order->created_at->toDateTimeString(),
            'Process_ID' => $event->order->process_id,
            'Order_Status' => $event->order->status,
        ]);
        Log::info($response);
        if ($response->failed()) {
            Log::error('Failed to notify Wibip');
            return;
        }
        $event->order->synced = true;
        $event->order->save();
    }
}
