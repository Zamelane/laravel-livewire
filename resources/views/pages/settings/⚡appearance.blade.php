<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::admin')] class extends Component {
    //
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Appearance Settings') }}</flux:heading>

    <x-pages::settings.layout :heading="__('Оформление')" :subheading="__('Измените параметры офорления для своей учётной записи')">
        <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
            <flux:radio value="light" icon="sun">{{ __('Светлое') }}</flux:radio>
            <flux:radio value="dark" icon="moon">{{ __('Тёмное') }}</flux:radio>
            <flux:radio value="system" icon="computer-desktop">{{ __('Как в системе') }}</flux:radio>
        </flux:radio.group>
    </x-pages::settings.layout>
</section>
