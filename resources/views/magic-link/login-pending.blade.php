<x-guest-layout>
    <div class="text-sm text-gray-600">
        {{ __('We don\'t recognize this device. We\'ve sent an email to :email with a one-time link. You will be automatically signed in here once you click that link.', ['email' => $email]) }}
    </div>
</x-guest-layout>
