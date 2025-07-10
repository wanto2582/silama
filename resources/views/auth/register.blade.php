<x-guest-layout>
    <x-slot name="title"> Register </x-slot>
    <x-slot name="heading"> Register </x-slot>
    <form class="tab-wizard2 wizard-circle wizard" method="POST" action="{{ route('register') }}">
    @csrf
        <div class="form-wrap max-width-600 mx-auto">

            {{-- Name --}}

                <div class="input-group custom">
                    <x-text-input
                    id="name"
                    type="text"
                    class="form-control form-control-lg"
                    name="name"
                    :value="old('fullname')"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Nama Lengkap"
                    />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

            {{-- Email --}}
                <div id="email" class="input-group custom">
                    <x-text-input
                    id="email"
                    type="email"
                    class="form-control form-control-lg"
                    name="email"
                    :value="old('email')"
                    required
                    autocomplete="username"
                    placeholder="Alamat Email"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

            {{-- Password --}}
                <div class="input-group custom">
                    <x-text-input
                    id="password"
                    type="password"
                    class="form-control form-control-lg"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

            {{-- Confirm Password --}}
                <div class="input-group custom">
                    <x-text-input
                    id="password_confirmation"
                    type="password"
                    class="form-control form-control-lg"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Konfirmasi Password"
                    />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group mb-0">
                        <x-button.primary-button class="btn btn-primary btn-lg btn-block">
                            {{ __('Register') }}
                        </x-button.primary-button>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <a class="" href="{{ route('login') }}">
                    {{ __('Sudah punya akun?') }}
                </a>
            </div>
        </div>
    </form>

</x-guest-layout>
