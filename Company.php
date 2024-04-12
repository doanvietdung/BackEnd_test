<?php

class Company
{
    public $id;
    public $createdAt;
    public $name;
    public $parentId;
    public $cost;
    public $children;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->createdAt = $data['createdAt'];
        $this->name = $data['name'];
        $this->parentId = $data['parentId'];
        $this->cost = 0;
        $this->children = [];
    }


    public function addCost($price): void
    {
        $this->cost += $price;
    }
}