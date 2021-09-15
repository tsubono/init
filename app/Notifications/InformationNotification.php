<?php

namespace App\Notifications;

use App\Models\Information;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class InformationNotification extends Notification
{
    use Queueable;

    private Information $information;

    /**
     * Create a new notification instance.
     *
     * @param Information $information
     */
    public function __construct(Information $information)
    {
        $this->information = $information;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'date' => Carbon::parse($this->information->date)->format('Y-m-d'),
            'title' => $this->information->title,
            'content' => $this->information->content,
            'url' => route('infos.show', ['information' => $this->information]),
            'information_id' => $this->information->id,
            'is_information' => true,
        ];
    }
}
