<x-guest-layout>
    <div class="text-sm text-gray-600">
        {{ __('Thanks for signing up! We\'ve sent an email to :email with a one-time link. You will be automatically signed in here once you click that link.', ['email' => $email]) }}
    </div>
</x-guest-layout>
