@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-4">
    <div class="bg-blue-400 p-8 rounded-3xl flex items-center justify-between mb-8 shadow-xl shadow-indigo-100">
        <div class="text-white max-w-lg">
            <h1 class="text-3xl font-extrabold mb-2 tracking-tight">Selamat Datang, Admin Kel-2!!</h1>
            <p class="text-indigo-100 text-sm leading-relaxed">Hari ini ada <span class="font-bold text-white">43 barang masuk</span> dan <span class="font-bold text-white">8 mutasi pending</span>. Jangan lupa cek stok tipis!</p>
        </div>
        <div class="w-40 h-40 flex items-center justify-center bg-white/10 rounded-full border-4 border-white/20">
            <i class="fas fa-boxes text-white text-6xl opacity-50"></i>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        @foreach($stats as $item)
            <x-ui.stats-card 
                :title="$item['title']" 
                :value="$item['value']" 
                :icon="$item['icon']" 
                :color="$item['color']" 
                :percentage="$item['percentage']"
                :up="$item['up']"
            />
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-100/50 overflow-hidden">
            <div class="p-6 border-b border-gray-50 flex justify-between items-center bg-gray-50/50">
                <h3 class="font-bold text-gray-800 text-lg">Aktivitas Terakhir</h3>
                <a href="#" class="text-indigo-600 text-xs font-bold hover:underline">Lihat Semua</a>
            </div>
            <table class="w-full text-left">
                <thead class="bg-gray-50/50 border-b">
                    <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        <th class="px-6 py-4">Kode</th>
                        <th class="px-6 py-4">Barang</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($recent_activities as $activity)
                    <tr class="hover:bg-indigo-50/30 transition">
                        <td class="px-6 py-4 font-mono text-sm text-indigo-700 font-medium">{{ $activity['code'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $activity['item'] }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1.5 bg-{{ $activity['color'] }}-100 text-{{ $activity['color'] }}-700 rounded-lg text-[11px] font-bold uppercase tracking-wider">
                                {{ $activity['status'] }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100/50">
            <h3 class="font-bold text-gray-800 text-lg mb-6">Aksi Cepat</h3>
            <div class="space-y-4">
                <button class="w-full flex items-center p-4 bg-indigo-50/50 border border-indigo-100 text-indigo-700 rounded-xl hover:bg-indigo-100 transition">
                    <i class="fas fa-plus-circle mr-3 text-xl"></i> <span>Tambah Barang Baru</span>
                </button>
                <button class="w-full flex items-center p-4 bg-green-50/50 border border-green-100 text-green-700 rounded-xl hover:bg-green-100 transition">
                    <i class="fas fa-arrow-down mr-3 text-xl"></i> <span>Catat Barang Masuk</span>
                </button>
                <button class="w-full flex items-center p-4 bg-red-50/50 border border-red-100 text-red-700 rounded-xl hover:bg-red-100 transition">
                    <i class="fas fa-arrow-up mr-3 text-xl"></i> <span>Catat Barang Keluar</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection