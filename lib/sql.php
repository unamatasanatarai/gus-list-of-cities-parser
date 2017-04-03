<?php

class Sql
{

    public static function provinces($provinces)
    {
        $template = "INSERT INTO geo_provinces (gov_id, `name`) VALUES %s;\n\n";
        $values   = [];
        foreach ($provinces as $item) {
            $values[] = sprintf(
                "(%d, '%s')",
                $item->id,
                $item->name
            );
        }
        unset($provinces);

        return self::makeSql($values, $template);
    }

    public static function counties($counties)
    {
        $template = "INSERT INTO geo_counties (gov_province_id, gov_id, `name`) VALUES %s;\n\n";

        $values = [];
        foreach ($counties as $item) {
            $values[] = sprintf(
                "(%d, %d, '%s')",
                $item->province_id,
                $item->id,
                $item->name
            );
        }
        unset($counties);

        return self::makeSql($values, $template);
    }

    public static function communities($communities)
    {
        $template = "INSERT INTO geo_communities (gov_province_id, gov_county_id, gov_id, `name`) VALUES %s;\n\n";

        $values = [];
        foreach ($communities as $item) {
            $values[] = sprintf(
                "(%d, %d, %d, '%s')",
                $item->province_id,
                $item->county_id,
                $item->id,
                $item->name
            );
        }
        unset($communities);

        return self::makeSql($values, $template);
    }

    public static function cities($cities)
    {
        $template = "INSERT INTO geo_cities (gov_province_id, gov_county_id, gov_community_id, `name`) VALUES %s;\n\n";

        $values = [];
        foreach ($cities as $item) {
            if (trim($item[0]) == '') {
                continue;
            }
            $values[] = sprintf(
                "(%d, %d, %d, '%s')",
                (int) $item[0],
                (int) $item[1],
                (int) $item[2],
                $item[6]
            );
        }
        unset($cities);

        return self::makeSql($values, $template);
    }

    private static function makeSql($values, $template)
    {
        $result = '';
        $values = array_unique($values);
        $chunks = array_chunk($values, 500);
        foreach ($chunks as $chunk) {
            $result .= sprintf($template, implode(',', $chunk));
        }
        unset($values, $chunks);

        return $result;
    }
}