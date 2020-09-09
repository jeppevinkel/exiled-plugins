<div class="block">
    <div class="relative">
        <button onclick="toggleAccountDropdown()" class="block h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white dropbtn">
            <img class="h-full w-full object-cover dropbtn" src="{{ $user->getAvatar() }}" alt="Your avatar">
        </button>
        <div id="account-dropdown" class="absolute right-0 mt-2 py-2 w-48 bg-foreground rounded-lg shadow-xl dropdown-content border border-highlight hidden">
            <a href="{{ route('plugins.index') }}"
               class="block px-4 py-2 text-gray-300 hover:bg-highlight hover:text-white">Plugins</a>
            <a href="{{ route('home') }}"
               class="block px-4 py-2 text-gray-300 hover:bg-highlight hover:text-white">Home</a>
            @can('manage-users')
                <a href="{{ route('admin.users.index') }}"
                   class="block px-4 py-2 text-gray-300 hover:bg-highlight hover:text-white">Manage Users</a>
            @endcan
            <a href="{{ route('logout') }}"
               class="block px-4 py-2 text-gray-300 hover:bg-highlight hover:text-white"
               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
        </div>
    </div>

    <script>
        function toggleAccountDropdown() {
            $('#account-dropdown').toggle();
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                console.log(event.target);
                $(".dropdown-content").hide();
            }
        }
    </script>
</div>
