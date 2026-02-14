<x-layouts::auth>
    <div class="flex flex-col gap-6">
        <x-auth-header
            :title="__('Подтвердите, что это Вы')"
            :description="__('Это защищенная область приложения. Пожалуйста, подтвердите, что это действительно Вы, прежде чем продолжить.')"
        />

        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.confirm.store') }}" class="flex flex-col gap-6">
            @csrf

            <flux:input
                name="password"
                :label="__('Пароль')"
                type="password"
                required
                autocomplete="current-password"
                :placeholder="__('Выш пароль...')"
                viewable
            />

            <flux:button variant="primary" type="submit" class="w-full" data-test="confirm-password-button">
                {{ __('Подвтерждаю') }}
            </flux:button>
        </form>
    </div>
</x-layouts::auth>
