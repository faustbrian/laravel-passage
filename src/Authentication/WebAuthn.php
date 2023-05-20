<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Authentication;

final readonly class WebAuthn
{
    public function __construct(private Client $client)
    {
        //
    }

    public function startWebAuthnLogin(string $identifier): array
    {
        return $this->client->post(
            path: 'login/webauthn/start',
            data: ['identifier' => $identifier],
        )->json();
    }

    public function finishWebAuthnLogin(
        string $handshakeId,
        array $handshakeResponse,
        string $userId,
    ): array {
        return $this->client->post(
            path: 'login/webauthn/finnish',
            data: [
                'handshake_id' => $handshakeId,
                'handshake_response' => $handshakeResponse,
                'user_id' => $userId,
            ],
        )->json('auth_result');
    }

    public function startWebAuthnRegister(string $identifier): array
    {
        return $this->client->post(
            path: 'register/webauthn/start',
            data: ['identifier' => $identifier],
        )->json();
    }

    public function finishWebAuthnRegister(
        string $credType,
        string $handshakeId,
        array $handshakeResponse,
        string $userId,
    ): array {
        return $this->client->post(
            path: 'register/webauthn/finish',
            data: [
                'cred_type' => $credType,
                'handshake_id' => $handshakeId,
                'handshake_response' => $handshakeResponse,
                'user_id' => $userId,
            ],
        )->json('auth_result');
    }
}
