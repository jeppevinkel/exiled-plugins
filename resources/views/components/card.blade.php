<div class="flex flex-col break-words bg-foreground rounded shadow-md text-gray-200">
    @if($title)
        <div class="flex justify-between bg-highlight py-3 px-6 mb-0">
            <div class="font-semibold">
                {{ $title }}
            </div>

            <div>
                {{ $contextButtons ?? null }}
            </div>
        </div>
    @endif

    <div {{ $attributes->merge(['class' => 'px-4 py-3']) }}>
        {{ $slot }}
    </div>
</div>
