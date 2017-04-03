<?php
function prepStruct($struktura)
{
    $provinces   = [];
    $counties    = [];
    $communities = [];

    foreach ($struktura as $row) {
        if ($row[0] == 2) {
            $provinces[] = (object)[
                'id'   => (int) $row[2],
                'name' => mb_strtolower($row[7]),
            ];
        }

        if ($row[0] == 4) {
             $counties[] = (object)[
                 'province_id' => (int)$row[2],
                 'id' => (int)$row[4],
                 'name' => $row[7],
             ];
        }

        if ($row[0] == 5) {
             $communities[] = (object)[
                 'province_id' => (int)$row[2],
                 'county_id' => (int)$row[4],
                 'id' => (int)$row[5],
                 'name' => $row[7],
             ];
        }
    }
    return (object)compact('communities', 'provinces', 'counties');
}