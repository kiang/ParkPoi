<?php

class ParkShell extends AppShell
{

    public $uses = array('Park');

    public function main()
    {
        $this->update();
    }

    public function update()
    {
        $json = json_decode(file_get_contents('https://github.com/kiang/TainanParks/raw/master/parks.json'), true);
        foreach ($json['features'] as $f) {
            $park = $this->Park->find('first', [
                'fields' => array(
                    'id'
                ),
                'conditions' => [
                    'area' => $f['properties']['區'],
                    'name' => $f['properties']['公園名稱'],
                ],
            ]);
            if (!empty($park)) {
                $this->Park->id = $park['Park']['id'];
            } else {
                $this->Park->create();
            }
            $this->Park->save(array('Park' => array(
                'name' => $f['properties']['公園名稱'],
                'sno' => $f['properties']['編號'],
                'area' => $f['properties']['區'],
                'cunli' => $f['properties']['里別'],
                'size' => $f['properties']['面積_公頃'],
                'class' => $f['properties']['類別'],
                'location' => $f['properties']['座落位置'],
                'longitude' => $f['properties']['經緯度_X'],
                'latitude' => $f['properties']['經緯度_Y'],
                'admin' => $f['properties']['維護管理單位'],
                'land_zone' => isset($f['properties']['使用分區']) ? $f['properties']['使用分區'] : '',
                'note' => $f['properties']['設施'],
            )));
        }
    }

    public function import()
    {
        $json = json_decode(file_get_contents('/home/kiang/public_html/TainanParks/parks.json'), true);
        $this->Park->query('TRUNCATE TABLE parks;');
        foreach ($json['features'] as $f) {
            $this->Park->create();
            $this->Park->save(array('Park' => array(
                'name' => $f['properties']['公園名稱'],
                'sno' => $f['properties']['編號'],
                'area' => $f['properties']['區'],
                'cunli' => $f['properties']['里別'],
                'size' => $f['properties']['面積_公頃'],
                'class' => $f['properties']['類別'],
                'location' => $f['properties']['座落位置'],
                'longitude' => $f['properties']['經緯度_X'],
                'latitude' => $f['properties']['經緯度_Y'],
                'admin' => $f['properties']['維護管理單位'],
                'land_zone' => $f['properties']['使用分區'],
                'note' => $f['properties']['設施'],
            )));
        }
    }
}
