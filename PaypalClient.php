<?php

namespace Sample;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
//use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\LiveEnvironment;

ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
     */
    public static function environment()
    {
        $liveid = "Ab6HlNbUVsy9Qz90YXanfOquyv7qZdtHQxbrzqY5ZASTvZdm9bfRyHi72UrBwO6Q_hW8WtgeN0NnieGH"; $livesec = "EG4ksmbvNNXUxgnJHcbzEtwmejlxMUZMFrUwZTyKP7mYJ5bZLTDlh8t1sv0VfkQ5L7-r0J67EM1zLSFc";
        $sandbox = "AfgYATIfVWBGwQVce9ggpT8F3cpdMckdMmaf525u6IvyLjD1oL8RTiTqHVZrUWMvn7Un6r2q_qDehBJY"; $sandboxsec = "ECi9S1n5jjMDebCT9tRhvXyCpCrM60J9elBFD1ostrPT5StduTQ5SSv69-mqIduFPjrdwaaCbo0ibVP2";
        $clientId = getenv("CLIENT_ID") ?: $liveid;
        $clientSecret = getenv("CLIENT_SECRET") ?: $livesec;
        return new SandboxEnvironment($clientId, $clientSecret);
    }
}