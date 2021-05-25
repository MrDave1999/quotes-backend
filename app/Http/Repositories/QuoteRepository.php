<?php 
namespace App\Http\Repositories;

use App\Http\InterfaceRepository\IQuoteRepository;
use App\Models\Quote;

class QuoteRepository extends BaseRepository implements IQuoteRepository
{
    public function __construct(Quote $quote)
    {
        parent::__construct($quote);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    public function update($id, $data)
    {
        $quote = $this->model->find($id);
        if(!is_null($quote))
        {
            $quote->fill($data);
            $quote->save();
        }
        return $quote;
    }

    public function show($id)
    {
        return $this->model->where('id', $id)->first();
    }
}