<?php

namespace App\Enums;

enum TransactionMethodEnum: string
{
    case CASH = 'cash';
    case PIX = 'pix';
    case DEBIT_CARD = 'debit_card';
    case BANK_TRANSFER = 'bank_transfer';

    public function label(): string
    {
        return match ($this) {
            self::CASH => 'Dinheiro',
            self::PIX => 'PIX',
            self::DEBIT_CARD => 'Cartão de débito',
            self::BANK_TRANSFER => 'Transferência bancária',
        };
    }
}
