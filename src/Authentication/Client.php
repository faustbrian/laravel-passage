<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Authentication;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

final class Client
{
    private PendingRequest $client;

    public function __construct(
        private readonly array $config,
        private readonly ?string $token = null,
    ) {
        $this->client = Http::baseUrl('https://auth.passage.id/v1/apps/'.$config['appId']);

        if (\is_string($token)) {
            $this->client->withToken($token);
        }
    }

    public function withToken(string $token): static
    {
        return new self($this->config, $token);
    }

    public function get(string $path, array $data = []): Response
    {
        return $this->request('get', $path, $data);
    }

    public function delete(string $path, array $data = []): Response
    {
        return $this->request('delete', $path, $data);
    }

    public function patch(string $path, array $data = []): Response
    {
        return $this->request('patch', $path, $data);
    }

    public function post(string $path, array $data = []): Response
    {
        return $this->request('post', $path, $data);
    }

    private function request(string $method, string $path, array $data = []): Response
    {
        return $this->client->{$method}($path, $data)->throw();
    }
}
