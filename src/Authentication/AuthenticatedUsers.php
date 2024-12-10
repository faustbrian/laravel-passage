<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage\Authentication;

final readonly class AuthenticatedUsers
{
    public function __construct(
        private Client $client,
    ) {
        //
    }

    public function currentUser(): array
    {
        return $this->client->get(path: 'currentuser')->json('user');
    }

    public function listDevices(): array
    {
        return $this->client->get(path: 'currentuser/devices')->json('devices');
    }

    public function changeEmail(
        string $language,
        string $magicLinkPath,
        string $newEmail,
        string $redirectUrl,
    ): array {
        return $this->client->patch(
            path: 'currentuser/email',
            data: [
                'language' => $language,
                'magic_link_path' => $magicLinkPath,
                'new_email' => $newEmail,
                'redirect_url' => $redirectUrl,
            ],
        )->json('magic_link');
    }

    public function changePhone(
        string $language,
        string $magicLinkPath,
        string $newPhone,
        string $redirectUrl,
    ): array {
        return $this->client->patch(
            path: 'currentuser/email',
            data: [
                'language' => $language,
                'magic_link_path' => $magicLinkPath,
                'new_phone' => $newPhone,
                'redirect_url' => $redirectUrl,
            ],
        )->json('magic_link');
    }

    public function updateDevice(string $deviceId, string $friendlyName): array
    {
        return $this->client->patch(
            path: 'currentuser/devices/'.$deviceId,
            data: ['friendly_name' => $friendlyName],
        )->json('device');
    }

    public function revokeDevice(string $deviceId): array
    {
        return $this->client->delete(path: 'currentuser/devices/'.$deviceId)->json();
    }

    public function startWebAuthnAddDevice(): array
    {
        return $this->client->post(path: 'currentuser/devices/start')->json();
    }

    public function finishWebAuthnAddDevice(): array
    {
        return $this->client->post(path: 'currentuser/devices/finish')->json('device');
    }
}
