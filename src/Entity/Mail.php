<?php
namespace App\Entity;
use Mailjet\Client;
use Mailjet\Resources;

class

Mail
{
    private $api_key="024228d3fe7435c3d36d8f2ae600491b";
    private $api_key_secret="5b80c1ee1527d98f264fb0ccf403e2f7";
    public function send($to_email,$to_name,$subject,$content){
        $mj = new Client($this->api_key,$this->api_key_secret,true,['version' => 'v3.1']);
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "ibrahim.benkhalifa.esprit@gmail.com",
                        'Name' => "Ibrahim"
                    ],
                    'To' => [
                        [
                            'Email' => $to_email,
                            'Name' => $to_name
                        ]
                    ],
                    'TemplateID' => 4381889,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => [
                    'content' => $content,

                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }
}
