<?php

namespace PropertyCallable;

/**
 * クラスのプロパティ名をメソッド名としたGetterを定義するTrait
 * 
 * @package PropertyCallable
 */
trait PropertyCallable
{
    /**
     * クラスのプロパティ名をメソッド名としたGetterを定義する
     */
    public function __call(string $propertyName, array $parameters): mixed
    {
        $reflectionProperty = new \ReflectionProperty(self::class, $propertyName);

        return $reflectionProperty->isStatic() ? self::${$propertyName} : $this->{$propertyName};
    }
}
