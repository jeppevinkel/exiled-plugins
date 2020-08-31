<div>
    <ul class="flex border-b border-gray-400">
        <li class="@if(Route::currentRouteName() == 'plugins.show') -mb-px @endif mr-1">
            <a class="bg-highlight inline-block border-gray-400 @if(Route::currentRouteName() == 'plugins.show') border-l border-t border-r rounded-t text-gray-100 @else text-gray-300 hover:text-gray-200 @endif py-2 px-4 font-semibold" href="{{ route('plugins.show', ['plugin' => $plugin]) }}">Overview</a>
        </li>
        <li class="@if(Route::current()->parameter('page') == 'releases') -mb-px @endif mr-1">
            <a class="bg-highlight inline-block border-gray-400 @if(Route::current()->parameter('page') == 'releases') border-l border-t border-r rounded-t text-gray-100 @else text-gray-300 hover:text-gray-200 @endif py-2 px-4 font-semibold" href="{{ route('plugins.show.page', ['plugin' => $plugin, 'page' => 'releases']) }}">Releases</a>
        </li>
    </ul>
</div>
