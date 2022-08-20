
@setUpXLivewire

@if ($show)
    <span>
            @if (!$slot)
                    <!-- Delete button-->
                    @if($confirm)
                        <span sm x-data="{ title: '{{ $confirmDelMsg }}' }">
                            <x-dynamic-component
                                :component="WireUi::component('button')"
                                label="Delete"
                                warning
                                flat
                                x-on:confirm="{!! $confirm !!}"
                                {{-- Get all Tag attributes (ie attributes that doon't have a corresponding property
                                    on the class) and directly attach them to te wireui button : e.g 'primary'
                                    'secondary' etc
                                --}}

                                {{ $attributes->filter(fn()=> false)->merge($this->tagAttributes)}}
                            />
                        </span>
                    @else
                        <x-dynamic-component
                            :component="WireUi::component('button')"
                            icon="x"
                            warning
                            flat
                            wire:click='delete'
                            {{-- Get all Tag attributes (ie attributes that doon't have a corresponding property
                                on the class) and directly attach them to te wireui button : e.g 'primary'
                                'secondary' etc
                            --}}

                            {{ $attributes->filter(fn()=> false)->merge($this->tagAttributes)}}

                        />
                    @endif

            @else
                {{ $slot }}
            @endif


    </span>
@endif
