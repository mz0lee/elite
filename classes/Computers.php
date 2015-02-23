<?php

/**
 * Description of Computers
 *
 * @author mzolee
 */
class Computers {

    static $error = '';

    static public function fetchComputers($orderBy='id', $orderDir='ASC') {
        $computersRaw = (new DB())->query("SELECT * FROM pocitace ORDER BY $orderBy $orderDir");
        $computers = [];
        foreach ($computersRaw as $computerRaw) {
            $computers[] = (new Computer())->loadFromArray($computerRaw);
        }
        return $computers;
    }
    
    static public function fetchComputersAsXML() {
        $computers = self::fetchComputers();
        $xml = new SimpleXMLElement("<items/>");
        foreach ($computers as $computer) {
            self::sxml_append($xml, $computer->toXML());
        }
        return $xml;
    }
    
    /**
     * Helper method that converts SimpleXMLElement to dom so it can add other 
     * SimpleXMLElements as child elements.
     * @param SimpleXMLElement $to
     * @param SimpleXMLElement $from
     */
    static private function sxml_append(SimpleXMLElement $to, SimpleXMLElement $from) {
        $toDom = dom_import_simplexml($to);
        $fromDom = dom_import_simplexml($from);
        $toDom->appendChild($toDom->ownerDocument->importNode($fromDom, true));
    }
    
    static public function parseXML($xmlFile) {
        $xml = simplexml_load_file($xmlFile);
        foreach ($xml->item as $item) {
            $itemArray = json_decode(json_encode($item), true); // convert SimpleXmlObject to Array
            $computer = Computers::create($itemArray);
            if (!$computer->add()->save()) {
                self::$error = $computer->error;
                return false;
            }
        }
        return true;
    }

    static public function create($params = []) {
        $computer = new Computer();
        if (!empty($params)) {
            $computer->loadFromArray($params);
        }
        return $computer;
    }

    static public function save(Computer $computer) {
        if (!$computer->add()->save()) {
            self::$error = $computer->error;
            return false;
        }
        return true;
    }
    
    static public function update(Computer $computer, $params) {
        if (!$computer->loadFromArray($params)->update()->save()) {
            self::$error = $computer->error;
            return false;
        }
        return true;
    }

    static public function delete(Computer $computer) {
        if (!$computer->delete()->save()) {
            self::$error = $computer->error;
            return false;
        }
        return true;
    }

    static public function findComputer($id) {
        $computer = new Computer;
        $computer->fetch($id);
        return $computer;
    }

}
