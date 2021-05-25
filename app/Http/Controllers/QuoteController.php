<?php
namespace App\Http\Controllers;
use App\Http\InterfaceService\IQuoteService;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    protected $quoteService;

    public function __construct(IQuoteService $quoteService)
    {
        $this->quoteService = $quoteService;
    }

    public function create(Request $request)
    {
        return $this->quoteService->create($request->all());
    }

    public function all()
    {
        return $this->quoteService->all();
    }

    public function delete($id)
    {
        return $this->quoteService->delete($id);
    }

    public function update($id, Request $request)
    {
        return $this->quoteService->update($id, $request->all());
    }

    public function show($id)
    {
        return $this->quoteService->show($id);
    }
}
