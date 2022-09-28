<?php

include "../../inventar/handler/credentials.php";

class Rechnung
{
    public string $rechnungsadresse = "";
    public string $rechnungsdatum = "";
    public string $rechnungsnummer = "";
    public int $status = 0;
    public int $sendStatus = 0;
    public int $internID = 0;
    public int $rechnungssumme = 0;
    public string $filePath = "";

    /**
     * @param string $rechnungsadresse
     * @param string $rechnungsdatum
     * @param string $rechnungsnummer
     * @param int $status
     * @param int $sendStatus
     * @param int $internID
     * @param string $filePath
     */
    public function __construct(string $rechnungsadresse, string $rechnungsdatum, string $rechnungsnummer, int $status, int $sendStatus, int $internID, int $rechnungssumme, string $filePath)
    {
        $this->rechnungsadresse = $rechnungsadresse;
        $this->rechnungsdatum = $rechnungsdatum;
        $this->rechnungsnummer = $rechnungsnummer;
        $this->status = $status;
        $this->sendStatus = $sendStatus;
        $this->internID = $internID;
        $this->rechnungssumme = $rechnungssumme;
        $this->filePath = $filePath;
    }

    static function ladeRechnung($internalID) {
        $pdo = new PDO('mysql:host=localhost;dbname=aclyinvent_invent;charset=utf8', credentials::$user, credentials::$password);
        $loadStatement = "SELECT * FROM `rechnungen` WHERE `id`=" . strval($internalID);

        foreach ($pdo->query($loadStatement) as $row) {
            if ($row["file"] != null) {
                $bill = new Rechnung(
                    $row["rechnungsadresse"],
                    $row["rechnungsdatum"],
                    $row["rechnungsnummer"],
                    intval($row["status"]),
                    intval($row["send_status"]),
                    intval($row["id"]),
                    floatval($row["summenwert"]),
                    $row["file"]
                );
            } else {
                $bill = new Rechnung(
                    $row["rechnungsadresse"],
                    $row["rechnungsdatum"],
                    $row["rechnungsnummer"],
                    intval($row["status"]),
                    intval($row["send_status"]),
                    intval($row["id"]),
                    floatval($row["summenwert"]),
                    ""
                );
            }
            return $bill;
        }
    }


}