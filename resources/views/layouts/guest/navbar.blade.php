<nav class="w-full z-10 bg-black text-stone-400 flex justify-between fixed">
    <a href="/" class="flex jstify-center items-center mx-5">
        <img data-aos="flip-left" data-aos-delay="50" data-aos-duration="1000" data-aos-easing="ease-in-out"
            src="{{ asset('photos/RichStore.png') }}" alt="Brand" width="50">
        <span class="text-stone-400 ml-3 text-xl">Rich Store Bali</span>
    </a>
    <button onclick="toggleNav()" class="md:hidden mx-5">
        <i class="fa-solid fa-bars text-white text-2xl p-5"></i>
    </button>
    <ul id="mobilenav"
        class="mx-5 md:flex md:static absolute top-16 -left-[110%] md:w-auto w-full justify-end gap-5 p-5 duration-300">
        @if (Route::is('welcome'))

            {{-- <a href="#about" class="hover:text-white duration-500">
            <li>About</li>
        </a> --}}
            <a href="#produk" class="hover:text-white duration-500">
                <li>Produk</li>
            </a>
            <a href="#visimisi" class="hover:text-white duration-500">
                <li class="md:pt-0 pt-2">Visi & Misi</li>
            </a>
            <a href="#tatanilai" class="hover:text-white duration-500">
                <li class="md:py-0 py-2">Tata Nilai</li>
            </a>
            <a href="#contacts" class="hover:text-white duration-500">
                <li class="md:py-0 py-2">Contacts</li>
            </a>
            @if (Route::has('login'))
                <li>
                    @auth
                        @can('admin')
                            <a href="{{ url('/admin/product-bookkeeping') }}" class="hover:text-white duration-500">
                                Admin
                            </a>
                        @endcan
                    @else
                        <a href="{{ route('login') }}"
                            class="bg-white py-1.5 px-3 rounded-lg text-black font-bold uppercase hover:bg-green-500 hover:text-white duration-500">
                            Login
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </a>
                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-2">Register</a>
                        @endif --}}
                    @endauth
                </li>
            @endif
            <!-- Settings Dropdown -->
            <div>
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="flex items-center hover:text-white duration-500">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>
        @else
            <a href="/" class="hover:text-white duration-500">
                <li>Home</li>
            </a>
            <!-- Settings Dropdown -->
            <div>
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="flex items-center hover:text-white duration-500">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth
            </div>
        @endif
    </ul>
</nav>
