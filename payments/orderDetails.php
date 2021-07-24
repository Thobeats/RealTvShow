{
    "id": "7CP543327V584224J",
    "intent": "CAPTURE",
    "status": "COMPLETED",
    "purchase_units": [
        {
            "reference_id": "default",
            "amount": {
                "currency_code": "USD",
                "value": "67.00"
            },
            "payee": {
                "email_address": "sb-c8l43j6862468@business.example.com",
                "merchant_id": "XNLZB2DYCLTQY"
            },
            "soft_descriptor": "PAYPAL *TEST STORE",
            "shipping": {
                "name": {
                    "full_name": "IYANUOLUWA DAYISI"
                },
                "address": {
                    "address_line_1": "20 Jones Street",
                    "admin_area_2": "LAGOS",
                    "admin_area_1": "LAGOS STATE",
                    "postal_code": "100001",
                    "country_code": "NG"
                }
            },
            "payments": {
                "captures": [
                    {
                        "id": "0FK618081H6172903",
                        "status": "COMPLETED",
                        "amount": {
                            "currency_code": "USD",
                            "value": "67.00"
                        },
                        "final_capture": true,
                        "seller_protection": {
                            "status": "ELIGIBLE",
                            "dispute_categories": [
                                "ITEM_NOT_RECEIVED",
                                "UNAUTHORIZED_TRANSACTION"
                            ]
                        },
                        "create_time": "2021-07-21T21:07:10Z",
                        "update_time": "2021-07-21T21:07:10Z"
                    }
                ]
            }
        }
    ],
    "payer": {
        "name": {
            "given_name": "IYANUOLUWA",
            "surname": "DAYISI"
        },
        "email_address": "tobiy23@gmail.com",
        "payer_id": "WV7TWYZMPWXNY",
        "address": {
            "country_code": "NG"
        }
    },
    "create_time": "2021-07-21T21:06:57Z",
    "update_time": "2021-07-21T21:07:10Z",
    "links": [
        {
            "href": "https://api.sandbox.paypal.com/v2/checkout/orders/7CP543327V584224J",
            "rel": "self",
            "method": "GET"
        }
    ]
}