<?php

interface INotification {
    public function send(Notification $notification);
}

class EmailNotificationAdapter implements INotification {
    private $emailService;

    public function __construct(ExternalEmailService $emailService) {
        $this->emailService = $emailService;
    }

    public function send(Notification $notification) {
        $emailMessage = new EmailMessage();
        $emailMessage->setTo($notification->getRecipient());
        $emailMessage->setUid($notification->getUid());
        $emailMessage->setBody($notification->getMessage());
        $this->emailService->sendEmail($emailMessage);
    }
}

class Notification {
    private $recipient;
    private $uid;
    private $message;

    public function getRecipient() {
        return $this->recipient;
    }

    public function setRecipient($recipient) {
        $this->recipient = $recipient;
    }

    public function getUid() {
        return $this->uid;
    }

    public function setUid($uid) {
        $this->uid = $uid;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }
}

class ExternalEmailService {
    private $status;
    
    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function updateEmailTemplate($templateId, $newTemplateDetails){
        $url = 'https://api.sendgrid.com/v3/templates/' . $templateId;
        $apiKey = 'rbajspHK2vd304m2vqycgDsWONE9oPRheH4jSgiHGDfnHbkkURwVZFgVMb1EUeASR5Tmo8ukWagJiKB3VtXwY9SWMuW6o51vYTH4vk9ZhHkRqJ3otUEo2O8uXyD8anZZbYbx1ddSXIVH6uNFk2oSAWG70fFBwZ2eYSZ3iw9VqVKLmcVfS4GxKISxBbSKkpbOKMyX23sSGwwHuzzDwtA6cfhMLl6vGLbZyxDMkAOJ2lBaaVhVzU2LgBaOqmOvxKHT';
        $data = $newTemplateDetails;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey,
        ]);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->setStatus($statusCode);

        curl_close($ch);
        return $response;
    }

    public function sendEmail(EmailMessage $message) {
        $url = 'https://api.sendgrid.com/v3/mail/send'; 
        $apiKey = 'rbajspHK2vd304m2vqycgDsWONE9oPRheH4jSgiHGDfnHbkkURwVZFgVMb1EUeASR5Tmo8ukWagJiKB3VtXwY9SWMuW6o51vYTH4vk9ZhHkRqJ3otUEo2O8uXyD8anZZbYbx1ddSXIVH6uNFk2oSAWG70fFBwZ2eYSZ3iw9VqVKLmcVfS4GxKISxBbSKkpbOKMyX23sSGwwHuzzDwtA6cfhMLl6vGLbZyxDMkAOJ2lBaaVhVzU2LgBaOqmOvxKHT';
    
        $data = [
            "personalizations" => [
                [
                    "to" => [
                        ["email" => $message->getTo()]
                    ],
                    "subject" => $message->getUid()
                ]
            ],
            "from" => [
                "email" => "rcms@gmail.com" 
            ],
            "content" => [
                [
                    "type" => "text/plain",
                    "value" => $message->getBody()
                ]
            ]
        ];
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        ]);
    
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }
    
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $this->setStatus($statusCode);
    
        curl_close($ch);

        if ($statusCode === 202) {
            // Email was accepted by SendGrid for delivery
            return true;
        } else {
            // There was an error sending the email
            return false;
        }
    }
}

class EmailMessage {
    private $to;
    private $uid;
    private $body;

    public function getTo() {
        return $this->to;
    }

    public function setTo($to) {
        $this->to = $to;
    }

    public function getUid() {
        return $this->uid;
    }

    public function setUid($uid) {
        $this->uid = $uid;
    }

    public function getBody() {
        return $this->body;
    }

    public function setBody($body) {
        $this->body = $body;
    }
}
