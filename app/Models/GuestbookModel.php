<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestbookModel extends Model {

    // mysql table used is named 'records', lets the model know from which table to get data from
    protected $table = "records";

    // let the model know what fields are safe to be updated
    protected $allowedFields = ["guestName","content"];

    /**
     * @param false|string $slug
     *
     * @return array|null
     */
    // return every record, with the latest entry on top
    public function getRecords() {
        return $this->orderBy("id","desc")->findAll();
    }

}