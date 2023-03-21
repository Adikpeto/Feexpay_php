<?php

declare(strict_types=1);

namespace Adikpeto\Feexpay;

class Feexpay
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->clientId = $_ENV['FeexpayPhp_CLIENT_ID'];

        $this->amount = $_ENV['FeexpayPhp_AMOUNT'];
        
        $this->clientToken = $_ENV['FeexpayPhp_CLIENT_TOKEN'];

        $this->callbackUrl = $_ENV['FeexpayPhp_CALLBACK_URL'];

        $this->mode = $_ENV['FeexpayPhp_MODE'];
    }

    /**
     * Create a new Skeleton Instance
     */
    public function __construct(string $id,string $token)
    {
        // constructor body
    
    }

    public function test_initial(): void
    {
        $this->client = new FeexpayPhpClientSDK(
            $this->amount, 
            $this->callbackUrl, 
            $this->clientId, 
            $this->clientToken,GrantType::PKCE, 
            $this->mode);

        $this->assertInstanceOf(FeexpayPhpClientSDK::class, $this->client);
    }

    public function test_initial_empty_client_id(): void
    {
        $this->expectExceptionMessage("SVP, veuillez entrer client_id");
        $this->client = new FeexpayPhpClientSDK(
            $this->amount, 
            $this->callbackUrl,'https://api.feexpay.me/api/shop/63e58bc1fe4c35f54de9749c/get_shop', 
            $this->clientToken,GrantType::PKCE,
            $this->mode);
    }

    public function test_initial_empty_client_Token(): void
    {
        $this->expectExceptionMessage("SVP, veuillez entrer client_Token");
        $this->client = new FeexpayPhpClientSDK(
            $this->amount, 
            $this->callbackUrl, 
            $this->clientId, '63e58bc1fe4c35f54de9749c', GrantType::PKCE, 
            $this->mode);
    }
    public function test_get_grant_type_wrong(): void
    {
        $this->expectExceptionMessage("SVP, veuillez entrer correct grant_type");
        $this->client = new FeexpayPhpClientSDK(
            $this->amount, 
            $this->callbackUrl, 
            $this->clientId, 
            $this->clientToken, GrantType::PKCE, 
            $this->mode);
        $this->client->getGrantType('test123');
    }
    public function test_get_is_authenticated(): void
    {
        $this->client = new FeexpayPhpClientSDK(
            $this->amount, 
            $this->callbackUrl, 
            $this->clientId, 
            $this->clientToken, GrantType::PKCE, 
            $this->mode, 'LIVE', ['audience' => $this->amount . '/api']);
        $this->assertIsBool($this->client->isAuthenticated);
        $this->assertEmpty($this->client->isAuthenticated);
    }

    public function test_login_invalid_code(): void
    {
        $this->expectExceptionMessage("Veuillez fournir une code valide. Expected: string");
        $this->client = new FeexpayPhpClientSDK(
            $this->amount, 
            $this->callbackUrl, 
            $this->clientId, 
            $this->clientToken, GrantType::PKCE, 
            $this->mode);
        $additional = [
            'code' => 123,
            'name' => 'myApplication',
        ];
        $this->client->login($additional);
    }

}
