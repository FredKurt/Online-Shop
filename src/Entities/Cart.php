<?php
namespace OlineShop\Entities;

class Cart extends A_Entities
{
    public int $id;
    public int $userId;
    public int $productId;
    public int $quantity;
    public string $paymentMethodId;
    public bool $isPayed;

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

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function isPayed(): bool
    {
        return $this->isPayed;
    }

    public function setIsPayed(bool $isPayed): void
    {
        $this->isPayed = $isPayed;
    }

    public function getPaymentMethodId(): string
    {
        return $this->paymentMethodId;
    }

    public function setPaymentMethodId(string $paymentMethodId): void
    {
        $this->paymentMethodId = $paymentMethodId;
    }

}