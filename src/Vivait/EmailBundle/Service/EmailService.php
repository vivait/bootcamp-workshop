<?php

namespace Vivait\EmailBundle\Service;

use Vivait\EmailBundle\Model\Email;

class EmailService {


    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }


    public function sendEmail(Email $email) {
        $message = \Swift_Message::newInstance()
            ->setSubject('Message from CRM')
            ->setFrom($email->getFrom())
            ->setTo($email->getTo())
            ->setBody($email->getMessage());

        $this->mailer->send($message);
    }
}