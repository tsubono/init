<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AttendanceNotification extends Notification
{
    use Queueable;

    private string $title;
    private string $content;
    private string $url;

    /**
     * AttendanceNotification constructor.
     * @param string $title
     * @param string $content
     * @param string $url
     */
    public function __construct(string $title, string $content, string $url)
    {
        $this->title = $title;
        $this->content = $content;
        $this->url = $url;
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
            'title' => $this->title,
            'content' => $this->content,
            'url' => $this->url,
            'is_attendance' => true,
        ];
    }
}
