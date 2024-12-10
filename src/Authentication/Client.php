<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Passage\Authentication;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

final readonly class Client
{
    private PendingRequest $pendingRequest;

    public function __construct(
        private array $config,
        ?string $token = null,
    ) {
        $this->pendingRequest = Http::baseUrl('https://auth.passage.id/v1/apps/'.$config['appId']);

        if (\is_string($token)) {
            $this->pendingRequest->withToken($token);
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
        return $this->pendingRequest->{$method}($path, $data)->throw();
    }
}
