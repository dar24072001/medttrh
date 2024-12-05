<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCredentialsNotification extends Notification
{
    use Queueable;

    private $email;
    private $password;
    private $isUpdate;

    /**
     * Create a new notification instance.
     *
     * @param string $email
     * @param string $password
     * @param bool $isUpdate
     */
    public function __construct($email, $password, $isUpdate = false)
    {
        $this->email = $email;
        $this->password = $password;
        $this->isUpdate = $isUpdate;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->isUpdate ? 'Mise à jour de vos informations' : 'Bienvenue dans notre application')
            ->line($this->isUpdate ? 'Vos informations ont été mises à jour.' : 'Bienvenue !')
            ->line('Votre adresse email est : ' . $this->email)
            ->line('Votre mot de passe est : ' . $this->password)
            ->line('Merci d\'utiliser notre application !');
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
            // Ajoute des informations à sauvegarder si nécessaire
        ];
    }
}
