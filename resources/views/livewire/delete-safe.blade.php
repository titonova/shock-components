
@setUpXLivewire
{{--
@php dump($attributes,  new Illuminate\View\ComponentAttributeBag); @endphp

@endphp

@dump ($this->tagAttributes) --}}
<span x-show="false">
    @if ($show)
        {{-- Object is: @dump($obj,$this)
        {{ $successMsg }}<br>
        {{ $errorMsg }}<br>
        {{ $notPermittedMsg }}<br> --}}
        @if (!$slot)
        @dump($confirm)
                <!-- Delete button-->
                <span sm x-data="{ title: '{{ $confirmDelMsg }}' }">
                    {{-- <x-button  flat warning
                        icon="{{ $iconName }}"
                        label="{{ $btnLabel }}"

                        x-on:confirm="{
                            title,
                            icon: 'warning',
                            method: 'delete',

                        }"
                        {{ $attributes->filter(fn()=> true)->merge($this->tagAttributes) }}
                        class="{{ $class }}"
                    /> --}}
                    <x-dynamic-component
                    :component="WireUi::component('button')"
                    warning
                    flat
                    x-on:confirm="{{ $confirm }}"
                    {{-- Get all Tag attributes (ie attributes that doon't have a corresponding property
                        on the class) and directly attach them to te wireui button : e.g 'primary'
                        'secondary' etc
                    --}}
                    {{ $attributes->filter(fn()=> false)->merge($this->tagAttributes) }}

                    />
                </span>

        @else
            {{ $slot }}
        @endif

    @endif
</span>
