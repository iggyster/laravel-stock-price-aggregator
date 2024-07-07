<?php

namespace App\AlphaVantage\Value;

final class Stock
{
    private const NAME = 'name';
    private const OPEN = 'open';
    private const HIGH = 'high';
    private const LOW = 'low';
    private const PRICE = 'price';
    private const VOLUME = 'volume';
    private const LATEST_TRADING_DAY = 'latestTradingDay';
    private const PREVIOUS_CLOSE = 'previousClose';
    private const CHANGE = 'change';
    private const CHANGE_PERCENT = 'changePercent';

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
        $this->volume = $data[self::VOLUME];
        $this->latestTradingDay = $data[self::LATEST_TRADING_DAY];
        $this->previousClose = $data[self::PREVIOUS_CLOSE];
        $this->change = $data[self::CHANGE];
        $this->changePercent = $data[self::CHANGE_PERCENT];
    }

    public static function fromArray(array $data): Stock
    {
        return (new Stock())
            ->setName($data[self::NAME])
            ->setOpen($data[self::OPEN])
            ->setHigh($data[self::HIGH])
            ->setLow($data[self::LOW])
            ->setPrice($data[self::PRICE])
            ->setVolume($data[self::VOLUME])
            ->setLatestTradingDay($data[self::LATEST_TRADING_DAY])
            ->setPreviousClose($data[self::PREVIOUS_CLOSE])
            ->setChange($data[self::CHANGE])
            ->setChangePercent($data[self::CHANGE_PERCENT]);
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
            self::NAME => $this->getName(),
            self::OPEN => $this->getOpen(),
            self::HIGH => $this->getHigh(),
            self::LOW => $this->getLow(),
            self::PRICE => $this->getPrice(),
            self::VOLUME => $this->getVolume(),
            self::LATEST_TRADING_DAY => $this->getLatestTradingDay(),
            self::PREVIOUS_CLOSE => $this->getPreviousClose(),
            self::CHANGE => $this->getChange(),
            self::CHANGE_PERCENT => $this->getChangePercent(),
        ];
    }
}
