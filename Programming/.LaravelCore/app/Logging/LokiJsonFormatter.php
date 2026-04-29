<?php

namespace App\Logging;

use Monolog\Formatter\FormatterInterface;
use Monolog\LogRecord;

class LokiJsonFormatter implements FormatterInterface
{
    private const REDACT_REGEX = '/(password|token|authorization|x-api-key|cookie|secret)/i';
    private const DEFAULT_MAX_BYTES = 65536;

    public function format(LogRecord $record): array
    {
        $context = $record->context;

        $labels = [];
        if (isset($context['phase'])) {
            $labels['phase'] = (string) $context['phase'];
        }
        if (isset($context['method'])) {
            $labels['method'] = (string) $context['method'];
        }
        if (isset($context['response_status'])) {
            $code = (int) $context['response_status'];
            $labels['status'] = match (true) {
                $code >= 500 => '5xx',
                $code >= 400 => '4xx',
                $code >= 300 => '3xx',
                $code >= 200 => '2xx',
                default      => 'other',
            };
        }

        $maxBytes = (int) (env('LOKI_MAX_FIELD_BYTES') ?: self::DEFAULT_MAX_BYTES);
        $payload = $this->sanitize($context, $maxBytes);
        $payload['ts']  = $record->datetime->format('c');
        $payload['msg'] = $record->message;

        $line = json_encode(
            $payload,
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR
        );
        if ($line === false) {
            $line = '{"_error":"json_encode_failed"}';
        }

        $tsNs = sprintf(
            '%d%09d',
            $record->datetime->getTimestamp(),
            ((int) $record->datetime->format('u')) * 1000
        );

        return ['labels' => $labels, 'tuple' => [$tsNs, $line]];
    }

    public function formatBatch(array $records): array
    {
        return array_map(fn (LogRecord $r) => $this->format($r), $records);
    }

    private function sanitize(mixed $value, int $maxBytes): mixed
    {
        if (is_array($value)) {
            $out = [];
            foreach ($value as $k => $v) {
                if (is_string($k) && preg_match(self::REDACT_REGEX, $k)) {
                    $out[$k] = '[REDACTED]';
                    continue;
                }
                $out[$k] = $this->sanitize($v, $maxBytes);
            }
            return $out;
        }
        if (is_string($value) && strlen($value) > $maxBytes) {
            return substr($value, 0, $maxBytes) . '...[truncated]';
        }
        return $value;
    }
}
