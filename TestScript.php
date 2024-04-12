<?php

class TestScript
{
    public function execute(): void
    {
        $start = microtime(true);

        $companiesUrl = 'https://5f27781bf5d27e001612e057.mockapi.io/webprovise/companies';
        $travelsUrl = 'https://5f27781bf5d27e001612e057.mockapi.io/webprovise/travels';

        $companiesData = json_decode(file_get_contents($companiesUrl), true);
        $travelsData = json_decode(file_get_contents($travelsUrl), true);

        $companies = [];
        foreach ($companiesData as $data) {
            $company = new Company($data);
            $companies[$company->id] = $company;
        }

        foreach ($travelsData as $data) {
            $travel = new \Travel($data);
            if (isset($companies[$travel->parentId])) {
                $companies[$travel->parentId]->children[] = $travel;
                $companies[$travel->parentId]->addCost($travel->cost);
            }
        }


        $result = array_values($companies);

        echo json_encode($result);
        echo "\nTotal time: " . (microtime(true) - $start) . "\n";
    }

}