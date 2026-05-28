<?php

namespace App\Logging;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;

class LokiHandler extends AbstractProcessingHandler
{
    private array $buffer = [];
    private string $endpoint;
    private float $timeout;
    private array $baseLabels;
    private bool $shutdownRegistered = false;

    public function __construct(
        string $endpoint,
        float $timeout = 0.25,
        array $labels = [],
        int|string|Level $level = Level::Debug,
        bool $bubble = true
    ) {
        parent::__construct($level, $bubble);
        $this->endpoint = $endpoint;
        $this->timeout = $timeout;
        $this->baseLabels = $labels;
    }

    protected function write(LogRecord $record): void
    {
        $this->buffer[] = $record->formatted;
        $this->registerShutdownFlush();
    }

    private function registerShutdownFlush(): void
    {
        if ($this->shutdownRegistered) {
            return;
        }
        $this->shutdownRegistered = true;
        register_shutdown_function([$this, 'flush']);
    }

    public function flush(): void
    {
        if (empty($this->buffer)) {
            return;
        }
        $items = $this->buffer;
        $this->buffer = [];

        try {
            $streams = [];
            foreach ($items as $item) {
                if (!is_array($item) || !isset($item['tuple'])) {
                    continue;
                }
                $labels = array_merge($this->baseLabels, $item['labels'] ?? []);
                ksort($labels);
                $key = json_encode($labels);
                if (!isset($streams[$key])) {
                    $streams[$key] = ['stream' => $labels, 'values' => []];
                }
                $streams[$key]['values'][] = $item['tuple'];
            }

            if (empty($streams)) {
                return;
            }

            \Illuminate\Support\Facades\Http::timeout($this->timeout)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post($this->endpoint, ['streams' => array_values($streams)]);
        } catch (\Throwable $e) {
            try {
                \Illuminate\Support\Facades\Log::channel('single')->warning(
                    'Loki audit push failed',
                    ['error' => $e->getMessage(), 'endpoint' => $this->endpoint]
                );
            } catch (\Throwable) {
            }
        }
    }

    public function close(): void
    {
        $this->flush();
        parent::close();
    }
}
