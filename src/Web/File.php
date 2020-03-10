<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Web;


use Myks92\ValueObjects\ValueObjectsInterface;
use Webmozart\Assert\Assert;

/**
 * Class file
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
final class File implements ValueObjectsInterface
{
    /**
     * Path to file
     *
     * @var string
     */
    private string $path;
    /**
     * Name file
     *
     * @var string
     */
    private string $name;
    /**
     * Size file
     *
     * @var int
     */
    private int $size;

    /**
     * @param string $path
     * @param string $name
     * @param int $size
     */
    public function __construct(string $path, string $name, int $size)
    {
        Assert::notEmpty($path);
        Assert::notEmpty($name);
        $this->path = $path;
        $this->name = $name;
        $this->size = $size;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getPath() . '/' . $this->getName();
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        $part = explode('.', $this->getName());
        return $part[1];
    }

    /**
     * @param File $file
     *
     * @return bool
     */
    public function isEqualTo(self $file): bool
    {
        return $this->getPath() === $file->getPath() && $this->getName() === $file->getName() && $this->getSize(
            ) === $file->getSize();
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }
}