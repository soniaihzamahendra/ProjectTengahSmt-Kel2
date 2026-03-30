<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Kelompok 2</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</head>
<body class="bg-[#F8F9FA] font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        
        <x-layout.sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <x-layout.header />

            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>

            <x-layout.footer />
        </div>
    </div>
</body>
</html>