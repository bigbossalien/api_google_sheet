<?php
require_once 'api.php';
try {
    // Get the API client and construct the service object.
    $service = new Google_Service_Sheets($client);
    $hoten = isset($_REQUEST['hoten']) ? $_REQUEST['hoten'] : null;
    $sonha = isset($_REQUEST['sonha']) ? $_REQUEST['sonha'] : null;
    $thanhpho = isset($_REQUEST['thanhpho']) ? $_REQUEST['thanhpho'] : null;
    $quanhuyen = isset($_REQUEST['quanhuyen']) ? $_REQUEST['quanhuyen'] : null;
    $xaphuong = isset($_REQUEST['xaphuong']) ? $_REQUEST['xaphuong'] : null;

    $spreadsheetId = '1ZOrckc3tzXbSKB9ln-x-wwYvJBabMcHlmDBbMxxatgE';
    $range = 'Sheet1!A1:D5';
    $values = [
        ["Họ và tên", "Số nhà", "Thành phố", "Quận huyện", "Xã phường"],
        [$hoten, $sonha, $thanhpho, $quanhuyen, $xaphuong],
    ];
    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);
    $params = [
        'valueInputOption' => 'RAW'
    ];

    $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
} catch (Exception $e) {

}

