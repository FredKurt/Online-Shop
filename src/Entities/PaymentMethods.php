<?php

namespace OlineShop\Entities;

class PaymentMethods extends A_Entities
{
    public int $id;
    public string $name;
    public bool $isActive;

    public function findById(int $id): I_Entities
    {
        //TODO: implements findById() method;

    }
    public function findAllById(int $id): array
    {
        //TODO: implements findAllById() method;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }


}