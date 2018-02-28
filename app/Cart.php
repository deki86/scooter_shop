<?php

namespace App;

use Illuminate\Support\Arr;

class Cart
{
    /**
     * A set of parts in cart
     * @var array
     */
    public $items = null;
    /**
     * Total part quantity of parts in cart
     * @var integer
     */
    public $quantityTotal = 0;
    /**
     * Total price of parts in cart
     * @var integer
     */
    public $priceTotal = 0;

    /**
     * Create a new Cart instance
     * @param mixed $oldCart
     */
    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->quantityTotal = $oldCart->quantityTotal;
            $this->priceTotal = $oldCart->priceTotal;
        }
    }
    /**
     * Add a part in cart
     * @param array $item
     * @param integer $id
     */
    public function add($item, $id)
    {
        $storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['quantity']++;
        $storedItem['price'] = $item->price * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->quantityTotal++;
        $this->priceTotal += $item->price;
    }

    /**
     * Deleting a one item from a cart
     * @param  array $item
     * @param  integer $id
     * @return array
     */
    public function deleteItem($item, $id)
    {
        $storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['quantity']--;
        $storedItem['price'] = $item->price * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->quantityTotal--;
        $this->priceTotal -= $item->price;
    }

    /**
     * Deleting a row of parts in cart (group of parts)
     * @param  array $item
     * @param  integer $id
     * @return array
     */
    public function deleteItems($item, $id)
    {
        $storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['price'] = $item->price * $storedItem['quantity'];
        $this->items;
        $this->quantityTotal -= $this->items[$id]['quantity'];
        $this->priceTotal -= $this->items[$id]['price'];
        Arr::pull($this->items, $id);
    }
}
