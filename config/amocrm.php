<?php

return [
    'domain' => env('AMO_DOMAIN', 'test123convy.amocrm.ru'),
    'login' => env('AMO_LOGIN', 'test123convy@gmail.com'),
    'access_token' => env('AMO_TOKEN', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImQ3MzRmZWFiYzZhM2ZkY2Q2ODAyMDc0YTY4YzQ3NGQwNTU3YzY2OGY1MjhkOTM2MmQzZDg1ZmYzYWJkODdlNTkwNWJiMWY3MWRhZGY5MzRjIn0.eyJhdWQiOiJlNGExMWRlMC1kYzI0LTRjNzEtYWI3Ny0yZmQ2ZGNlZmQxMzMiLCJqdGkiOiJkNzM0ZmVhYmM2YTNmZGNkNjgwMjA3NGE2OGM0NzRkMDU1N2M2NjhmNTI4ZDkzNjJkM2Q4NWZmM2FiZDg3ZTU5MDViYjFmNzFkYWRmOTM0YyIsImlhdCI6MTcyNTAwOTUzNSwibmJmIjoxNzI1MDA5NTM1LCJleHAiOjE3Mjc2NTQ0MDAsInN1YiI6IjExNDU1MDU4IiwiZ3JhbnRfdHlwZSI6IiIsImFjY291bnRfaWQiOjMxOTIyNTkwLCJiYXNlX2RvbWFpbiI6ImFtb2NybS5ydSIsInZlcnNpb24iOjIsInNjb3BlcyI6WyJjcm0iLCJmaWxlcyIsImZpbGVzX2RlbGV0ZSIsIm5vdGlmaWNhdGlvbnMiLCJwdXNoX25vdGlmaWNhdGlvbnMiXSwiaGFzaF91dWlkIjoiMWNjZjk1ZTYtYmM1Yi00YmYzLTgwNWQtY2QxMzFiM2FjNmIyIiwiYXBpX2RvbWFpbiI6ImFwaS1iLmFtb2NybS5ydSJ9.JyjTl5vboPyeUTpCE_kHn0HGWbELiOabTPlwFq2HvmfqPj8x1hbCsJwfWbdZKl0gOiALPxi1ilR3tcQG2bguOZhOISP_ertcBXAEU0nTeEY818qb536qJQaRtw3HPjeZypa58tmWfHO7HVf_ZtzRp9lxaIVgXa2qgdtALp6gsuDJqDaiTHTsB0dHDkpp6C25FDxvs0CnahU4dHMFv-5sfg7GNeT6_YXeKM3kGmLyFJG4WCDzfXJnFP4y9RTNaMGbfPN_ByCI0hr3NZ7K6aNkxVjZXaNmbYpMfaSI8hyFyT1sj9dzBAndo4MddZ41VlmMl2Q3x8a-BHnbYX9faZdUug'),

    'custom_fields_ids' => [
        'contacts' => [
            'phone' => env('AMO_PHONE_FIELD_ID', 956363),
            'email' => env('AMO_EMAIL_FIELD_ID', 956365),
        ],
        'leads' => [
            'half_minute_trigger' => env('AMO_HALF_MINUTE_TRIGGER_FIELD_ID', 958543),
        ],
    ],
];
