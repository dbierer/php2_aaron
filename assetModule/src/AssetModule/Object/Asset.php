<?php
// NOTE: this namespace will only work in PHP 8 and above
//       in PHP 7, "Object" will be viewed as a keyword and you'll get a syntax error!
namespace AssetModule\Object;

abstract class Asset
{
    abstract public function __toString(): string;
}
