@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold">Inventori Barang</h1>
        <p class="text-gray-500">Kelola stok barang dengan mudah</p>
    </div>
    <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Tambah Barang
    </button>
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

    <!-- 🔍 Search -->
    <div class="mb-4">
        <input id="search" type="text" placeholder="Cari barang..."
            onkeyup="cariBarang()"
            class="w-full border rounded-lg px-3 py-2">
    </div>

    <!-- 📊 Table -->
    <table class="w-full text-left">
        <thead>
            <tr class="border-b text-gray-600">
                <th class="p-2">No</th>
                <th class="p-2">Nama Barang</th>
                <th class="p-2">Kategori</th>
                <th class="p-2">Stok</th>
                <th class="p-2">Status</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody  id="table-body">
        </tbody>
    </table>

</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    
    <div class="bg-white p-6 rounded-lg w-96 shadow-lg">
        <h2 class="text-xl font-bold mb-4">Tambah Barang</h2>

        <input id="nama" type="text" placeholder="Nama Barang" class="w-full border p-2 mb-3 rounded">
        <input id="kategori" type="text" placeholder="Kategori" class="w-full border p-2 mb-3 rounded">
        <input id="stok" type="number" placeholder="Stok" class="w-full border p-2 mb-3 rounded">

        <div class="flex justify-end gap-2">
            <button onclick="closeModal()" class="px-3 py-2 bg-gray-300 rounded">Batal</button>
            <button onclick="tambahBarang()" class="px-3 py-2 bg-blue-600 text-white rounded">Simpan</button>
        </div>
    </div>

</div>

<script>
function openModal() {
    document.getElementById('modal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
}
</script>

<script>
let dataBarang = [];
let editIndex = null;

window.onload = function () {
    let data = localStorage.getItem('barang');

    if (data) {
        dataBarang = JSON.parse(data);
        renderTable();
    }
};

function renderTable() {
    let tbody = document.getElementById('table-body');
    tbody.innerHTML = '';

    dataBarang.forEach((item, index) => {
        let status = item.stok > 10
            ? '<span class="bg-green-100 text-green-600 px-2 py-1 rounded text-sm">Aman</span>'
            : '<span class="bg-red-100 text-red-600 px-2 py-1 rounded text-sm">Menipis</span>';

        let row = `
            <tr class="border-b hover:bg-gray-50">
                <td class="p-2">${index + 1}</td>
                <td class="p-2 font-medium">${item.nama}</td>
                <td class="p-2">${item.kategori}</td>
                <td class="p-2">${item.stok}</td>
                <td class="p-2">${status}</td>
                <td class="p-2 flex gap-2">
                    <button onclick="editBarang(${index})" class="bg-yellow-400 px-2 py-1 rounded text-white">Edit</button>
                    <button onclick="hapusBarang(${index})" class="bg-red-500 px-2 py-1 rounded text-white">Hapus</button>
                </td>
            </tr>
        `;

        tbody.innerHTML += row;
    });

    localStorage.setItem('barang', JSON.stringify(dataBarang));
}

function tambahBarang() {
    let nama = document.getElementById('nama').value;
    let kategori = document.getElementById('kategori').value;
    let stok = parseInt(document.getElementById('stok').value);

    if (!nama || !kategori || !stok) {
        alert('Semua field harus diisi!');
        return;
    }

    if (editIndex !== null) {
        dataBarang[editIndex] = { nama, kategori, stok };
        editIndex = null;
    } else {
        dataBarang.push({ nama, kategori, stok });
    }

    renderTable();
    closeModal();

    document.getElementById('nama').value = '';
    document.getElementById('kategori').value = '';
    document.getElementById('stok').value = '';
}

function hapusBarang(index) {
    if (confirm('Yakin mau hapus barang ini?')) {
        dataBarang.splice(index, 1);
        renderTable();
    }
}

function editBarang(index) {
    let item = dataBarang[index];

    document.getElementById('nama').value = item.nama;
    document.getElementById('kategori').value = item.kategori;
    document.getElementById('stok').value = item.stok;

    editIndex = index;
    openModal();
}

function cariBarang() {
    let keyword = document.getElementById('search').value.toLowerCase();

    let tbody = document.getElementById('table-body');
    tbody.innerHTML = '';

    dataBarang.forEach((item, index) => {
        if (
            item.nama.toLowerCase().includes(keyword) ||
            item.kategori.toLowerCase().includes(keyword)
        ) {
            let status = item.stok > 10
                ? '<span class="bg-green-100 text-green-600 px-2 py-1 rounded text-sm">Aman</span>'
                : '<span class="bg-red-100 text-red-600 px-2 py-1 rounded text-sm">Menipis</span>';

            let row = `
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-2">${index + 1}</td>
                    <td class="p-2 font-medium">${item.nama}</td>
                    <td class="p-2">${item.kategori}</td>
                    <td class="p-2">${item.stok}</td>
                    <td class="p-2">${status}</td>
                    <td class="p-2 flex gap-2">
                        <button onclick="editBarang(${index})" class="bg-yellow-400 px-2 py-1 rounded text-white">Edit</button>
                        <button onclick="hapusBarang(${index})" class="bg-red-500 px-2 py-1 rounded text-white">Hapus</button>
                    </td>
                </tr>
            `;

            tbody.innerHTML += row;
        }
    });
}
</script>

@endsection