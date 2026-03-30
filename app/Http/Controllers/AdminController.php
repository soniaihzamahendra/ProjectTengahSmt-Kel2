<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            ['title' => 'Total Produk', 'value' => '1.284', 'icon' => 'fas fa-box', 'color' => 'bg-indigo-100 text-indigo-600', 'percentage' => '12%', 'up' => true],
            ['title' => 'Barang Masuk', 'value' => '43', 'icon' => 'fas fa-arrow-down', 'color' => 'bg-green-100 text-green-600', 'percentage' => '25%', 'up' => true],
            ['title' => 'Stok Keluar', 'value' => '12', 'icon' => 'fas fa-arrow-up', 'color' => 'bg-red-100 text-red-600', 'percentage' => '5%', 'up' => false],
            ['title' => 'Mutasi Pending', 'value' => '8', 'icon' => 'fas fa-clock', 'color' => 'bg-orange-100 text-orange-600', 'percentage' => null, 'up' => true],
        ];

        $recent_activities = [
            ['code' => 'MUT-0092', 'item' => 'Kabel Supreme 3x2.5 (50m)', 'type' => 'Masuk', 'status' => 'Selesai', 'time' => '2 menit lalu', 'color' => 'green'],
            ['code' => 'INV-0120', 'item' => 'Lampu LED Philips 12W', 'type' => 'Opname', 'status' => 'Selisih', 'time' => '1 jam lalu', 'color' => 'red'],
            ['code' => 'MUT-0091', 'item' => 'Stopkontak Broco (Isi 10)', 'type' => 'Keluar', 'status' => 'Pending', 'time' => '3 jam lalu', 'color' => 'orange'],
            ['code' => 'MUT-0090', 'item' => 'Fitting Lampu Plafon', 'type' => 'Masuk', 'status' => 'Selesai', 'time' => 'Kemerin', 'color' => 'green'],
        ];

        return view('pages.dashboard', compact('stats', 'recent_activities'));
    }
}
