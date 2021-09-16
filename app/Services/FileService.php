<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FileService
{
    /**
     * CSV読み込み
     *
     * @param $csv
     * @param $dir
     * @param $columns
     * @return array | boolean
     */
    public function loadCsv($csv, $dir, $column_labels, $columns)
    {
        $csvArray = [];
        $temporary = $csv->store($dir);
        $fp = fopen(storage_path('app/') . $temporary, 'r');
        $headers = fgetcsv($fp);

        if (!$this->isCsvFile($headers, $column_labels)) {
            fclose($fp);
            Storage::delete($temporary);
            return false;
        } else {
            $i = 0;
            while ($row = fgetcsv($fp)) {
                mb_convert_variables('UTF-8', 'SJIS-win', $row);
                foreach ($headers as $index => $column_name) {
                    if (!isset($row[$index])) {
                        $csvArray = false;
                        break;
                    }
                    $csvArray[$i][$columns[$index]] = $row[$index];
                }
                $i++;
            }
        }
        return $csvArray;
    }

    /**
     * CSVフォーマットチェック
     *
     * @param array $headers
     * @param array $columns
     * @return bool
     */
    protected function isCsvFile(array $headers, array $columns)
    {
        foreach ($headers as $index => &$h) {
            $headers[$index] = mb_convert_encoding($h, 'UTF-8', 'SJIS-win');
        }
        sort($headers);
        sort($columns);
        return ($columns === $headers);
    }

    /**
     * CSVダウンロード
     *
     * @param $value_arrays
     * @param $column_labels
     * @param $columns
     * @param $file_name
     * @return mixed
     */
    public function downloadCsv($value_arrays, $column_labels, $columns, $file_name = null)
    {
        $stream = fopen('php://temp', 'r+b');
        fputcsv($stream, $column_labels);
        foreach($value_arrays as $index => $value_array) {
            $data = [];
            foreach ($columns as $column) {
                $data[] = $value_array[$column] ?? null;
            }
            fputcsv($stream, $data);
        }
        rewind($stream);
        $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($stream));
        $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');

        if (is_null($file_name)) {
            $file_name = Carbon::now()->format('YmdHis'). '.csv';
        }
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$file_name",
        );

        return \Response::make($csv, 200, $headers);
    }
}
