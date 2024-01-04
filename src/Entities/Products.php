<?php

namespace OlineShop\Entities;

class Products extends A_Entities
{
    const DB_TABLE_NAME = "products";
    public int $id;
    public string $name;
    public float $price;
    public string $description;
    public string $image;

    public function findById(int $id): array
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

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }


    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function findAll(): array
    {
        $conn = self::$connection;
        $stmt = $conn->prepare("SELECT * FROM" . self::DB_TABLE_NAME);
        $result = [];

        $stmt->execute();

        foreach($stmt as $row) {
            $result[] = $row;
        }

        return $result;
    }


}

