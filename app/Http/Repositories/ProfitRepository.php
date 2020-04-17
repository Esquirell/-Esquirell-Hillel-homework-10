<?php


namespace App\Http\Repositories;


use App\Http\Services\ProfitServiceInterface;
use App\Models\Category;
use App\Models\Profit;

class ProfitRepository implements ProfitRepositoryInterface
{
    private $model;
    private $modelCategory;

    public function __construct()
    {
        $this->model = app()->make(Profit::class);
        $this->modelCategory = app()->make(Category::class);
    }


    public function findByCategory($name)
    {
        if ($name != 0) {
            $profits = $this->modelCategory->find($name)->profits()->get();
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


        try {
            $profit = new Profit();
            $profit->sum = $data['sum'];
            $profit->source = $data['source'];
            $profit->comment = $data['comment'];

            $category = $data->get('tar');
            $profit->category()->associate($category);

            //$profit->category_id = $data['tar'];
            $profit->save();
        } catch (\Exception $e) {

            abort(404);
        }

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
