<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Authentication;

final readonly class MagicLinks
{
    public function __construct(private Client $client)
    {
        //
    }

    public function login(
        string $identifier,
        ?string $language = null,
        ?string $magicLinkPath = null,
    ): array {
        return $this->client->post(
            path: 'login/magic-link',
            data: [
                'identifier' => $identifier,
                'language' => $language,
                'magic_link_path' => $magicLinkPath,
            ],
        )->json('magic_link');
    }

    public function register(
        string $identifier,
        ?string $language = null,
        ?string $magicLinkPath = null,
    ): array {
        return $this->client->post(
            path: 'register/magic-link',
            data: [
                'identifier' => $identifier,
                'language' => $language,
                'magic_link_path' => $magicLinkPath,
            ],
        )->json('magic_link');
    }

    public function status(string $id): array
    {
        return $this->client->post(
            path: 'magic-link/status',
            data: ['id' => $id],
        )->json('auth_result');
    }

    public function activate(string $magicLink): array
    {
        return $this->client->patch(
            path: 'magic-link/activate',
            data: ['magic_link' => $magicLink],
        )->json('auth_result');
    }
}
