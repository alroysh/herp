<?php

curl -X POST \
-H 'Content-Type:application/json' \
-H 'Authorization: Bearer {foHivR9RW1cwM7LwHhSBOPTAjGa8o8kbmomtLhC906UPPWoB1gIsMhCXh7oE9bGA4HcnU1iGygo06OflcHmU827yGqF3qGQtwPReKwcx+QTOKHKqRFcCDFysPvqeHESKUm4Ey4gPabfHkJeT5FzOdQdB04t89/1O/w1cDnyilFU=}' \
-d '{
    "replyToken":"nHuyWiB7yP5Zw52FIkcQobQuGDXCTA",
    "messages":[
        {
            "type":"text",
            "text":"Hello, user"
        },
        {
            "type":"text",
            "text":"May I help you?"
        }
    ]
}' https://api.line.me/v2/bot/message/reply
echo "OK";
?>
