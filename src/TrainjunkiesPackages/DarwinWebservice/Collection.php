<?php

namespace TrainjunkiesPackages\DarwinWebservice;

class Collection implements \IteratorAggregate, \Countable, \ArrayAccess, \JsonSerializable
{
    private $items = [];

    public function __construct($items)
    {
        $this->items = $items;
    }

    public static function make($items)
    {
        return new static($items);
    }

    public function each(callable $function)
    {
        foreach ($this->items as $key => $item) {
            $function($item, $key);
        }
    }

    public function map(callable $function)
    {
        return new static(array_map($function, $this->items));
    }

    public function filter(callable $function)
    {
        return new static(array_filter($this->items, $function));
    }

    public function reject(callable $function)
    {
        return $this->filter(function ($item) use ($function) {
            return !$function($item);
        });
    }

    public function reduce(callable $callback, $initial = null)
    {
        return array_reduce($this->items, $callback, $initial);
    }

    public function sortBy(callable $function)
    {
        $items = $this->items;

        uasort($items, $function);

        return new self($items);
    }

    public function resetKeys()
    {
        return new static(
            array_values($this->items)
        );
    }

    public function isEmpty()
    {
        return empty($this->items);
    }

    public function toArray()
    {
        return $this->items;
    }

    public function toAssoc()
    {
        return $this->reduce(function ($assoc, $keyValuePair) {
            list($key, $value) = $keyValuePair;
            $assoc[$key] = $value;

            return $assoc;
        });
    }

    public function count()
    {
        return count($this->items);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->items);
    }

    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->items[] = $value;
        } else {
            $this->items[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    public function jsonSerialize()
    {
        return $this->items;
    }
}
