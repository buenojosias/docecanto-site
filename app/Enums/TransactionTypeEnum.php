<?php

namespace App\Enums;

enum TransactionTypeEnum: string
{
    case INCOME = 'income';
    case EXPENSE = 'expense';
    case TRANSFER = 'transfer';

    public function label(): string
    {
        return match ($this) {
            self::INCOME => 'Entrada',
            self::EXPENSE => 'Saída',
            self::TRANSFER => 'Transferência',
        };
    }
}
