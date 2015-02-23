<?php

/**
 * Description of Computer
 *
 * @author mzolee
 */
class Computer {
    
    public  $id,
            $nazov,
            $kod,
            $vyrobca,
            $cena,
            $sklad,
            $procesor,
            $grafika,
            $pevny_disk,
            $pamat,
            $date_inserted,
            $date_modified,
            
            $sql,
            $error
            ;
    
    function __construct() {
    }
    
    public static function getLabels() {
        return [
            "id" => "Id",
            "nazov" => "Názov",
            "kod" => "Kód",
            "vyrobca" => "Výrobca",
            "cena" => "Cena",
            "sklad" => "Sklad",
            "procesor" => "Procesor",
            "grafika" => "Grafika",
            "pevny_disk" => "Pevný disk",
            "pamat" => "Pamäť",
            "date_inserted" => "Dátum vloženia",
            "date_modified" => "Dátum modifikácie",
        ];
    }
    
    public static function getValidationRules() {
        return [
            "id" => [["rule"=>"/^\d{1,11}$/","type"=>"reg","type"=>"reg","err"=>"Id musí byť číslo!"]],
            "nazov" => [["rule"=>"/^.{1,300}$/","type"=>"reg","err"=>"Názov nevalidný!"]],
            "kod" => [["rule"=>"/^\w{1,50}$/","type"=>"reg","err"=>"Kód môže obsahovať veľké a malé znaky anglickej abecedy a znak \"_\""]],
            "vyrobca" => [["rule"=>"/^.{1,100}$/","type"=>"reg","err"=>"Výrobca príliž dlhý!"]],
            "cena" => [["rule"=>"/^\d{1,11}(\.\d{2})?$/","type"=>"reg","err"=>"Cena musí byť číslo s dvomy desatinnými miestami!"]],
            "sklad" => [
                        ["rule"=>"/^\d{1,11}$/","type"=>"reg","err"=>"Sklad musí byť kladné celé číslo!"],
                        ["rule"=>"1","type"=>"min","err"=>"Sklad musí byť väčšie ako 0!"]
                       ],
            "procesor" => [["rule"=>"/^.{0,200}$/","type"=>"reg","err"=>"Názov procesora príliž dlhý!"]],
            "grafika" => [["rule"=>"/^.{0,200}$/","type"=>"reg","err"=>"Názov grafickej karty príliž dlhý!"]],
            "pevny_disk" => [["rule"=>"/^.{0,200}$/","type"=>"reg","err"=>"Názov pevného disku príliž dlhý!"]],
            "pamat" => [["rule"=>"/^.{0,200}$/","type"=>"reg","err"=>"Názov pamäte príliž dlhý!"]],
            "date_inserted" => [["rule"=>"/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}(:\d{2})?$/","type"=>"reg","err"=>""]],
            "date_modified" => [["rule0"=>"/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}(:\d{2})?$/","type"=>"reg","err0"=>""]],
        ];
    }
    
    public function add() {
        foreach (self::getLabels() as $attr=>$val) {
            switch ($attr) {
                case "id":
                    break;
                case "date_inserted":
                case "date_modified":
                    $data[$attr] = date("Y-m-d H:i:s");
                    break;
                default:
                    $data[$attr] = $this->$attr;
                    break;
            }
        }
        $this->sql = DB::genInsertQuery("pocitace", $data);
        return $this;
    }
    
    public function update() {
        foreach (self::getLabels() as $attr=>$val) {
            switch ($attr) {
                case "date_modified":
                    $data[$attr] = date("Y-m-d H:i:s");
                    break;
                default:
                    $data[$attr] = $this->$attr;
                    break;
            }
        }
        $this->sql = DB::genUpdateQuery("pocitace", $data, "id={$this->id}");

        return $this;
    }
    
    public function delete() {
        $this->sql = "delete from pocitace where id={$this->id}";
        return $this;
    }
    
    public function save() {
        $db = new DB();
        if($db->query($this->sql)) {
            return true;
        } else {
            // Pretty print the unique key violation error.
            $this->error = $db->errNum==1062 ? "Databáza už obsahuje produkt so zadaným kódom!" : $db->error;
            return false;
        }
    }
    
    public function loadFromArray($arr) {
        foreach (Computer::getLabels() as $attrib => $val) {
            if (isset($arr[$attrib])) {
                $this->$attrib = $arr[$attrib];
            }
        }
        return $this;
    }
    
    public function fetch($id) {
        $db = new DB();
        $this->sql = "select * from pocitace where id=" . $db->esc($id);
        $res = $db->query($this->sql);
        if($res && isset($res[0])) {
            foreach (self::getLabels() as $attr => $val) {
                $this->$attr = $res[0][$attr];
            }
            return true;
        } else {
            $this->error = $db->error;
            return false;
        }
    }
    
    public function toXML() {
        $xml = new SimpleXMLElement("<item/>");
        foreach (Computer::getLabels() as $attrib => $val) {
            $xml->addChild($attrib, $this->$attrib);
        }
        return $xml;
    }
    
}
