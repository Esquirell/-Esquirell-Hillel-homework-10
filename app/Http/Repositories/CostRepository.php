<?php


namespace App\Http\Repositories;


use App\Models\Category;
use App\Models\Cost;

class CostRepository implements CostRepositoryInterface
{

    private $model;

    public function __construct()
    {
        $this->model = app()->make(Cost::class);
    }

    public function findByCategory($name)
    {
        if ($name != 0) {
            $costs = Category::where('categories.id', $name)
                ->join('costs', 'categories.id', '=', 'costs.category_id')
                ->get();
        }
        else {
            $costs = Cost::all();
        }
        return $costs;
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function save(Cost $cost, array $data)
    {
        $cost->sum = $data['sum'];
        $cost->source = $data['source'];
        $cost->comment = $data['comment'];
        $cost->category_id = $data['tar'];
        $cost->save();
    }



    public function addCost($data)
    {
        $cost = new Cost();
        $cost->sum = $data['sum'];
        $cost->source = $data['source'];
        $cost->comment = $data['comment'];
        $cost->category_id = $data['tar'];
        $cost->save();
    }

    public function deleteById($id)
    {
        $cost = $this->findById($id);
        $cost->delete();
    }

}
