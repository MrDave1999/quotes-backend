<?php 
namespace App\Http\InterfaceRepository;

interface IQuoteRepository
{
    public function create($data);
    public function all();
    public function delete($id);
    public function update($id, $data);
    public function show($id);
}