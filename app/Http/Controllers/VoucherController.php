<?php
namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::latest()->paginate(10);
        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        return view('admin.vouchers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:1000',
        ]);

        for ($i = 0; $i < $request->quantity; $i++) {
            Voucher::create([
                'code' => strtoupper(Str::random(6)),
            ]);
        }

        return redirect()->route('admin.vouchers.index')->with('success', 'Vouchers generated successfully.');
    }

    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return back()->with('success', 'Voucher deleted.');
    }
}
