<?php

namespace RocketLabs\SellerCenterSdk\Core\Model;

use DateTimeImmutable;
use Exception;

/**
 * Class ModelAbstract
 */
abstract class ModelAbstract
{
    const TYPE_STRING = 'string';
    const TYPE_MIXED = 'mixed';
    const TYPE_BOOL = 'bool';
    const TYPE_INT = 'int';
    const TYPE_FLOAT = 'float';
    const TYPE_DATETIME = 'dateTime';

    /**
     * @var array
     */
    protected array $fieldDefinition = [];

    /**
     * @var array
     */
    protected array $data = [];

    /**
     * @param array $data
     * @throws Exception
     */
    public function __construct(array $data)
    {
        foreach ($this->fieldDefinition as $key => $type) {
            if (!array_key_exists($key, $data) || is_null($data[$key]) || '' === $data[$key]) {
                $this->data[$key] = null;
                continue;
            }

            if (empty($type)) {
                $this->data[$key] = $data[$key];
                continue;
            }

            $this->data[$key] = match ($type) {
                static::TYPE_MIXED, static::TYPE_STRING => $data[$key],
                static::TYPE_BOOL => (bool)$data[$key],
                static::TYPE_INT => (int)$data[$key],
                static::TYPE_FLOAT => (float)$data[$key],
                static::TYPE_DATETIME => new DateTimeImmutable($data[$key]),
                default => $this->buildObjectFromDefinition($type, $data[$key]),
            };
        }
    }

    /**
     * @param string $class
     * @param mixed $data
     * @return mixed
     */
    protected function buildObjectFromDefinition(string $class, mixed $data): mixed
    {
        return new $class($data);
    }

    /**
     * @param array $source
     * @param string $accessor
     * @param $default
     *
     * @return mixed|null
     */
    protected function get(array $source, string $accessor, $default = null): mixed
    {
        if (array_key_exists($accessor, $source)) {
            return $source[$accessor];
        }

        return $default;
    }
}
