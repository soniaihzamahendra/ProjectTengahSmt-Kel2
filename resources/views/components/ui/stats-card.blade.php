@props(['title', 'value', 'icon', 'color', 'percentage' => null, 'up' => true])

<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100/50 flex flex-col justify-between hover:shadow-md transition-shadow duration-300">
    <div class="flex items-center justify-between mb-4">
        <div class="w-14 h-14 rounded-2xl flex items-center justify-center {{ $color }} shadow-inner">
            <i class="{{ $icon }} text-2xl"></i>
        </div>
        @if($percentage)
            <div class="flex items-center space-x-1 text-sm font-semibold {{ $up ? 'text-green-600' : 'text-red-600' }}">
                <i class="fas {{ $up ? 'fa-caret-up' : 'fa-caret-down' }}"></i>
                <span>{{ $percentage }}</span>
            </div>
        @endif
    </div>
    
    <div>
        <p class="text-sm text-gray-500 font-medium mb-1 tracking-wide uppercase">{{ $title }}</p>
        <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">{{ $value }}</h3>
        @if($percentage)
            <p class="text-xs text-gray-400 mt-1">vs bulan lalu</p>
        @endif
    </div>
</div>