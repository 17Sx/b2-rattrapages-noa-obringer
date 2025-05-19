<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class SupabaseService
{
    private string $url;
    private string $anonKey;
    private string $serviceRoleKey;

    public function __construct(ParameterBagInterface $params)
    {
        $this->url = $params->get('app.supabase.url');
        $this->anonKey = $params->get('app.supabase.anon_key');
        $this->serviceRoleKey = $params->get('app.supabase.service_role_key');
    }

    public function getClient()
    {
        return new \Supabase\Client($this->url, $this->anonKey);
    }

    public function getAdminClient()
    {
        return new \Supabase\Client($this->url, $this->serviceRoleKey);
    }
}
