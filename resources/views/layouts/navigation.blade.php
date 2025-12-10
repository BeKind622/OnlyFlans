<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left -->
            <div class="flex">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="font-bold text-xl text-blue-400">OnlyFlans 🍮</span>
                </a>

                <div class="hidden space-x-8 sm:ml-10 sm:flex">
                    <x-nav-link :href="route('recipes.index')" :active="request()->routeIs('recipes.*')">
                        Recipes
                    </x-nav-link>

                    @auth
                        <x-nav-link :href="route('recipes.mine')" :active="request()->routeIs('recipes.mine')">
                            My Recipes
                        </x-nav-link>
                         @if(auth()->user()?->isAdmin())
                            <x-nav-link :href="route('admin.dashboard')" >
                                Admin
                            </x-nav-link>
                        @endif
                    @endauth

                    
                </div>
            </div>

            <!-- Right -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">

                @guest
                    <x-nav-link :href="route('login')">Log in</x-nav-link>
                    <x-nav-link :href="route('register')">Register</x-nav-link>
                @endguest

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                                <div>{{ Auth::user()->name }}</div>
                                <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                Profile
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

            </div>
            <div class="flex items-center sm:hidden">
    <button
        @click="open = !open"
        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition"
    >
        <!-- Hamburger icon -->
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path
                :class="{ 'hidden': open, 'inline-flex': !open }"
                class="inline-flex"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
            />
            <!-- Close icon -->
            <path
                :class="{ 'hidden': !open, 'inline-flex': open }"
                class="hidden"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12"
            />
        </svg>
    </button>
</div>
        </div>
    </div>
    <div
    x-show="open"
    x-transition
    @click.outside="open = false"
    class="sm:hidden bg-white border-t border-gray-100"
>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
            Home
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('recipes.index')" :active="request()->routeIs('recipes.*')">
            Recipes
        </x-responsive-nav-link>

        @auth
            <x-responsive-nav-link :href="route('recipes.mine')" :active="request()->routeIs('recipes.mine')">
                My Recipes
            </x-responsive-nav-link>

            @if(auth()->user()?->isAdmin())
                <x-responsive-nav-link :href="route('admin.dashboard')">
                    Admin
                </x-responsive-nav-link>
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link
                    :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                >
                    Log out
                </x-responsive-nav-link>
            </form>
        @endauth

        @guest
            <x-responsive-nav-link :href="route('login')">
                Log in
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('register')">
                Register
            </x-responsive-nav-link>
        @endguest
    </div>
</div>

</nav>
