<?php

namespace App\Notifications;

use App\Models\Purchase;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class StockAlert extends Notification
{
    use Queueable;

    private $data;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url(route('edit-purchase',$this->data->id));
        return (new MailMessage)
                    ->greeting('Xin chào!')
                    ->line('Sản phẩm bên dưới sắp hết hàng.')
                    ->line("Sẩn phẩm  ".$this->data->name ." số lượng chỉ còn ".$this->data->quantity)
                    ->line("Vui lòng cập nhật số lượng sản phẩm hoặc mua hàng mới.")
                    ->action('View Product', $url)
                    ->line('Cảm ơn');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'product_name'=>$this->data->name,
            'quantity'=>$this->data->quantity,
            'image'=>$this->data->image,
        ];
    }


    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'product_name'=>$this->data->name,
            'quantity'=>$this->data->quantity,
        ]);
    }
}
