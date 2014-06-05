<?php
namespace Vivait\EmailBundle\Model;
use Symfony\Component\Validator\Constraints as Assert;


class Email {

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min="3",max="255")
     * @Assert\Email()
     */
    private $from;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min="3",max="255")
     * @Assert\Email()
     */
    private $to;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $message;

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }



} 