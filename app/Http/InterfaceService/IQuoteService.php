<?php 
namespace App\Http\InterfaceService;

interface IQuoteService
{
    public function create($data);
    public function all();
    public function delete($id);
    public function update($id, $data);
    public function show($id);
}