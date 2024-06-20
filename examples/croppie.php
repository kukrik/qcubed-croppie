<?php
require_once('qcubed.inc.php');

error_reporting(E_ALL); // Error engine - always ON!
ini_set('display_errors', TRUE); // Error display - OFF in production env or real server
ini_set('log_errors', TRUE); // Error logging

use QCubed as Q;
use QCubed\Action\ActionParams;
use QCubed\Project\Application;
use QCubed\Bootstrap as Bs;
use QCubed\Project\Control\ControlBase;
use QCubed\Project\Control\FormBase as Form;
use QCubed\Query\QQ;

class ExamplesForm extends Form
{
    protected $objCroppie;
    protected $btnPopup;
    protected $dlgPopup;

    protected function formCreate()
    {
        $this->objCroppie = new Q\Plugin\Croppie($this);
        $this->objCroppie->Viewport = ["width" => 200, "height" => 200, "type" => "circle"];
        $this->objCroppie->Boundary = ["width" => 300, "height" => 300];
        //$this->objCroppie->Url = 'Varia/swan in the water.jpg';
        $this->objCroppie->bind(["url" =>  'Varia/swan in the water.jpg', "zoom" => 0]);

        $this->btnPopup = new Bs\Button($this);
        $this->btnPopup->Text = "Run popupCroppie";
        $this->btnPopup->CssClass = "btn btn-orange btn-show";
        $this->btnPopup->addAction(new Q\Event\Click(), new Q\Action\Ajax('popupGroppie_Click'));

        $this->dlgPopup = new Q\Plugin\PopupCroppie($this);
        $this->dlgPopup->Url = "php/upload.php";
        $this->dlgPopup->Language = "et";
        $this->dlgPopup->TranslatePlaceholder = t("- Select a destination -");
        $this->dlgPopup->Theme = "web-vauu";

        $this->dlgPopup->HeaderTitle = t("Crop image");
        $this->dlgPopup->SaveText = t("Crop and save");
        $this->dlgPopup->CancelText = t("Cancel");

        if ($this->dlgPopup->Language) {
            $this->dlgPopup->AddJavascriptFile(QCUBED_CROPPIE_ASSETS_URL . "/js/i18n/". $this->dlgPopup->Language . ".js");
        }
    }

    protected function popupGroppie_Click(ActionParams $params)
    {
        $this->dlgPopup->showDialogBox();

        $this->dlgPopup->SelectedImage = "Varia/demo-3.jpg";
        $this->dlgPopup->Data = [
            ['id' => '/Organisation', 'text' => 'Organisation', 'level' => 0],
            ['id' => '/Varia', 'text' => 'Varia', 'level' => 0],
            ['id' => '/', 'text' => 'Home', 'level' => 0],
            ['id' => '/Home/test 2', 'text' => 'test 2', 'level' => 1],
            ['id' => '/Home/test', 'text' => 'test', 'level' => 1],
            ['id' => '/More', 'text' => 'More', 'level' => 0]
        ];
    }
}
ExamplesForm::Run('ExamplesForm');