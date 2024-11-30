<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Test extends ResourceController
{
    public function mergeSortArray($a, $b)
    {
        $result = [];
        $i = 0;
        $j = 0;

        while ($i < count($a) && $j < count($b)) {
            if ($a[$i] < $b[$j]) {
                $result[] = $a[$i];
                $i++;
            } else {
                $result[] = $b[$j];
                $j++;
            }
        }
        while ($i < count($a)) {
            $result[] = $a[$i];
            $i++;
        }
        while ($j < count($b)) {
            $result[] = $b[$j];
            $j++;
        }
        return $result;
    }

    public function getMissingData($array)
    {
        $missing = [];
        for ($i = 0; $i < count($array) - 1; $i++) {
            $current = $array[$i];
            $next = $array[$i + 1];
            for ($j = $current + 1; $j < $next; $j++) {
                $missing[] = $j;
            }
        }

        return $missing;
    }

    public function insertMissingData($array, $missing)
    {
        $result = [];
        $i = 0;
        $j = 0;
        while ($i < count($array) && $j < count($missing)) {
            if ($array[$i] < $missing[$j]) {
                $result[] = $array[$i];
                $i++;
            } else {
                $result[] = $missing[$j];
                $j++;
            }
        }
        while ($i < count($array)) {
            $result[] = $array[$i];
            $i++;
        }
        while ($j < count($missing)) {
            $result[] = $missing[$j];
            $j++;
        }
        return $result;
    }

    public function main()
    {
        $json = $this->request->getJSON();
        if (!isset($json->a) || !isset($json->b)) {
            return $this->failValidationError('nilai a dan b harus diisi');
        }

        $a = $json->a;
        $b = $json->b;

        $merged = $this->mergeSortArray($a, $b);
        $missing = $this->getMissingData($merged);
        $result = $this->insertMissingData($merged, $missing);
        return $this->respond(['data' => $result]);
    }
}
