<?php

class Travel
{
    public $id;
    public $createdAt;
    public $name;
    public $parentId;
    public $cost;
    public $children = [];

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->createdAt = $data['createdAt'];
        $this->name = $data['employeeName'];
        $this->parentId = $data['companyId'];
        $this->cost = $data['price'];
    }
}