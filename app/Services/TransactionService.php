<?php

namespace App\Services;

use App\Models\Wallet;

class TransactionService
{
    public static function create($transactionData)
    {
        $wallet = Wallet::find($transactionData['wallet_id']);
        if (!$wallet) {
            return false;
        }

        $balanceBefore = $wallet->balance;
        $balanceAfter = $balanceBefore + $transactionData['amount'];

        if (@$transactionData['model']) {
            $transaction = $transactionData['model']->transaction()->create([
                'wallet_id' => $transactionData['wallet_id'],
                'category' => $transactionData['category'],
                'description' => $transactionData['description'],
                'note' => $transactionData['note'] ?? null,
                'date' => $transactionData['date'],
                'amount' => $transactionData['amount'],
                'balance_before' => $balanceBefore,
                'balance_after' => $balanceAfter,
                'registered_by' => auth()->user()->id,
            ]);
        } else {
            $transaction = $wallet->transactions()->create([
                'category' => $transactionData['category'],
                'description' => $transactionData['description'],
                'note' => $transactionData['note'] ?? null,
                'date' => $transactionData['date'],
                'amount' => $transactionData['amount'],
                'balance_before' => $balanceBefore,
                'balance_after' => $balanceAfter,
                'registered_by' => auth()->user()->id,
            ]);
        }

        if ($transaction) {
            $wallet->update(['balance' => $balanceAfter]);
            return $transaction;
        }

        return false;
    }
}
