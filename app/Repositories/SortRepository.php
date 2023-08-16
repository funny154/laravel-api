<?php
namespace App\Repositories;

use App\Models\Sort;

class SortRepository
{
    private $sort;


    public function __construct(Sort $sort)
    {
        $this->sort = $sort;
    }

    public function get()
    {
        return $this->sort::all();
    }

    public function set($subject)
    {
        $Sort = new Sort();
        $Sort->sort1 = $subject['sort'];
        $Sort->sort2 = $subject['sort2'];
        $Sort->save();

        return $Sort->id;
    }

    public function update($id, $subject)
    {
        $Sort = $this->sort->find($id);
        $Sort->sort1 = $subject['sort'];
        $Sort->sort2 = $subject['sort2'];
        $Sort->save();

        return $Sort->id;
    }

    public function delete($id)
    {
        $Sort = $this->sort->find($id);
        $Sort->delete();

        return $Sort->id;
    }
}
