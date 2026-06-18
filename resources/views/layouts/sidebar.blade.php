<!-- Sidebar -->
<div :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
     class="fixed inset-y-0 left-0 z-40 w-64 bg-gradient-to-b from-primary-700 to-primary-800 text-white transform transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 lg:inset-auto overflow-y-auto">

    <!-- Logo -->
    <div class="p-6 border-b border-primary-600">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <!-- Logo with Accent Color -->
                <div class="w-10 h-10 bg-accent-500 rounded-lg flex items-center justify-center">
                    <i class="bi bi-box-seam text-white font-bold text-lg"></i>
                </div>
                <div>
                    <h1 class="text-lg font-bold">DiKeDim</h1>
                    <p class="text-xs text-primary-200">Inventory</p>
                </div>
            </div>
            <button @click="sidebarOpen = false" class="lg:hidden text-white hover:bg-primary-600 p-1 rounded">
                <i class="bi bi-x text-xl"></i>
            </button>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="p-6 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
           class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-accent-500' : 'hover:bg-primary-600' }}">
            <i class="bi bi-house-door-fill text-lg"></i>
            <span class="font-medium">Dashboard</span>
        </a>

        <!-- Barang/Inventory Section -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition-colors hover:bg-primary-600">
                <div class="flex items-center space-x-3">
                    <i class="bi bi-box text-lg"></i>
                    <span class="font-medium">Barang</span>
                </div>
                <i class="bi" :class="open ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
            </button>

            <div x-show="open" class="ml-4 mt-1 space-y-1 border-l border-primary-600 pl-3">
                <a href="{{ route('barang.index') }}"
                   class="flex items-center space-x-3 px-4 py-2 rounded text-sm transition-colors {{ request()->routeIs('barang.*') ? 'bg-accent-500 bg-opacity-50 text-white' : 'text-primary-100 hover:text-white' }}">
                    <i class="bi bi-list-ul"></i>
                    <span>Daftar Barang</span>
                </a>
                <a href="{{ route('barang.create') }}"
                   class="flex items-center space-x-3 px-4 py-2 rounded text-sm transition-colors text-primary-100 hover:text-white">
                    <i class="bi bi-plus-circle"></i>
                    <span>Tambah Barang</span>
                </a>
            </div>
        </div>

        <!-- Kategori -->
        <a href="#"
           class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors hover:bg-primary-600">
            <i class="bi bi-tags text-lg"></i>
            <span class="font-medium">Kategori</span>
        </a>

        <!-- Petugas -->
        <a href="#"
           class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-colors hover:bg-primary-600">
            <i class="bi bi-person-badge text-lg"></i>
            <span class="font-medium">Petugas</span>
        </a>
    </nav>

    <!-- Sidebar Footer -->
    <div class="absolute bottom-0 w-full p-6 border-t border-primary-500">
        <div class="text-xs text-primary-100">
            <p class="mb-3">Version 1.0</p>
            <p>&copy; {{ date('Y') }} Dikedim</p>
        </div>
    </div>
</div>

<!-- Sidebar Overlay -->
<div :class="sidebarOpen ? 'block' : 'hidden'"
     @click="sidebarOpen = false"
     class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden"></div>
