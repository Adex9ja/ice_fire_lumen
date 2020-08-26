<?php


namespace App\Model;


class JsonResponse
{

    var $status_code;
    var $status;
    var $data;

    /**
     * JsonResponse constructor.
     * @param integer $status_code
     * @param string $status
     * @param $data
     */
    public function __construct($status_code, $status, $data = [])
    {
        $this->status_code = $status_code;
        $this->status = $status;
        $this->data = $data;
    }

}
