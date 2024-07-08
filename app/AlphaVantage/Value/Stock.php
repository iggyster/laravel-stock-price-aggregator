<?php

declare(strict_types=1);

namespace App\AlphaVantage\Value;

final class Stock
{
    private const string NAME = 'name';
    private const string OPEN = 'open';
    private const string HIGH = 'high';
    private const string LOW = 'low';
    private const string PRICE = 'price';

    private ?string $name = null;
    private ?string $open = null;
    private ?string $high = null;
    private ?string $low = null;
    private ?string $price = null;

    public function __serialize(): array
    {
        return $this->toArray();
    }

    public function __unserialize(array $data): void
    {
        $this->name = $data[self::NAME];
        $this->open = $data[self::OPEN];
        $this->high = $data[self::HIGH];
        $this->low = $data[self::LOW];
        $this->price = $data[self::PRICE];
    }

    public static function fromArray(array $data): Stock
    {
        return (new Stock())
            ->setName($data[self::NAME])
            ->setOpen($data[self::OPEN])
            ->setHigh($data[self::HIGH])
            ->setLow($data[self::LOW])
            ->setPrice($data[self::PRICE]);
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Stock
    {
        $this->name = $name;

        return $this;
    }

    public function getOpen(): ?string
    {
        return $this->open;
    }

    public function setOpen(?string $open): Stock
    {
        $this->open = $open;

        return $this;
    }

    public function getHigh(): ?string
    {
        return $this->high;
    }

    public function setHigh(?string $high): Stock
    {
        $this->high = $high;

        return $this;
    }

    public function getLow(): ?string
    {
        return $this->low;
    }

    public function setLow(?string $low): Stock
    {
        $this->low = $low;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): Stock
    {
        $this->price = $price;

        return $this;
    }

    public function toArray(): array
    {
        return [
            self::NAME => $this->getName(),
            self::OPEN => $this->getOpen(),
            self::HIGH => $this->getHigh(),
            self::LOW => $this->getLow(),
            self::PRICE => $this->getPrice(),
        ];
    }
}
