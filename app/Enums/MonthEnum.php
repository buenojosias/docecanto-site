<?php

namespace App\Enums;

enum MonthEnum: int
{
    case JANUARY = 1;
    case FEBRUARY = 2;
    case MARCH = 3;
    case APRIL = 4;
    case MAY = 5;
    case JUNE = 6;
    case JULY = 7;
    case AUGUST = 8;
    case SEPTEMBER = 9;
    case OCTOBER = 10;
    case NOVEMBER = 11;
    case DECEMBER = 12;

    public function getName(): string
    {
        return match ($this) {
            self::JANUARY => 'Janeiro',
            self::FEBRUARY => 'Fevereiro',
            self::MARCH => 'Março',
            self::APRIL => 'Abril',
            self::MAY => 'Maio',
            self::JUNE => 'Junho',
            self::JULY => 'Julho',
            self::AUGUST => 'Agosto',
            self::SEPTEMBER => 'Setembro',
            self::OCTOBER => 'Outubro',
            self::NOVEMBER => 'Novembro',
            self::DECEMBER => 'Dezembro',
        };
    }

    public function getShortName(): string
    {
        return match ($this) {
            self::JANUARY => 'Jan',
            self::FEBRUARY => 'Fev',
            self::MARCH => 'Mar',
            self::APRIL => 'Abr',
            self::MAY => 'Mai',
            self::JUNE => 'Jun',
            self::JULY => 'Jul',
            self::AUGUST => 'Ago',
            self::SEPTEMBER => 'Set',
            self::OCTOBER => 'Out',
            self::NOVEMBER => 'Nov',
            self::DECEMBER => 'Dez',
        };
    }
}
