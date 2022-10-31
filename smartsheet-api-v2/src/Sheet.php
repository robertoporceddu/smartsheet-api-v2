<?php

namespace SmartsheetApiV2;

class Sheet extends Client
{
    private $id;

    private $http;

    public function __construct($sheet_id, $api_token = null)
    {
        $this->http = new Client($api_token);

        if(isset($sheet_id)) {
            $this->id = $sheet_id;
        }
    }

    public function getSheetId()
    {
        return $this->id;
    }

    public function listSheets()
    {
        return $this->http->call('GET','sheets');
    }

    public function getSheetProperty()
    {
        return $this->http->call('GET',"sheets/$this->id");
    }

    public function getSheetColumns()
    {
        return $this->getSheetProperty()->columns;
    }

    public function addRow(array $data, $toBottom = true)
    {
        $body = [
            "toBottom" => $toBottom,
            "cells" => $this->prepareData($data)
        ];

        return $this->http->call('POST',"sheets/$this->id/rows", $body);
    }

    protected function prepareData(array $data)
    {
        $columns = $this->getSheetColumns();
        $return = [];

        foreach($columns as $index => $properties) {
            if(isset($data[$properties->title])) {
                $return[] = [
                    "columnId" => $properties->id,
                    "value" => $data[$properties->title]
                ];
            }

        }

        return $return;
    }
}