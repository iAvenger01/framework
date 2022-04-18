<?php

namespace App\Core;

class Config extends Singleton
{
    private array $config;

    public function get(string $key, mixed $default = null)
    {
        return $this->config[$key] ?? $default;
    }

    public function setConfig()
    {
        foreach (scandir(__DIR__ . '/../../config') as $file) {
            $fileSetting = preg_match("/(.*).php/", $file, $matches);
            if (isset($matches[1])) {
                $this->config[$matches[1]] = require __DIR__ . '/../../config' . $file;
            }
        }
    }
}