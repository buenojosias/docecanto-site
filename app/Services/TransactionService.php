<?php

namespace App\Services;

use App\Models\Wallet;

class TransactionService
{
    public static function create($transactionData)
    {
        $wallet = Wallet::find($transactionData['wallet_id']);
        if (! $wallet) {
            return false;
        }

        $balanceAfter = $wallet->balance + $transactionData['amount'];

        $transactionAttributes = [
            'category' => $transactionData['category'],
            'description' => $transactionData['description'],
            'note' => $transactionData['note'] ?? null,
            'date' => $transactionData['date'],
            'type' => $transactionData['type'] ?? 'income',
            'method' => $transactionData['method'] ?? 'cash',
            'amount' => $transactionData['amount'],
            'balance_after' => $balanceAfter,
            'registered_by' => auth()->user()->id,
        ];

        if (@$transactionData['model']) {
            $transactionAttributes['wallet_id'] = $transactionData['wallet_id'];
            $transaction = $transactionData['model']->transaction()->create($transactionAttributes);
        } else {
            $transaction = $wallet->transactions()->create($transactionAttributes);
        }

        if ($transaction) {
            $wallet->update(['balance' => $balanceAfter]);

            return $transaction;
        }

        return false;
    }
}
