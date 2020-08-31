<div class="flex justify-between w-full pt-6">
    <p class="ml-3">{{ $plugin->name }}</p>

    @if(count($plugin->releases))
        <a class="rounded bg-highlight p-3 hover:bg-gray-500" href="{{ route('plugin-releases.show', ['pluginRelease' => $plugin->getLatestRelease()]) }}" target="_blank">Download</a>
    @endif
</div>
