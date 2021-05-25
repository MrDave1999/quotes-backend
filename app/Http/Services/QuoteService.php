<?php 
namespace App\Http\Services;

use App\Http\InterfaceRepository\IQuoteRepository;
use App\Http\InterfaceService\IQuoteService;
use Illuminate\Support\Facades\Validator;
use App\Utils\Response;
use App\Rules\QuoteRules;

class QuoteService implements IQuoteService
{
    protected $quoteRepository;

    public function __construct(IQuoteRepository $quoteRepository)
    {
        $this->quoteRepository = $quoteRepository;
    }

    public function create($data)
    {
        $validator = Validator::make($data, QuoteRules::$createRules);
        if($validator->fails())
            return Response::error($validator->errors()->all());

        $quote = $this->quoteRepository->create($data);
        return Response::success('La cita se ha creado exitosamente!', ['id' => $quote['id']]);
    }

    public function all()
    {
        return Response::success('Las citas se recuperó exitosamente!', $this->quoteRepository->all());
    }

    public function delete($id)
    {
        if(!ctype_digit($id))
            return Response::error('La ID de la cita debe ser numérico!');

        $result = $this->quoteRepository->delete($id);
        if(!$result)
            return Response::error("La cita ID $id no existe!");

        return Response::success('La cita se eliminó exitosamente!');
    }

    public function update($id, $data)
    {
        $validator = Validator::make($data, QuoteRules::$updateRules);
        if($validator->fails())
            return Response::error($validator->errors()->all());

        $result = $this->quoteRepository->update($id, $data);
        if(is_null($result))
            return Response::error("La cita ID $id no existe!");

        return Response::success('La cita se actualizó exitosamente!');
    }

    public function show($id)
    {
        $quote = $this->quoteRepository->show($id);
        if(is_null($quote))
            return Response::error("La cita ID $id no existe!");

        return Response::success('La cita se recuperó exitosamente!', $quote);
    }
}