<?php
/**
 * @param $ob
 */
function p($ob)
{
    print_r('<div style="background-color:#ccc;color:#fff;width:50%;padding:25px 5px;border-radius:5px;margin: 0 auto;">' . $ob . '</div><br/>');


}

/**
 * api return
 * @param int $code
 * @param string $message
 * @param array $data
 */
function output(array $data = [], $code = 0, $message = 'success')
{
    header("Content-type:text/html;charset=utf-8");
    $result = [
        'code' => $code,
        'message' => $message,
        'data' => $data
    ];
    echo json_encode($result);
    exit();

}