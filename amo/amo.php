<?php
$subdomain     = 'irinkasidorova1990'; // поддомен AmoCRM
$client_secret = 'Ld1tmRlHJ2PnOPaF333hO9G1DJknSN1QtWxwSZsPugOKX1R0FGTdFWt23F0bkbzG'; // Секретный ключ
$client_id     = '3a59a4f2-1ef1-466b-a397-a35313e34be0'; // ID интеграции
$code          = 'def502006827db117e2be0f9aaa074716544b967b8c0335c875c34dd0e63b56ae0b099e1c6842d5da2b0eea871fc7dbe679c6169e95f6ae0fb51795a15254ac6f201ff8ceeaf9b5853201bb6bca71bc191c58f3485b2940d16553ffc87c2faf3a6123c1e45f9ba42d6d4ef6837baa71fae594f98af08379ecadabd68642c1e37cbbbc25d00f25e34d89d73289c477767b199776f78ae21c07973b917ecaa4233cbddd8d0526449821f638776c9c3c5aac624511c023e0c3838481892b1dd798e2f98925f69c87151525d7bd10346e79c6574a53a8a0ebd3e2faa31129d33cbf40afd2c9ca2339287ac0510abfae3cfc6739f1215572451d413918918ad4543ae49f435e51c71a00eeb1ae7799a30faeb83ab78c6b6e97a1a65da9e6743cca9fd79aee6fa7697356e72cb1d40f00c1ec27cd21441fada08c0c1d6f528702bd3a914fb05292e355a7a1d31549826b8c4b43cfd824c767eeab99dd317f978742af7e00b4d038eb18b6306541129e1746c005ec8726ca7e9fec2e4782f4fc285e35076b1a5259a029a8510dc7729e6a026f824195f055435dbdd03cc87fc2b423c2f2c0312a21ee13f7f6c0104f736e0c7ed2c00450196a8cbd4199e1b941f5e6a2d44311b77e2bbab18c4eb8ff1eadcaf03aa454e7702f481167437bbcd9050a88a97a0d1ea934a37f2a405'; // Код авторизации
$token_file    = 'tokens.txt';
$redirect_uri  = 'https://LarryCrub.github.io/amo/amo.php';


require_once 'access.php';

    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

$custom_field_id = 454021;
$custom_field_value = 'тест';

$ip = '1.2.3.4';
$domain = 'site.ua';
$price = 0;
$pipeline_id = 5059931;
$user_amo = 0;

$utm_source   = '';
$utm_content  = '';
$utm_medium   = '';
$utm_campaign = '';
$utm_term     = '';
$utm_referrer = '';

$data = [
    [
        "name" => $phone,
        "price" => $price,
        "responsible_user_id" => (int) $user_amo,
        "pipeline_id" => (int) $pipeline_id,
        "_embedded" => [
            "metadata" => [
                "category" => "forms",
                "form_id" => 1,
                "form_name" => "Форма на сайте",
                "form_page" => $target,
                "form_sent_at" => strtotime(date("Y-m-d H:i:s")),
                "ip" => $ip,
                "referer" => $domain
            ],
            "contacts" => [
                [
                    "first_name" => $name,
                    "custom_fields_values" => [
                        [
                            "field_code" => "EMAIL",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $email
                                ]
                            ]
                        ],
                        [
                            "field_code" => "PHONE",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $phone
                                ]
                            ]
                        ],
                        [
                            "field_id" => (int) $custom_field_id,
                            "values" => [
                                [
                                    "value" => $custom_field_value
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            "companies" => [
                [
                    "name" => $company
                ]
            ]
        ],
        "custom_fields_values" => [
            [
                "field_code" => 'UTM_SOURCE',
                "values" => [
                    [
                        "value" => $utm_source
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_CONTENT',
                "values" => [
                    [
                        "value" => $utm_content
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_MEDIUM',
                "values" => [
                    [
                        "value" => $utm_medium
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_CAMPAIGN',
                "values" => [
                    [
                        "value" => $utm_campaign
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_TERM',
                "values" => [
                    [
                        "value" => $utm_term
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_REFERRER',
                "values" => [
                    [
                        "value" => $utm_referrer
                    ]
                ]
            ],
        ],
    ]
];

$method = "/api/v4/leads/complex";

$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token,
];

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru".$method);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'amo/cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'amo/cookie.txt');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$code = (int) $code;
$errors = [
    301 => 'Moved permanently.',
    400 => 'Wrong structure of the array of transmitted data, or invalid identifiers of custom fields.',
    401 => 'Not Authorized. There is no account information on the server. You need to make a request to another server on the transmitted IP.',
    403 => 'The account is blocked, for repeatedly exceeding the number of requests per second.',
    404 => 'Not found.',
    500 => 'Internal server error.',
    502 => 'Bad gateway.',
    503 => 'Service unavailable.'
];

if ($code < 200 || $code > 204) die( "Error $code. " . (isset($errors[$code]) ? $errors[$code] : 'Undefined error') );


$Response = json_decode($out, true);
$Response = $Response['_embedded']['items'];
$output = 'ID добавленных элементов списков:' . PHP_EOL;
foreach ($Response as $v)
    if (is_array($v))
        $output .= $v['id'] . PHP_EOL;
return $output;
