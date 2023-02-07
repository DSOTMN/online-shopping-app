<?php
namespace OnlineShopping\Model;

class Product
{
    private ?int $id;
    private string $name;
    private ?string $description;
    private float $price;
    private ?int $stock;

    public function __construct($id=null, $name='', $description=null, $price=0, $stock=0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
    }

    /**
     * @return integer|null
     */
    public function id(): ?int
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function price(): float
    {
        return $this->price;
    }

    /**
     * @return int|null
     */
    public function stock(): ?int
    {
        return $this->stock;
    }

}