<?php

namespace Ambta\DoctrineEncryptBundle\Mapping;

use Ambta\DoctrineEncryptBundle\Configuration\Annotation;
use ReflectionClass;
use ReflectionMethod;

/**
 * @author Flavien Bucheton <leflav45@gmail.com>
 *
 * @internal
 */
final class AttributeAnnotationReader
{
    /**
     * @var Reader
     */
    private Reader $annotationReader;

    /**
     * @var AttributeReader
     */
    private AttributeReader $attributeReader;

    public function __construct(AttributeReader $attributeReader)
    {
        $this->attributeReader = $attributeReader;
    }

    /**
     * @return Annotation[]
     */
    public function getClassAnnotations(ReflectionClass $class): array
    {
        return $this->attributeReader->getClassAnnotations($class);
    }

    /**
     * @param class-string<T> $annotationName the name of the annotation
     *
     * @return T|null the Annotation or NULL, if the requested annotation does not exist
     *
     * @template T
     */
    public function getClassAnnotation(ReflectionClass $class, $annotationName)
    {
        return $this->attributeReader->getClassAnnotation($class, $annotationName);
    }

    /**
     * @return Annotation[]
     */
    public function getPropertyAnnotations(\ReflectionProperty $property): array
    {
        return $this->attributeReader->getPropertyAnnotations($property);
    }

    /**
     * @param class-string<T> $annotationName the name of the annotation
     *
     * @return T|null the Annotation or NULL, if the requested annotation does not exist
     *
     * @template T
     */
    public function getPropertyAnnotation(\ReflectionProperty $property, $annotationName)
    {
        return $this->attributeReader->getPropertyAnnotation($property, $annotationName);
    }

    public function getMethodAnnotations(ReflectionMethod $method): array
    {
        throw new \BadMethodCallException('Not implemented');
    }

    /**
     * @param ReflectionMethod $method
     * @param $annotationName
     * @return mixed
     */
    public function getMethodAnnotation(ReflectionMethod $method, $annotationName): mixed
    {
        throw new \BadMethodCallException('Not implemented');
    }
}
