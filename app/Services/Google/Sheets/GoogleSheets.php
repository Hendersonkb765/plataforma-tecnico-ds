<?php

namespace App\Services\Google\Sheets;

use Google\Service\Sheets as GoogleServiceSheets;
use App\Services\Google\GoogleClient;
use App\Services\ArrayTransformer;
class GoogleSheets  {

    protected $googleClient;
    public function __construct()
    {
        $googleClient = new GoogleClient();
        $this->googleClient = $googleClient->getClient(GoogleServiceSheets::SPREADSHEETS);
    }
    public function get($spreadsheetId)
    {
        $service = new GoogleServiceSheets($this->googleClient);
        $response = $service->spreadsheets->get($spreadsheetId);
        $sheetData = $response->getSheets();
        $data = [];
        foreach ($sheetData as $sheet) {
            $sheetId = $sheet['properties']['sheetId'];
            $range = $sheet['properties']['title'];
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $data[$sheetId] = $response->getValues();
        }

       
       
        return ArrayTransformer::toAssociative($data);
    }
   

   
}