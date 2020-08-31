<div class="w-full">
    <div class="overflow-x-auto mt-6">
        <table class="table-auto border-collapse w-full">
            <thead>
            <tr class="rounded-lg text-sm font-medium text-gray-200 text-left" style="font-size: 0.9674rem">
                <th class="px-4 py-2 bg-highlight">Version</th>
                <th class="px-4 py-2 bg-highlight">EXILED Version</th>
                <th class="px-4 py-2 bg-highlight">Release Date</th>
                <th class="px-4 py-2 bg-highlight">Downloads</th>
                <th class="px-4 py-2 bg-highlight text-right"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($plugin->releases->sortByDesc('created_at') as $release)
                <tr class="hover:bg-gray-700 border-b border-gray-200 py-10">
                    <td class="px-4 py-4">{{ $release->plugin_version }}</td>
                    <td class="px-4 py-4">{{ $release->exiled_version }}</td>
                    <td class="px-4 py-4">{{ $release->created_at->diffForHumans() }}</td>
                    <td class="px-4 py-4">{{ $release->downloads }}</td>
                    <td class="px-4 py-4 text-right"><a class="hover:underline" href="{{ $release->download_url }}" target="_blank">Download</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
