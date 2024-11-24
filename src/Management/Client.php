<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage\Management;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

final class Client
{
    private PendingRequest $client;

    private PendingRequest $clientByApp;

    public function __construct(
        private readonly array $config,
    ) {
        $this->client = Http::baseUrl('https://api.passage.id/v1/apps');
        $this->clientByApp = Http::baseUrl('https://api.passage.id/v1/apps/'.$config['appId']);
    }

    public function withToken(string $token): static
    {
        return new self($this->config, $this->client->withToken($token));
    }

    public function get(string $path, array $data = []): Response
    {
        return $this->request('get', $path, $data);
    }

    public function getByApp(string $path, array $data = []): Response
    {
        return $this->requestByApp('get', $path, $data);
    }

    public function delete(string $path, array $data = []): Response
    {
        return $this->request('delete', $path, $data);
    }

    public function deleteByApp(string $path, array $data = []): Response
    {
        return $this->requestByApp('delete', $path, $data);
    }

    public function patch(string $path, array $data = []): Response
    {
        return $this->request('patch', $path, $data);
    }

    public function patchByApp(string $path, array $data = []): Response
    {
        return $this->requestByApp('patch', $path, $data);
    }

    public function post(string $path, array $data = []): Response
    {
        return $this->request('post', $path, $data);
    }

    public function postByApp(string $path, array $data = []): Response
    {
        return $this->requestByApp('post', $path, $data);
    }

    private function request(string $method, string $path, array $data = []): Response
    {
        return $this->client->{$method}($path, $data)->throw();
    }

    private function requestByApp(string $method, string $path, array $data = []): Response
    {
        return $this->clientByApp->{$method}($path, $data)->throw();
    }
}
