<?php

/**
 * Controller for handling actions with Computers.
 *
 * @author mzolee
 */
class Controller extends Base {

    private $uploads_dir = "uploads";
    private $successMsg = '';
    public $id,
           $orderBy,
           $orderDir;

    public function home() {
        $this->validator->validateInArray(array_keys(Computer::getLabels()),$this->orderBy,"Chybný názov poľa!");
        $this->validator->validateReg("/^(ASC|DESC)$/",$this->orderDir,"Chybný smer zoradenia!");
        $data = Computers::fetchComputers($this->orderBy, $this->orderDir);
        $this->templater->render(
                "home", [
                    "data" => $data,
                    "orderBy" => $this->orderBy,
                    "orderDir" => $this->orderDir,
                    "labels" => Computer::getLabels(),
                    "errors" => $this->errorHandler
                ]);
    }

    public function add() {
        $computer = Computers::create($this->post);
        if ($this->isPostSubmitted() && $this->validator->validateAll($this->post, Computer::getValidationRules())) {
            Computers::save($computer) || $this->errorHandler->add(Computers::$error);
            $this->successMsg = $this->errorHandler->isError() ? "" : "Počítač uložený!";
        }
        $this->templater->render(
                "add", [
                    "item" => $computer,
                    "labels" => Computer::getLabels(),
                    "errors" => $this->errorHandler,
                    "msg" => $this->successMsg
                ]);
    }

    public function edit() {
        $computer = Computers::findComputer($this->id);
        if ($this->isPostSubmitted() && $this->validator->validateAll($this->post, Computer::getValidationRules())) {
            Computers::update($computer,$this->post) || $this->errorHandler->add(Computers::$error);
            $this->successMsg = $this->errorHandler->isError() ? "" : "Zmena je uložená!";
        }
        $this->templater->render(
                "edit", [
                    "item" => $computer,
                    "labels" => Computer::getLabels(),
                    "errors" => $this->errorHandler,
                    "msg" => $this->successMsg
                ]);
    }

    public function delete() {
        $computer = Computers::findComputer($this->id);
        if ($this->isPostSubmitted()) {
            Computers::delete($computer) || $this->errorHandler->add(Computers::$error);
            $this->successMsg = $this->errorHandler->isError() ? "" : "Počítač {$computer->nazov} ({$computer->id}) bol úspešne vymazaný!";
        }
        $this->templater->render(
                "delete", [
                    "item" => $computer,
                    "labels" => Computer::getLabels(),
                    "errors" => $this->errorHandler,
                    "msg" => $this->successMsg
                ]);
    }

    public function importXML() {

        if ($this->isPostSubmitted()) {

            $target_file = $this->uploads_dir . "/" . basename($_FILES["file"]["name"]);
            $fileType = pathinfo($target_file, PATHINFO_EXTENSION);

            if ($_FILES["file"]["name"] == "") {
                $this->errorHandler->add("Žiadny súbor nebol vybraný!");
            } else {
                $this->validator->validateReg('/^xml$/',$fileType,"Nesprávny formát súboru!");
                $this->validator->validateMax(1048576,$_FILES["file"]["size"],"Maximálna veľkosť súboru je 1MB!");
            }
            if(!$this->errorHandler->isError()) {
                move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
                Computers::parseXML($target_file) || $this->errorHandler->add(Computers::$error);
            }
            $this->successMsg = $this->errorHandler->isError() ? "" : "Údaje boli úspešne importované!";
        }
        $this->templater->render("importXML", ["errors" => $this->errorHandler, "msg" => $this->successMsg]);
    }

    public function exportXML() {
        if ($this->isPostSubmitted()) {
            $xml = Computers::fetchComputersAsXML();
            $this->templater->setOutputBlocked(true);
            header("Content-Type: text/xml");
            header('Content-Disposition: attachment; filename="pocitace.xml"');
            echo $xml->asXML();
            return;
        }
        $this->templater->render("exportXML", ["errors" => $this->errorHandler, "msg" => $this->successMsg]);
    }
    
    public function email() {
        $computer = Computers::findComputer($this->id);
        if ($this->isPostSubmitted() && 
            $this->validator->validateReg('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $this->post['email'], "Nevalidná adresa!")
           )
        {
            $this->mail->setFrom(AppConf::$adminEmail)
                        ->setFromName(AppConf::$adminName)
                        ->setTo($this->post['email'])
                        ->setSubject('Počítač')
                        ->setHtmlTpl('computerToFriend')
                        ->setTextParams(["item"=>$computer,"labels"=>  Computer::getLabels()])
                        ->send();
            $this->successMsg = $this->errorHandler->isError() ? "" : "Informácie o počítači <b>{$computer->nazov} ({$computer->id})</b> boli úspešne poslané na adresu <b>{$this->post['email']}</b>!";
        }
        $this->templater->render(
                "email", [
                    "item" => $computer,
                    "labels" => Computer::getLabels(),
                    "errors" => $this->errorHandler,
                    "msg" => $this->successMsg
                ]);
    }
}
