<div>
    @isset($jsPath)
        <script>
            {!! file_get_contents($jsPath) !!}
        </script>
    @endisset
    @isset($cssPath)
        <style>
            {!! file_get_contents($cssPath) !!}
        </style>
    @endisset

    <div x-data="LivewireUIModal()" x-init="init()" x-on:close.stop="setShowPropertyTo(false)"
        x-on:keydown.escape.window="closeModalOnEscape()"
        x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
        x-on:keydown.shift.tab.prevent="prevFocusable().focus()" x-show="show" class="livewire-ui-modal"
        style="display: none;">
        <div class="modal-wrapper">
            <div x-show="show" x-on:click="closeModalOnClickAway()" class="modal-close">
                <div class="modal-background"></div>
            </div>

            <span class="modal-d" aria-hidden="true">&#8203;</span>

            <div x-show="show && showActiveComponent" x-bind:class="modalWidth" class="modal" id="modal-container">
                @forelse($components as $id => $component)
                    <div x-show.immediate="activeComponent == '{{ $id }}'" x-ref="{{ $id }}"
                        wire:key="{{ $id }}">
                        @livewire($component['name'], $component['attributes'], key($id))
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
