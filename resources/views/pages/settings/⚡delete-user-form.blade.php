<?php

use App\Concerns\PasswordValidationRules;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component {
    use PasswordValidationRules;

    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => $this->currentPasswordRules(),
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <flux:heading>{{ __('Удалить аккаунт') }}</flux:heading>
        <flux:subheading>{{ __('Удалить свой аккаунт и все связанные данные') }}</flux:subheading>
    </div>

    <flux:modal.trigger name="confirm-user-deletion">
        <flux:button variant="danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')" data-test="delete-user-button">
            {{ __('Удалить аккаунт') }}
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
        <form method="POST" wire:submit="deleteUser" class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Вы точно уверены, что хотите удалить учётку?') }}</flux:heading>

                <flux:subheading>
                    {{ __('После удаления, восстановить учётную запись и связанные данные уже будет невозможно. Пожалуйста, введите свой пароль, чтобы подвтердить, что вы хотите удалить свою учётную запись безвозвратно.') }}
                </flux:subheading>
            </div>

            <flux:input wire:model="password" :label="__('Пароль')" type="password" />

            <div class="flex justify-end space-x-2 rtl:space-x-reverse">
                <flux:modal.close>
                    <flux:button variant="filled">{{ __('Отмена!!!') }}</flux:button>
                </flux:modal.close>

                <flux:button variant="danger" type="submit" data-test="confirm-delete-user-button">
                    {{ __('Безвозвратно удалить') }}
                </flux:button>
            </div>
        </form>
    </flux:modal>
</section>
