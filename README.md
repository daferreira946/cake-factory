# Sobre o projeto

## requisitos:

- PHP 8.1
- Composer 2.0

## Passos para rodar

```shell
composer install
```

```shell
alias sail=vendor/bin/sail
```

```shell
cp .env.example .env
```

```shell
sail up -d
```

```shell
sail artisan key:generate
```

```
Todos os comandos são rodados com o sail, por exemplo: `sail composer install`, `sail artisan queue:work`
```


Nos containers do sail tem todos os serviços necessários, o redis para a fila e o mailhog para capturar os emails
O mailhog ficará disponível através da porta `8025`.

## Rodando os testes:

```shell
sail artisan test
```

## Json para importação via insomina
```json
{
  "_type": "export",
  "__export_format": 4,
  "__export_date": "2022-05-08T14:34:24.022Z",
  "__export_source": "insomnia.desktop.app:v2021.3.0",
  "resources": [
    {
      "_id": "req_99671a08f94a41a38fe581ff103dbcc9",
      "parentId": "fld_a94e8d80f453424796a3c1cc5679287c",
      "modified": 1652019927144,
      "created": 1651971042843,
      "url": "http://localhost/cake",
      "name": "cake index",
      "description": "",
      "method": "GET",
      "body": {},
      "parameters": [],
      "headers": [],
      "authentication": {},
      "metaSortKey": -1648660836121.5,
      "isPrivate": false,
      "settingStoreCookies": true,
      "settingSendCookies": true,
      "settingDisableRenderRequestBody": false,
      "settingEncodeUrl": true,
      "settingRebuildPath": true,
      "settingFollowRedirects": "global",
      "_type": "request"
    },
    {
      "_id": "fld_a94e8d80f453424796a3c1cc5679287c",
      "parentId": "wrk_ff9efa8620d940e38fca5cbee303fac1",
      "modified": 1652019923698,
      "created": 1652019923698,
      "name": "cake",
      "description": "",
      "environment": {},
      "environmentPropertyOrder": null,
      "metaSortKey": -1652019923698,
      "_type": "request_group"
    },
    {
      "_id": "wrk_ff9efa8620d940e38fca5cbee303fac1",
      "parentId": null,
      "modified": 1651947375741,
      "created": 1651947375741,
      "name": "Cake Factory",
      "description": "",
      "scope": "collection",
      "_type": "workspace"
    },
    {
      "_id": "req_e2e21acd8a9d4e47b6d8c937dab3936b",
      "parentId": "fld_a94e8d80f453424796a3c1cc5679287c",
      "modified": 1652020208051,
      "created": 1652020187527,
      "url": "http://localhost/cake/1",
      "name": "cake show",
      "description": "",
      "method": "GET",
      "body": {},
      "parameters": [],
      "headers": [],
      "authentication": {},
      "metaSortKey": -1648660836096.5,
      "isPrivate": false,
      "settingStoreCookies": true,
      "settingSendCookies": true,
      "settingDisableRenderRequestBody": false,
      "settingEncodeUrl": true,
      "settingRebuildPath": true,
      "settingFollowRedirects": "global",
      "_type": "request"
    },
    {
      "_id": "req_48cd76905bce40faad5a20eb891fb947",
      "parentId": "fld_a94e8d80f453424796a3c1cc5679287c",
      "modified": 1652020304554,
      "created": 1652016311160,
      "url": "http://localhost/cake",
      "name": "cake create",
      "description": "",
      "method": "POST",
      "body": {
        "mimeType": "application/json",
        "text": "{\n\t\"name\": \"red velvet\",\n\t\"weight\": 500,\n\t\"value\": 15.50,\n\t\"available_quantity\": 15\n}"
      },
      "parameters": [],
      "headers": [
        {
          "name": "Content-Type",
          "value": "application/json",
          "id": "pair_f08b2461416845d3bbd9ac8ee99969ce"
        }
      ],
      "authentication": {},
      "metaSortKey": -1648660836071.5,
      "isPrivate": false,
      "settingStoreCookies": true,
      "settingSendCookies": true,
      "settingDisableRenderRequestBody": false,
      "settingEncodeUrl": true,
      "settingRebuildPath": true,
      "settingFollowRedirects": "global",
      "_type": "request"
    },
    {
      "_id": "req_ca7ec7eb5a7f4b488dba18da075e7ff1",
      "parentId": "fld_a94e8d80f453424796a3c1cc5679287c",
      "modified": 1652020236159,
      "created": 1652019935423,
      "url": "http://localhost/cake/1",
      "name": "cake update",
      "description": "",
      "method": "PATCH",
      "body": {
        "mimeType": "application/json",
        "text": "{\n\t\"name\": \"red oliva\"\n}"
      },
      "parameters": [],
      "headers": [
        {
          "name": "Content-Type",
          "value": "application/json",
          "id": "pair_f08b2461416845d3bbd9ac8ee99969ce"
        }
      ],
      "authentication": {},
      "metaSortKey": -1647017561882.75,
      "isPrivate": false,
      "settingStoreCookies": true,
      "settingSendCookies": true,
      "settingDisableRenderRequestBody": false,
      "settingEncodeUrl": true,
      "settingRebuildPath": true,
      "settingFollowRedirects": "global",
      "_type": "request"
    },
    {
      "_id": "req_05a04c869ca648cf89568d94bf91c59f",
      "parentId": "fld_a94e8d80f453424796a3c1cc5679287c",
      "modified": 1652020344698,
      "created": 1652020329363,
      "url": "http://localhost/cake/3",
      "name": "cake destroy",
      "description": "",
      "method": "DELETE",
      "body": {},
      "parameters": [],
      "headers": [],
      "authentication": {},
      "metaSortKey": -1647017561832.75,
      "isPrivate": false,
      "settingStoreCookies": true,
      "settingSendCookies": true,
      "settingDisableRenderRequestBody": false,
      "settingEncodeUrl": true,
      "settingRebuildPath": true,
      "settingFollowRedirects": "global",
      "_type": "request"
    },
    {
      "_id": "req_428cfaee82ce4e0dae20b6616553312e",
      "parentId": "fld_82b58187a2624cedb99e13599cdabb0c",
      "modified": 1652019911955,
      "created": 1652019868280,
      "url": "http://localhost/interested-emails",
      "name": "interested email index",
      "description": "",
      "method": "GET",
      "body": {},
      "parameters": [],
      "headers": [],
      "authentication": {},
      "metaSortKey": -1652019868280,
      "isPrivate": false,
      "settingStoreCookies": true,
      "settingSendCookies": true,
      "settingDisableRenderRequestBody": false,
      "settingEncodeUrl": true,
      "settingRebuildPath": true,
      "settingFollowRedirects": "global",
      "_type": "request"
    },
    {
      "_id": "fld_82b58187a2624cedb99e13599cdabb0c",
      "parentId": "wrk_ff9efa8620d940e38fca5cbee303fac1",
      "modified": 1652019907797,
      "created": 1652019907797,
      "name": "interested email",
      "description": "",
      "environment": {},
      "environmentPropertyOrder": null,
      "metaSortKey": -1652019907797,
      "_type": "request_group"
    },
    {
      "_id": "req_11819ca2ae414bde928f5b9c2a7ef219",
      "parentId": "fld_82b58187a2624cedb99e13599cdabb0c",
      "modified": 1652020364792,
      "created": 1652020353353,
      "url": "http://localhost/interested-emails/2",
      "name": "interested email show",
      "description": "",
      "method": "GET",
      "body": {},
      "parameters": [],
      "headers": [],
      "authentication": {},
      "metaSortKey": -1652019868255,
      "isPrivate": false,
      "settingStoreCookies": true,
      "settingSendCookies": true,
      "settingDisableRenderRequestBody": false,
      "settingEncodeUrl": true,
      "settingRebuildPath": true,
      "settingFollowRedirects": "global",
      "_type": "request"
    },
    {
      "_id": "req_64fde360bae1488c9295604da1ae9a6b",
      "parentId": "fld_82b58187a2624cedb99e13599cdabb0c",
      "modified": 1652020398977,
      "created": 1652016773918,
      "url": "http://localhost/interested-emails",
      "name": "interested email create",
      "description": "",
      "method": "POST",
      "body": {
        "mimeType": "application/json",
        "text": "{\n\t\"email\": \"teste@teste.com\",\n\t\"cake_id\": 1\n}"
      },
      "parameters": [],
      "headers": [
        {
          "name": "Content-Type",
          "value": "application/json",
          "id": "pair_13f1c87829c24473a4de5ce2bdd34f23"
        }
      ],
      "authentication": {},
      "metaSortKey": -1652019868230,
      "isPrivate": false,
      "settingStoreCookies": true,
      "settingSendCookies": true,
      "settingDisableRenderRequestBody": false,
      "settingEncodeUrl": true,
      "settingRebuildPath": true,
      "settingFollowRedirects": "global",
      "_type": "request"
    },
    {
      "_id": "req_756d063a5f9d477abee96599bcf569c5",
      "parentId": "fld_82b58187a2624cedb99e13599cdabb0c",
      "modified": 1652019917273,
      "created": 1652019677194,
      "url": "http://localhost/interested-emails/batch",
      "name": "interested email create batch",
      "description": "",
      "method": "POST",
      "body": {
        "mimeType": "application/json",
        "text": "{\n\t\"cake_id\": 1,\n\t\"emails\": [\n\t\t{\n\t\t\t\"email\": \"joelma1@hotmail.com\"\n\t\t},\n\t\t{\n\t\t\t\"email\": \"joelma2@hotmail.com\"\n\t\t},\n\t\t{\n\t\t\t\"email\": \"joelma3@hotmail.com\"\n\t\t},\n\t\t{\n\t\t\t\"email\": \"joelma4@hotmail.com\"\n\t\t},\n\t\t{\n\t\t\t\"email\": \"joelma5@hotmail.com\"\n\t\t}\n\t]\n}"
      },
      "parameters": [],
      "headers": [
        {
          "name": "Content-Type",
          "value": "application/json",
          "id": "pair_13f1c87829c24473a4de5ce2bdd34f23"
        }
      ],
      "authentication": {},
      "metaSortKey": -1652019868205,
      "isPrivate": false,
      "settingStoreCookies": true,
      "settingSendCookies": true,
      "settingDisableRenderRequestBody": false,
      "settingEncodeUrl": true,
      "settingRebuildPath": true,
      "settingFollowRedirects": "global",
      "_type": "request"
    },
    {
      "_id": "req_03a3eba5b6314ad299189505a481aa6d",
      "parentId": "fld_82b58187a2624cedb99e13599cdabb0c",
      "modified": 1652020430227,
      "created": 1652019827512,
      "url": "http://localhost/interested-emails/1",
      "name": "interested email update",
      "description": "",
      "method": "POST",
      "body": {
        "mimeType": "application/json",
        "text": "{\n\t\"email\": \"teste2@teste.com\"\n}"
      },
      "parameters": [],
      "headers": [
        {
          "name": "Content-Type",
          "value": "application/json",
          "id": "pair_13f1c87829c24473a4de5ce2bdd34f23"
        }
      ],
      "authentication": {},
      "metaSortKey": -1652019868180,
      "isPrivate": false,
      "settingStoreCookies": true,
      "settingSendCookies": true,
      "settingDisableRenderRequestBody": false,
      "settingEncodeUrl": true,
      "settingRebuildPath": true,
      "settingFollowRedirects": "global",
      "_type": "request"
    },
    {
      "_id": "req_261c9bdb0cb140ceafa26c52f7564f17",
      "parentId": "fld_82b58187a2624cedb99e13599cdabb0c",
      "modified": 1652019918757,
      "created": 1652017313060,
      "url": "http://localhost/interested-emails/1",
      "name": "interested email delete",
      "description": "",
      "method": "DELETE",
      "body": {},
      "parameters": [
        {
          "name": "",
          "value": "",
          "description": "",
          "id": "pair_bb9e4c677a844e17ad625e1d6910fae4"
        }
      ],
      "headers": [],
      "authentication": {},
      "metaSortKey": -1652019868130,
      "isPrivate": false,
      "settingStoreCookies": true,
      "settingSendCookies": true,
      "settingDisableRenderRequestBody": false,
      "settingEncodeUrl": true,
      "settingRebuildPath": true,
      "settingFollowRedirects": "global",
      "_type": "request"
    },
    {
      "_id": "req_7ac2ff5b7a3d4b469da631766d291713",
      "parentId": "wrk_ff9efa8620d940e38fca5cbee303fac1",
      "modified": 1652016313372,
      "created": 1651947384549,
      "url": "http://localhost",
      "name": "home",
      "description": "",
      "method": "GET",
      "body": {},
      "parameters": [],
      "headers": [],
      "authentication": {},
      "metaSortKey": -1650304110335.25,
      "isPrivate": false,
      "settingStoreCookies": true,
      "settingSendCookies": true,
      "settingDisableRenderRequestBody": false,
      "settingEncodeUrl": true,
      "settingRebuildPath": true,
      "settingFollowRedirects": "global",
      "_type": "request"
    },
    {
      "_id": "env_766a4a14058a569a064102917bb8baea14236fd9",
      "parentId": "wrk_ff9efa8620d940e38fca5cbee303fac1",
      "modified": 1651947375935,
      "created": 1651947375935,
      "name": "Base Environment",
      "data": {},
      "dataPropertyOrder": null,
      "color": null,
      "isPrivate": false,
      "metaSortKey": 1651947375935,
      "_type": "environment"
    },
    {
      "_id": "jar_766a4a14058a569a064102917bb8baea14236fd9",
      "parentId": "wrk_ff9efa8620d940e38fca5cbee303fac1",
      "modified": 1651947375966,
      "created": 1651947375966,
      "name": "Default Jar",
      "cookies": [],
      "_type": "cookie_jar"
    },
    {
      "_id": "spc_ac1e950fe5e34e9fb803e6a1638cdf61",
      "parentId": "wrk_ff9efa8620d940e38fca5cbee303fac1",
      "modified": 1651947375744,
      "created": 1651947375744,
      "fileName": "Cake Factory",
      "contents": "",
      "contentType": "yaml",
      "_type": "api_spec"
    }
  ]
}
```