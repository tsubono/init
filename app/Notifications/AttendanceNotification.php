<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AttendanceNotification extends Notification
{
    use Queueable;

    private string $title;
    private string $avatar_image;
    private string $user_name;
    private string $url;

    /**
     * AttendanceNotification constructor.
     * @param string $title
     * @param string $avatar_image
     * @param string $user_name
     * @param string $url
     */
    public function __construct(string $title, string $avatar_image, string $user_name, string $url)
    {
        $this->title = $title;
        $this->avatar_image = $avatar_image;
        $this->user_name = $user_name;
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
            'from_avatar_image' => $this->avatar_image,
            'from_user_name' => $this->user_name,
            'url' => $this->url,
            'is_attendance' => true,
        ];
    }
}
