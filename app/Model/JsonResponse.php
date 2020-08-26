<?php


namespace App\Model;


class JsonResponse
{

    var $status_code;
    var $status;
    var $data;
    var $message;

    /**
     * JsonResponse constructor.
     * @param integer $status_code
     * @param string $status
     * @param array $data
     * @param null $message
     */
    public function __construct($status_code, $status, $data = [], $message = null)
    {
        $this->status_code = $status_code;
        $this->status = $status;
        $this->data = $data;
        $this->message = $message;
    }

}
