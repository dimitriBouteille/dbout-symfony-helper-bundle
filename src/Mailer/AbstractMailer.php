<?php

namespace Dbout\Bundle\SymfonyHelperBundle\Mailer;

use Twig\Environment;

/**
 * Class AbstractMailer
 * @package Dbout\Bundle\SymfonyHelperBundle\Mailer
 */
abstract class AbstractMailer
{

    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @var \Swift_Mailer
     */
    protected $swift;

    /**
     * @var \Swift_Message
     */
    protected $message;

    /**
     * @param Environment $environment
     * @param \Swift_Mailer $mailer
     */
    public final function _init(Environment $environment, \Swift_Mailer $mailer): void
    {
        $this->twig = $environment;
        $this->swift = $mailer;
        $this->message = new \Swift_Message();
    }

    /**
     * @param string $subject
     * @return $this
     */
    protected function setSubject(string $subject): self
    {
        $this->message->setSubject($subject);
        return $this;
    }

    /**
     * @param string $email
     * @param string|null $name
     * @return $this
     */
    public function setFrom(string $email, string $name = null): self
    {
        $this->message->setFrom($email, $name);
        return $this;
    }

    /**
     * @param string $body
     * @param string|null $charset
     * @return $this
     */
    protected function setTextBody(string $body, string $charset = null): self
    {
        $this->message->setBody($body, 'text/plain', $charset);
        return $this;
    }

    /**
     * @param string $body
     * @param string|null $charset
     * @return $this
     */
    protected function setHtmlBody(string $body, string $charset = null): self
    {
        $this->message->setBody($body, 'text/html', $charset);
        return $this;
    }

    /**
     * @param string $email
     * @param string|null $name
     * @return $this
     */
    protected function setTo(string $email, string $name = null): self
    {
        $this->message->setTo($email, $name);
        return $this;
    }

    /**
     * @return bool
     */
    protected function sendMessage(): bool
    {
        return $this->swift->send($this->message);
    }

}