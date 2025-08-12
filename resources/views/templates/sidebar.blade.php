<div class="sidebar bg-background shadow-lg h-full min-h-screen w-64 flex flex-col
    fixed z-40 top-0 left-0 transition-transform duration-300
    -translate-x-full md:translate-x-0 md:static md:z-auto md:shadow-none"
    :class="{ '-translate-x-full': !open, 'translate-x-0': open }" x-show="open || window.innerWidth >= 768"
    x-transition:enter="transition-transform duration-300" x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0" x-transition:leave="transition-transform duration-300"
    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
    @keydown.window.escape="open = false" style="display: none;">
    <!-- Mobile Topbar -->
    <div class="md:hidden flex items-center justify-between p-4 border-b border-accent bg-background">
        <div class="font-extrabold text-xl text-primary flex items-center gap-2">
            <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0v6m0 0H7m6 0h6"></path>
            </svg>
            SMAN 6
        </div>
        <button @click="open = false" class="text-secondary focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <!-- Desktop Logo -->
    <div class="hidden md:flex p-6 font-extrabold text-2xl text-primary items-center gap-2">
        <svg class="w-7 h-7 text-secondary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0v6m0 0H7m6 0h6">
            </path>
        </svg>
        SMAN 6
    </div>
    <ul class="flex-1 px-4 py-6 space-y-2">
        <li>
            <a href="/dashboard"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ isset($activeMenu) && $activeMenu === 'dashboard' ? 'bg-accent text-primary' : 'text-primary hover:bg-accent hover:text-secondary' }}">
                <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0v6m0 0H7m6 0h6"></path>
                </svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/kelas"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ isset($activeMenu) && $activeMenu === 'menu1' ? 'bg-accent text-primary' : 'text-primary hover:bg-accent hover:text-secondary' }}">
                <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                        fill="none" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h8"></path>
                </svg>
                Kelas
            </a>
        </li>
        <li>
            <a href="/siswa"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ isset($activeMenu) && $activeMenu === 'siswa' ? 'bg-accent text-primary' : 'text-primary hover:bg-accent hover:text-secondary' }}">
                <svg class="w-5 h-5 text-secondary" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"
                        fill="none" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h8"></path>
                </svg>
                Siswa
            </a>
        </li>
        <li>
            <a href="#"
                class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                {{ isset($activeMenu) && $activeMenu === 'menu2' ? 'bg-accent text-primary' : 'text-primary hover:bg-accent hover:text-secondary' }}">
                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <rect x="4" y="4" width="16" height="16" rx="2" stroke="currentColor"
                        stroke-width="2" fill="none" />
                </svg>
                Menu 2
            </a>
        </li>
    </ul>
    <div class="px-4 pb-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full mt-4 bg-primary hover:bg-secondary text-accent px-4 py-2 rounded shadow transition">
                Logout
            </button>
        </form>
    </div>
</div>
