<?php

use Livewire\Volt\Component;
use Livewire\Attributes\On;

new class extends Component {
    public \Illuminate\Database\Eloquent\Collection $motos;

    public ?\App\Models\Moto $editing = null;

    public function mount(): void
    {
        $this->getMotos();
    }

    #[On('moto-created')]
    public function getMotos(): void
    {
        $this->motos = \App\Models\Moto::with('user')
            ->latest()
            ->get();
    }

    #[On('moto-edit-canceled')]
    #[On('moto-updated')]
    public function disableEditing(): void
    {
        $this->editing = null;

        $this->getMotos();
    }

    public function edit(\App\Models\Moto $moto): void
    {
        $this->editing = $moto;
       // dd($this->edititng , $moto);
        $this->getMotos();
    }

    public function delete(\App\Models\Moto $moto): void
    {
        $this->authorize('delete', $moto);

        $moto->delete();

        $this->getMotos();
    }


}; ?>

<div>
    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        @foreach ($motos as $moto)
            <div class="p-6 flex space-x-2" wire:key="{{ $moto->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $moto->user->name }}</span>
                            <small class="ml-2 text-sm text-gray-600">{{ $moto->created_at->format('j M Y, g:i a') }}</small>

                            @unless ($moto->created_at->eq($moto->updated_at))
                                <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                            @endunless

                        </div>
                        @if ($moto->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link wire:click="edit({{ $moto->id }})">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link wire:click="delete({{ $moto->id }})" wire:confirm="Estas seguro de borrar esta Moto?">
                                    {{ __('Delete') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                        @endif
                    </div>

                    @if ($moto->is($editing))
                        <livewire:motos.edit :moto="$moto" :key="$moto->id" />
                    @else

                        <p class="mt-4 text-lg text-gray-900">{{ $moto->matricula }}</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
