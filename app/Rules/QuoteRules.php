<?php 
namespace App\Rules;

class QuoteRules
{
    public static $createRules = 
    [
        'client_name'       => 'required|max:50',
        'issue'             => 'required|max:35',
        'observation'       => 'required|max:50',
        'target_date'       => 'required|date_format:Y-m-d H:i'
    ];

    public static $updateRules = 
    [
        'client_name'       => 'sometimes|is_empty|max:50',
        'issue'             => 'sometimes|is_empty|max:35',
        'observation'       => 'sometimes|is_empty|max:50',
        'target_date'       => 'sometimes|is_empty|date_format:Y-m-d H:i'
    ];
}