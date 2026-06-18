<!-- Top Navigation -->
<nav class="bg-primary-700 text-white sticky top-0 z-20 shadow-md" x-data="{ userMenuOpen: false }">
    <div class="h-16 px-4 sm:px-6 lg:px-8 flex items-center justify-between">
        <!-- Left Side - Burger Menu & Title -->
        <div class="flex items-center space-x-4">
            <button @click="sidebarOpen = !sidebarOpen"
                    class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-white hover:bg-primary-600 transition-colors">
                <i class="bi bi-list text-xl"></i>
            </button>

            <div class="hidden lg:block">
                <h2 class="text-lg font-bold text-white">
                    @if(request()->routeIs('dashboard'))
                        Dashboard
                    @elseif(request()->routeIs('barang.*'))
                        Manajemen Barang
                    @elseif(request()->routeIs('mahasiswa.*'))
                        Manajemen Mahasiswa
                    @else
                        {{ config('app.name', 'DiKeDim') }}
                    @endif
                </h2>
            </div>
        </div>

        <!-- Right Side - User Menu -->
        <div class="flex items-center space-x-4">
            <!-- User Dropdown -->
            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open"
                        class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-primary-600 transition-colors">
                    <div class="w-9 h-9 bg-accent-500 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="hidden sm:block">
                        <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-primary-200">{{ Auth::user()->role ?? 'User' }}</p>
                    </div>
                    <i class="bi bi-chevron-down text-white"></i>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" x-transition
                     class="absolute right-0 mt-2 w-48 bg-white text-gray-900 rounded-lg shadow-card border border-gray-200 overflow-hidden">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-3 text-sm hover:bg-gray-50 flex items-center space-x-2">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

