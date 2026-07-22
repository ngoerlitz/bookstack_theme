<?php

namespace Vatger\AuthProvider;

use SocialiteProviders\Manager\OAuth2\AbstractProvider;
use SocialiteProviders\Manager\OAuth2\User;
use SocialiteProviders\Manager\SocialiteWasCalled;

class Provider extends AbstractProvider
{
    public const IDENTIFIER = 'vatger';

    protected $scopes = ['full_name', 'email'];

    protected $scopeSeparator = ' ';

    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase($this->getInstanceUri() . 'oauth/authorize', $state);
    }

    protected function getTokenUrl()
    {
        return $this->getInstanceUri() . 'oauth/token';
    }

    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get($this->getInstanceUri() . 'api/user', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    protected function mapUserToObject(array $user)
    {
        $u = $user['data'];

        return (new User())
            ->setRaw($user)
            ->map([
                'id' => $u['cid'],
                'nickname' => $u['personal']['name_first'],
                'name' => $u['personal']['name_full'],
                'email' => $u['personal']['email'],
                'avatar' => null
            ]);
    }

    private function getInstanceUri()
    {
        return $this->getConfig('instance_uri', 'https://auth-dev.vatsim.net/');
    }
}

class ExtendSocialite
{
    public function handle(SocialiteWasCalled $event): void
    {
        $event->extendSocialite(
            Provider::IDENTIFIER,
            Provider::class,
        );
    }
}
