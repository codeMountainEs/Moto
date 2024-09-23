<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Validate;


new class extends Component {
    public \App\Models\Moto $moto;

    #[Validate('required|string|max:255')]
    public string $matricula = '';

    public function mount(): void
    {
        $this->matricula = $this->moto->matricula;
    }

    public function update(): void
    {
        $this->authorize('update', $this->moto);

        $validated = $this->validate();

        $this->moto->update($validated);

        $this->dispatch('moto-updated');
    }

    public function cancel(): void
    {
        $this->dispatch('moto-edit-canceled');
    }
}; ?>

<div>
    <form wire:submit="update">
        <textarea
            wire:model="matricula"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>

        <x-input-error :messages="$errors->get('matricula')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        <button class="mt-4" wire:click.prevent="cancel">Cancel</button>
    </form>
</div>
