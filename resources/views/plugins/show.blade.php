@extends('layouts.plugins')

@section('title', $plugin->name)

@section('content')
    <div class="bg-foreground pb-4 px-4 rounded-md w-full text-white">
        <div class="">
            <x-plugin-header :plugin="$plugin"/>
        </div>

        <div class="pt-2 pb-2">
            <x-plugin-nav-bar :plugin="$plugin"/>
        </div>

        <div class="w-full px-2 mt-2 markdown">
            {{ Illuminate\Mail\Markdown::parse($plugin->description) }}
{{--            @php--}}
{{--                $dom = new DOMDocument();--}}
{{--                $dom->loadHTML(Illuminate\Mail\Markdown::parse('# TEST--}}

{{--            Test2'));--}}

{{--                foreach ($dom->getElementsByTagName('h1') as $k => $table)--}}
{{--                {--}}
{{--                    //dd($dom->getElementsByTagName('code'));--}}
{{--                    // Within Each Table, Find the IMGs and Loop--}}
{{--                    //$imgs = $table->;--}}
{{--                    $table->setAttribute('class', 'markdown');--}}
{{--                    //foreach ($imgs as $k2 => $img)--}}
{{--                    //{--}}
{{--                    //    // Set the IMGs Class attribute to whatever you want--}}
{{--                    //    $img->setAttribute('class', 'markdown');--}}
{{--                    //}--}}
{{--                }--}}
{{--                $html = $dom->saveHTML();--}}
{{--                echo $html;--}}
{{--            @endphp--}}
        </div>
        <div class="overflow-x-auto mt-6">

        </div>
    </div>
@endsection
