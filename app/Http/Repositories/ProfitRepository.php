<?php


namespace App\Http\Repositories;


use App\Http\Services\ProfitServiceInterface;
use App\Models\Category;
use App\Models\Profit;

class ProfitRepository implements ProfitRepositoryInterface
{
    private $model;

    public function __construct()
    {
        $this->model = app()->make(Profit::class);
    }


    public function findByCategory($name)
    {
        if ($name != 0) {
            $profits = Category::where('categories.id', $name)
                ->join('profits', 'categories.id', '=', 'profits.category_id')
                ->get();
        }
        else {
            $profits = Profit::all();
        }
        return $profits;
    }


    public function findById(int $id)
    {
        return $this->model->find($id);
    }


    public function addProfit($data)
    {
        $profit = new Profit();
        $profit->sum = $data['sum'];
        $profit->source = $data['source'];
        $profit->comment = $data['comment'];
        $profit->category_id = $data['tar'];
        $profit->save();
    }


    public function save(Profit $profit, array $data)
    {
        $profit->sum = $data['sum'];
        $profit->source = $data['source'];
        $profit->comment = $data['comment'];
        $profit->category_id = $data['tar'];
        $profit->save();
    }

    public function deleteById($id)
    {
        $profit = $this->findById($id);
        $profit->delete();
    }


}
