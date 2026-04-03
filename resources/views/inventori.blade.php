@extends('layouts.admin')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold">Inventori Barang</h1>
    <p class="text-gray-500">Daftar stok barang yang tersedia</p>
</div>

@php
$barang = [
    ['nama' => 'Laptop', 'stok' => 10, 'kategori' => 'Elektronik'],
    ['nama' => 'Mouse', 'stok' => 25, 'kategori' => 'Aksesoris'],
    ['nama' => 'Keyboard', 'stok' => 15, 'kategori' => 'Aksesoris'],
    ['nama' => 'Monitor', 'stok' => 8, 'kategori' => 'Elektronik'],
];
@endphp

<div class="bg-white shadow rounded-lg p-4">
    <table class="w-full text-left">
        <thead>
            <tr class="border-b">
                <th class="p-2">No</th>
                <th class="p-2">Nama Barang</th>
                <th class="p-2">Kategori</th>
                <th class="p-2">Stok</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $index => $item)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-2">{{ $index + 1 }}</td>
                <td class="p-2">{{ $item['nama'] }}</td>
                <td class="p-2">{{ $item['kategori'] }}</td>
                <td class="p-2">{{ $item['stok'] }}</td>
                <td class="p-2">
                    @if($item['stok'] > 10)
                        <span class="text-green-600 font-semibold">Aman</span>
                    @else
                        <span class="text-red-600 font-semibold">Menipis</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection