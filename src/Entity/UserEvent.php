<?php

namespace App\Entity;

use App\Repository\UserEventRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserEventRepository::class)
 */
class UserEvent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $create_date;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $modify_date;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $user_ip;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_agent;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $indicative_country;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $event_key;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->create_date;
    }

    public function setCreateDate(\DateTimeInterface $create_date): self
    {
        $this->create_date = $create_date;

        return $this;
    }

    public function getModifyDate(): ?\DateTimeInterface
    {
        return $this->modify_date;
    }

    public function setModifyDate(?\DateTimeInterface $modify_date): self
    {
        $this->modify_date = $modify_date;

        return $this;
    }

    public function getUserIp(): ?string
    {
        return $this->user_ip;
    }

    public function setUserIp(string $user_ip): self
    {
        $this->user_ip = $user_ip;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->user_agent;
    }

    public function setUserAgent(string $user_agent): self
    {
        $this->user_agent = $user_agent;

        return $this;
    }

    public function getIndicativeCountry(): ?string
    {
        return $this->indicative_country;
    }

    public function setIndicativeCountry(string $indicative_country): self
    {
        $this->indicative_country = $indicative_country;

        return $this;
    }

    public function getEventKey(): ?string
    {
        return $this->event_key;
    }

    public function setEventKey(string $event_key): self
    {
        $this->event_key = $event_key;

        return $this;
    }
}
