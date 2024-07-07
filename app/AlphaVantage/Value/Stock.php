<?php

namespace App\AlphaVantage\Value;

final class Stock
{
    private string $name;
    private string $open;
    private string $high;
    private string $low;
    private string $price;
    private string $volume;
    private string $latestTradingDay;
    private string $previousClose;
    private string $change;
    private string $changePercent;

    public static function fromArray(array $data): Stock
    {
        return (new Stock())
            ->setName($data[0])
            ->setOpen($data[1])
            ->setHigh($data[2])
            ->setLow($data[3])
            ->setPrice($data[4])
            ->setVolume($data[5])
            ->setLatestTradingDay($data[6])
            ->setPreviousClose($data[7])
            ->setChange($data[8])
            ->setChangePercent($data[9]);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Stock
    {
        $this->name = $name;

        return $this;
    }

    public function getOpen(): string
    {
        return $this->open;
    }

    public function setOpen(string $open): Stock
    {
        $this->open = $open;

        return $this;
    }

    public function getHigh(): string
    {
        return $this->high;
    }

    public function setHigh(string $high): Stock
    {
        $this->high = $high;

        return $this;
    }

    public function getLow(): string
    {
        return $this->low;
    }

    public function setLow(string $low): Stock
    {
        $this->low = $low;

        return $this;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): Stock
    {
        $this->price = $price;

        return $this;
    }

    public function getVolume(): string
    {
        return $this->volume;
    }

    public function setVolume(string $volume): Stock
    {
        $this->volume = $volume;

        return $this;
    }

    public function getLatestTradingDay(): string
    {
        return $this->latestTradingDay;
    }

    public function setLatestTradingDay(string $latestTradingDay): Stock
    {
        $this->latestTradingDay = $latestTradingDay;

        return $this;
    }

    public function getPreviousClose(): string
    {
        return $this->previousClose;
    }

    public function setPreviousClose(string $previousClose): Stock
    {
        $this->previousClose = $previousClose;

        return $this;
    }

    public function getChange(): string
    {
        return $this->change;
    }

    public function setChange(string $change): Stock
    {
        $this->change = $change;

        return $this;
    }

    public function getChangePercent(): string
    {
        return $this->changePercent;
    }

    public function setChangePercent(string $changePercent): Stock
    {
        $this->changePercent = $changePercent;

        return $this;
    }

    public function toArray(): array
    {
        return [
            $this->getName(),
            $this->getOpen(),
            $this->getHigh(),
            $this->getLow(),
            $this->getPrice(),
            $this->getVolume(),
            $this->getLatestTradingDay(),
            $this->getPreviousClose(),
            $this->getChange(),
            $this->getChangePercent(),
        ];
    }
}
