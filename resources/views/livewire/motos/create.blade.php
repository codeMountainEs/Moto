<?php

use Livewire\Volt\Component;

new class extends Component {

    #[\Livewire\Attributes\Validate('required|string|max:255')]

    public string $matricula = 'le';
    public bool $existe;

    public function store(): void
    {
        $validated = $this->validate();

        auth()->user()->motos()->create($validated);

        $this->matricula = '';


    }

    public function buscarMatricula(): String
    {
        $validated = $this->validate();


       //$this->matricula = \App\Models\Moto::where('matricula',$validated['matricula'])->firstOrString;



        $moto = \App\Models\Moto::where('matricula', $validated['matricula'])->first();

        if ($moto) {
           return $moto;

        } else {
            return redirect()->back()->with('error', 'Matrícula no encontrada');
        }





    }

}; ?>

<div>
    <form wire:submit="store">
        <textarea
            wire:model="matricula"
            placeholder="{{ __('Dime tu matricula') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>

        <x-input-error :messages="$errors->get('matricula')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Moto') }}</x-primary-button>

    </form>


</div>
