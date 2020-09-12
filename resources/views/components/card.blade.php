<div class="flex flex-col break-words bg-foreground rounded shadow-md text-gray-200">
    @if($title)
    <div class="font-semibold bg-highlight py-3 px-6 mb-0">
        {{ $title }}
    </div>
    @endif

    <div {{ $attributes->merge(['class' => 'px-4 py-3']) }}>
        {{ $slot }}
    </div>
</div>
