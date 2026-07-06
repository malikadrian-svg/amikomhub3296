<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        $search = $request->input('search');
        $filter = $request->input('filter');

        $query = Transaction::with('event');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('order_id', 'LIKE', '%' . $search . '%')
                  ->orWhere('customer_name', 'LIKE', '%' . $search . '%')
                  ->orWhere('customer_email', 'LIKE', '%' . $search . '%')
                  ->orWhereHas('event', function($ev) use ($search) {
                      $ev->where('title', 'LIKE', '%' . $search . '%');
                  });
            });
        }

        switch ($filter) {
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'price_desc':
                $query->orderBy('total_price', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('total_price', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        // Menyamakan limit paginasi dengan halaman lainnya
        $transactions = $query->paginate(4);

        return view('admin.transactions.index', compact('transactions', 'search', 'filter'));
    }
}
