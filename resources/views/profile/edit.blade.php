<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Profile Update Form --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if (session('status') === 'profile-updated')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('Profile updated successfully.') }}
                        </div>
                    @endif

                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Update Password Form --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @if (session('status') === 'password-updated')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('Password updated successfully.') }}
                        </div>
                    @endif

                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Delete User Account --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
