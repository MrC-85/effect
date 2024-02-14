<?php

namespace Tests\Unit;

use App\Services\PdfService;
use Aws\Result;
use PHPUnit\Framework\TestCase;

class PdfServiceTest extends TestCase
{
    public function testExtractTextFromResponse()
    {
        $response = new Result(json_decode(
            '{
                    "DocumentMetadata": {
                        "Pages": 1
                    },
                    "Blocks": [
                        {
                            "BlockType": "PAGE",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 1,
                                    "Height": 1,
                                    "Left": 0,
                                    "Top": 0
                                },
                                "Polygon": [
                                    {
                                        "X": 0,
                                        "Y": 0
                                    },
                                    {
                                        "X": 1,
                                        "Y": 1.4588448493668693e-7
                                    },
                                    {
                                        "X": 1,
                                        "Y": 1
                                    },
                                    {
                                        "X": 1.254344738299551e-6,
                                        "Y": 1
                                    }
                                ]
                            },
                            "Id": "64f45bfa-6e3d-4515-90fc-5a73468d7379",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "7bce4022-7665-4405-866b-731306a7e0c3",
                                        "19187179-72ac-44de-a094-e0e16acf378b",
                                        "f9e9aef1-3e40-447b-8355-100986a41077",
                                        "e0e50645-533d-4f3a-8ab2-1e7a6db02945",
                                        "ff1d4e84-fb21-4a8a-8f8c-2d76e8cd39d6",
                                        "a005faa6-0e44-41e6-aa3f-fdce01e53304",
                                        "40a8112f-ab07-48f8-aaeb-98780709940e",
                                        "b9bae998-8991-4982-8a19-9a2728486f1f",
                                        "f9614a48-e9a8-46c3-9f30-3e6c2703c719",
                                        "ae836001-2baf-489f-81f6-34608512c75d",
                                        "74ea3082-7beb-4224-b634-391d1a4f85b0",
                                        "88bf6443-39a5-46d1-b2f9-2b87ed8a3859",
                                        "3609840c-a119-4808-8417-1b976adcfaf5",
                                        "57b67fa4-a882-48b9-8309-04f59cc97f0d",
                                        "107dbbf4-e710-4699-81e7-5f18fbdf6e5a",
                                        "50260c9b-b057-4008-8533-f8ff81f2407a",
                                        "9cb868f1-e960-48ee-a91b-82ef3421f307",
                                        "7d61a384-74e9-4bd2-9638-07d0b7171e85",
                                        "30625755-47a1-43b7-b811-492f28972048",
                                        "0fa1f82b-0ec2-45f0-a8a8-b805a9611731",
                                        "d5fe5c56-0056-49e8-b014-c907b455a8ee",
                                        "af5487a4-8905-4a29-a8d5-2dc6e3f32e3b",
                                        "ad559f03-4421-4ace-845b-b3236bb42520",
                                        "05122bf4-0ac8-4519-9208-4e4c57bcce4b",
                                        "3a132c2f-af2b-423a-9a25-e5d4ac7ebc9d",
                                        "a58b4f06-81c1-4753-ac83-d3089b073b8f",
                                        "f0a14d43-8f82-423a-9514-4bbd87bbba74",
                                        "9a01fcb3-a03c-4074-881e-00df2584060e",
                                        "2eb4909d-a256-4e0d-aecf-e452be8f29fe",
                                        "43ae608d-147e-4806-b783-6f5768ec96a0"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.68154907226562,
                            "Text": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dictum ipsum leo. Duis sit",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7364214062690735,
                                    "Height": 0.012788509950041771,
                                    "Left": 0.12094634026288986,
                                    "Top": 0.10494504123926163
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12094634026288986,
                                        "Y": 0.10494504123926163
                                    },
                                    {
                                        "X": 0.8573576211929321,
                                        "Y": 0.10506483167409897
                                    },
                                    {
                                        "X": 0.857367753982544,
                                        "Y": 0.11773355305194855
                                    },
                                    {
                                        "X": 0.12095701694488525,
                                        "Y": 0.11762679368257523
                                    }
                                ]
                            },
                            "Id": "7bce4022-7665-4405-866b-731306a7e0c3",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "e3df5265-ae28-493e-9900-64e80dc0ffc6",
                                        "539f8540-cc79-4d56-81c1-112f653fba5c",
                                        "19de17af-e1e7-479f-bd44-a0feebc9ca41",
                                        "3c62a246-a668-4038-95d5-7d72dd938707",
                                        "9adb0b31-78f6-4ad1-a1f4-a92418bbfff9",
                                        "433c8702-95a7-4ca1-bf25-7b428568f226",
                                        "cd3c8ffa-ca0e-4ac4-971a-4f48118b6c95",
                                        "9c07ed76-7b1f-42e0-a491-383db966be46",
                                        "ff3b35d2-0f96-4540-ba06-42670d8ab524",
                                        "4ef4fb76-07f0-4c26-9f66-b68d434f0da7",
                                        "ebbe4344-6950-4a35-808b-84d8692bf1e8",
                                        "bde23348-e2bb-48a2-b377-ec3d01628369",
                                        "25f184ec-c123-4443-aacf-59f1fce432d1",
                                        "f740f2b5-5b97-465b-87d1-ffbca496a3bd"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 98.6956787109375,
                            "Text": "amet tellus et nunc hendrerit rhoncus at in tellus. Pellentesque at quam elementum, pharetra",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7544593811035156,
                                    "Height": 0.012652290984988213,
                                    "Left": 0.12061325460672379,
                                    "Top": 0.12209562957286835
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12061325460672379,
                                        "Y": 0.12209562957286835
                                    },
                                    {
                                        "X": 0.8750625848770142,
                                        "Y": 0.12220030277967453
                                    },
                                    {
                                        "X": 0.8750725984573364,
                                        "Y": 0.1347479224205017
                                    },
                                    {
                                        "X": 0.12062382698059082,
                                        "Y": 0.13465645909309387
                                    }
                                ]
                            },
                            "Id": "19187179-72ac-44de-a094-e0e16acf378b",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "6aa0007f-1453-48cd-88df-18bc0d726a34",
                                        "26877205-717f-4c2e-a8ef-15997680051e",
                                        "ab5b56f7-dd63-4c76-b2a7-4a81f39da318",
                                        "c8ffa35b-14e4-464f-8514-8c8001276033",
                                        "ce7e2294-45c8-494f-b361-cf05f728adf4",
                                        "6de62dfc-24ef-4adc-bef4-0e7d8dff6c5c",
                                        "95065f98-e8dd-4cc1-b20a-14eb2b60aef6",
                                        "cb0d975b-8bfe-4c8c-891f-2ae3aec813f0",
                                        "ea7afd1a-e0fb-4df4-8b6b-1caf88131af4",
                                        "2f63d3e3-f0fd-40e4-9b8c-a0e27a4fdba5",
                                        "9c2f91dc-c085-4800-a98b-438e89c80a0a",
                                        "274b9608-c544-46f7-ae30-984062941ea2",
                                        "e0d57271-01ad-4991-a0b1-fabd96e4eb37",
                                        "869aa292-975c-4bd2-a5ab-39a023c18c15"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.23711395263672,
                            "Text": "diam vel, finibus risus. Nunc feugiat non erat eget aliquam. Aliquam dignissim libero id",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7011241316795349,
                                    "Height": 0.0128049710765481,
                                    "Left": 0.12044475227594376,
                                    "Top": 0.13940879702568054
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12044475227594376,
                                        "Y": 0.13940879702568054
                                    },
                                    {
                                        "X": 0.8215586543083191,
                                        "Y": 0.13948914408683777
                                    },
                                    {
                                        "X": 0.8215689063072205,
                                        "Y": 0.15221376717090607
                                    },
                                    {
                                        "X": 0.12045547366142273,
                                        "Y": 0.1521458625793457
                                    }
                                ]
                            },
                            "Id": "f9e9aef1-3e40-447b-8355-100986a41077",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "4da424bb-85b5-439f-81af-cc2c1672cfe9",
                                        "c026cb52-8808-404f-83d3-b5b94a7e6d9b",
                                        "989e23b1-3210-4b05-aa7f-805e6f552d4e",
                                        "24e7e41d-d270-4298-8a46-970d88fc5d5b",
                                        "60010e07-4f9c-43a3-af3c-f7447c173083",
                                        "ccb2d4be-f321-4985-af2a-17257256b361",
                                        "586b593b-e41a-4349-88ac-a85d17c812f7",
                                        "f4217fe5-02bf-4416-9096-ccb10564d4d3",
                                        "177094cb-2ef8-4818-8de0-6baba84bec32",
                                        "53b5969c-bb27-4a6d-83db-a9afa042c4e6",
                                        "c04d65eb-79fb-416f-b45b-cd61b9a21394",
                                        "1491c0f5-d860-4e44-ac22-dbade83abaaf",
                                        "1e8d98fd-6e1a-4adf-9ff8-8d2448c95105",
                                        "6e41cc3b-484f-4f2f-8e02-30a8ba7f287b"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.470703125,
                            "Text": "vestibulum pretium. Donec ac nulla nec nunc laoreet congue. Suspendisse condimentum",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7251647710800171,
                                    "Height": 0.013345901854336262,
                                    "Left": 0.12016765773296356,
                                    "Top": 0.15636253356933594
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12016765773296356,
                                        "Y": 0.15636253356933594
                                    },
                                    {
                                        "X": 0.845321774482727,
                                        "Y": 0.1564284861087799
                                    },
                                    {
                                        "X": 0.8453323841094971,
                                        "Y": 0.16970843076705933
                                    },
                                    {
                                        "X": 0.12017884850502014,
                                        "Y": 0.1696559190750122
                                    }
                                ]
                            },
                            "Id": "e0e50645-533d-4f3a-8ab2-1e7a6db02945",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "2b07dd58-8f82-4fdd-babc-eef0e6a300de",
                                        "b590af5e-b597-4581-b271-ad3e5e075441",
                                        "03205cbf-243f-4dce-ab96-910fa8239f14",
                                        "163c6c78-4b5b-4500-baef-b0727ef7292c",
                                        "8868de04-85e8-4f92-96b5-d440bd9038e1",
                                        "a65b762e-8f95-40b8-b6cc-a9227edbc41b",
                                        "5f918590-d9f0-41c6-9f50-4563fef034bc",
                                        "385a6199-4427-4ffd-996f-3b11ae82e628",
                                        "0173a35a-648f-4265-89ff-52df829a0691",
                                        "9e5b92d8-06cf-41f9-a506-cf0672808c84",
                                        "5d10582a-3bb6-47fa-b54e-e276c440fb47"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.1507797241211,
                            "Text": "ultricies suscipit. Proin imperdiet dictum vehicula. Maecenas egestas turpis id feugiat luctus.",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7489901185035706,
                                    "Height": 0.012874159030616283,
                                    "Left": 0.12084450572729111,
                                    "Top": 0.17381292581558228
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12084450572729111,
                                        "Y": 0.17381292581558228
                                    },
                                    {
                                        "X": 0.8698243498802185,
                                        "Y": 0.17386282980442047
                                    },
                                    {
                                        "X": 0.8698346614837646,
                                        "Y": 0.18668708205223083
                                    },
                                    {
                                        "X": 0.12085531651973724,
                                        "Y": 0.1866505891084671
                                    }
                                ]
                            },
                            "Id": "ff1d4e84-fb21-4a8a-8f8c-2d76e8cd39d6",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "068fc656-9eed-4a10-8899-6228970d41fa",
                                        "10cab5b1-28a9-4cfc-b0f9-161b01aec2d5",
                                        "aa0b3749-cec6-48d4-8feb-95ad9959b240",
                                        "553e75e0-f0f1-4040-acf9-7a1bf1eb81fb",
                                        "a2234a9c-ee79-4a36-898e-e5c301a8d99d",
                                        "96dd02ab-c7c5-4398-8d51-4ad31aad20f6",
                                        "7b8842af-1d7c-45a7-b545-4382088d4397",
                                        "0d0af1ba-4900-4d9e-a3e7-bfd5119028c0",
                                        "5c1c9e69-015b-4d75-b6b1-5a1cd13f9fd7",
                                        "c8752087-d03e-49bb-a456-a3e3dab4523b",
                                        "2a709319-ffb4-4b4b-b5e4-bfb0c5c6baa2",
                                        "ad81b526-d970-4e66-9919-221345ecf4fe"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.38543701171875,
                            "Text": "Cras sollicitudin vulputate nisi in auctor. Cras tristique mi ut ex dignissim dignissim. Aenean",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7415489554405212,
                                    "Height": 0.013073556125164032,
                                    "Left": 0.12087403982877731,
                                    "Top": 0.1910123974084854
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12087403982877731,
                                        "Y": 0.1910123974084854
                                    },
                                    {
                                        "X": 0.8624125719070435,
                                        "Y": 0.19104401767253876
                                    },
                                    {
                                        "X": 0.8624230027198792,
                                        "Y": 0.20408594608306885
                                    },
                                    {
                                        "X": 0.12088502943515778,
                                        "Y": 0.20406782627105713
                                    }
                                ]
                            },
                            "Id": "a005faa6-0e44-41e6-aa3f-fdce01e53304",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "dd47a0b0-303a-4015-8c96-07a8f1a64be4",
                                        "1929da04-f354-4c8b-a924-e583c9968018",
                                        "bc0aabac-0fc3-493c-9141-a1b73500b485",
                                        "2987c756-dc31-4981-b6f3-5d345ca7e8d4",
                                        "edfca01a-fcfe-4acc-b953-f72809bb1542",
                                        "1120f126-e891-4c6d-b9d2-2faee7853ffc",
                                        "372436fc-d10f-4f2b-bc3e-26666c718d22",
                                        "8729cc90-f8d5-4a93-b09d-22774e65b572",
                                        "5f7f3d78-58f4-42e5-a5f0-593efc0fae86",
                                        "3aca8dba-78f1-4f67-838c-fa9a1b1ff092",
                                        "20091781-2607-42ad-a273-0a5b90b650f7",
                                        "c4e95b8d-b6cb-49a9-b7fe-b90ca40edccc",
                                        "5f2a75e7-fe2e-4d6e-aecd-a3d3182c7c71",
                                        "ed2e1680-97b8-440e-81ac-9e4d7c0f8312"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 97.34977722167969,
                            "Text": "nec sagittis turpis, a sodales nisi. Sed nec felis ullamcorper, porta nisi eu, vehicula nulla.",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7152022123336792,
                                    "Height": 0.012957191094756126,
                                    "Left": 0.12107200920581818,
                                    "Top": 0.20830486714839935
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12107200920581818,
                                        "Y": 0.20830486714839935
                                    },
                                    {
                                        "X": 0.8362638354301453,
                                        "Y": 0.20831812918186188
                                    },
                                    {
                                        "X": 0.8362742066383362,
                                        "Y": 0.22126206755638123
                                    },
                                    {
                                        "X": 0.12108291685581207,
                                        "Y": 0.22126173973083496
                                    }
                                ]
                            },
                            "Id": "40a8112f-ab07-48f8-aaeb-98780709940e",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "52afe242-7a92-4ae6-84b3-b39e80771fa7",
                                        "634a9eba-873f-4397-b24b-b320784ae499",
                                        "e81309a5-c288-4a1b-aa51-b624ae0470c5",
                                        "f7aff25d-83a3-4039-8b2d-e44a17571987",
                                        "d4f5109c-319f-4b46-a354-398533c80070",
                                        "8ee5f850-346c-4dce-b565-d29f8fdb16a7",
                                        "4dfa3ef0-8279-4b82-bcc3-a04b1ca7dfa7",
                                        "6536aebb-9519-45c9-bfc4-adda9c22da5a",
                                        "546f36c9-e692-456f-ba9f-0b79e3aa35fd",
                                        "a4cc5ff9-4b31-4a44-9a26-d8c6a78f0535",
                                        "e3b6f230-9b6d-4075-8e10-a756468de366",
                                        "a3adbf1e-9000-489f-ac2f-b72bae000c1d",
                                        "dff0c6db-f7e5-4820-8e15-6d626415cdc6",
                                        "26288c71-8d18-44b0-aa5d-c90baafcc951",
                                        "7fcac388-870d-445e-9299-51a9a5f44354"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.53095245361328,
                            "Text": "Proin et ipsum molestie ipsum ornare tempor. Nam augue magna, eleifend a luctus eu,",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7051311135292053,
                                    "Height": 0.012779216282069683,
                                    "Left": 0.12109647691249847,
                                    "Top": 0.22582311928272247
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12109647691249847,
                                        "Y": 0.22582729160785675
                                    },
                                    {
                                        "X": 0.8262173533439636,
                                        "Y": 0.22582311928272247
                                    },
                                    {
                                        "X": 0.826227605342865,
                                        "Y": 0.23858562111854553
                                    },
                                    {
                                        "X": 0.12110722810029984,
                                        "Y": 0.23860234022140503
                                    }
                                ]
                            },
                            "Id": "b9bae998-8991-4982-8a19-9a2728486f1f",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "553d6a9b-51f1-48be-b4b9-71a86e12098b",
                                        "bca14a96-3ead-499d-adfc-7b52608f5cf7",
                                        "3974a21f-8a39-4b3a-8dbb-0339c1cadb00",
                                        "12dd2299-e7a9-40b4-956d-6fc42a42dc9f",
                                        "91d8187a-a956-41c6-9207-0a7aeebf9b7a",
                                        "22d39da8-50f5-4ccd-95e3-7963ebeacb00",
                                        "78e8c99c-21d4-4b7e-9596-1bf51823a5f7",
                                        "c786f90f-dad0-4d5b-8b0a-ac23f5e39652",
                                        "caadbf31-4e54-40c4-aedb-3186a6c6ae0d",
                                        "65ac8b4e-cfe0-4a42-891d-ea4119ae1548",
                                        "00a88b8b-0550-4693-9b91-4f9fcd98e5bf",
                                        "5152b969-d6e3-4aa8-93dc-31fed7f95edc",
                                        "0d04f707-6544-4b98-bf2f-73bbce612e25",
                                        "226e0741-ae9f-4370-a5cb-abcc8b9d78da"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.20696258544922,
                            "Text": "rutrum sit amet neque. Maecenas sit amet urna arcu.",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.42938223481178284,
                                    "Height": 0.012479341588914394,
                                    "Left": 0.12084858119487762,
                                    "Top": 0.2431294173002243
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12084858119487762,
                                        "Y": 0.24314232170581818
                                    },
                                    {
                                        "X": 0.5502206087112427,
                                        "Y": 0.2431294173002243
                                    },
                                    {
                                        "X": 0.5502308011054993,
                                        "Y": 0.2555883824825287
                                    },
                                    {
                                        "X": 0.1208590716123581,
                                        "Y": 0.25560876727104187
                                    }
                                ]
                            },
                            "Id": "f9614a48-e9a8-46c3-9f30-3e6c2703c719",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "42211fe1-ceda-4101-97c3-21b261851046",
                                        "846ddc11-cf95-4a5d-8dc7-412c1345e32a",
                                        "1bec41bb-a9a1-48e8-a0a9-08074de87e7d",
                                        "70da3d1e-b4d2-4c44-b095-9fa2636f269c",
                                        "ff3a43d8-11e4-43dc-ba6d-123b02d4f494",
                                        "94404c83-3e95-4e10-a155-e362c231e1c3",
                                        "5cbd3af1-6fbb-4909-ac70-e49cdc74c3ff",
                                        "3cbe0236-e860-4165-b8fa-a29daf8ad371",
                                        "faac3857-ed02-4fbf-b0ec-5e48918aecc7"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.26314544677734,
                            "Text": "In hac habitasse platea dictumst. Nulla quis rutrum ligula, sed ultrices nulla. Pellentesque",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7239298820495605,
                                    "Height": 0.01295890286564827,
                                    "Left": 0.12155688554048538,
                                    "Top": 0.2776959538459778
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12155688554048538,
                                        "Y": 0.27775266766548157
                                    },
                                    {
                                        "X": 0.8454764485359192,
                                        "Y": 0.2776959538459778
                                    },
                                    {
                                        "X": 0.8454867601394653,
                                        "Y": 0.29058513045310974
                                    },
                                    {
                                        "X": 0.1215677484869957,
                                        "Y": 0.29065486788749695
                                    }
                                ]
                            },
                            "Id": "ae836001-2baf-489f-81f6-34608512c75d",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "a40ca452-b12a-4b75-b9f8-ecb057ee4a43",
                                        "15341653-cf08-4a17-96eb-28cf23ea65b0",
                                        "fc61ab5c-95d2-42ea-99dd-a6142a4ddf91",
                                        "b78ac937-328f-4c77-a37b-4633409dd0f4",
                                        "2c2e2ca0-b9e3-4ca6-a3a3-9e8f50030281",
                                        "abefd207-5657-4985-a59d-f5e8843c0bc8",
                                        "33955062-448f-49d2-b066-50d36fbeca70",
                                        "19f45de4-002f-4889-bd7a-81014b15a529",
                                        "8528c326-7d4f-4dd1-8b5a-a0854f2d0018",
                                        "47b06494-981e-41f3-b5fd-d7353861c016",
                                        "0f8712fa-4f11-4764-b756-400fe83d68ab",
                                        "706416d8-878f-4774-bc4e-b429c920bc6e",
                                        "6fa78d68-c007-4166-bfb8-5a64d57d14f6"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 98.94601440429688,
                            "Text": "fermentum tortor eu nunc sagittis eleifend. Integer lacus orci, ultricies ac mattis vitae, blandit",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7505596280097961,
                                    "Height": 0.01280274335294962,
                                    "Left": 0.12004034966230392,
                                    "Top": 0.2948104441165924
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12004034966230392,
                                        "Y": 0.29488715529441833
                                    },
                                    {
                                        "X": 0.8705897927284241,
                                        "Y": 0.2948104441165924
                                    },
                                    {
                                        "X": 0.8705999851226807,
                                        "Y": 0.3075231611728668
                                    },
                                    {
                                        "X": 0.1200510635972023,
                                        "Y": 0.30761319398880005
                                    }
                                ]
                            },
                            "Id": "74ea3082-7beb-4224-b634-391d1a4f85b0",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "c0a75c0d-e6b3-4529-9657-d6effc3e9030",
                                        "4dbc3c6b-fd8f-40fe-ae2f-66a4160d7cb9",
                                        "fbcbb1f8-bbaf-483d-92d5-87ce6624219a",
                                        "a2418400-93c0-4573-b063-67f8da3ad98d",
                                        "abc95f1d-59c4-4f8d-9269-8d2c7fa37f8e",
                                        "a7dc39ee-b26e-4385-af46-ecda441b9af3",
                                        "ab758f11-8bd7-41b3-a45b-fd4137d666d6",
                                        "1aa4250d-f975-498d-8091-44f7e9bf23bd",
                                        "6d4af05a-00fb-4430-8ee0-0249c0634762",
                                        "5a06d0c2-61eb-4ac7-b340-43c3843ec9ba",
                                        "8267a4ac-7463-4d9e-864b-d87581c31bf9",
                                        "0ec803b4-487a-4b1f-9490-9bcb9c665530",
                                        "4b9de126-4718-4fee-b1cc-0ebbfe8888f0",
                                        "2cd88d80-980a-475c-9793-f9b0071ec4c7"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.07717895507812,
                            "Text": "ut libero. Vivamus mi velit, molestie eget pellentesque non, feugiat molestie mauris. Aenean",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7466296553611755,
                                    "Height": 0.012904932722449303,
                                    "Left": 0.12075133621692657,
                                    "Top": 0.31212079524993896
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12075133621692657,
                                        "Y": 0.3122151494026184
                                    },
                                    {
                                        "X": 0.8673707246780396,
                                        "Y": 0.31212079524993896
                                    },
                                    {
                                        "X": 0.8673809766769409,
                                        "Y": 0.3249180316925049
                                    },
                                    {
                                        "X": 0.12076211720705032,
                                        "Y": 0.325025737285614
                                    }
                                ]
                            },
                            "Id": "88bf6443-39a5-46d1-b2f9-2b87ed8a3859",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "83ebbec7-2297-491f-ac27-3ab0ece8b1bd",
                                        "54eb8b55-9092-430f-bc3a-f16796f37501",
                                        "4910d7de-b603-44cb-8330-8e8f7b118868",
                                        "9bb3add1-052c-42af-8289-cd02c26a2175",
                                        "81c813ea-93c0-4962-b0be-8e09bf98e529",
                                        "acd2a283-215d-4d19-8786-cf6f6db45284",
                                        "f797f6a1-dbf6-46bf-9731-261f418df3ac",
                                        "19801ea8-5514-47de-b28e-8ea835691fa0",
                                        "510eea02-c7ca-4987-a6c0-9aa8c17bbc81",
                                        "f90c47d7-6b8f-4688-9622-9e1a6a27f1e1",
                                        "5fc659a9-ef0e-4f07-b84d-ccb69edc78c0",
                                        "3d14205f-f223-4e7f-8dfa-436b91a81f81",
                                        "7f944587-7b9f-43a3-a724-41b6ecf2eca2"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.67704772949219,
                            "Text": "molestie erat accumsan, ultricies urna non, luctus augue. Donec auctor massa in tellus",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.705908477306366,
                                    "Height": 0.012884613126516342,
                                    "Left": 0.12090951949357986,
                                    "Top": 0.32924187183380127
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12090951949357986,
                                        "Y": 0.3293479382991791
                                    },
                                    {
                                        "X": 0.8268077373504639,
                                        "Y": 0.32924187183380127
                                    },
                                    {
                                        "X": 0.8268179893493652,
                                        "Y": 0.3420078158378601
                                    },
                                    {
                                        "X": 0.12092027068138123,
                                        "Y": 0.3421264588832855
                                    }
                                ]
                            },
                            "Id": "3609840c-a119-4808-8417-1b976adcfaf5",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "41cabe0d-ffc8-415a-b413-e399b9b0387e",
                                        "c3550cc5-f3a3-4c11-8f69-0535966f423c",
                                        "b93bf998-7826-45c3-8774-9da4cf58fcec",
                                        "7b85e35f-1ee4-45a1-bf95-5e634011fec5",
                                        "85d4f932-6f36-4969-8037-ec925baa4de9",
                                        "d3320cb1-3ff1-4afa-8368-982f2167fffa",
                                        "0c31fab2-b947-46ab-a762-7cba3dba3549",
                                        "ebed7979-831b-4964-90d7-02c0d0feb9a2",
                                        "a72d3436-1b61-448f-82f1-e3bbecbed2a1",
                                        "fca87a8f-1b0e-4600-88ab-052a4b4aeacd",
                                        "ddcbe57f-0372-4e3d-89f0-d708c9abe94c",
                                        "247d0491-d90d-43df-9d2c-32d6d55e9114",
                                        "12b2dda4-0caf-44a0-b1ed-37e37e09e1ea"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.24162292480469,
                            "Text": "cursus efficitur. Nulla bibendum efficitur augue et vulputate. Morbi sodales magna eget",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7041858434677124,
                                    "Height": 0.012875315733253956,
                                    "Left": 0.12071411311626434,
                                    "Top": 0.3465823531150818
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12071411311626434,
                                        "Y": 0.34670519828796387
                                    },
                                    {
                                        "X": 0.8248897194862366,
                                        "Y": 0.3465823531150818
                                    },
                                    {
                                        "X": 0.8248999714851379,
                                        "Y": 0.35932227969169617
                                    },
                                    {
                                        "X": 0.12072484195232391,
                                        "Y": 0.35945767164230347
                                    }
                                ]
                            },
                            "Id": "57b67fa4-a882-48b9-8309-04f59cc97f0d",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "cb401d8b-dc21-4806-b858-4180dc0e1c2e",
                                        "80010a58-c5c9-43d2-9e34-72b1c40147d3",
                                        "ff583b4f-77dd-4cc2-87f8-739d1ef02426",
                                        "f1b36203-d15e-4a5b-a52f-f4b44453d9ad",
                                        "fc9caf52-eae0-4cc6-bcb3-1c9648502ddd",
                                        "5be409c7-51c8-4fdb-b9da-0e5c4f203660",
                                        "c4d5f841-72c2-4a0c-b821-11604eae9897",
                                        "39452350-dda9-4f4f-9229-2503b716962d",
                                        "f735ea1d-2bea-49fe-8eab-07079cbdb5ad",
                                        "187a4cd2-d90d-49ea-95d0-aade679ea1ce",
                                        "cbb0a539-87af-4b5d-8b4f-d4004b283e02",
                                        "e8383548-192b-4797-8d27-3721771bc6da"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.03010559082031,
                            "Text": "imperdiet aliquam. Praesent non tempor leo, egestas pretium justo. Phasellus quis mattis",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7255011796951294,
                                    "Height": 0.013082980178296566,
                                    "Left": 0.12070708721876144,
                                    "Top": 0.3639179468154907
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12070708721876144,
                                        "Y": 0.36406210064888
                                    },
                                    {
                                        "X": 0.8461979031562805,
                                        "Y": 0.3639179468154907
                                    },
                                    {
                                        "X": 0.8462082743644714,
                                        "Y": 0.3768436908721924
                                    },
                                    {
                                        "X": 0.12071797996759415,
                                        "Y": 0.37700092792510986
                                    }
                                ]
                            },
                            "Id": "107dbbf4-e710-4699-81e7-5f18fbdf6e5a",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "00e77f38-e274-4d2d-b2f8-8931f34ce5d8",
                                        "ac45e9a1-b0de-44f4-af0b-01c81ffbe05d",
                                        "6313469b-5282-42c3-a185-e26757228044",
                                        "98eb88a0-c0b4-40a7-88cf-812c7721607a",
                                        "3560fc71-8c78-4608-9167-87139e213c2e",
                                        "046a55d5-3a49-48bc-b735-c13210d3baee",
                                        "48c86ec4-91c6-46e3-b1ab-b5a5adf2c755",
                                        "44234942-da12-4794-a87b-cc9d12429570",
                                        "6573daff-4748-4f75-aada-254b0faeafc4",
                                        "7c0808fb-c70a-4c87-bb70-8ae41690fe01",
                                        "62b74803-3ba3-492b-9be0-22392068c256",
                                        "97c9f01e-f09f-42b5-9d77-42c681dcc1c0"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 98.7938232421875,
                            "Text": "nisl, interdum tristique odio. Duis commodo eros id ex ullamcorper, vitae venenatis enim",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7147669792175293,
                                    "Height": 0.012511294335126877,
                                    "Left": 0.12097800523042679,
                                    "Top": 0.38125285506248474
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12097800523042679,
                                        "Y": 0.381412148475647
                                    },
                                    {
                                        "X": 0.8357350826263428,
                                        "Y": 0.38125285506248474
                                    },
                                    {
                                        "X": 0.8357449769973755,
                                        "Y": 0.3935925364494324
                                    },
                                    {
                                        "X": 0.1209883987903595,
                                        "Y": 0.3937641382217407
                                    }
                                ]
                            },
                            "Id": "50260c9b-b057-4008-8533-f8ff81f2407a",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "3d75a872-846c-4929-8ce3-061cd07eb493",
                                        "f1fdfdbd-373d-48a9-b8b7-b50015013217",
                                        "c56d95aa-7226-4e41-ada7-7e28998fb921",
                                        "8e24e076-f6a4-4e05-b767-449411ba9488",
                                        "817707f4-99b7-484d-ac07-5887afb9ecc4",
                                        "68f2c17e-f37b-4031-9b0a-2264a7bc39a4",
                                        "33d635ed-7753-45c3-a192-e8c732129842",
                                        "95b35e56-f410-445b-a3f0-b1d4cb1cd032",
                                        "c5bc5783-e795-417c-9fde-72c005193856",
                                        "0c21e49c-4e6a-459b-a5ca-0baa7cb40072",
                                        "d3b2facb-b9e7-4743-aa4a-9f86c92a1f7e",
                                        "c8ff457f-d660-4eae-a997-3ba6d80bb1bc",
                                        "c358d587-58a1-4a52-8367-d48c7bb93235"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.69219207763672,
                            "Text": "auctor. Aenean nec augue in leo laoreet venenatis sit amet nec lacus. Duis ultricies augue",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7328963875770569,
                                    "Height": 0.012991235591471195,
                                    "Left": 0.12073866277933121,
                                    "Top": 0.39853227138519287
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12073866277933121,
                                        "Y": 0.39871329069137573
                                    },
                                    {
                                        "X": 0.8536248207092285,
                                        "Y": 0.39853227138519287
                                    },
                                    {
                                        "X": 0.8536350727081299,
                                        "Y": 0.41132938861846924
                                    },
                                    {
                                        "X": 0.12074944376945496,
                                        "Y": 0.4115235209465027
                                    }
                                ]
                            },
                            "Id": "9cb868f1-e960-48ee-a91b-82ef3421f307",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "1c8de13d-1793-442a-8ad3-c69a81414388",
                                        "76f4b14c-f2d6-45b9-b61a-1aa168be3603",
                                        "1b42dace-65a5-479e-80c3-1a8f12fbbdf7",
                                        "5f306934-cf4d-4845-9342-418fd484aeb2",
                                        "ba813cc6-7f45-45db-8cd7-78051a3fdb9e",
                                        "77ce1929-a180-4f69-a9e9-20e9705c7d3f",
                                        "34ef1fa5-2a9d-4bd7-84eb-03df2033a64f",
                                        "167eb5b4-8418-4abb-8fee-7685f56d9780",
                                        "be46818e-cb47-4d8d-9873-13c9f1339fc4",
                                        "9e7e7ebb-722a-4699-b71f-1f9354a45b17",
                                        "8e14f03c-274d-44d5-ba0f-1487cba69a87",
                                        "8e484602-702a-49e5-aeb1-d9025c777ef8",
                                        "3c447909-41b7-4e4c-a69a-14a3f439a324",
                                        "d1c2c77d-89cb-4a25-8e66-321e3ee0fd08",
                                        "0a649114-501a-4288-a95c-e7c3ab343ec8"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 97.84313201904297,
                            "Text": "maximus nunc iaculis volutpat. In rutrum orci augue, vitae sollicitudin nisl vehicula vitae.",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7119768857955933,
                                    "Height": 0.012799297459423542,
                                    "Left": 0.1209116131067276,
                                    "Top": 0.41550344228744507
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1209116131067276,
                                        "Y": 0.4156961441040039
                                    },
                                    {
                                        "X": 0.8328784108161926,
                                        "Y": 0.41550344228744507
                                    },
                                    {
                                        "X": 0.8328884840011597,
                                        "Y": 0.4280974864959717
                                    },
                                    {
                                        "X": 0.12092223018407822,
                                        "Y": 0.42830273509025574
                                    }
                                ]
                            },
                            "Id": "7d61a384-74e9-4bd2-9638-07d0b7171e85",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "9b2302bb-6935-4c9a-bb16-86e95f2c439b",
                                        "c6357811-df5e-4d21-869c-aebb135177e2",
                                        "82b93edf-0b59-4561-a874-4604e53afb31",
                                        "8453a163-ee8f-40e3-b55a-ca99df924e6e",
                                        "541383cd-1e88-4be1-af8d-2590902d8e46",
                                        "a4ea6347-5e68-4348-8c8e-c50cdcb16597",
                                        "12f9d189-0cca-428f-b02a-12a9d159b184",
                                        "be2ad99d-9c1e-409e-811d-bb7c40526326",
                                        "9080ce60-1ac5-404a-8975-1dde51e65f19",
                                        "392894c6-c036-400d-8f74-aeca6a3b9163",
                                        "a5d79bc4-576e-4601-9abe-26661cf5e9ca",
                                        "364b4b74-6595-4da9-91a7-72c68f2d76b6",
                                        "a32b8f3e-ad5f-4a5c-99c6-e64daece2884"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 95.6072006225586,
                            "Text": "Nam eu iaculis metus.",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.17905566096305847,
                                    "Height": 0.010264414362609386,
                                    "Left": 0.12107159197330475,
                                    "Top": 0.4331633448600769
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12107159197330475,
                                        "Y": 0.4332161843776703
                                    },
                                    {
                                        "X": 0.3001187741756439,
                                        "Y": 0.4331633448600769
                                    },
                                    {
                                        "X": 0.3001272678375244,
                                        "Y": 0.44337236881256104
                                    },
                                    {
                                        "X": 0.1210801899433136,
                                        "Y": 0.44342777132987976
                                    }
                                ]
                            },
                            "Id": "30625755-47a1-43b7-b811-492f28972048",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "7e25a2ea-761b-4e1f-9923-0402ded386d6",
                                        "1353a03a-81f8-43f0-b1e0-1a999c1797a3",
                                        "a8a15974-eb49-4422-9b93-a9c6a621afb3",
                                        "a43d11d6-cdbd-4e04-9812-7fc63dbcefe2"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.2178955078125,
                            "Text": "Aenean hendrerit, arcu ut commodo dignissim, velit purus molestie dui, eu ornare purus elit",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7435934543609619,
                                    "Height": 0.013208834454417229,
                                    "Left": 0.1201474666595459,
                                    "Top": 0.4673389792442322
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1201474666595459,
                                        "Y": 0.46759405732154846
                                    },
                                    {
                                        "X": 0.8637305498123169,
                                        "Y": 0.4673389792442322
                                    },
                                    {
                                        "X": 0.8637409210205078,
                                        "Y": 0.4802792966365814
                                    },
                                    {
                                        "X": 0.1201583668589592,
                                        "Y": 0.48054781556129456
                                    }
                                ]
                            },
                            "Id": "0fa1f82b-0ec2-45f0-a8a8-b805a9611731",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "c4b47e5c-01c1-4f89-a2c9-1c1a21ade416",
                                        "7341eeb6-7363-43d2-816b-4e865da1c9d2",
                                        "97273024-f1cc-4470-ae5b-27a311d781b5",
                                        "842335c7-f1de-4061-8dee-002a4eda18a8",
                                        "245ba790-f3e3-44ff-a961-6a99e5ecffbd",
                                        "d05b1922-d9fc-43ec-8389-db8f9e6b9752",
                                        "c0ddbac6-dee4-4a5c-9bee-e3842f0a0988",
                                        "7daa9402-2cca-440f-8d83-57ea8ccdbec6",
                                        "4a652ecc-f25a-4142-a384-071917ad22c3",
                                        "92ec0e77-2916-4a6b-80c3-6ffb059f953f",
                                        "de1cd0e5-4226-483f-a1ce-c59fd31ac418",
                                        "5843e25f-1b37-4d07-b5ff-4c842247ccc8",
                                        "1a373dd7-5120-4091-a807-e0a0522bc25b",
                                        "d4464a86-9166-4948-b6e8-39d8a5ce9bef"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.51426696777344,
                            "Text": "vel quam. Fusce vitae velit mollis, condimentum lacus nec, lobortis nisl. Aliquam nunc elit,",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7303249835968018,
                                    "Height": 0.012774312868714333,
                                    "Left": 0.12036275863647461,
                                    "Top": 0.48498252034187317
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12036275863647461,
                                        "Y": 0.4852510392665863
                                    },
                                    {
                                        "X": 0.8506777286529541,
                                        "Y": 0.48498252034187317
                                    },
                                    {
                                        "X": 0.8506877422332764,
                                        "Y": 0.49747559428215027
                                    },
                                    {
                                        "X": 0.12037328630685806,
                                        "Y": 0.49775683879852295
                                    }
                                ]
                            },
                            "Id": "d5fe5c56-0056-49e8-b014-c907b455a8ee",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "b766d8ed-e7a2-458c-8260-e3e4bc80ba75",
                                        "7a2b16ca-f14c-48d4-b550-3f6850802598",
                                        "5e352b2f-0100-4961-a16a-67d12d29d8b9",
                                        "cfdfaa74-3caa-4822-8ba7-5fa3aeffb196",
                                        "5b5980e1-9a0b-4982-b975-c9fbba09c300",
                                        "df86a972-ff86-444f-8c25-ec4b912ec5c9",
                                        "89e37045-ecce-4f8e-9dc8-9affc5454bd0",
                                        "b665cd1e-b060-4364-9743-3d552b3cdcda",
                                        "2c62239d-bf99-4bd7-8300-0ed9ea060895",
                                        "50df6598-0da3-479c-b6e0-3bfffa5d3132",
                                        "609dbc63-278d-4605-ae50-438148c8f55c",
                                        "3778c628-53fb-4e14-abed-30861b069c0a",
                                        "1cfca79e-1d9d-4cfe-9b9b-5a56490e9f2d",
                                        "a9790a33-d1c8-4a6b-bd09-6287174f737f"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 98.92216491699219,
                            "Text": "tincidunt at lorem in, auctor interdum metus. Cras non convallis dui. Duis placerat, tellus sed",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7495660781860352,
                                    "Height": 0.013040013611316681,
                                    "Left": 0.12017929553985596,
                                    "Top": 0.5019404292106628
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12017929553985596,
                                        "Y": 0.5022337436676025
                                    },
                                    {
                                        "X": 0.8697351813316345,
                                        "Y": 0.5019404292106628
                                    },
                                    {
                                        "X": 0.8697453737258911,
                                        "Y": 0.5146737694740295
                                    },
                                    {
                                        "X": 0.12019002437591553,
                                        "Y": 0.5149804353713989
                                    }
                                ]
                            },
                            "Id": "af5487a4-8905-4a29-a8d5-2dc6e3f32e3b",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "b2451b3e-cc85-4f35-bf03-937b8d6fde2f",
                                        "facfa7c3-ac83-4822-afb4-cf32a4c3292e",
                                        "47988920-67cd-4f33-933e-9414950b73e2",
                                        "fbe7577f-b5b6-4fb9-af68-ea65270d3bf0",
                                        "f1af9809-52ea-42f5-994a-19d6c4e38792",
                                        "905d87c7-b78a-4ebb-b107-2cc62dc614f3",
                                        "f0e1f69c-b003-4ea5-ab26-9e5fff9de1d1",
                                        "4c956320-96c5-4d38-a9d7-4ed8d346e7ed",
                                        "aa25a817-c561-43eb-8943-89b5dd9fb968",
                                        "342f9508-ebc4-4eed-924b-82eb4191352f",
                                        "772744fd-037a-4577-89dd-62a2e5f4500b",
                                        "fdc77aac-3133-4642-a61e-181e564b45f6",
                                        "5f7c7fdd-8c22-408d-9a98-928100bea7dc",
                                        "32893480-3efb-4210-9360-05d27de664fc",
                                        "b7e61ca2-3e0c-4b0e-aa90-4c70aac9353f"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.15081787109375,
                            "Text": "cursus rhoncus, nulla diam vehicula turpis, sed elementum sapien enim a neque.",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.658273458480835,
                                    "Height": 0.012877016328275204,
                                    "Left": 0.12048386037349701,
                                    "Top": 0.5193105936050415
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12048386037349701,
                                        "Y": 0.5195841789245605
                                    },
                                    {
                                        "X": 0.7787471413612366,
                                        "Y": 0.5193105936050415
                                    },
                                    {
                                        "X": 0.7787573337554932,
                                        "Y": 0.5319024920463562
                                    },
                                    {
                                        "X": 0.12049447000026703,
                                        "Y": 0.5321876406669617
                                    }
                                ]
                            },
                            "Id": "ad559f03-4421-4ace-845b-b3236bb42520",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "3eaebafd-b636-4603-a8b9-ea0f13f24b44",
                                        "fefac309-de5a-4943-98d3-0c6c0e9d9ae2",
                                        "696887a0-bd83-4a21-a01d-874c30aa8e9c",
                                        "b9d19b78-d7e6-45e6-a6b3-054c98eacb18",
                                        "3c5d17ba-eaa3-482f-992b-428e4da971af",
                                        "59e95b72-00e8-4a77-b07c-35c75409d69d",
                                        "aaa9553f-67f5-413c-8fa8-bbde9aac8099",
                                        "891570f6-a292-4ecc-bb1f-6a9824457ef5",
                                        "cc85b87e-90a7-47d9-8d8d-94e394090099",
                                        "d57abafb-041f-4a2e-9642-927d943d365e",
                                        "f5854f33-400f-4148-ac6c-a3bcf4239487",
                                        "fbfb5ac6-49ba-41d4-be48-15a019691565"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.34613037109375,
                            "Text": "Nam ornare ipsum sed sollicitudin lobortis. Fusce in erat eu purus sollicitudin maximus.",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7069599032402039,
                                    "Height": 0.01308587659150362,
                                    "Left": 0.12102734297513962,
                                    "Top": 0.5536462068557739
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12102734297513962,
                                        "Y": 0.5539738535881042
                                    },
                                    {
                                        "X": 0.8279770016670227,
                                        "Y": 0.5536462068557739
                                    },
                                    {
                                        "X": 0.8279872536659241,
                                        "Y": 0.5663918256759644
                                    },
                                    {
                                        "X": 0.12103808671236038,
                                        "Y": 0.5667320489883423
                                    }
                                ]
                            },
                            "Id": "05122bf4-0ac8-4519-9208-4e4c57bcce4b",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "7bb6a8f7-7d59-4221-8d57-cbd9e1850521",
                                        "f79066fc-925b-4bf2-bde3-2df144c66af4",
                                        "4723ad54-fe09-4afa-8964-62a38e408285",
                                        "131ba2ba-bfad-4ebf-8691-dbde81d0fc4e",
                                        "a504b6cb-ad46-4cf3-b6db-fd95ffe9dd3f",
                                        "c036b455-b28c-4bf2-805a-cdbf945370a8",
                                        "24e03d89-02eb-4944-b07a-a2f2df23ddbf",
                                        "92581cf0-c264-47b2-8a56-d3137aaf5c22",
                                        "202a6d67-9912-4309-b294-8d682964657f",
                                        "da736bb7-db19-45e4-8019-e6ebcfeee409",
                                        "8efc455f-f1bc-4637-84b1-b1dae673f223",
                                        "19cda7d7-211f-4881-bd7a-b1afec4ae5c1",
                                        "225c377d-7167-46ec-863c-f8350ed10903"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.28023529052734,
                            "Text": "Quisque maximus, leo et feugiat feugiat, nibh lectus viverra nibh, aliquet lacinia ipsum metus",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7532625794410706,
                                    "Height": 0.013132202439010143,
                                    "Left": 0.12077158689498901,
                                    "Top": 0.5710495710372925
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12077158689498901,
                                        "Y": 0.5714170336723328
                                    },
                                    {
                                        "X": 0.8740239143371582,
                                        "Y": 0.5710495710372925
                                    },
                                    {
                                        "X": 0.8740341663360596,
                                        "Y": 0.5838009119033813
                                    },
                                    {
                                        "X": 0.12078233063220978,
                                        "Y": 0.5841817855834961
                                    }
                                ]
                            },
                            "Id": "3a132c2f-af2b-423a-9a25-e5d4ac7ebc9d",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "fabce796-bcbb-4b7a-9e21-00d239f724f5",
                                        "acfecb4a-0004-48ed-b9a0-d601cd486020",
                                        "eeba76c3-3aa0-4db1-8507-abfb71e00de5",
                                        "4b705bb6-f27d-47be-bd1f-e3a2debadcda",
                                        "86bd7b80-b8a0-4e80-845a-625560e610f8",
                                        "5f74ad76-1990-4058-a9fb-3ba71024c3c8",
                                        "697cd574-c57c-4943-bb3e-595e23bcbd3d",
                                        "9aa72cd5-13f1-4b3b-b222-1d5450804264",
                                        "90b2e3ba-a588-4c74-bf64-535db96b3f88",
                                        "2cfceca8-de35-4c8a-93b1-f6c1690906d1",
                                        "f97e62d5-0cd4-426b-b3a8-aa8a83bb96ce",
                                        "cc2411b9-b779-491f-a3f4-24882614f600",
                                        "e73e170d-4cf7-47b3-b936-e6d273042aa9",
                                        "e97e4e89-5d4c-49fe-a29c-d1ba78b42659"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.02824401855469,
                            "Text": "non risus. Etiam malesuada sit amet quam quis dignissim. Nulla et urna mattis, auctor dui",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.728454053401947,
                                    "Height": 0.013538113795220852,
                                    "Left": 0.12101501226425171,
                                    "Top": 0.5882109999656677
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12101501226425171,
                                        "Y": 0.5885838270187378
                                    },
                                    {
                                        "X": 0.8494585156440735,
                                        "Y": 0.5882109999656677
                                    },
                                    {
                                        "X": 0.8494690656661987,
                                        "Y": 0.601362943649292
                                    },
                                    {
                                        "X": 0.12102609872817993,
                                        "Y": 0.6017491221427917
                                    }
                                ]
                            },
                            "Id": "a58b4f06-81c1-4753-ac83-d3089b073b8f",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "a5e3398e-2916-4836-bc7b-d50e29de793f",
                                        "5f43cdc0-2a8e-46a8-a8eb-9a08ab34138c",
                                        "a96ffc51-d445-4f5c-b391-47933fe53663",
                                        "23208148-2d1e-445c-9374-11e5470d1900",
                                        "a326c41a-c6db-4316-9d03-859adf41fe67",
                                        "3e8065d9-61a2-44cf-b8fb-fcc4113c8ad1",
                                        "8e596bd6-4d5b-4521-87da-678bebfc1e7c",
                                        "7160de9f-a2f2-41a0-b80c-f6177cc3da36",
                                        "e35805ae-8324-4750-ae6a-9ea7a78849aa",
                                        "692b26cf-827f-489f-9915-b2ca62645e4d",
                                        "74c652b6-9a9c-4da3-8228-e68003dd70ee",
                                        "1acf2b95-5674-4977-8c34-2c3cc618ba4f",
                                        "b5ff1951-f9ee-49c0-b882-10b90179e44e",
                                        "9adcbbe0-2261-45d0-9da6-18dbdbf3550c",
                                        "d483c0c6-c53f-4920-83ce-f3a86afee81c"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.10649871826172,
                            "Text": "non, ornare mi. Sed imperdiet dui sollicitudin laoreet elementum. Cras at gravida tortor.",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7065113186836243,
                                    "Height": 0.013223854824900627,
                                    "Left": 0.12074118852615356,
                                    "Top": 0.6056913137435913
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12074118852615356,
                                        "Y": 0.6060701012611389
                                    },
                                    {
                                        "X": 0.8272421956062317,
                                        "Y": 0.6056913137435913
                                    },
                                    {
                                        "X": 0.8272525072097778,
                                        "Y": 0.6185237169265747
                                    },
                                    {
                                        "X": 0.1207520067691803,
                                        "Y": 0.6189151406288147
                                    }
                                ]
                            },
                            "Id": "f0a14d43-8f82-423a-9514-4bbd87bbba74",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "5e6c5ef1-02dd-4626-893d-79cd831447f3",
                                        "4655d09f-a569-4e0c-aa05-60947b160892",
                                        "b2b34cb5-693a-4197-a084-ad9c8700b924",
                                        "0864914b-c6c8-432f-8fe0-9633d9e8bb78",
                                        "fb2d6c0e-10f3-4e5f-a7f0-faa4983e120b",
                                        "9641e6a9-665f-4513-b52f-39a0b900ecb8",
                                        "6e3c8d40-3b07-45c7-b92f-e1947b4595b3",
                                        "34b87aad-a589-468c-909d-2b0207e8e2a9",
                                        "6dc1c11f-42b9-454e-a287-fd850b902ef5",
                                        "7e9d30ed-10ca-46f5-8f17-e67cc12c4c38",
                                        "2a741eea-aac2-490c-9e2e-b2a40699e003",
                                        "d8dbdbc2-232d-4325-a0a7-b20764a4441e",
                                        "c06b05bf-831a-4b81-821a-ee8b58c5e360"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.2345199584961,
                            "Text": "Suspendisse consectetur ultricies lacus, vitae convallis nibh condimentum eget. Proin velit",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7343274354934692,
                                    "Height": 0.013747959397733212,
                                    "Left": 0.12074673920869827,
                                    "Top": 0.6227377653121948
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12074673920869827,
                                        "Y": 0.6231489777565002
                                    },
                                    {
                                        "X": 0.8550634980201721,
                                        "Y": 0.6227377653121948
                                    },
                                    {
                                        "X": 0.8550741672515869,
                                        "Y": 0.636060893535614
                                    },
                                    {
                                        "X": 0.12075796723365784,
                                        "Y": 0.636485755443573
                                    }
                                ]
                            },
                            "Id": "9a01fcb3-a03c-4074-881e-00df2584060e",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "3c0f9b7a-8252-4d9e-b883-6de77d51f645",
                                        "e2222a52-bdb6-48a1-b8d1-d69c48851726",
                                        "cf7bc8fd-8d20-4333-8187-8e80422a3c28",
                                        "83c05ca2-dedb-46d0-92f2-28af8ae5042a",
                                        "274f0f50-63ff-40ea-86bf-3d9016b6e0ef",
                                        "661612a0-98bc-444f-ac52-5c6cd6997829",
                                        "4e8c0f24-da1c-4dbb-bc5b-9194cfe9c58d",
                                        "63f4aa12-912e-4c92-b05b-a359e1b4b4a4",
                                        "959666c0-1a29-4f67-babf-5b987c239ee4",
                                        "4bdc5123-4779-4492-83c1-4899fcd31d3b",
                                        "8937529d-28bb-4a31-93d4-1ea6cbc10349"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 98.91190338134766,
                            "Text": "elit, elementum sit amet consequat eu, tempus id urna. Praesent euismod metus sapien, id",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.7401183843612671,
                                    "Height": 0.013147120364010334,
                                    "Left": 0.1205323189496994,
                                    "Top": 0.6400704383850098
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1205323189496994,
                                        "Y": 0.6405027508735657
                                    },
                                    {
                                        "X": 0.8606405258178711,
                                        "Y": 0.6400704383850098
                                    },
                                    {
                                        "X": 0.8606507182121277,
                                        "Y": 0.652772068977356
                                    },
                                    {
                                        "X": 0.12054302543401718,
                                        "Y": 0.6532175540924072
                                    }
                                ]
                            },
                            "Id": "2eb4909d-a256-4e0d-aecf-e452be8f29fe",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "f5ee01ee-c510-47c4-b741-6868db660684",
                                        "1e30420f-29ad-4dab-b000-03d8c394e39c",
                                        "4e852a8f-4381-4d25-9efa-924b74be7127",
                                        "dc13cf28-7173-4520-af13-7a7af0a05c90",
                                        "b4d6bf8c-ac8a-4d63-9aaf-47342f2de2bd",
                                        "331edb84-5bb4-480e-89f2-ba9bebbd5f37",
                                        "e5f1cbd7-5373-4bd2-a29d-fd641ce46eaf",
                                        "d524b51e-09f8-47a5-a200-66b007ab6a6c",
                                        "fd2fdeea-df9e-461b-b55b-d2a0c985a555",
                                        "510ddd00-36e6-4ebb-8485-116b588c1a2b",
                                        "0c699a7b-0bff-4ccb-a6e0-8a172ba17623",
                                        "b13a0d1f-3be7-4580-8966-73915b856ffc",
                                        "2d01daf8-fefb-440d-aa21-6e3fb857297f",
                                        "02b35a8b-360e-41b0-b32d-84f332eaa9ec"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "LINE",
                            "Confidence": 99.60121154785156,
                            "Text": "lacinia orci laoreet at",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.16880552470684052,
                                    "Height": 0.010536348447203636,
                                    "Left": 0.12071333080530167,
                                    "Top": 0.6576444506645203
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12071333080530167,
                                        "Y": 0.6577471494674683
                                    },
                                    {
                                        "X": 0.28951016068458557,
                                        "Y": 0.6576444506645203
                                    },
                                    {
                                        "X": 0.2895188629627228,
                                        "Y": 0.668075680732727
                                    },
                                    {
                                        "X": 0.12072211503982544,
                                        "Y": 0.6681808233261108
                                    }
                                ]
                            },
                            "Id": "43ae608d-147e-4806-b783-6f5768ec96a0",
                            "Relationships": [
                                {
                                    "Type": "CHILD",
                                    "Ids": [
                                        "65584d46-7261-40af-baae-e4ba0001132f",
                                        "ed7062f2-ddb9-4cf4-a0cb-b3270e6524ee",
                                        "ff6b9bbe-ba74-4a32-a1bc-e2485450a639",
                                        "65eefb46-909c-420b-8ee7-1e138da8b871"
                                    ]
                                }
                            ]
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.87401580810547,
                            "Text": "Lorem",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05095001310110092,
                                    "Height": 0.010056046769022942,
                                    "Left": 0.12094660103321075,
                                    "Top": 0.10525196045637131
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12094660103321075,
                                        "Y": 0.10525196045637131
                                    },
                                    {
                                        "X": 0.17188818752765656,
                                        "Y": 0.10526023060083389
                                    },
                                    {
                                        "X": 0.17189660668373108,
                                        "Y": 0.1153080090880394
                                    },
                                    {
                                        "X": 0.12095505744218826,
                                        "Y": 0.11530046164989471
                                    }
                                ]
                            },
                            "Id": "e3df5265-ae28-493e-9900-64e80dc0ffc6"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.86721801757812,
                            "Text": "ipsum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04826902970671654,
                                    "Height": 0.012186076492071152,
                                    "Left": 0.17810669541358948,
                                    "Top": 0.10527127981185913
                                },
                                "Polygon": [
                                    {
                                        "X": 0.17810669541358948,
                                        "Y": 0.10527127981185913
                                    },
                                    {
                                        "X": 0.22636553645133972,
                                        "Y": 0.1052791103720665
                                    },
                                    {
                                        "X": 0.22637571394443512,
                                        "Y": 0.11745736002922058
                                    },
                                    {
                                        "X": 0.17811690270900726,
                                        "Y": 0.11745034903287888
                                    }
                                ]
                            },
                            "Id": "539f8540-cc79-4d56-81c1-112f653fba5c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.9400863647461,
                            "Text": "dolor",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04092918708920479,
                                    "Height": 0.01008528657257557,
                                    "Left": 0.23230187594890594,
                                    "Top": 0.10520604252815247
                                },
                                "Polygon": [
                                    {
                                        "X": 0.23230187594890594,
                                        "Y": 0.10520604252815247
                                    },
                                    {
                                        "X": 0.2732226550579071,
                                        "Y": 0.10521268844604492
                                    },
                                    {
                                        "X": 0.27323105931282043,
                                        "Y": 0.11529132723808289
                                    },
                                    {
                                        "X": 0.23231031000614166,
                                        "Y": 0.11528526246547699
                                    }
                                ]
                            },
                            "Id": "19de17af-e1e7-479f-bd44-a0feebc9ca41"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.89820098876953,
                            "Text": "sit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.01829351671040058,
                                    "Height": 0.010031052865087986,
                                    "Left": 0.27833908796310425,
                                    "Top": 0.10527066886425018
                                },
                                "Polygon": [
                                    {
                                        "X": 0.27833908796310425,
                                        "Y": 0.10527066886425018
                                    },
                                    {
                                        "X": 0.2966242730617523,
                                        "Y": 0.10527364164590836
                                    },
                                    {
                                        "X": 0.2966326177120209,
                                        "Y": 0.11530172824859619
                                    },
                                    {
                                        "X": 0.2783474326133728,
                                        "Y": 0.11529901623725891
                                    }
                                ]
                            },
                            "Id": "3c62a246-a668-4038-95d5-7d72dd938707"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.87884521484375,
                            "Text": "amet,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.044715844094753265,
                                    "Height": 0.011173026636242867,
                                    "Left": 0.30195632576942444,
                                    "Top": 0.10556696355342865
                                },
                                "Polygon": [
                                    {
                                        "X": 0.30195632576942444,
                                        "Y": 0.10556696355342865
                                    },
                                    {
                                        "X": 0.3466629087924957,
                                        "Y": 0.10557419806718826
                                    },
                                    {
                                        "X": 0.3466721773147583,
                                        "Y": 0.11673998832702637
                                    },
                                    {
                                        "X": 0.3019656240940094,
                                        "Y": 0.11673344671726227
                                    }
                                ]
                            },
                            "Id": "9adb0b31-78f6-4ad1-a1f4-a92418bbfff9"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.58087158203125,
                            "Text": "consectetur",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.09592849016189575,
                                    "Height": 0.010316682979464531,
                                    "Left": 0.353046178817749,
                                    "Top": 0.10521265864372253
                                },
                                "Polygon": [
                                    {
                                        "X": 0.353046178817749,
                                        "Y": 0.10521265864372253
                                    },
                                    {
                                        "X": 0.44896620512008667,
                                        "Y": 0.1052282303571701
                                    },
                                    {
                                        "X": 0.4489746689796448,
                                        "Y": 0.11552933603525162
                                    },
                                    {
                                        "X": 0.3530547320842743,
                                        "Y": 0.11551514267921448
                                    }
                                ]
                            },
                            "Id": "433c8702-95a7-4ca1-bf25-7b428568f226"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.59774780273438,
                            "Text": "adipiscing",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08087095618247986,
                                    "Height": 0.012687585316598415,
                                    "Left": 0.4536997675895691,
                                    "Top": 0.10499916970729828
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4536997675895691,
                                        "Y": 0.10499916970729828
                                    },
                                    {
                                        "X": 0.5345603227615356,
                                        "Y": 0.10501232743263245
                                    },
                                    {
                                        "X": 0.5345706939697266,
                                        "Y": 0.11768675595521927
                                    },
                                    {
                                        "X": 0.4537101984024048,
                                        "Y": 0.11767503619194031
                                    }
                                ]
                            },
                            "Id": "cd3c8ffa-ca0e-4ac4-971a-4f48118b6c95"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.41400909423828,
                            "Text": "elit.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.027125658467411995,
                                    "Height": 0.010031187906861305,
                                    "Left": 0.5407212376594543,
                                    "Top": 0.10528360307216644
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5407212376594543,
                                        "Y": 0.10528360307216644
                                    },
                                    {
                                        "X": 0.5678386688232422,
                                        "Y": 0.10528799891471863
                                    },
                                    {
                                        "X": 0.5678468942642212,
                                        "Y": 0.1153147891163826
                                    },
                                    {
                                        "X": 0.5407294631004333,
                                        "Y": 0.11531076580286026
                                    }
                                ]
                            },
                            "Id": "9c07ed76-7b1f-42e0-a491-383db966be46"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.37871551513672,
                            "Text": "Quisque",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06775953620672226,
                                    "Height": 0.012534485198557377,
                                    "Left": 0.5747684240341187,
                                    "Top": 0.10503778606653214
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5747684240341187,
                                        "Y": 0.10503778606653214
                                    },
                                    {
                                        "X": 0.6425177454948425,
                                        "Y": 0.10504880547523499
                                    },
                                    {
                                        "X": 0.6425279378890991,
                                        "Y": 0.11757227033376694
                                    },
                                    {
                                        "X": 0.57477867603302,
                                        "Y": 0.117562435567379
                                    }
                                ]
                            },
                            "Id": "ff3b35d2-0f96-4540-ba06-42670d8ab524"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.93238830566406,
                            "Text": "dictum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05372735112905502,
                                    "Height": 0.010128512047231197,
                                    "Left": 0.6481715440750122,
                                    "Top": 0.10517184436321259
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6481715440750122,
                                        "Y": 0.10517184436321259
                                    },
                                    {
                                        "X": 0.7018907070159912,
                                        "Y": 0.10518057644367218
                                    },
                                    {
                                        "X": 0.7018988728523254,
                                        "Y": 0.11530035734176636
                                    },
                                    {
                                        "X": 0.6481797695159912,
                                        "Y": 0.11529239267110825
                                    }
                                ]
                            },
                            "Id": "4ef4fb76-07f0-4c26-9f66-b68d434f0da7"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.89089965820312,
                            "Text": "ipsum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04842263460159302,
                                    "Height": 0.012376891449093819,
                                    "Left": 0.7078017592430115,
                                    "Top": 0.10519355535507202
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7078017592430115,
                                        "Y": 0.10519355535507202
                                    },
                                    {
                                        "X": 0.756214439868927,
                                        "Y": 0.10520142316818237
                                    },
                                    {
                                        "X": 0.7562243938446045,
                                        "Y": 0.11757045239210129
                                    },
                                    {
                                        "X": 0.7078117728233337,
                                        "Y": 0.11756341904401779
                                    }
                                ]
                            },
                            "Id": "ebbe4344-6950-4a35-808b-84d8692bf1e8"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.97547149658203,
                            "Text": "leo.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.028154099360108376,
                                    "Height": 0.010073673911392689,
                                    "Left": 0.7622641324996948,
                                    "Top": 0.10525631904602051
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7622641324996948,
                                        "Y": 0.10525631904602051
                                    },
                                    {
                                        "X": 0.7904101014137268,
                                        "Y": 0.10526088625192642
                                    },
                                    {
                                        "X": 0.7904182076454163,
                                        "Y": 0.11532998830080032
                                    },
                                    {
                                        "X": 0.7622722387313843,
                                        "Y": 0.11532581597566605
                                    }
                                ]
                            },
                            "Id": "bde23348-e2bb-48a2-b377-ec3d01628369"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.40879821777344,
                            "Text": "Duis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.035481419414281845,
                                    "Height": 0.010099396109580994,
                                    "Left": 0.7975918054580688,
                                    "Top": 0.10524526983499527
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7975918054580688,
                                        "Y": 0.10524526983499527
                                    },
                                    {
                                        "X": 0.8330651521682739,
                                        "Y": 0.10525102913379669
                                    },
                                    {
                                        "X": 0.8330732583999634,
                                        "Y": 0.11534466594457626
                                    },
                                    {
                                        "X": 0.7975999712944031,
                                        "Y": 0.11533940583467484
                                    }
                                ]
                            },
                            "Id": "25f184ec-c123-4443-aacf-59f1fce432d1"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.90442657470703,
                            "Text": "sit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.018371503800153732,
                                    "Height": 0.009847217239439487,
                                    "Left": 0.8389942646026611,
                                    "Top": 0.10539140552282333
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8389942646026611,
                                        "Y": 0.10539140552282333
                                    },
                                    {
                                        "X": 0.8573578596115112,
                                        "Y": 0.1053943857550621
                                    },
                                    {
                                        "X": 0.8573657274246216,
                                        "Y": 0.11523862183094025
                                    },
                                    {
                                        "X": 0.8390021324157715,
                                        "Y": 0.11523590236902237
                                    }
                                ]
                            },
                            "Id": "f740f2b5-5b97-465b-87d1-ffbca496a3bd"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.04004669189453,
                            "Text": "amet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04094534367322922,
                                    "Height": 0.009959405288100243,
                                    "Left": 0.1206134557723999,
                                    "Top": 0.12233836948871613
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1206134557723999,
                                        "Y": 0.12233836948871613
                                    },
                                    {
                                        "X": 0.16155044734477997,
                                        "Y": 0.12234403192996979
                                    },
                                    {
                                        "X": 0.16155880689620972,
                                        "Y": 0.13229776918888092
                                    },
                                    {
                                        "X": 0.12062183767557144,
                                        "Y": 0.13229267299175262
                                    }
                                ]
                            },
                            "Id": "6aa0007f-1453-48cd-88df-18bc0d726a34"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.712158203125,
                            "Text": "tellus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04245901107788086,
                                    "Height": 0.010129441507160664,
                                    "Left": 0.16650404036045074,
                                    "Top": 0.12223849445581436
                                },
                                "Polygon": [
                                    {
                                        "X": 0.16650404036045074,
                                        "Y": 0.12223849445581436
                                    },
                                    {
                                        "X": 0.2089545726776123,
                                        "Y": 0.12224438041448593
                                    },
                                    {
                                        "X": 0.2089630514383316,
                                        "Y": 0.13236793875694275
                                    },
                                    {
                                        "X": 0.16651253402233124,
                                        "Y": 0.13236266374588013
                                    }
                                ]
                            },
                            "Id": "26877205-717f-4c2e-a8ef-15997680051e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.8883285522461,
                            "Text": "et",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.015528774820268154,
                                    "Height": 0.009909902699291706,
                                    "Left": 0.2146933376789093,
                                    "Top": 0.12251327931880951
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2146933376789093,
                                        "Y": 0.12251327931880951
                                    },
                                    {
                                        "X": 0.23021382093429565,
                                        "Y": 0.12251542508602142
                                    },
                                    {
                                        "X": 0.23022210597991943,
                                        "Y": 0.13242317736148834
                                    },
                                    {
                                        "X": 0.21470162272453308,
                                        "Y": 0.13242125511169434
                                    }
                                ]
                            },
                            "Id": "ab5b56f7-dd63-4c76-b2a7-4a81f39da318"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.65027618408203,
                            "Text": "nunc",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03942156955599785,
                                    "Height": 0.007736259140074253,
                                    "Left": 0.2357335388660431,
                                    "Top": 0.12463272362947464
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2357335388660431,
                                        "Y": 0.12463272362947464
                                    },
                                    {
                                        "X": 0.2751486599445343,
                                        "Y": 0.12463805824518204
                                    },
                                    {
                                        "X": 0.27515509724617004,
                                        "Y": 0.13236898183822632
                                    },
                                    {
                                        "X": 0.23574000597000122,
                                        "Y": 0.13236407935619354
                                    }
                                ]
                            },
                            "Id": "c8ffa35b-14e4-464f-8514-8c8001276033"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.56986236572266,
                            "Text": "hendrerit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07236150652170181,
                                    "Height": 0.0103302001953125,
                                    "Left": 0.28082892298698425,
                                    "Top": 0.1221204549074173
                                },
                                "Polygon": [
                                    {
                                        "X": 0.28082892298698425,
                                        "Y": 0.1221204549074173
                                    },
                                    {
                                        "X": 0.3531818687915802,
                                        "Y": 0.12213049829006195
                                    },
                                    {
                                        "X": 0.35319042205810547,
                                        "Y": 0.1324506551027298
                                    },
                                    {
                                        "X": 0.2808375060558319,
                                        "Y": 0.1324416548013687
                                    }
                                ]
                            },
                            "Id": "ce7e2294-45c8-494f-b361-cf05f728adf4"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7859115600586,
                            "Text": "rhoncus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06472127884626389,
                                    "Height": 0.01006567757576704,
                                    "Left": 0.3584032356739044,
                                    "Top": 0.12236692756414413
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3584032356739044,
                                        "Y": 0.12236692756414413
                                    },
                                    {
                                        "X": 0.42311620712280273,
                                        "Y": 0.12237589061260223
                                    },
                                    {
                                        "X": 0.4231245219707489,
                                        "Y": 0.13243260979652405
                                    },
                                    {
                                        "X": 0.3584115505218506,
                                        "Y": 0.13242456316947937
                                    }
                                ]
                            },
                            "Id": "6de62dfc-24ef-4adc-bef4-0e7d8dff6c5c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.92548370361328,
                            "Text": "at",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.01526929996907711,
                                    "Height": 0.009745006449520588,
                                    "Left": 0.42905116081237793,
                                    "Top": 0.12270018458366394
                                },
                                "Polygon": [
                                    {
                                        "X": 0.42905116081237793,
                                        "Y": 0.12270018458366394
                                    },
                                    {
                                        "X": 0.4443124234676361,
                                        "Y": 0.12270229309797287
                                    },
                                    {
                                        "X": 0.4443204700946808,
                                        "Y": 0.13244520127773285
                                    },
                                    {
                                        "X": 0.4290592074394226,
                                        "Y": 0.13244329392910004
                                    }
                                ]
                            },
                            "Id": "95065f98-e8dd-4cc1-b20a-14eb2b60aef6"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.96653747558594,
                            "Text": "in",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.01290787011384964,
                                    "Height": 0.009964226745069027,
                                    "Left": 0.449934720993042,
                                    "Top": 0.12231165915727615
                                },
                                "Polygon": [
                                    {
                                        "X": 0.449934720993042,
                                        "Y": 0.12231165915727615
                                    },
                                    {
                                        "X": 0.4628344178199768,
                                        "Y": 0.12231344729661942
                                    },
                                    {
                                        "X": 0.4628426134586334,
                                        "Y": 0.13227589428424835
                                    },
                                    {
                                        "X": 0.449942946434021,
                                        "Y": 0.13227428495883942
                                    }
                                ]
                            },
                            "Id": "cb0d975b-8bfe-4c8c-891f-2ae3aec813f0"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 89.86445617675781,
                            "Text": "tellus.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.047306012362241745,
                                    "Height": 0.009302288293838501,
                                    "Left": 0.46783748269081116,
                                    "Top": 0.12284024059772491
                                },
                                "Polygon": [
                                    {
                                        "X": 0.46783748269081116,
                                        "Y": 0.12284024059772491
                                    },
                                    {
                                        "X": 0.5151358842849731,
                                        "Y": 0.12284675985574722
                                    },
                                    {
                                        "X": 0.5151434540748596,
                                        "Y": 0.13214252889156342
                                    },
                                    {
                                        "X": 0.4678451120853424,
                                        "Y": 0.13213662803173065
                                    }
                                ]
                            },
                            "Id": "ea7afd1a-e0fb-4df4-8b6b-1caf88131af4"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.93412017822266,
                            "Text": "Pellentesque",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.10528789460659027,
                                    "Height": 0.012518754228949547,
                                    "Left": 0.5228148102760315,
                                    "Top": 0.1221514344215393
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5228148102760315,
                                        "Y": 0.1221514344215393
                                    },
                                    {
                                        "X": 0.6280925273895264,
                                        "Y": 0.12216603755950928
                                    },
                                    {
                                        "X": 0.628102719783783,
                                        "Y": 0.1346701830625534
                                    },
                                    {
                                        "X": 0.5228250622749329,
                                        "Y": 0.13465741276741028
                                    }
                                ]
                            },
                            "Id": "2f63d3e3-f0fd-40e4-9b8c-a0e27a4fdba5"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.93034362792969,
                            "Text": "at",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.015373540110886097,
                                    "Height": 0.00984632782638073,
                                    "Left": 0.634008526802063,
                                    "Top": 0.12272561341524124
                                },
                                "Polygon": [
                                    {
                                        "X": 0.634008526802063,
                                        "Y": 0.12272561341524124
                                    },
                                    {
                                        "X": 0.6493740677833557,
                                        "Y": 0.12272772938013077
                                    },
                                    {
                                        "X": 0.6493820548057556,
                                        "Y": 0.13257193565368652
                                    },
                                    {
                                        "X": 0.6340165138244629,
                                        "Y": 0.1325700283050537
                                    }
                                ]
                            },
                            "Id": "9c2f91dc-c085-4800-a98b-438e89c80a0a"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.33721160888672,
                            "Text": "quam",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.045102838426828384,
                                    "Height": 0.010203829035162926,
                                    "Left": 0.6545892953872681,
                                    "Top": 0.12447511404752731
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6545892953872681,
                                        "Y": 0.12447511404752731
                                    },
                                    {
                                        "X": 0.6996838450431824,
                                        "Y": 0.12448122352361679
                                    },
                                    {
                                        "X": 0.6996921300888062,
                                        "Y": 0.1346789449453354
                                    },
                                    {
                                        "X": 0.6545975804328918,
                                        "Y": 0.13467347621917725
                                    }
                                ]
                            },
                            "Id": "274b9608-c544-46f7-ae30-984062941ea2"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.90323638916016,
                            "Text": "elementum,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.09561149775981903,
                                    "Height": 0.011781794019043446,
                                    "Left": 0.7055674195289612,
                                    "Top": 0.12236405164003372
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7055674195289612,
                                        "Y": 0.12236405164003372
                                    },
                                    {
                                        "X": 0.8011694550514221,
                                        "Y": 0.12237729132175446
                                    },
                                    {
                                        "X": 0.8011789321899414,
                                        "Y": 0.1341458410024643
                                    },
                                    {
                                        "X": 0.7055769562721252,
                                        "Y": 0.1341341733932495
                                    }
                                ]
                            },
                            "Id": "e0d57271-01ad-4991-a0b1-fabd96e4eb37"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.23151397705078,
                            "Text": "pharetra",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0674942210316658,
                                    "Height": 0.012360949069261551,
                                    "Left": 0.8075783848762512,
                                    "Top": 0.12238696962594986
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8075783848762512,
                                        "Y": 0.12238696962594986
                                    },
                                    {
                                        "X": 0.8750627040863037,
                                        "Y": 0.1223963126540184
                                    },
                                    {
                                        "X": 0.8750725984573364,
                                        "Y": 0.1347479224205017
                                    },
                                    {
                                        "X": 0.8075883388519287,
                                        "Y": 0.1347397416830063
                                    }
                                ]
                            },
                            "Id": "869aa292-975c-4bd2-a5ab-39a023c18c15"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.71367645263672,
                            "Text": "diam",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0391068272292614,
                                    "Height": 0.009907069616019726,
                                    "Left": 0.12044497579336166,
                                    "Top": 0.13967695832252502
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12044497579336166,
                                        "Y": 0.13967695832252502
                                    },
                                    {
                                        "X": 0.1595434844493866,
                                        "Y": 0.13968142867088318
                                    },
                                    {
                                        "X": 0.15955179929733276,
                                        "Y": 0.14958402514457703
                                    },
                                    {
                                        "X": 0.12045331299304962,
                                        "Y": 0.14958010613918304
                                    }
                                ]
                            },
                            "Id": "4da424bb-85b5-439f-81af-cc2c1672cfe9"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.30924224853516,
                            "Text": "vel,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.027519376948475838,
                                    "Height": 0.011517994105815887,
                                    "Left": 0.16553284227848053,
                                    "Top": 0.13971757888793945
                                },
                                "Polygon": [
                                    {
                                        "X": 0.16553284227848053,
                                        "Y": 0.13971757888793945
                                    },
                                    {
                                        "X": 0.1930425763130188,
                                        "Y": 0.13972072303295135
                                    },
                                    {
                                        "X": 0.19305221736431122,
                                        "Y": 0.15123558044433594
                                    },
                                    {
                                        "X": 0.16554251313209534,
                                        "Y": 0.15123288333415985
                                    }
                                ]
                            },
                            "Id": "c026cb52-8808-404f-83d3-b5b94a7e6d9b"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.55680084228516,
                            "Text": "finibus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05311498045921326,
                                    "Height": 0.010083232074975967,
                                    "Left": 0.19903090596199036,
                                    "Top": 0.13950051367282867
                                },
                                "Polygon": [
                                    {
                                        "X": 0.19903090596199036,
                                        "Y": 0.13950051367282867
                                    },
                                    {
                                        "X": 0.2521374821662903,
                                        "Y": 0.13950659334659576
                                    },
                                    {
                                        "X": 0.2521458864212036,
                                        "Y": 0.14958375692367554
                                    },
                                    {
                                        "X": 0.19903934001922607,
                                        "Y": 0.14957842230796814
                                    }
                                ]
                            },
                            "Id": "989e23b1-3210-4b05-aa7f-805e6f552d4e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.74797821044922,
                            "Text": "risus.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04318978264927864,
                                    "Height": 0.009650751017034054,
                                    "Left": 0.25776687264442444,
                                    "Top": 0.14025528728961945
                                },
                                "Polygon": [
                                    {
                                        "X": 0.25776687264442444,
                                        "Y": 0.14025528728961945
                                    },
                                    {
                                        "X": 0.3009486496448517,
                                        "Y": 0.14026018977165222
                                    },
                                    {
                                        "X": 0.300956666469574,
                                        "Y": 0.14990603923797607
                                    },
                                    {
                                        "X": 0.2577749192714691,
                                        "Y": 0.14990171790122986
                                    }
                                ]
                            },
                            "Id": "24e7e41d-d270-4298-8a46-970d88fc5d5b"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.45408630371094,
                            "Text": "Nunc",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04218922182917595,
                                    "Height": 0.009926201775670052,
                                    "Left": 0.3075464367866516,
                                    "Top": 0.13976936042308807
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3075464367866516,
                                        "Y": 0.13976936042308807
                                    },
                                    {
                                        "X": 0.34972742199897766,
                                        "Y": 0.1397741734981537
                                    },
                                    {
                                        "X": 0.34973564743995667,
                                        "Y": 0.14969556033611298
                                    },
                                    {
                                        "X": 0.307554692029953,
                                        "Y": 0.14969132840633392
                                    }
                                ]
                            },
                            "Id": "60010e07-4f9c-43a3-af3c-f7447c173083"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.52037811279297,
                            "Text": "feugiat",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05540570989251137,
                                    "Height": 0.012618358246982098,
                                    "Left": 0.35506176948547363,
                                    "Top": 0.13955558836460114
                                },
                                "Polygon": [
                                    {
                                        "X": 0.35506176948547363,
                                        "Y": 0.13955558836460114
                                    },
                                    {
                                        "X": 0.410457044839859,
                                        "Y": 0.13956193625926971
                                    },
                                    {
                                        "X": 0.4104674756526947,
                                        "Y": 0.1521739512681961
                                    },
                                    {
                                        "X": 0.3550722301006317,
                                        "Y": 0.15216858685016632
                                    }
                                ]
                            },
                            "Id": "ccb2d4be-f321-4985-af2a-17257256b361"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.78408813476562,
                            "Text": "non",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.029034601524472237,
                                    "Height": 0.007692425511777401,
                                    "Left": 0.41627705097198486,
                                    "Top": 0.14190669357776642
                                },
                                "Polygon": [
                                    {
                                        "X": 0.41627705097198486,
                                        "Y": 0.14190669357776642
                                    },
                                    {
                                        "X": 0.4453052878379822,
                                        "Y": 0.14190992712974548
                                    },
                                    {
                                        "X": 0.44531163573265076,
                                        "Y": 0.1495991200208664
                                    },
                                    {
                                        "X": 0.41628339886665344,
                                        "Y": 0.1495961993932724
                                    }
                                ]
                            },
                            "Id": "586b593b-e41a-4349-88ac-a85d17c812f7"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.77327728271484,
                            "Text": "erat",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03187974542379379,
                                    "Height": 0.009627697058022022,
                                    "Left": 0.45156800746917725,
                                    "Top": 0.1402045637369156
                                },
                                "Polygon": [
                                    {
                                        "X": 0.45156800746917725,
                                        "Y": 0.1402045637369156
                                    },
                                    {
                                        "X": 0.4834398329257965,
                                        "Y": 0.1402081847190857
                                    },
                                    {
                                        "X": 0.48344776034355164,
                                        "Y": 0.14983226358890533
                                    },
                                    {
                                        "X": 0.4515759348869324,
                                        "Y": 0.14982907474040985
                                    }
                                ]
                            },
                            "Id": "f4217fe5-02bf-4416-9096-ccb10564d4d3"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.50808715820312,
                            "Text": "eget",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.035710517317056656,
                                    "Height": 0.012044800445437431,
                                    "Left": 0.48854920268058777,
                                    "Top": 0.1401285082101822
                                },
                                "Polygon": [
                                    {
                                        "X": 0.48854920268058777,
                                        "Y": 0.1401285082101822
                                    },
                                    {
                                        "X": 0.5242498517036438,
                                        "Y": 0.14013256132602692
                                    },
                                    {
                                        "X": 0.5242597460746765,
                                        "Y": 0.15217331051826477
                                    },
                                    {
                                        "X": 0.4885590970516205,
                                        "Y": 0.1521698534488678
                                    }
                                ]
                            },
                            "Id": "177094cb-2ef8-4818-8de0-6baba84bec32"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.30768585205078,
                            "Text": "aliquam.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06799785792827606,
                                    "Height": 0.01250124629586935,
                                    "Left": 0.5294623970985413,
                                    "Top": 0.1395985633134842
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5294623970985413,
                                        "Y": 0.1395985633134842
                                    },
                                    {
                                        "X": 0.5974500775337219,
                                        "Y": 0.13960634171962738
                                    },
                                    {
                                        "X": 0.5974602699279785,
                                        "Y": 0.15209980309009552
                                    },
                                    {
                                        "X": 0.5294726490974426,
                                        "Y": 0.15209321677684784
                                    }
                                ]
                            },
                            "Id": "53b5969c-bb27-4a6d-83db-a9afa042c4e6"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.32476043701172,
                            "Text": "Aliquam",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06635478138923645,
                                    "Height": 0.012443013489246368,
                                    "Left": 0.6036590337753296,
                                    "Top": 0.13951009511947632
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6036590337753296,
                                        "Y": 0.13951009511947632
                                    },
                                    {
                                        "X": 0.6700037121772766,
                                        "Y": 0.13951769471168518
                                    },
                                    {
                                        "X": 0.6700137853622437,
                                        "Y": 0.15195311605930328
                                    },
                                    {
                                        "X": 0.6036691665649414,
                                        "Y": 0.15194666385650635
                                    }
                                ]
                            },
                            "Id": "c04d65eb-79fb-416f-b45b-cd61b9a21394"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.82437896728516,
                            "Text": "dignissim",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0762091800570488,
                                    "Height": 0.012424365617334843,
                                    "Left": 0.6757799983024597,
                                    "Top": 0.13960668444633484
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6757799983024597,
                                        "Y": 0.13960668444633484
                                    },
                                    {
                                        "X": 0.7519791722297668,
                                        "Y": 0.13961540162563324
                                    },
                                    {
                                        "X": 0.7519891858100891,
                                        "Y": 0.1520310491323471
                                    },
                                    {
                                        "X": 0.6757900714874268,
                                        "Y": 0.15202365815639496
                                    }
                                ]
                            },
                            "Id": "1491c0f5-d860-4e44-ac22-dbade83abaaf"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7399673461914,
                            "Text": "libero",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0443902313709259,
                                    "Height": 0.010186533443629742,
                                    "Left": 0.7580481767654419,
                                    "Top": 0.13949602842330933
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7580481767654419,
                                        "Y": 0.13949602842330933
                                    },
                                    {
                                        "X": 0.8024302124977112,
                                        "Y": 0.13950110971927643
                                    },
                                    {
                                        "X": 0.8024383783340454,
                                        "Y": 0.14968255162239075
                                    },
                                    {
                                        "X": 0.7580564022064209,
                                        "Y": 0.1496780961751938
                                    }
                                ]
                            },
                            "Id": "1e8d98fd-6e1a-4adf-9ff8-8d2448c95105"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.75518035888672,
                            "Text": "id",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.013022217899560928,
                                    "Height": 0.010048022493720055,
                                    "Left": 0.8085445165634155,
                                    "Top": 0.13948765397071838
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8085445165634155,
                                        "Y": 0.13948765397071838
                                    },
                                    {
                                        "X": 0.8215586543083191,
                                        "Y": 0.13948914408683777
                                    },
                                    {
                                        "X": 0.8215667009353638,
                                        "Y": 0.149535670876503
                                    },
                                    {
                                        "X": 0.808552622795105,
                                        "Y": 0.14953435957431793
                                    }
                                ]
                            },
                            "Id": "6e41cc3b-484f-4f2f-8e02-30a8ba7f287b"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.306396484375,
                            "Text": "vestibulum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08752301335334778,
                                    "Height": 0.01023553591221571,
                                    "Left": 0.12016800791025162,
                                    "Top": 0.15677814185619354
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12016800791025162,
                                        "Y": 0.15677814185619354
                                    },
                                    {
                                        "X": 0.20768246054649353,
                                        "Y": 0.15678605437278748
                                    },
                                    {
                                        "X": 0.2076910138130188,
                                        "Y": 0.16701367497444153
                                    },
                                    {
                                        "X": 0.12017662078142166,
                                        "Y": 0.16700701415538788
                                    }
                                ]
                            },
                            "Id": "2b07dd58-8f82-4fdd-babc-eef0e6a300de"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.2005844116211,
                            "Text": "pretium.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06479116529226303,
                                    "Height": 0.012249120511114597,
                                    "Left": 0.21403630077838898,
                                    "Top": 0.15693047642707825
                                },
                                "Polygon": [
                                    {
                                        "X": 0.21403630077838898,
                                        "Y": 0.15693047642707825
                                    },
                                    {
                                        "X": 0.2788172662258148,
                                        "Y": 0.15693631768226624
                                    },
                                    {
                                        "X": 0.2788274586200714,
                                        "Y": 0.16917958855628967
                                    },
                                    {
                                        "X": 0.21404655277729034,
                                        "Y": 0.16917484998703003
                                    }
                                ]
                            },
                            "Id": "b590af5e-b597-4581-b271-ad3e5e075441"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.80506896972656,
                            "Text": "Donec",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05246921256184578,
                                    "Height": 0.010037222877144814,
                                    "Left": 0.2860780954360962,
                                    "Top": 0.15687285363674164
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2860780954360962,
                                        "Y": 0.15687285363674164
                                    },
                                    {
                                        "X": 0.3385389745235443,
                                        "Y": 0.15687759220600128
                                    },
                                    {
                                        "X": 0.3385472893714905,
                                        "Y": 0.1669100821018219
                                    },
                                    {
                                        "X": 0.28608644008636475,
                                        "Y": 0.16690607368946075
                                    }
                                ]
                            },
                            "Id": "03205cbf-243f-4dce-ab96-910fa8239f14"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.73576354980469,
                            "Text": "ac",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.019040893763303757,
                                    "Height": 0.007945049554109573,
                                    "Left": 0.3440418839454651,
                                    "Top": 0.15892678499221802
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3440418839454651,
                                        "Y": 0.15892678499221802
                                    },
                                    {
                                        "X": 0.36307621002197266,
                                        "Y": 0.15892843902111053
                                    },
                                    {
                                        "X": 0.36308276653289795,
                                        "Y": 0.1668718308210373
                                    },
                                    {
                                        "X": 0.34404847025871277,
                                        "Y": 0.1668703705072403
                                    }
                                ]
                            },
                            "Id": "163c6c78-4b5b-4500-baef-b0727ef7292c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.84396362304688,
                            "Text": "nulla",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03779266029596329,
                                    "Height": 0.010075731202960014,
                                    "Left": 0.36890527606010437,
                                    "Top": 0.15692083537578583
                                },
                                "Polygon": [
                                    {
                                        "X": 0.36890527606010437,
                                        "Y": 0.15692083537578583
                                    },
                                    {
                                        "X": 0.4066896140575409,
                                        "Y": 0.15692424774169922
                                    },
                                    {
                                        "X": 0.40669792890548706,
                                        "Y": 0.166996568441391
                                    },
                                    {
                                        "X": 0.3689136207103729,
                                        "Y": 0.16699369251728058
                                    }
                                ]
                            },
                            "Id": "8868de04-85e8-4f92-96b5-d440bd9038e1"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.82752227783203,
                            "Text": "nec",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.029446234926581383,
                                    "Height": 0.008469825610518456,
                                    "Left": 0.4127148687839508,
                                    "Top": 0.15840910375118256
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4127148687839508,
                                        "Y": 0.15840910375118256
                                    },
                                    {
                                        "X": 0.4421541392803192,
                                        "Y": 0.15841169655323029
                                    },
                                    {
                                        "X": 0.44216111302375793,
                                        "Y": 0.16687893867492676
                                    },
                                    {
                                        "X": 0.4127218723297119,
                                        "Y": 0.1668766885995865
                                    }
                                ]
                            },
                            "Id": "a65b762e-8f95-40b8-b6cc-a9227edbc41b"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.56062316894531,
                            "Text": "nunc",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03934222087264061,
                                    "Height": 0.00774364173412323,
                                    "Left": 0.44802457094192505,
                                    "Top": 0.15907616913318634
                                },
                                "Polygon": [
                                    {
                                        "X": 0.44802457094192505,
                                        "Y": 0.15907616913318634
                                    },
                                    {
                                        "X": 0.487360417842865,
                                        "Y": 0.15907961130142212
                                    },
                                    {
                                        "X": 0.48736679553985596,
                                        "Y": 0.16681981086730957
                                    },
                                    {
                                        "X": 0.448030948638916,
                                        "Y": 0.1668168157339096
                                    }
                                ]
                            },
                            "Id": "5f918590-d9f0-41c6-9f50-4563fef034bc"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.53718566894531,
                            "Text": "laoreet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05610423907637596,
                                    "Height": 0.010069320909678936,
                                    "Left": 0.4928061068058014,
                                    "Top": 0.156875342130661
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4928061068058014,
                                        "Y": 0.156875342130661
                                    },
                                    {
                                        "X": 0.5489020943641663,
                                        "Y": 0.15688040852546692
                                    },
                                    {
                                        "X": 0.54891037940979,
                                        "Y": 0.16694466769695282
                                    },
                                    {
                                        "X": 0.49281439185142517,
                                        "Y": 0.16694039106369019
                                    }
                                ]
                            },
                            "Id": "385a6199-4427-4ffd-996f-3b11ae82e628"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.19168090820312,
                            "Text": "congue.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06389551609754562,
                                    "Height": 0.010683758184313774,
                                    "Left": 0.5539337396621704,
                                    "Top": 0.1586688905954361
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5539337396621704,
                                        "Y": 0.1586688905954361
                                    },
                                    {
                                        "X": 0.6178205609321594,
                                        "Y": 0.15867449343204498
                                    },
                                    {
                                        "X": 0.6178292632102966,
                                        "Y": 0.16935265064239502
                                    },
                                    {
                                        "X": 0.5539424419403076,
                                        "Y": 0.16934798657894135
                                    }
                                ]
                            },
                            "Id": "0173a35a-648f-4265-89ff-52df829a0691"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.5242691040039,
                            "Text": "Suspendisse",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.10474219173192978,
                                    "Height": 0.013291608542203903,
                                    "Left": 0.6251100301742554,
                                    "Top": 0.15640845894813538
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6251100301742554,
                                        "Y": 0.15640845894813538
                                    },
                                    {
                                        "X": 0.7298414707183838,
                                        "Y": 0.15641798079013824
                                    },
                                    {
                                        "X": 0.7298522591590881,
                                        "Y": 0.16970007121562958
                                    },
                                    {
                                        "X": 0.6251208782196045,
                                        "Y": 0.1696924865245819
                                    }
                                ]
                            },
                            "Id": "9e5b92d8-06cf-41f9-a506-cf0672808c84"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.6446762084961,
                            "Text": "condimentum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.10968407243490219,
                                    "Height": 0.010028047487139702,
                                    "Left": 0.7356460690498352,
                                    "Top": 0.15685373544692993
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7356460690498352,
                                        "Y": 0.15685373544692993
                                    },
                                    {
                                        "X": 0.8453220725059509,
                                        "Y": 0.15686364471912384
                                    },
                                    {
                                        "X": 0.8453301191329956,
                                        "Y": 0.16688178479671478
                                    },
                                    {
                                        "X": 0.7356541752815247,
                                        "Y": 0.16687341034412384
                                    }
                                ]
                            },
                            "Id": "5d10582a-3bb6-47fa-b54e-e276c440fb47"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.69780731201172,
                            "Text": "ultricies",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06147119030356407,
                                    "Height": 0.010244571603834629,
                                    "Left": 0.12084464728832245,
                                    "Top": 0.17397727072238922
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12084464728832245,
                                        "Y": 0.17397727072238922
                                    },
                                    {
                                        "X": 0.18230725824832916,
                                        "Y": 0.17398135364055634
                                    },
                                    {
                                        "X": 0.18231584131717682,
                                        "Y": 0.18422183394432068
                                    },
                                    {
                                        "X": 0.12085326761007309,
                                        "Y": 0.184218630194664
                                    }
                                ]
                            },
                            "Id": "068fc656-9eed-4a10-8899-6228970d41fa"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.1632080078125,
                            "Text": "suscipit.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06517423689365387,
                                    "Height": 0.012370769865810871,
                                    "Left": 0.18800637125968933,
                                    "Top": 0.17411966621875763
                                },
                                "Polygon": [
                                    {
                                        "X": 0.18800637125968933,
                                        "Y": 0.17411966621875763
                                    },
                                    {
                                        "X": 0.25317028164863586,
                                        "Y": 0.17412398755550385
                                    },
                                    {
                                        "X": 0.253180593252182,
                                        "Y": 0.18649044632911682
                                    },
                                    {
                                        "X": 0.18801672756671906,
                                        "Y": 0.18648725748062134
                                    }
                                ]
                            },
                            "Id": "10cab5b1-28a9-4cfc-b0f9-161b01aec2d5"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.74615478515625,
                            "Text": "Proin",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04126184806227684,
                                    "Height": 0.010178574360907078,
                                    "Left": 0.26059025526046753,
                                    "Top": 0.17394539713859558
                                },
                                "Polygon": [
                                    {
                                        "X": 0.26059025526046753,
                                        "Y": 0.17394539713859558
                                    },
                                    {
                                        "X": 0.30184364318847656,
                                        "Y": 0.17394813895225525
                                    },
                                    {
                                        "X": 0.30185210704803467,
                                        "Y": 0.1841239631175995
                                    },
                                    {
                                        "X": 0.260598748922348,
                                        "Y": 0.18412181735038757
                                    }
                                ]
                            },
                            "Id": "aa0b3749-cec6-48d4-8feb-95ad9959b240"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.50424194335938,
                            "Text": "imperdiet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07555156201124191,
                                    "Height": 0.012657255865633488,
                                    "Left": 0.30827245116233826,
                                    "Top": 0.1739344298839569
                                },
                                "Polygon": [
                                    {
                                        "X": 0.30827245116233826,
                                        "Y": 0.1739344298839569
                                    },
                                    {
                                        "X": 0.3838135302066803,
                                        "Y": 0.17393945157527924
                                    },
                                    {
                                        "X": 0.3838239908218384,
                                        "Y": 0.18659168481826782
                                    },
                                    {
                                        "X": 0.3082829713821411,
                                        "Y": 0.18658798933029175
                                    }
                                ]
                            },
                            "Id": "553e75e0-f0f1-4040-acf9-7a1bf1eb81fb"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.8829345703125,
                            "Text": "dictum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.053580719977617264,
                                    "Height": 0.010074508376419544,
                                    "Left": 0.38905319571495056,
                                    "Top": 0.17402689158916473
                                },
                                "Polygon": [
                                    {
                                        "X": 0.38905319571495056,
                                        "Y": 0.17402689158916473
                                    },
                                    {
                                        "X": 0.44262561202049255,
                                        "Y": 0.17403045296669006
                                    },
                                    {
                                        "X": 0.44263389706611633,
                                        "Y": 0.184101402759552
                                    },
                                    {
                                        "X": 0.38906151056289673,
                                        "Y": 0.18409860134124756
                                    }
                                ]
                            },
                            "Id": "a2234a9c-ee79-4a36-898e-e5c301a8d99d"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.03746795654297,
                            "Text": "vehicula.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07122237980365753,
                                    "Height": 0.01023667398840189,
                                    "Left": 0.44847479462623596,
                                    "Top": 0.17400053143501282
                                },
                                "Polygon": [
                                    {
                                        "X": 0.44847479462623596,
                                        "Y": 0.17400053143501282
                                    },
                                    {
                                        "X": 0.5196887850761414,
                                        "Y": 0.17400525510311127
                                    },
                                    {
                                        "X": 0.5196971893310547,
                                        "Y": 0.18423719704151154
                                    },
                                    {
                                        "X": 0.4484832286834717,
                                        "Y": 0.18423348665237427
                                    }
                                ]
                            },
                            "Id": "96dd02ab-c7c5-4398-8d51-4ad31aad20f6"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.4526596069336,
                            "Text": "Maecenas",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08333692699670792,
                                    "Height": 0.010277003049850464,
                                    "Left": 0.5272842645645142,
                                    "Top": 0.1738806962966919
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5272842645645142,
                                        "Y": 0.1738806962966919
                                    },
                                    {
                                        "X": 0.6106128096580505,
                                        "Y": 0.173886239528656
                                    },
                                    {
                                        "X": 0.6106212139129639,
                                        "Y": 0.18415769934654236
                                    },
                                    {
                                        "X": 0.5272926688194275,
                                        "Y": 0.18415334820747375
                                    }
                                ]
                            },
                            "Id": "7b8842af-1d7c-45a7-b545-4382088d4397"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.99605560302734,
                            "Text": "egestas",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06388948112726212,
                                    "Height": 0.012206584215164185,
                                    "Left": 0.6164940595626831,
                                    "Top": 0.17447127401828766
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6164940595626831,
                                        "Y": 0.17447127401828766
                                    },
                                    {
                                        "X": 0.6803736090660095,
                                        "Y": 0.17447546124458313
                                    },
                                    {
                                        "X": 0.6803835034370422,
                                        "Y": 0.18667785823345184
                                    },
                                    {
                                        "X": 0.6165040135383606,
                                        "Y": 0.18667474389076233
                                    }
                                ]
                            },
                            "Id": "0d0af1ba-4900-4d9e-a3e7-bfd5119028c0"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.35238647460938,
                            "Text": "turpis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04514094814658165,
                                    "Height": 0.012427540495991707,
                                    "Left": 0.6858080625534058,
                                    "Top": 0.17408855259418488
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6858080625534058,
                                        "Y": 0.17408855259418488
                                    },
                                    {
                                        "X": 0.7309389710426331,
                                        "Y": 0.17409154772758484
                                    },
                                    {
                                        "X": 0.7309490442276001,
                                        "Y": 0.18651609122753143
                                    },
                                    {
                                        "X": 0.6858181357383728,
                                        "Y": 0.18651388585567474
                                    }
                                ]
                            },
                            "Id": "5c1c9e69-015b-4d75-b6b1-5a1cd13f9fd7"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.87802124023438,
                            "Text": "id",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.013370507396757603,
                                    "Height": 0.010204118676483631,
                                    "Left": 0.7365222573280334,
                                    "Top": 0.17394939064979553
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7365222573280334,
                                        "Y": 0.17394939064979553
                                    },
                                    {
                                        "X": 0.7498845458030701,
                                        "Y": 0.17395028471946716
                                    },
                                    {
                                        "X": 0.7498927712440491,
                                        "Y": 0.1841535121202469
                                    },
                                    {
                                        "X": 0.7365304827690125,
                                        "Y": 0.18415281176567078
                                    }
                                ]
                            },
                            "Id": "c8752087-d03e-49bb-a456-a3e3dab4523b"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.43408966064453,
                            "Text": "feugiat",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0557183213531971,
                                    "Height": 0.012805278412997723,
                                    "Left": 0.7556332349777222,
                                    "Top": 0.17385521531105042
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7556332349777222,
                                        "Y": 0.17385521531105042
                                    },
                                    {
                                        "X": 0.8113412261009216,
                                        "Y": 0.17385892570018768
                                    },
                                    {
                                        "X": 0.8113515377044678,
                                        "Y": 0.186660498380661
                                    },
                                    {
                                        "X": 0.7556435465812683,
                                        "Y": 0.18665778636932373
                                    }
                                ]
                            },
                            "Id": "2a709319-ffb4-4b4b-b5e4-bfb0c5c6baa2"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.66439056396484,
                            "Text": "luctus.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05338159203529358,
                                    "Height": 0.010356029495596886,
                                    "Left": 0.8164516091346741,
                                    "Top": 0.1745373010635376
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8164516091346741,
                                        "Y": 0.1745373010635376
                                    },
                                    {
                                        "X": 0.8698248863220215,
                                        "Y": 0.17454081773757935
                                    },
                                    {
                                        "X": 0.86983323097229,
                                        "Y": 0.18489333987236023
                                    },
                                    {
                                        "X": 0.8164599537849426,
                                        "Y": 0.18489059805870056
                                    }
                                ]
                            },
                            "Id": "ad81b526-d970-4e66-9919-221345ecf4fe"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.40736389160156,
                            "Text": "Cras",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03780332952737808,
                                    "Height": 0.010328589007258415,
                                    "Left": 0.12087442725896835,
                                    "Top": 0.19147256016731262
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12087442725896835,
                                        "Y": 0.19147256016731262
                                    },
                                    {
                                        "X": 0.15866908431053162,
                                        "Y": 0.19147413969039917
                                    },
                                    {
                                        "X": 0.15867775678634644,
                                        "Y": 0.2018011510372162
                                    },
                                    {
                                        "X": 0.12088312208652496,
                                        "Y": 0.20180010795593262
                                    }
                                ]
                            },
                            "Id": "dd47a0b0-303a-4015-8c96-07a8f1a64be4"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.11517333984375,
                            "Text": "sollicitudin",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08388186246156693,
                                    "Height": 0.010339801199734211,
                                    "Left": 0.1647508144378662,
                                    "Top": 0.1914820522069931
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1647508144378662,
                                        "Y": 0.1914820522069931
                                    },
                                    {
                                        "X": 0.2486240565776825,
                                        "Y": 0.19148558378219604
                                    },
                                    {
                                        "X": 0.24863268435001373,
                                        "Y": 0.20182186365127563
                                    },
                                    {
                                        "X": 0.16475948691368103,
                                        "Y": 0.2018195539712906
                                    }
                                ]
                            },
                            "Id": "1929da04-f354-4c8b-a924-e583c9968018"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.34866333007812,
                            "Text": "vulputate",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07459163665771484,
                                    "Height": 0.012224092148244381,
                                    "Left": 0.2543388605117798,
                                    "Top": 0.19163958728313446
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2543388605117798,
                                        "Y": 0.19163958728313446
                                    },
                                    {
                                        "X": 0.3289203643798828,
                                        "Y": 0.19164270162582397
                                    },
                                    {
                                        "X": 0.32893049716949463,
                                        "Y": 0.20386368036270142
                                    },
                                    {
                                        "X": 0.25434908270835876,
                                        "Y": 0.20386183261871338
                                    }
                                ]
                            },
                            "Id": "bc0aabac-0fc3-493c-9141-a1b73500b485"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.78973388671875,
                            "Text": "nisi",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.026269899681210518,
                                    "Height": 0.010141436941921711,
                                    "Left": 0.3352404832839966,
                                    "Top": 0.19155244529247284
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3352404832839966,
                                        "Y": 0.19155244529247284
                                    },
                                    {
                                        "X": 0.3615019917488098,
                                        "Y": 0.19155354797840118
                                    },
                                    {
                                        "X": 0.36151039600372314,
                                        "Y": 0.20169389247894287
                                    },
                                    {
                                        "X": 0.3352489173412323,
                                        "Y": 0.20169316232204437
                                    }
                                ]
                            },
                            "Id": "2987c756-dc31-4981-b6f3-5d345ca7e8d4"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.95927429199219,
                            "Text": "in",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.01299674529582262,
                                    "Height": 0.010069881565868855,
                                    "Left": 0.3679177165031433,
                                    "Top": 0.1915774941444397
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3679177165031433,
                                        "Y": 0.1915774941444397
                                    },
                                    {
                                        "X": 0.3809061050415039,
                                        "Y": 0.19157803058624268
                                    },
                                    {
                                        "X": 0.38091444969177246,
                                        "Y": 0.20164737105369568
                                    },
                                    {
                                        "X": 0.36792606115341187,
                                        "Y": 0.20164701342582703
                                    }
                                ]
                            },
                            "Id": "edfca01a-fcfe-4acc-b953-f72809bb1542"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.83226776123047,
                            "Text": "auctor.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.053909268230199814,
                                    "Height": 0.009704571217298508,
                                    "Left": 0.3871743977069855,
                                    "Top": 0.19205869734287262
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3871743977069855,
                                        "Y": 0.19205869734287262
                                    },
                                    {
                                        "X": 0.4410756826400757,
                                        "Y": 0.1920609176158905
                                    },
                                    {
                                        "X": 0.4410836696624756,
                                        "Y": 0.20176327228546143
                                    },
                                    {
                                        "X": 0.38718244433403015,
                                        "Y": 0.20176178216934204
                                    }
                                ]
                            },
                            "Id": "1120f126-e891-4c6d-b9d2-2faee7853ffc"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.39957427978516,
                            "Text": "Cras",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.037874896079301834,
                                    "Height": 0.010221823118627071,
                                    "Left": 0.4477573037147522,
                                    "Top": 0.19149278104305267
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4477573037147522,
                                        "Y": 0.19149278104305267
                                    },
                                    {
                                        "X": 0.4856238067150116,
                                        "Y": 0.19149437546730042
                                    },
                                    {
                                        "X": 0.4856322109699249,
                                        "Y": 0.20171460509300232
                                    },
                                    {
                                        "X": 0.4477657377719879,
                                        "Y": 0.20171356201171875
                                    }
                                ]
                            },
                            "Id": "372436fc-d10f-4f2b-bc3e-26666c718d22"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.31446075439453,
                            "Text": "tristique",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06416748464107513,
                                    "Height": 0.012286809273064137,
                                    "Left": 0.49105221033096313,
                                    "Top": 0.19133201241493225
                                },
                                "Polygon": [
                                    {
                                        "X": 0.49105221033096313,
                                        "Y": 0.19133201241493225
                                    },
                                    {
                                        "X": 0.5552096366882324,
                                        "Y": 0.19133472442626953
                                    },
                                    {
                                        "X": 0.5552197098731995,
                                        "Y": 0.2036188244819641
                                    },
                                    {
                                        "X": 0.49106231331825256,
                                        "Y": 0.20361721515655518
                                    }
                                ]
                            },
                            "Id": "8729cc90-f8d5-4a93-b09d-22774e65b572"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.6573715209961,
                            "Text": "mi",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.018510306254029274,
                                    "Height": 0.009986162185668945,
                                    "Left": 0.5614558458328247,
                                    "Top": 0.1916552186012268
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5614558458328247,
                                        "Y": 0.1916552186012268
                                    },
                                    {
                                        "X": 0.5799579620361328,
                                        "Y": 0.1916559934616089
                                    },
                                    {
                                        "X": 0.579966127872467,
                                        "Y": 0.20164138078689575
                                    },
                                    {
                                        "X": 0.5614640116691589,
                                        "Y": 0.20164087414741516
                                    }
                                ]
                            },
                            "Id": "5f7f3d78-58f4-42e5-a5f0-593efc0fae86"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.78899383544922,
                            "Text": "ut",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.015189842320978642,
                                    "Height": 0.009793628007173538,
                                    "Left": 0.58598393201828,
                                    "Top": 0.19203169643878937
                                },
                                "Polygon": [
                                    {
                                        "X": 0.58598393201828,
                                        "Y": 0.19203169643878937
                                    },
                                    {
                                        "X": 0.601165771484375,
                                        "Y": 0.1920323222875595
                                    },
                                    {
                                        "X": 0.6011737585067749,
                                        "Y": 0.2018253356218338
                                    },
                                    {
                                        "X": 0.5859919190406799,
                                        "Y": 0.20182491838932037
                                    }
                                ]
                            },
                            "Id": "3aca8dba-78f1-4f67-838c-fa9a1b1ff092"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.67347717285156,
                            "Text": "ex",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.019334863871335983,
                                    "Height": 0.007925344631075859,
                                    "Left": 0.6063731908798218,
                                    "Top": 0.1937524378299713
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6063731908798218,
                                        "Y": 0.1937524378299713
                                    },
                                    {
                                        "X": 0.6257016062736511,
                                        "Y": 0.193753182888031
                                    },
                                    {
                                        "X": 0.6257081031799316,
                                        "Y": 0.20167778432369232
                                    },
                                    {
                                        "X": 0.6063796877861023,
                                        "Y": 0.20167724788188934
                                    }
                                ]
                            },
                            "Id": "20091781-2607-42ad-a273-0a5b90b650f7"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.95603942871094,
                            "Text": "dignissim",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07614578306674957,
                                    "Height": 0.012727254070341587,
                                    "Left": 0.6308185458183289,
                                    "Top": 0.191354900598526
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6308185458183289,
                                        "Y": 0.191354900598526
                                    },
                                    {
                                        "X": 0.7069540023803711,
                                        "Y": 0.19135810434818268
                                    },
                                    {
                                        "X": 0.7069643139839172,
                                        "Y": 0.20408214628696442
                                    },
                                    {
                                        "X": 0.6308289170265198,
                                        "Y": 0.20408028364181519
                                    }
                                ]
                            },
                            "Id": "c4e95b8d-b6cb-49a9-b7fe-b90ca40edccc"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.18258666992188,
                            "Text": "dignissim.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08076771348714828,
                                    "Height": 0.012976132333278656,
                                    "Left": 0.7127167582511902,
                                    "Top": 0.1910376250743866
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7127167582511902,
                                        "Y": 0.1910376250743866
                                    },
                                    {
                                        "X": 0.793474018573761,
                                        "Y": 0.19104106724262238
                                    },
                                    {
                                        "X": 0.7934844493865967,
                                        "Y": 0.20401376485824585
                                    },
                                    {
                                        "X": 0.7127272486686707,
                                        "Y": 0.20401178300380707
                                    }
                                ]
                            },
                            "Id": "5f2a75e7-fe2e-4d6e-aecd-a3d3182c7c71"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.9712142944336,
                            "Text": "Aenean",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0628383681178093,
                                    "Height": 0.010268978774547577,
                                    "Left": 0.799582839012146,
                                    "Top": 0.1915230005979538
                                },
                                "Polygon": [
                                    {
                                        "X": 0.799582839012146,
                                        "Y": 0.1915230005979538
                                    },
                                    {
                                        "X": 0.8624129295349121,
                                        "Y": 0.1915256381034851
                                    },
                                    {
                                        "X": 0.8624211549758911,
                                        "Y": 0.20179198682308197
                                    },
                                    {
                                        "X": 0.799591064453125,
                                        "Y": 0.2017902433872223
                                    }
                                ]
                            },
                            "Id": "ed2e1680-97b8-440e-81ac-9e4d7c0f8312"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.86205291748047,
                            "Text": "nec",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.02889217808842659,
                                    "Height": 0.007700826972723007,
                                    "Left": 0.12107425928115845,
                                    "Top": 0.2109813392162323
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12107425928115845,
                                        "Y": 0.2109813392162323
                                    },
                                    {
                                        "X": 0.1499599665403366,
                                        "Y": 0.21098177134990692
                                    },
                                    {
                                        "X": 0.14996643364429474,
                                        "Y": 0.2186821699142456
                                    },
                                    {
                                        "X": 0.12108074128627777,
                                        "Y": 0.21868205070495605
                                    }
                                ]
                            },
                            "Id": "52afe242-7a92-4ae6-84b3-b39e80771fa7"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.48423767089844,
                            "Text": "sagittis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05640772730112076,
                                    "Height": 0.01252624113112688,
                                    "Left": 0.155528262257576,
                                    "Top": 0.20873554050922394
                                },
                                "Polygon": [
                                    {
                                        "X": 0.155528262257576,
                                        "Y": 0.20873554050922394
                                    },
                                    {
                                        "X": 0.21192550659179688,
                                        "Y": 0.20873653888702393
                                    },
                                    {
                                        "X": 0.21193598210811615,
                                        "Y": 0.22126176953315735
                                    },
                                    {
                                        "X": 0.15553878247737885,
                                        "Y": 0.22126175463199615
                                    }
                                ]
                            },
                            "Id": "634a9eba-873f-4397-b24b-b320784ae499"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.6545181274414,
                            "Text": "turpis,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0493224672973156,
                                    "Height": 0.012426060624420643,
                                    "Left": 0.2174806296825409,
                                    "Top": 0.20872226357460022
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2174806296825409,
                                        "Y": 0.20872226357460022
                                    },
                                    {
                                        "X": 0.26679274439811707,
                                        "Y": 0.20872314274311066
                                    },
                                    {
                                        "X": 0.2668030858039856,
                                        "Y": 0.2211483269929886
                                    },
                                    {
                                        "X": 0.2174910306930542,
                                        "Y": 0.2211482971906662
                                    }
                                ]
                            },
                            "Id": "e81309a5-c288-4a1b-aa51-b624ae0470c5"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.70278930664062,
                            "Text": "a",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.00986466184258461,
                                    "Height": 0.007773722987622023,
                                    "Left": 0.273085355758667,
                                    "Top": 0.2109588235616684
                                },
                                "Polygon": [
                                    {
                                        "X": 0.273085355758667,
                                        "Y": 0.2109588235616684
                                    },
                                    {
                                        "X": 0.2829435467720032,
                                        "Y": 0.21095897257328033
                                    },
                                    {
                                        "X": 0.2829500138759613,
                                        "Y": 0.218732550740242
                                    },
                                    {
                                        "X": 0.2730918526649475,
                                        "Y": 0.21873250603675842
                                    }
                                ]
                            },
                            "Id": "f7aff25d-83a3-4039-8b2d-e44a17571987"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.82201385498047,
                            "Text": "sodales",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06302295625209808,
                                    "Height": 0.010349901393055916,
                                    "Left": 0.28859785199165344,
                                    "Top": 0.20849895477294922
                                },
                                "Polygon": [
                                    {
                                        "X": 0.28859785199165344,
                                        "Y": 0.20849895477294922
                                    },
                                    {
                                        "X": 0.35161224007606506,
                                        "Y": 0.20850010216236115
                                    },
                                    {
                                        "X": 0.3516208231449127,
                                        "Y": 0.21884885430335999
                                    },
                                    {
                                        "X": 0.2886064946651459,
                                        "Y": 0.21884861588478088
                                    }
                                ]
                            },
                            "Id": "d4f5109c-319f-4b46-a354-398533c80070"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.34703063964844,
                            "Text": "nisi.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.030834199860692024,
                                    "Height": 0.010251188650727272,
                                    "Left": 0.3576338291168213,
                                    "Top": 0.20852072536945343
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3576338291168213,
                                        "Y": 0.20852072536945343
                                    },
                                    {
                                        "X": 0.38845953345298767,
                                        "Y": 0.2085212916135788
                                    },
                                    {
                                        "X": 0.38846802711486816,
                                        "Y": 0.21877190470695496
                                    },
                                    {
                                        "X": 0.3576423227787018,
                                        "Y": 0.2187717854976654
                                    }
                                ]
                            },
                            "Id": "8ee5f850-346c-4dce-b565-d29f8fdb16a7"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.8750228881836,
                            "Text": "Sed",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.031442418694496155,
                                    "Height": 0.010436072014272213,
                                    "Left": 0.39570221304893494,
                                    "Top": 0.20832721889019012
                                },
                                "Polygon": [
                                    {
                                        "X": 0.39570221304893494,
                                        "Y": 0.20832721889019012
                                    },
                                    {
                                        "X": 0.42713600397109985,
                                        "Y": 0.20832780003547668
                                    },
                                    {
                                        "X": 0.4271446168422699,
                                        "Y": 0.2187632918357849
                                    },
                                    {
                                        "X": 0.395710825920105,
                                        "Y": 0.21876315772533417
                                    }
                                ]
                            },
                            "Id": "4dfa3ef0-8279-4b82-bcc3-a04b1ca7dfa7"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.88663482666016,
                            "Text": "nec",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.02900690585374832,
                                    "Height": 0.0077062309719622135,
                                    "Left": 0.4335675537586212,
                                    "Top": 0.2109600156545639
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4335675537586212,
                                        "Y": 0.2109600156545639
                                    },
                                    {
                                        "X": 0.46256810426712036,
                                        "Y": 0.21096044778823853
                                    },
                                    {
                                        "X": 0.46257445216178894,
                                        "Y": 0.21866625547409058
                                    },
                                    {
                                        "X": 0.4335739016532898,
                                        "Y": 0.21866613626480103
                                    }
                                ]
                            },
                            "Id": "6536aebb-9519-45c9-bfc4-adda9c22da5a"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.76949310302734,
                            "Text": "felis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03240387141704559,
                                    "Height": 0.010428306646645069,
                                    "Left": 0.4677168130874634,
                                    "Top": 0.2083151787519455
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4677168130874634,
                                        "Y": 0.2083151787519455
                                    },
                                    {
                                        "X": 0.5001121163368225,
                                        "Y": 0.20831578969955444
                                    },
                                    {
                                        "X": 0.5001206994056702,
                                        "Y": 0.2187434881925583
                                    },
                                    {
                                        "X": 0.46772539615631104,
                                        "Y": 0.21874336898326874
                                    }
                                ]
                            },
                            "Id": "546f36c9-e692-456f-ba9f-0b79e3aa35fd"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 96.00364685058594,
                            "Text": "ullamcorper,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.09908177703619003,
                                    "Height": 0.012477620504796505,
                                    "Left": 0.5061020255088806,
                                    "Top": 0.20857354998588562
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5061020255088806,
                                        "Y": 0.20857354998588562
                                    },
                                    {
                                        "X": 0.605173647403717,
                                        "Y": 0.20857535302639008
                                    },
                                    {
                                        "X": 0.6051837801933289,
                                        "Y": 0.2210511714220047
                                    },
                                    {
                                        "X": 0.506112277507782,
                                        "Y": 0.22105109691619873
                                    }
                                ]
                            },
                            "Id": "a4cc5ff9-4b31-4a44-9a26-d8c6a78f0535"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.40635681152344,
                            "Text": "porta",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.040976062417030334,
                                    "Height": 0.012162437662482262,
                                    "Left": 0.6118478775024414,
                                    "Top": 0.2089882791042328
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6118478775024414,
                                        "Y": 0.2089882791042328
                                    },
                                    {
                                        "X": 0.6528140306472778,
                                        "Y": 0.2089889943599701
                                    },
                                    {
                                        "X": 0.6528239250183105,
                                        "Y": 0.2211507111787796
                                    },
                                    {
                                        "X": 0.6118577718734741,
                                        "Y": 0.2211506962776184
                                    }
                                ]
                            },
                            "Id": "e3b6f230-9b6d-4075-8e10-a756468de366"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.67843627929688,
                            "Text": "nisi",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.026762722060084343,
                                    "Height": 0.010281707160174847,
                                    "Left": 0.6587235331535339,
                                    "Top": 0.2084832340478897
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6587235331535339,
                                        "Y": 0.2084832340478897
                                    },
                                    {
                                        "X": 0.6854779124259949,
                                        "Y": 0.2084837108850479
                                    },
                                    {
                                        "X": 0.6854861974716187,
                                        "Y": 0.21876493096351624
                                    },
                                    {
                                        "X": 0.6587318778038025,
                                        "Y": 0.21876482665538788
                                    }
                                ]
                            },
                            "Id": "a3adbf1e-9000-489f-ac2f-b72bae000c1d"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.23546600341797,
                            "Text": "eu,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.024347849190235138,
                                    "Height": 0.009520229883491993,
                                    "Left": 0.6914925575256348,
                                    "Top": 0.210897758603096
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6914925575256348,
                                        "Y": 0.210897758603096
                                    },
                                    {
                                        "X": 0.7158327102661133,
                                        "Y": 0.21089811623096466
                                    },
                                    {
                                        "X": 0.7158403992652893,
                                        "Y": 0.22041797637939453
                                    },
                                    {
                                        "X": 0.6915003061294556,
                                        "Y": 0.22041794657707214
                                    }
                                ]
                            },
                            "Id": "dff0c6db-f7e5-4820-8e15-6d626415cdc6"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.61032104492188,
                            "Text": "vehicula",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06670321524143219,
                                    "Height": 0.010680480860173702,
                                    "Left": 0.7224089503288269,
                                    "Top": 0.20831601321697235
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7224089503288269,
                                        "Y": 0.20831601321697235
                                    },
                                    {
                                        "X": 0.7891035676002502,
                                        "Y": 0.20831725001335144
                                    },
                                    {
                                        "X": 0.7891121506690979,
                                        "Y": 0.21899649500846863
                                    },
                                    {
                                        "X": 0.7224175930023193,
                                        "Y": 0.21899625658988953
                                    }
                                ]
                            },
                            "Id": "26288c71-8d18-44b0-aa5d-c90baafcc951"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 71.90863800048828,
                            "Text": "nulla.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.041651561856269836,
                                    "Height": 0.010413035750389099,
                                    "Left": 0.7946212887763977,
                                    "Top": 0.20912568271160126
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7946212887763977,
                                        "Y": 0.20912568271160126
                                    },
                                    {
                                        "X": 0.8362644910812378,
                                        "Y": 0.20912639796733856
                                    },
                                    {
                                        "X": 0.8362728357315063,
                                        "Y": 0.21953871846199036
                                    },
                                    {
                                        "X": 0.7946296334266663,
                                        "Y": 0.2195385992527008
                                    }
                                ]
                            },
                            "Id": "7fcac388-870d-445e-9299-51a9a5f44354"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.90554809570312,
                            "Text": "Proin",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04165809229016304,
                                    "Height": 0.010227176360785961,
                                    "Left": 0.12109660357236862,
                                    "Top": 0.22597581148147583
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12109660357236862,
                                        "Y": 0.22597606480121613
                                    },
                                    {
                                        "X": 0.1627461165189743,
                                        "Y": 0.22597581148147583
                                    },
                                    {
                                        "X": 0.16275469958782196,
                                        "Y": 0.23620213568210602
                                    },
                                    {
                                        "X": 0.12110520899295807,
                                        "Y": 0.23620298504829407
                                    }
                                ]
                            },
                            "Id": "553d6a9b-51f1-48be-b4b9-71a86e12098b"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.84529876708984,
                            "Text": "et",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.015467467717826366,
                                    "Height": 0.009801769629120827,
                                    "Left": 0.16879327595233917,
                                    "Top": 0.22642463445663452
                                },
                                "Polygon": [
                                    {
                                        "X": 0.16879327595233917,
                                        "Y": 0.22642473876476288
                                    },
                                    {
                                        "X": 0.1842525154352188,
                                        "Y": 0.22642463445663452
                                    },
                                    {
                                        "X": 0.18426074087619781,
                                        "Y": 0.23622609674930573
                                    },
                                    {
                                        "X": 0.16880150139331818,
                                        "Y": 0.2362264096736908
                                    }
                                ]
                            },
                            "Id": "bca14a96-3ead-499d-adfc-7b52608f5cf7"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.87995147705078,
                            "Text": "ipsum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.048141833394765854,
                                    "Height": 0.012235084548592567,
                                    "Left": 0.1895303726196289,
                                    "Top": 0.22614148259162903
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1895303726196289,
                                        "Y": 0.2261417955160141
                                    },
                                    {
                                        "X": 0.23766198754310608,
                                        "Y": 0.22614148259162903
                                    },
                                    {
                                        "X": 0.23767220973968506,
                                        "Y": 0.2383754402399063
                                    },
                                    {
                                        "X": 0.18954062461853027,
                                        "Y": 0.23837657272815704
                                    }
                                ]
                            },
                            "Id": "3974a21f-8a39-4b3a-8dbb-0339c1cadb00"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.69215393066406,
                            "Text": "molestie",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06724098324775696,
                                    "Height": 0.010112457908689976,
                                    "Left": 0.24397939443588257,
                                    "Top": 0.2261224389076233
                                },
                                "Polygon": [
                                    {
                                        "X": 0.24397939443588257,
                                        "Y": 0.22612285614013672
                                    },
                                    {
                                        "X": 0.3112119734287262,
                                        "Y": 0.2261224389076233
                                    },
                                    {
                                        "X": 0.3112203776836395,
                                        "Y": 0.23623351752758026
                                    },
                                    {
                                        "X": 0.2439878284931183,
                                        "Y": 0.2362348884344101
                                    }
                                ]
                            },
                            "Id": "12dd2299-e7a9-40b4-956d-6fc42a42dc9f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.87975311279297,
                            "Text": "ipsum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04828576743602753,
                                    "Height": 0.01225949078798294,
                                    "Left": 0.3171653151512146,
                                    "Top": 0.22610615193843842
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3171653151512146,
                                        "Y": 0.2261064499616623
                                    },
                                    {
                                        "X": 0.3654409348964691,
                                        "Y": 0.22610615193843842
                                    },
                                    {
                                        "X": 0.3654510974884033,
                                        "Y": 0.23836450278759003
                                    },
                                    {
                                        "X": 0.3171755075454712,
                                        "Y": 0.23836563527584076
                                    }
                                ]
                            },
                            "Id": "91d8187a-a956-41c6-9207-0a7aeebf9b7a"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.53886413574219,
                            "Text": "ornare",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05232834443449974,
                                    "Height": 0.008080771192908287,
                                    "Left": 0.3716326951980591,
                                    "Top": 0.22813454270362854
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3716326951980591,
                                        "Y": 0.22813501954078674
                                    },
                                    {
                                        "X": 0.4239543676376343,
                                        "Y": 0.22813454270362854
                                    },
                                    {
                                        "X": 0.42396101355552673,
                                        "Y": 0.23621425032615662
                                    },
                                    {
                                        "X": 0.3716393709182739,
                                        "Y": 0.23621532320976257
                                    }
                                ]
                            },
                            "Id": "22d39da8-50f5-4ccd-95e3-7963ebeacb00"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.33081817626953,
                            "Text": "tempor.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.060641225427389145,
                                    "Height": 0.012100798077881336,
                                    "Left": 0.4294612407684326,
                                    "Top": 0.22621183097362518
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4294612407684326,
                                        "Y": 0.22621223330497742
                                    },
                                    {
                                        "X": 0.49009251594543457,
                                        "Y": 0.22621183097362518
                                    },
                                    {
                                        "X": 0.49010246992111206,
                                        "Y": 0.23831121623516083
                                    },
                                    {
                                        "X": 0.4294712245464325,
                                        "Y": 0.23831263184547424
                                    }
                                ]
                            },
                            "Id": "78e8c99c-21d4-4b7e-9596-1bf51823a5f7"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.91095733642578,
                            "Text": "Nam",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03763822466135025,
                                    "Height": 0.010104849934577942,
                                    "Left": 0.49707481265068054,
                                    "Top": 0.22609245777130127
                                },
                                "Polygon": [
                                    {
                                        "X": 0.49707481265068054,
                                        "Y": 0.22609268128871918
                                    },
                                    {
                                        "X": 0.5347047448158264,
                                        "Y": 0.22609245777130127
                                    },
                                    {
                                        "X": 0.5347130298614502,
                                        "Y": 0.23619653284549713
                                    },
                                    {
                                        "X": 0.4970831274986267,
                                        "Y": 0.2361973077058792
                                    }
                                ]
                            },
                            "Id": "c786f90f-dad0-4d5b-8b0a-ac23f5e39652"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7095718383789,
                            "Text": "augue",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05064539983868599,
                                    "Height": 0.010467061772942543,
                                    "Left": 0.5407426357269287,
                                    "Top": 0.22808220982551575
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5407426357269287,
                                        "Y": 0.22808267176151276
                                    },
                                    {
                                        "X": 0.5913794636726379,
                                        "Y": 0.22808220982551575
                                    },
                                    {
                                        "X": 0.5913880467414856,
                                        "Y": 0.23854807019233704
                                    },
                                    {
                                        "X": 0.5407512187957764,
                                        "Y": 0.23854927718639374
                                    }
                                ]
                            },
                            "Id": "caadbf31-4e54-40c4-aedb-3186a6c6ae0d"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.36335754394531,
                            "Text": "magna,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05954048037528992,
                                    "Height": 0.010530233383178711,
                                    "Left": 0.59750896692276,
                                    "Top": 0.22806081175804138
                                },
                                "Polygon": [
                                    {
                                        "X": 0.59750896692276,
                                        "Y": 0.22806134819984436
                                    },
                                    {
                                        "X": 0.6570408940315247,
                                        "Y": 0.22806081175804138
                                    },
                                    {
                                        "X": 0.6570494174957275,
                                        "Y": 0.23858962953090668
                                    },
                                    {
                                        "X": 0.5975175499916077,
                                        "Y": 0.2385910451412201
                                    }
                                ]
                            },
                            "Id": "65ac8b4e-cfe0-4a42-891d-ea4119ae1548"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.69833374023438,
                            "Text": "eleifend",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06372911483049393,
                                    "Height": 0.010502957738935947,
                                    "Left": 0.6637133359909058,
                                    "Top": 0.22582371532917023
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6637133359909058,
                                        "Y": 0.22582408785820007
                                    },
                                    {
                                        "X": 0.727433979511261,
                                        "Y": 0.22582371532917023
                                    },
                                    {
                                        "X": 0.7274424433708191,
                                        "Y": 0.23632535338401794
                                    },
                                    {
                                        "X": 0.6637219190597534,
                                        "Y": 0.236326664686203
                                    }
                                ]
                            },
                            "Id": "00a88b8b-0550-4693-9b91-4f9fcd98e5bf"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.79743194580078,
                            "Text": "a",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.00956074707210064,
                                    "Height": 0.008021820336580276,
                                    "Left": 0.7334095239639282,
                                    "Top": 0.22818627953529358
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7334095239639282,
                                        "Y": 0.22818636894226074
                                    },
                                    {
                                        "X": 0.7429637908935547,
                                        "Y": 0.22818627953529358
                                    },
                                    {
                                        "X": 0.7429702281951904,
                                        "Y": 0.23620790243148804
                                    },
                                    {
                                        "X": 0.733415961265564,
                                        "Y": 0.23620809614658356
                                    }
                                ]
                            },
                            "Id": "5152b969-d6e3-4aa8-93dc-31fed7f95edc"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.83644104003906,
                            "Text": "luctus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04752682149410248,
                                    "Height": 0.010139086283743382,
                                    "Left": 0.7489122152328491,
                                    "Top": 0.22606360912322998
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7489122152328491,
                                        "Y": 0.22606390714645386
                                    },
                                    {
                                        "X": 0.7964308261871338,
                                        "Y": 0.22606360912322998
                                    },
                                    {
                                        "X": 0.796438992023468,
                                        "Y": 0.23620173335075378
                                    },
                                    {
                                        "X": 0.7489203810691833,
                                        "Y": 0.23620270192623138
                                    }
                                ]
                            },
                            "Id": "0d04f707-6544-4b98-bf2f-73bbce612e25"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.04488372802734,
                            "Text": "eu,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.02400403469800949,
                                    "Height": 0.009630462154746056,
                                    "Left": 0.8022229075431824,
                                    "Top": 0.22812874615192413
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8022229075431824,
                                        "Y": 0.22812895476818085
                                    },
                                    {
                                        "X": 0.8262192010879517,
                                        "Y": 0.22812874615192413
                                    },
                                    {
                                        "X": 0.8262269496917725,
                                        "Y": 0.23775866627693176
                                    },
                                    {
                                        "X": 0.8022306561470032,
                                        "Y": 0.23775920271873474
                                    }
                                ]
                            },
                            "Id": "226e0741-ae9f-4370-a5cb-abcc8b9d78da"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.60547637939453,
                            "Text": "rutrum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05219537764787674,
                                    "Height": 0.00960587989538908,
                                    "Left": 0.12084899097681046,
                                    "Top": 0.2436264157295227
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12084899097681046,
                                        "Y": 0.24362802505493164
                                    },
                                    {
                                        "X": 0.17303630709648132,
                                        "Y": 0.2436264157295227
                                    },
                                    {
                                        "X": 0.1730443686246872,
                                        "Y": 0.2532300055027008
                                    },
                                    {
                                        "X": 0.12085707485675812,
                                        "Y": 0.25323230028152466
                                    }
                                ]
                            },
                            "Id": "42211fe1-ceda-4101-97c3-21b261851046"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.88351440429688,
                            "Text": "sit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.01873723976314068,
                                    "Height": 0.010071219876408577,
                                    "Left": 0.17858074605464935,
                                    "Top": 0.24314002692699432
                                },
                                "Polygon": [
                                    {
                                        "X": 0.17858074605464935,
                                        "Y": 0.2431405931711197
                                    },
                                    {
                                        "X": 0.19730955362319946,
                                        "Y": 0.24314002692699432
                                    },
                                    {
                                        "X": 0.19731798768043518,
                                        "Y": 0.2532104253768921
                                    },
                                    {
                                        "X": 0.17858919501304626,
                                        "Y": 0.25321125984191895
                                    }
                                ]
                            },
                            "Id": "846ddc11-cf95-4a5d-8dc7-412c1345e32a"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.52018737792969,
                            "Text": "amet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04082677140831947,
                                    "Height": 0.009698746725916862,
                                    "Left": 0.20270654559135437,
                                    "Top": 0.24356600642204285
                                },
                                "Polygon": [
                                    {
                                        "X": 0.20270654559135437,
                                        "Y": 0.24356725811958313
                                    },
                                    {
                                        "X": 0.24352522194385529,
                                        "Y": 0.24356600642204285
                                    },
                                    {
                                        "X": 0.24353331327438354,
                                        "Y": 0.2532629370689392
                                    },
                                    {
                                        "X": 0.20271466672420502,
                                        "Y": 0.25326475501060486
                                    }
                                ]
                            },
                            "Id": "1bec41bb-a9a1-48e8-a0a9-08074de87e7d"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.07186889648438,
                            "Text": "neque.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05444833263754845,
                                    "Height": 0.010214007459580898,
                                    "Left": 0.248947411775589,
                                    "Top": 0.2453886717557907
                                },
                                "Polygon": [
                                    {
                                        "X": 0.248947411775589,
                                        "Y": 0.24539048969745636
                                    },
                                    {
                                        "X": 0.30338725447654724,
                                        "Y": 0.2453886717557907
                                    },
                                    {
                                        "X": 0.30339574813842773,
                                        "Y": 0.25560009479522705
                                    },
                                    {
                                        "X": 0.24895595014095306,
                                        "Y": 0.2556026875972748
                                    }
                                ]
                            },
                            "Id": "70da3d1e-b4d2-4c44-b095-9fa2636f269c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.6128921508789,
                            "Text": "Maecenas",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08405574411153793,
                                    "Height": 0.010111547075212002,
                                    "Left": 0.31047365069389343,
                                    "Top": 0.24315404891967773
                                },
                                "Polygon": [
                                    {
                                        "X": 0.31047365069389343,
                                        "Y": 0.2431565672159195
                                    },
                                    {
                                        "X": 0.394521027803421,
                                        "Y": 0.24315404891967773
                                    },
                                    {
                                        "X": 0.39452940225601196,
                                        "Y": 0.25326186418533325
                                    },
                                    {
                                        "X": 0.31048205494880676,
                                        "Y": 0.2532655894756317
                                    }
                                ]
                            },
                            "Id": "ff3a43d8-11e4-43dc-ba6d-123b02d4f494"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.93592071533203,
                            "Text": "sit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.01842535100877285,
                                    "Height": 0.009894673712551594,
                                    "Left": 0.40038514137268066,
                                    "Top": 0.2432684302330017
                                },
                                "Polygon": [
                                    {
                                        "X": 0.40038514137268066,
                                        "Y": 0.24326899647712708
                                    },
                                    {
                                        "X": 0.41880232095718384,
                                        "Y": 0.2432684302330017
                                    },
                                    {
                                        "X": 0.41881048679351807,
                                        "Y": 0.25316229462623596
                                    },
                                    {
                                        "X": 0.4003933072090149,
                                        "Y": 0.25316309928894043
                                    }
                                ]
                            },
                            "Id": "94404c83-3e95-4e10-a155-e362c231e1c3"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.31005096435547,
                            "Text": "amet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0406130775809288,
                                    "Height": 0.00987530779093504,
                                    "Left": 0.4242428243160248,
                                    "Top": 0.2434375137090683
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4242428243160248,
                                        "Y": 0.24343876540660858
                                    },
                                    {
                                        "X": 0.46484777331352234,
                                        "Y": 0.2434375137090683
                                    },
                                    {
                                        "X": 0.4648559093475342,
                                        "Y": 0.25331103801727295
                                    },
                                    {
                                        "X": 0.424250990152359,
                                        "Y": 0.2533128261566162
                                    }
                                ]
                            },
                            "Id": "5cbd3af1-6fbb-4909-ac70-e49cdc74c3ff"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.5802001953125,
                            "Text": "urna",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03599368780851364,
                                    "Height": 0.007857359014451504,
                                    "Left": 0.4702439606189728,
                                    "Top": 0.24538801610469818
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4702439606189728,
                                        "Y": 0.2453892081975937
                                    },
                                    {
                                        "X": 0.5062311887741089,
                                        "Y": 0.24538801610469818
                                    },
                                    {
                                        "X": 0.5062376260757446,
                                        "Y": 0.2532437741756439
                                    },
                                    {
                                        "X": 0.4702503979206085,
                                        "Y": 0.25324538350105286
                                    }
                                ]
                            },
                            "Id": "3cbe0236-e860-4165-b8fa-a29daf8ad371"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.34261322021484,
                            "Text": "arcu.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.038357868790626526,
                                    "Height": 0.008355553261935711,
                                    "Left": 0.5118712186813354,
                                    "Top": 0.24513153731822968
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5118712186813354,
                                        "Y": 0.24513280391693115
                                    },
                                    {
                                        "X": 0.5502222180366516,
                                        "Y": 0.24513153731822968
                                    },
                                    {
                                        "X": 0.5502290725708008,
                                        "Y": 0.25348538160324097
                                    },
                                    {
                                        "X": 0.5118780732154846,
                                        "Y": 0.25348708033561707
                                    }
                                ]
                            },
                            "Id": "faac3857-ed02-4fbf-b0ec-5e48918aecc7"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.4494400024414,
                            "Text": "In",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.013247807510197163,
                                    "Height": 0.010041323490440845,
                                    "Left": 0.12155701220035553,
                                    "Top": 0.2779024839401245
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12155701220035553,
                                        "Y": 0.2779035270214081
                                    },
                                    {
                                        "X": 0.1347963809967041,
                                        "Y": 0.2779024839401245
                                    },
                                    {
                                        "X": 0.13480481505393982,
                                        "Y": 0.2879425883293152
                                    },
                                    {
                                        "X": 0.12156546860933304,
                                        "Y": 0.2879438102245331
                                    }
                                ]
                            },
                            "Id": "a40ca452-b12a-4b75-b9f8-ecb057ee4a43"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.80947875976562,
                            "Text": "hac",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.029011161997914314,
                                    "Height": 0.010134712792932987,
                                    "Left": 0.14142410457134247,
                                    "Top": 0.2779301404953003
                                },
                                "Polygon": [
                                    {
                                        "X": 0.14142410457134247,
                                        "Y": 0.27793240547180176
                                    },
                                    {
                                        "X": 0.17042677104473114,
                                        "Y": 0.2779301404953003
                                    },
                                    {
                                        "X": 0.17043526470661163,
                                        "Y": 0.2880621552467346
                                    },
                                    {
                                        "X": 0.14143262803554535,
                                        "Y": 0.2880648374557495
                                    }
                                ]
                            },
                            "Id": "15341653-cf08-4a17-96eb-28cf23ea65b0"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.69612121582031,
                            "Text": "habitasse",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07783262431621552,
                                    "Height": 0.010264012962579727,
                                    "Left": 0.17633560299873352,
                                    "Top": 0.27787646651268005
                                },
                                "Polygon": [
                                    {
                                        "X": 0.17633560299873352,
                                        "Y": 0.27788257598876953
                                    },
                                    {
                                        "X": 0.2541596591472626,
                                        "Y": 0.27787646651268005
                                    },
                                    {
                                        "X": 0.25416821241378784,
                                        "Y": 0.2881332337856293
                                    },
                                    {
                                        "X": 0.17634420096874237,
                                        "Y": 0.2881404757499695
                                    }
                                ]
                            },
                            "Id": "fc61ab5c-95d2-42ea-99dd-a6142a4ddf91"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.87936401367188,
                            "Text": "platea",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04918450117111206,
                                    "Height": 0.012409389019012451,
                                    "Left": 0.26019635796546936,
                                    "Top": 0.27803006768226624
                                },
                                "Polygon": [
                                    {
                                        "X": 0.26019635796546936,
                                        "Y": 0.27803394198417664
                                    },
                                    {
                                        "X": 0.3093705475330353,
                                        "Y": 0.27803006768226624
                                    },
                                    {
                                        "X": 0.3093808591365814,
                                        "Y": 0.29043474793434143
                                    },
                                    {
                                        "X": 0.2602066993713379,
                                        "Y": 0.2904394567012787
                                    }
                                ]
                            },
                            "Id": "b78ac937-328f-4c77-a37b-4633409dd0f4"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.01644897460938,
                            "Text": "dictumst.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07226495444774628,
                                    "Height": 0.010206307284533978,
                                    "Left": 0.3152596652507782,
                                    "Top": 0.2779400944709778
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3152596652507782,
                                        "Y": 0.27794578671455383
                                    },
                                    {
                                        "X": 0.38751617074012756,
                                        "Y": 0.2779400944709778
                                    },
                                    {
                                        "X": 0.3875246047973633,
                                        "Y": 0.2881397008895874
                                    },
                                    {
                                        "X": 0.3152681291103363,
                                        "Y": 0.28814640641212463
                                    }
                                ]
                            },
                            "Id": "2c2e2ca0-b9e3-4ca6-a3a3-9e8f50030281"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.82999420166016,
                            "Text": "Nulla",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04071914404630661,
                                    "Height": 0.010257506743073463,
                                    "Left": 0.3948545753955841,
                                    "Top": 0.2778933644294739
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3948545753955841,
                                        "Y": 0.27789655327796936
                                    },
                                    {
                                        "X": 0.4355652630329132,
                                        "Y": 0.2778933644294739
                                    },
                                    {
                                        "X": 0.4355736970901489,
                                        "Y": 0.28814709186553955
                                    },
                                    {
                                        "X": 0.3948630392551422,
                                        "Y": 0.2881508469581604
                                    }
                                ]
                            },
                            "Id": "abefd207-5657-4985-a59d-f5e8843c0bc8"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.74813079833984,
                            "Text": "quis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.032901059836149216,
                                    "Height": 0.012471306137740612,
                                    "Left": 0.4415135979652405,
                                    "Top": 0.2779625356197357
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4415135979652405,
                                        "Y": 0.27796509861946106
                                    },
                                    {
                                        "X": 0.47440439462661743,
                                        "Y": 0.2779625356197357
                                    },
                                    {
                                        "X": 0.4744146466255188,
                                        "Y": 0.2904306650161743
                                    },
                                    {
                                        "X": 0.44152387976646423,
                                        "Y": 0.2904338240623474
                                    }
                                ]
                            },
                            "Id": "33955062-448f-49d2-b066-50d36fbeca70"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.63844299316406,
                            "Text": "rutrum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05215577781200409,
                                    "Height": 0.009702155366539955,
                                    "Left": 0.48040178418159485,
                                    "Top": 0.27840062975883484
                                },
                                "Polygon": [
                                    {
                                        "X": 0.48040178418159485,
                                        "Y": 0.27840477228164673
                                    },
                                    {
                                        "X": 0.5325496196746826,
                                        "Y": 0.27840062975883484
                                    },
                                    {
                                        "X": 0.5325575470924377,
                                        "Y": 0.28809794783592224
                                    },
                                    {
                                        "X": 0.48040974140167236,
                                        "Y": 0.28810280561447144
                                    }
                                ]
                            },
                            "Id": "19f45de4-002f-4889-bd7a-81014b15a529"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.27761840820312,
                            "Text": "ligula,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04654204845428467,
                                    "Height": 0.012689722701907158,
                                    "Left": 0.5388261675834656,
                                    "Top": 0.2777361273765564
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5388261675834656,
                                        "Y": 0.2777397632598877
                                    },
                                    {
                                        "X": 0.5853578448295593,
                                        "Y": 0.2777361273765564
                                    },
                                    {
                                        "X": 0.5853682160377502,
                                        "Y": 0.29042136669158936
                                    },
                                    {
                                        "X": 0.5388365387916565,
                                        "Y": 0.2904258370399475
                                    }
                                ]
                            },
                            "Id": "8528c326-7d4f-4dd1-8b5a-a0854f2d0018"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.62466430664062,
                            "Text": "sed",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.02877136878669262,
                                    "Height": 0.010171010158956051,
                                    "Left": 0.5919795632362366,
                                    "Top": 0.2778815031051636
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5919795632362366,
                                        "Y": 0.27788376808166504
                                    },
                                    {
                                        "X": 0.620742678642273,
                                        "Y": 0.2778815031051636
                                    },
                                    {
                                        "X": 0.6207509636878967,
                                        "Y": 0.2880498468875885
                                    },
                                    {
                                        "X": 0.5919878482818604,
                                        "Y": 0.2880525290966034
                                    }
                                ]
                            },
                            "Id": "47b06494-981e-41f3-b5fd-d7353861c016"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7930679321289,
                            "Text": "ultrices",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05730384588241577,
                                    "Height": 0.010109005495905876,
                                    "Left": 0.627158522605896,
                                    "Top": 0.277994304895401
                                },
                                "Polygon": [
                                    {
                                        "X": 0.627158522605896,
                                        "Y": 0.27799880504608154
                                    },
                                    {
                                        "X": 0.6844542026519775,
                                        "Y": 0.277994304895401
                                    },
                                    {
                                        "X": 0.6844623684883118,
                                        "Y": 0.28809797763824463
                                    },
                                    {
                                        "X": 0.627166748046875,
                                        "Y": 0.288103312253952
                                    }
                                ]
                            },
                            "Id": "0f8712fa-4f11-4764-b756-400fe83d68ab"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.6953125,
                            "Text": "nulla.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.041935697197914124,
                                    "Height": 0.010241684503853321,
                                    "Left": 0.6912170648574829,
                                    "Top": 0.2780229151248932
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6912170648574829,
                                        "Y": 0.2780262231826782
                                    },
                                    {
                                        "X": 0.7331445217132568,
                                        "Y": 0.2780229151248932
                                    },
                                    {
                                        "X": 0.7331528067588806,
                                        "Y": 0.28826069831848145
                                    },
                                    {
                                        "X": 0.6912254095077515,
                                        "Y": 0.28826460242271423
                                    }
                                ]
                            },
                            "Id": "706416d8-878f-4774-bc4e-b429c920bc6e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.96278381347656,
                            "Text": "Pellentesque",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.1054619699716568,
                                    "Height": 0.012899338267743587,
                                    "Left": 0.7400248050689697,
                                    "Top": 0.2776959538459778
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7400248050689697,
                                        "Y": 0.2777042090892792
                                    },
                                    {
                                        "X": 0.8454764485359192,
                                        "Y": 0.2776959538459778
                                    },
                                    {
                                        "X": 0.8454867601394653,
                                        "Y": 0.29058513045310974
                                    },
                                    {
                                        "X": 0.7400352358818054,
                                        "Y": 0.29059529304504395
                                    }
                                ]
                            },
                            "Id": "6fa78d68-c007-4166-bfb8-5a64d57d14f6"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.4129638671875,
                            "Text": "fermentum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.087763212621212,
                                    "Height": 0.010123132728040218,
                                    "Left": 0.1200404092669487,
                                    "Top": 0.29494762420654297
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1200404092669487,
                                        "Y": 0.29495662450790405
                                    },
                                    {
                                        "X": 0.2077951580286026,
                                        "Y": 0.29494762420654297
                                    },
                                    {
                                        "X": 0.2078036218881607,
                                        "Y": 0.30506056547164917
                                    },
                                    {
                                        "X": 0.12004892528057098,
                                        "Y": 0.30507075786590576
                                    }
                                ]
                            },
                            "Id": "c0a75c0d-e6b3-4529-9657-d6effc3e9030"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.85652923583984,
                            "Text": "tortor",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04336388409137726,
                                    "Height": 0.009611174464225769,
                                    "Left": 0.21342158317565918,
                                    "Top": 0.2953885495662689
                                },
                                "Polygon": [
                                    {
                                        "X": 0.21342158317565918,
                                        "Y": 0.2953929901123047
                                    },
                                    {
                                        "X": 0.25677746534347534,
                                        "Y": 0.2953885495662689
                                    },
                                    {
                                        "X": 0.25678545236587524,
                                        "Y": 0.30499467253685
                                    },
                                    {
                                        "X": 0.21342961490154266,
                                        "Y": 0.3049997091293335
                                    }
                                ]
                            },
                            "Id": "4dbc3c6b-fd8f-40fe-ae2f-66a4160d7cb9"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.68354797363281,
                            "Text": "eu",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.01957063190639019,
                                    "Height": 0.007832351140677929,
                                    "Left": 0.26187968254089355,
                                    "Top": 0.29713502526283264
                                },
                                "Polygon": [
                                    {
                                        "X": 0.26187968254089355,
                                        "Y": 0.2971371114253998
                                    },
                                    {
                                        "X": 0.2814437747001648,
                                        "Y": 0.29713502526283264
                                    },
                                    {
                                        "X": 0.2814503014087677,
                                        "Y": 0.3049651086330414
                                    },
                                    {
                                        "X": 0.26188620924949646,
                                        "Y": 0.30496737360954285
                                    }
                                ]
                            },
                            "Id": "fbcbb1f8-bbaf-483d-92d5-87ce6624219a"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.79328918457031,
                            "Text": "nunc",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.039248883724212646,
                                    "Height": 0.007897112518548965,
                                    "Left": 0.287935346364975,
                                    "Top": 0.2971525192260742
                                },
                                "Polygon": [
                                    {
                                        "X": 0.287935346364975,
                                        "Y": 0.2971566617488861
                                    },
                                    {
                                        "X": 0.32717767357826233,
                                        "Y": 0.2971525192260742
                                    },
                                    {
                                        "X": 0.3271842300891876,
                                        "Y": 0.30504506826400757
                                    },
                                    {
                                        "X": 0.28794190287590027,
                                        "Y": 0.3050496280193329
                                    }
                                ]
                            },
                            "Id": "a2418400-93c0-4573-b063-67f8da3ad98d"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.4341812133789,
                            "Text": "sagittis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0561775304377079,
                                    "Height": 0.01250339113175869,
                                    "Left": 0.33296293020248413,
                                    "Top": 0.29502564668655396
                                },
                                "Polygon": [
                                    {
                                        "X": 0.33296293020248413,
                                        "Y": 0.2950313985347748
                                    },
                                    {
                                        "X": 0.3891301453113556,
                                        "Y": 0.29502564668655396
                                    },
                                    {
                                        "X": 0.38914045691490173,
                                        "Y": 0.3075222969055176
                                    },
                                    {
                                        "X": 0.33297333121299744,
                                        "Y": 0.3075290322303772
                                    }
                                ]
                            },
                            "Id": "abc95f1d-59c4-4f8d-9269-8d2c7fa37f8e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.25775146484375,
                            "Text": "eleifend.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06846976280212402,
                                    "Height": 0.010179242119193077,
                                    "Left": 0.39514243602752686,
                                    "Top": 0.29492247104644775
                                },
                                "Polygon": [
                                    {
                                        "X": 0.39514243602752686,
                                        "Y": 0.29492947459220886
                                    },
                                    {
                                        "X": 0.46360382437705994,
                                        "Y": 0.29492247104644775
                                    },
                                    {
                                        "X": 0.4636121988296509,
                                        "Y": 0.3050937354564667
                                    },
                                    {
                                        "X": 0.3951508402824402,
                                        "Y": 0.3051016926765442
                                    }
                                ]
                            },
                            "Id": "a7dc39ee-b26e-4385-af46-ecda441b9af3"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 95.1954574584961,
                            "Text": "Integer",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05617251619696617,
                                    "Height": 0.012594264931976795,
                                    "Left": 0.470954030752182,
                                    "Top": 0.2949768304824829
                                },
                                "Polygon": [
                                    {
                                        "X": 0.470954030752182,
                                        "Y": 0.29498258233070374
                                    },
                                    {
                                        "X": 0.5271162390708923,
                                        "Y": 0.2949768304824829
                                    },
                                    {
                                        "X": 0.5271265506744385,
                                        "Y": 0.307564377784729
                                    },
                                    {
                                        "X": 0.47096437215805054,
                                        "Y": 0.3075711131095886
                                    }
                                ]
                            },
                            "Id": "ab758f11-8bd7-41b3-a45b-fd4137d666d6"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.68693542480469,
                            "Text": "lacus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04217344522476196,
                                    "Height": 0.010148311033844948,
                                    "Left": 0.5327548980712891,
                                    "Top": 0.29497820138931274
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5327548980712891,
                                        "Y": 0.29498252272605896
                                    },
                                    {
                                        "X": 0.5749200582504272,
                                        "Y": 0.29497820138931274
                                    },
                                    {
                                        "X": 0.574928343296051,
                                        "Y": 0.30512160062789917
                                    },
                                    {
                                        "X": 0.5327632427215576,
                                        "Y": 0.30512651801109314
                                    }
                                ]
                            },
                            "Id": "1aa4250d-f975-498d-8091-44f7e9bf23bd"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 96.266845703125,
                            "Text": "orci,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.033612340688705444,
                                    "Height": 0.011605020612478256,
                                    "Left": 0.5806268453598022,
                                    "Top": 0.29511600732803345
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5806268453598022,
                                        "Y": 0.2951194643974304
                                    },
                                    {
                                        "X": 0.6142297387123108,
                                        "Y": 0.29511600732803345
                                    },
                                    {
                                        "X": 0.6142391562461853,
                                        "Y": 0.30671703815460205
                                    },
                                    {
                                        "X": 0.5806363224983215,
                                        "Y": 0.306721031665802
                                    }
                                ]
                            },
                            "Id": "6d4af05a-00fb-4430-8ee0-0249c0634762"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7154541015625,
                            "Text": "ultricies",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06155337020754814,
                                    "Height": 0.010166527703404427,
                                    "Left": 0.6208614110946655,
                                    "Top": 0.2950594425201416
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6208614110946655,
                                        "Y": 0.2950657606124878
                                    },
                                    {
                                        "X": 0.682406485080719,
                                        "Y": 0.2950594425201416
                                    },
                                    {
                                        "X": 0.6824147701263428,
                                        "Y": 0.30521878600120544
                                    },
                                    {
                                        "X": 0.6208696365356445,
                                        "Y": 0.3052259683609009
                                    }
                                ]
                            },
                            "Id": "5a06d0c2-61eb-4ac7-b340-43c3843ec9ba"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.73661804199219,
                            "Text": "ac",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.019126659259200096,
                                    "Height": 0.007875539362430573,
                                    "Left": 0.6883974671363831,
                                    "Top": 0.29723429679870605
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6883974671363831,
                                        "Y": 0.2972363233566284
                                    },
                                    {
                                        "X": 0.7075177431106567,
                                        "Y": 0.29723429679870605
                                    },
                                    {
                                        "X": 0.7075241208076477,
                                        "Y": 0.30510759353637695
                                    },
                                    {
                                        "X": 0.688403844833374,
                                        "Y": 0.30510982871055603
                                    }
                                ]
                            },
                            "Id": "8267a4ac-7463-4d9e-864b-d87581c31bf9"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.76842498779297,
                            "Text": "mattis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0479549877345562,
                                    "Height": 0.009943935088813305,
                                    "Left": 0.7134314179420471,
                                    "Top": 0.2951359748840332
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7134314179420471,
                                        "Y": 0.2951408922672272
                                    },
                                    {
                                        "X": 0.7613784074783325,
                                        "Y": 0.2951359748840332
                                    },
                                    {
                                        "X": 0.7613863945007324,
                                        "Y": 0.3050743341445923
                                    },
                                    {
                                        "X": 0.7134394645690918,
                                        "Y": 0.3050799071788788
                                    }
                                ]
                            },
                            "Id": "0ec803b4-487a-4b1f-9490-9bcb9c665530"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.78792572021484,
                            "Text": "vitae,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04178548604249954,
                                    "Height": 0.011708318255841732,
                                    "Left": 0.7674095630645752,
                                    "Top": 0.29514601826667786
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7674095630645752,
                                        "Y": 0.2951503098011017
                                    },
                                    {
                                        "X": 0.8091856241226196,
                                        "Y": 0.29514601826667786
                                    },
                                    {
                                        "X": 0.8091950416564941,
                                        "Y": 0.3068493604660034
                                    },
                                    {
                                        "X": 0.7674190402030945,
                                        "Y": 0.30685433745384216
                                    }
                                ]
                            },
                            "Id": "4b9de126-4718-4fee-b1cc-0ebbfe8888f0"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.64820098876953,
                            "Text": "blandit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0540408119559288,
                                    "Height": 0.010372424498200417,
                                    "Left": 0.8165572881698608,
                                    "Top": 0.2948104441165924
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8165572881698608,
                                        "Y": 0.2948159873485565
                                    },
                                    {
                                        "X": 0.8705897927284241,
                                        "Y": 0.2948104441165924
                                    },
                                    {
                                        "X": 0.8705980777740479,
                                        "Y": 0.30517658591270447
                                    },
                                    {
                                        "X": 0.8165655732154846,
                                        "Y": 0.30518287420272827
                                    }
                                ]
                            },
                            "Id": "2cd88d80-980a-475c-9793-f9b0071ec4c7"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.80790710449219,
                            "Text": "ut",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.015229299664497375,
                                    "Height": 0.009716506116092205,
                                    "Left": 0.12075187265872955,
                                    "Top": 0.3128567337989807
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12075187265872955,
                                        "Y": 0.3128586709499359
                                    },
                                    {
                                        "X": 0.1359730064868927,
                                        "Y": 0.3128567337989807
                                    },
                                    {
                                        "X": 0.13598117232322693,
                                        "Y": 0.3225710988044739
                                    },
                                    {
                                        "X": 0.12076005339622498,
                                        "Y": 0.3225732445716858
                                    }
                                ]
                            },
                            "Id": "83ebbec7-2297-491f-ac27-3ab0ece8b1bd"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.65116119384766,
                            "Text": "libero.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.048246707767248154,
                                    "Height": 0.010274494998157024,
                                    "Left": 0.1413688361644745,
                                    "Top": 0.31231215596199036
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1413688361644745,
                                        "Y": 0.31231826543807983
                                    },
                                    {
                                        "X": 0.1896069347858429,
                                        "Y": 0.31231215596199036
                                    },
                                    {
                                        "X": 0.18961554765701294,
                                        "Y": 0.32257986068725586
                                    },
                                    {
                                        "X": 0.14137746393680573,
                                        "Y": 0.32258665561676025
                                    }
                                ]
                            },
                            "Id": "54eb8b55-9092-430f-bc3a-f16796f37501"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.65406799316406,
                            "Text": "Vivamus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06958403438329697,
                                    "Height": 0.010343172587454319,
                                    "Left": 0.19622907042503357,
                                    "Top": 0.31224679946899414
                                },
                                "Polygon": [
                                    {
                                        "X": 0.19622907042503357,
                                        "Y": 0.3122555911540985
                                    },
                                    {
                                        "X": 0.2658044993877411,
                                        "Y": 0.31224679946899414
                                    },
                                    {
                                        "X": 0.26581311225891113,
                                        "Y": 0.32258015871047974
                                    },
                                    {
                                        "X": 0.1962377279996872,
                                        "Y": 0.3225899636745453
                                    }
                                ]
                            },
                            "Id": "4910d7de-b603-44cb-8330-8e8f7b118868"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.55288696289062,
                            "Text": "mi",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.018454305827617645,
                                    "Height": 0.009811262600123882,
                                    "Left": 0.2720700800418854,
                                    "Top": 0.31247878074645996
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2720700800418854,
                                        "Y": 0.3124811351299286
                                    },
                                    {
                                        "X": 0.2905162274837494,
                                        "Y": 0.31247878074645996
                                    },
                                    {
                                        "X": 0.2905243933200836,
                                        "Y": 0.3222874701023102
                                    },
                                    {
                                        "X": 0.272078275680542,
                                        "Y": 0.3222900629043579
                                    }
                                ]
                            },
                            "Id": "9bb3add1-052c-42af-8289-cd02c26a2175"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.5397720336914,
                            "Text": "velit,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.036752767860889435,
                                    "Height": 0.011655508540570736,
                                    "Left": 0.2961733639240265,
                                    "Top": 0.31241917610168457
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2961733639240265,
                                        "Y": 0.31242382526397705
                                    },
                                    {
                                        "X": 0.3329164683818817,
                                        "Y": 0.31241917610168457
                                    },
                                    {
                                        "X": 0.3329261243343353,
                                        "Y": 0.32406944036483765
                                    },
                                    {
                                        "X": 0.2961830794811249,
                                        "Y": 0.3240746855735779
                                    }
                                ]
                            },
                            "Id": "81c813ea-93c0-4962-b0be-8e09bf98e529"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.48688507080078,
                            "Text": "molestie",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06754835695028305,
                                    "Height": 0.010673622600734234,
                                    "Left": 0.3396911025047302,
                                    "Top": 0.31217893958091736
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3396911025047302,
                                        "Y": 0.3121874928474426
                                    },
                                    {
                                        "X": 0.4072306454181671,
                                        "Y": 0.31217893958091736
                                    },
                                    {
                                        "X": 0.40723946690559387,
                                        "Y": 0.3228430151939392
                                    },
                                    {
                                        "X": 0.33969995379447937,
                                        "Y": 0.32285258173942566
                                    }
                                ]
                            },
                            "Id": "acd2a283-215d-4d19-8786-cf6f6db45284"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.45869445800781,
                            "Text": "eget",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.035747528076171875,
                                    "Height": 0.012293641455471516,
                                    "Left": 0.41340407729148865,
                                    "Top": 0.31264930963516235
                                },
                                "Polygon": [
                                    {
                                        "X": 0.41340407729148865,
                                        "Y": 0.31265386939048767
                                    },
                                    {
                                        "X": 0.4491414725780487,
                                        "Y": 0.31264930963516235
                                    },
                                    {
                                        "X": 0.4491516053676605,
                                        "Y": 0.3249378204345703
                                    },
                                    {
                                        "X": 0.41341423988342285,
                                        "Y": 0.3249429762363434
                                    }
                                ]
                            },
                            "Id": "f797f6a1-dbf6-46bf-9731-261f418df3ac"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.03301239013672,
                            "Text": "pellentesque",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.10407652705907822,
                                    "Height": 0.012619946151971817,
                                    "Left": 0.45419588685035706,
                                    "Top": 0.31232964992523193
                                },
                                "Polygon": [
                                    {
                                        "X": 0.45419588685035706,
                                        "Y": 0.3123428225517273
                                    },
                                    {
                                        "X": 0.5582621097564697,
                                        "Y": 0.31232964992523193
                                    },
                                    {
                                        "X": 0.5582724213600159,
                                        "Y": 0.32493460178375244
                                    },
                                    {
                                        "X": 0.454206258058548,
                                        "Y": 0.32494959235191345
                                    }
                                ]
                            },
                            "Id": "19801ea8-5514-47de-b28e-8ea835691fa0"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.41829681396484,
                            "Text": "non,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03442317619919777,
                                    "Height": 0.009485326707363129,
                                    "Left": 0.5643736124038696,
                                    "Top": 0.31458455324172974
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5643736124038696,
                                        "Y": 0.3145890235900879
                                    },
                                    {
                                        "X": 0.5987890362739563,
                                        "Y": 0.31458455324172974
                                    },
                                    {
                                        "X": 0.5987967848777771,
                                        "Y": 0.3240649700164795
                                    },
                                    {
                                        "X": 0.5643813610076904,
                                        "Y": 0.32406988739967346
                                    }
                                ]
                            },
                            "Id": "510eea02-c7ca-4987-a6c0-9aa8c17bbc81"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.57263946533203,
                            "Text": "feugiat",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.055861007422208786,
                                    "Height": 0.012772669084370136,
                                    "Left": 0.6045542359352112,
                                    "Top": 0.31218329071998596
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6045542359352112,
                                        "Y": 0.31219032406806946
                                    },
                                    {
                                        "X": 0.6604048609733582,
                                        "Y": 0.31218329071998596
                                    },
                                    {
                                        "X": 0.6604152321815491,
                                        "Y": 0.32494789361953735
                                    },
                                    {
                                        "X": 0.6045646667480469,
                                        "Y": 0.32495594024658203
                                    }
                                ]
                            },
                            "Id": "f90c47d7-6b8f-4688-9622-9e1a6a27f1e1"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.54041290283203,
                            "Text": "molestie",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06739246845245361,
                                    "Height": 0.010493588633835316,
                                    "Left": 0.6659027934074402,
                                    "Top": 0.31224706768989563
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6659027934074402,
                                        "Y": 0.3122555911540985
                                    },
                                    {
                                        "X": 0.7332867980003357,
                                        "Y": 0.31224706768989563
                                    },
                                    {
                                        "X": 0.7332952618598938,
                                        "Y": 0.3227311372756958
                                    },
                                    {
                                        "X": 0.6659113168716431,
                                        "Y": 0.32274067401885986
                                    }
                                ]
                            },
                            "Id": "5fc659a9-ef0e-4f07-b84d-ccb69edc78c0"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.32132720947266,
                            "Text": "mauris.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05858791247010231,
                                    "Height": 0.010133352130651474,
                                    "Left": 0.7395123839378357,
                                    "Top": 0.3124716281890869
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7395123839378357,
                                        "Y": 0.31247904896736145
                                    },
                                    {
                                        "X": 0.7980921268463135,
                                        "Y": 0.3124716281890869
                                    },
                                    {
                                        "X": 0.7981002926826477,
                                        "Y": 0.3225967288017273
                                    },
                                    {
                                        "X": 0.7395205497741699,
                                        "Y": 0.3226049840450287
                                    }
                                ]
                            },
                            "Id": "3d14205f-f223-4e7f-8dfa-436b91a81f81"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.96626281738281,
                            "Text": "Aenean",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0631571039557457,
                                    "Height": 0.010111150331795216,
                                    "Left": 0.8042219877243042,
                                    "Top": 0.3124361038208008
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8042219877243042,
                                        "Y": 0.3124440908432007
                                    },
                                    {
                                        "X": 0.8673710227012634,
                                        "Y": 0.3124361038208008
                                    },
                                    {
                                        "X": 0.8673790693283081,
                                        "Y": 0.3225383460521698
                                    },
                                    {
                                        "X": 0.8042300939559937,
                                        "Y": 0.32254722714424133
                                    }
                                ]
                            },
                            "Id": "7f944587-7b9f-43a3-a724-41b6ecf2eca2"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7163314819336,
                            "Text": "molestie",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06757938861846924,
                                    "Height": 0.010049482807517052,
                                    "Left": 0.12090958654880524,
                                    "Top": 0.3294231593608856
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12090958654880524,
                                        "Y": 0.3294333219528198
                                    },
                                    {
                                        "X": 0.18848057091236115,
                                        "Y": 0.3294231593608856
                                    },
                                    {
                                        "X": 0.18848897516727448,
                                        "Y": 0.3394615352153778
                                    },
                                    {
                                        "X": 0.12091804295778275,
                                        "Y": 0.3394726514816284
                                    }
                                ]
                            },
                            "Id": "41cabe0d-ffc8-415a-b413-e399b9b0387e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.84017944335938,
                            "Text": "erat",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03154447302222252,
                                    "Height": 0.00947718508541584,
                                    "Left": 0.1944749504327774,
                                    "Top": 0.33007699251174927
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1944749504327774,
                                        "Y": 0.3300817608833313
                                    },
                                    {
                                        "X": 0.2260114997625351,
                                        "Y": 0.33007699251174927
                                    },
                                    {
                                        "X": 0.22601942718029022,
                                        "Y": 0.3395490050315857
                                    },
                                    {
                                        "X": 0.19448287785053253,
                                        "Y": 0.33955419063568115
                                    }
                                ]
                            },
                            "Id": "c3550cc5-f3a3-4c11-8f69-0535966f423c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.67811584472656,
                            "Text": "accumsan,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08758440613746643,
                                    "Height": 0.009796629659831524,
                                    "Left": 0.23123925924301147,
                                    "Top": 0.3315233290195465
                                },
                                "Polygon": [
                                    {
                                        "X": 0.23123925924301147,
                                        "Y": 0.33153676986694336
                                    },
                                    {
                                        "X": 0.31881552934646606,
                                        "Y": 0.3315233290195465
                                    },
                                    {
                                        "X": 0.3188236653804779,
                                        "Y": 0.34130534529685974
                                    },
                                    {
                                        "X": 0.2312474399805069,
                                        "Y": 0.3413199484348297
                                    }
                                ]
                            },
                            "Id": "b93bf998-7826-45c3-8774-9da4cf58fcec"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.71672821044922,
                            "Text": "ultricies",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06131533160805702,
                                    "Height": 0.010354147292673588,
                                    "Left": 0.32585883140563965,
                                    "Top": 0.3293079137802124
                                },
                                "Polygon": [
                                    {
                                        "X": 0.32585883140563965,
                                        "Y": 0.3293171226978302
                                    },
                                    {
                                        "X": 0.3871656060218811,
                                        "Y": 0.3293079137802124
                                    },
                                    {
                                        "X": 0.38717415928840637,
                                        "Y": 0.3396519720554352
                                    },
                                    {
                                        "X": 0.3258674144744873,
                                        "Y": 0.3396620750427246
                                    }
                                ]
                            },
                            "Id": "7b85e35f-1ee4-45a1-bf95-5e634011fec5"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.56832122802734,
                            "Text": "urna",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03594452142715454,
                                    "Height": 0.007925456389784813,
                                    "Left": 0.39337021112442017,
                                    "Top": 0.33168351650238037
                                },
                                "Polygon": [
                                    {
                                        "X": 0.39337021112442017,
                                        "Y": 0.3316890299320221
                                    },
                                    {
                                        "X": 0.4293082058429718,
                                        "Y": 0.33168351650238037
                                    },
                                    {
                                        "X": 0.4293147325515747,
                                        "Y": 0.339603066444397
                                    },
                                    {
                                        "X": 0.39337676763534546,
                                        "Y": 0.33960896730422974
                                    }
                                ]
                            },
                            "Id": "85d4f932-6f36-4969-8037-ec925baa4de9"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.27899169921875,
                            "Text": "non,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03432534635066986,
                                    "Height": 0.009622004814445972,
                                    "Left": 0.4353908896446228,
                                    "Top": 0.33164680004119873
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4353908896446228,
                                        "Y": 0.33165207505226135
                                    },
                                    {
                                        "X": 0.46970829367637634,
                                        "Y": 0.33164680004119873
                                    },
                                    {
                                        "X": 0.46971622109413147,
                                        "Y": 0.341263085603714
                                    },
                                    {
                                        "X": 0.43539881706237793,
                                        "Y": 0.3412688076496124
                                    }
                                ]
                            },
                            "Id": "d3320cb1-3ff1-4afa-8368-982f2167fffa"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.82074737548828,
                            "Text": "luctus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04730783402919769,
                                    "Height": 0.010222905315458775,
                                    "Left": 0.4763341248035431,
                                    "Top": 0.32932400703430176
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4763341248035431,
                                        "Y": 0.3293311297893524
                                    },
                                    {
                                        "X": 0.5236335396766663,
                                        "Y": 0.32932400703430176
                                    },
                                    {
                                        "X": 0.5236419439315796,
                                        "Y": 0.33953914046287537
                                    },
                                    {
                                        "X": 0.47634249925613403,
                                        "Y": 0.33954691886901855
                                    }
                                ]
                            },
                            "Id": "0c31fab2-b947-46ab-a762-7cba3dba3549"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.27338409423828,
                            "Text": "augue.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05494490638375282,
                                    "Height": 0.010527114383876324,
                                    "Left": 0.5293720364570618,
                                    "Top": 0.33153069019317627
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5293720364570618,
                                        "Y": 0.331539124250412
                                    },
                                    {
                                        "X": 0.5843083262443542,
                                        "Y": 0.33153069019317627
                                    },
                                    {
                                        "X": 0.5843169093132019,
                                        "Y": 0.3420485854148865
                                    },
                                    {
                                        "X": 0.5293806195259094,
                                        "Y": 0.34205782413482666
                                    }
                                ]
                            },
                            "Id": "ebed7979-831b-4964-90d7-02c0d0feb9a2"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.55538177490234,
                            "Text": "Donec",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05254925787448883,
                                    "Height": 0.010180150158703327,
                                    "Left": 0.5914928317070007,
                                    "Top": 0.3294026851654053
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5914928317070007,
                                        "Y": 0.3294106125831604
                                    },
                                    {
                                        "X": 0.6440338492393494,
                                        "Y": 0.3294026851654053
                                    },
                                    {
                                        "X": 0.6440421342849731,
                                        "Y": 0.3395741879940033
                                    },
                                    {
                                        "X": 0.5915011763572693,
                                        "Y": 0.3395828604698181
                                    }
                                ]
                            },
                            "Id": "a72d3436-1b61-448f-82f1-e3bbecbed2a1"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.90247344970703,
                            "Text": "auctor",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05117088928818703,
                                    "Height": 0.009642673656344414,
                                    "Left": 0.6494865417480469,
                                    "Top": 0.32990169525146484
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6494865417480469,
                                        "Y": 0.32990941405296326
                                    },
                                    {
                                        "X": 0.700649619102478,
                                        "Y": 0.32990169525146484
                                    },
                                    {
                                        "X": 0.7006574273109436,
                                        "Y": 0.3395359516143799
                                    },
                                    {
                                        "X": 0.6494943499565125,
                                        "Y": 0.3395443558692932
                                    }
                                ]
                            },
                            "Id": "fca87a8f-1b0e-4600-88ab-052a4b4aeacd"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.80184936523438,
                            "Text": "massa",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05315233767032623,
                                    "Height": 0.008508173748850822,
                                    "Left": 0.70607990026474,
                                    "Top": 0.33131280541419983
                                },
                                "Polygon": [
                                    {
                                        "X": 0.70607990026474,
                                        "Y": 0.33132094144821167
                                    },
                                    {
                                        "X": 0.7592253684997559,
                                        "Y": 0.33131280541419983
                                    },
                                    {
                                        "X": 0.759232223033905,
                                        "Y": 0.33981218934059143
                                    },
                                    {
                                        "X": 0.7060867547988892,
                                        "Y": 0.3398209810256958
                                    }
                                ]
                            },
                            "Id": "ddcbe57f-0372-4e3d-89f0-d708c9abe94c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.92125701904297,
                            "Text": "in",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.013199672102928162,
                                    "Height": 0.009931731037795544,
                                    "Left": 0.7654452323913574,
                                    "Top": 0.32943835854530334
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7654452323913574,
                                        "Y": 0.3294403553009033
                                    },
                                    {
                                        "X": 0.7786369323730469,
                                        "Y": 0.32943835854530334
                                    },
                                    {
                                        "X": 0.7786449193954468,
                                        "Y": 0.33936792612075806
                                    },
                                    {
                                        "X": 0.7654532790184021,
                                        "Y": 0.33937010169029236
                                    }
                                ]
                            },
                            "Id": "247d0491-d90d-43df-9d2c-32d6d55e9114"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.72792053222656,
                            "Text": "tellus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.042348310351371765,
                                    "Height": 0.010020974092185497,
                                    "Left": 0.7844676971435547,
                                    "Top": 0.3294549286365509
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7844676971435547,
                                        "Y": 0.32946130633354187
                                    },
                                    {
                                        "X": 0.8268079161643982,
                                        "Y": 0.3294549286365509
                                    },
                                    {
                                        "X": 0.8268159627914429,
                                        "Y": 0.33946895599365234
                                    },
                                    {
                                        "X": 0.7844757437705994,
                                        "Y": 0.3394758999347687
                                    }
                                ]
                            },
                            "Id": "12b2dda4-0caf-44a0-b1ed-37e37e09e1ea"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.54825592041016,
                            "Text": "cursus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05327538028359413,
                                    "Height": 0.008069229312241077,
                                    "Left": 0.12071601301431656,
                                    "Top": 0.3489567041397095
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12071601301431656,
                                        "Y": 0.34896618127822876
                                    },
                                    {
                                        "X": 0.17398463189601898,
                                        "Y": 0.3489567041397095
                                    },
                                    {
                                        "X": 0.173991397023201,
                                        "Y": 0.3570158779621124
                                    },
                                    {
                                        "X": 0.12072280049324036,
                                        "Y": 0.35702595114707947
                                    }
                                ]
                            },
                            "Id": "cb401d8b-dc21-4806-b858-4180dc0e1c2e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.5109634399414,
                            "Text": "efficitur.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06192392483353615,
                                    "Height": 0.01034580823034048,
                                    "Left": 0.1800096184015274,
                                    "Top": 0.3467649817466736
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1800096184015274,
                                        "Y": 0.3467757999897003
                                    },
                                    {
                                        "X": 0.24192491173744202,
                                        "Y": 0.3467649817466736
                                    },
                                    {
                                        "X": 0.24193353950977325,
                                        "Y": 0.35709908604621887
                                    },
                                    {
                                        "X": 0.18001829087734222,
                                        "Y": 0.35711079835891724
                                    }
                                ]
                            },
                            "Id": "80010a58-c5c9-43d2-9e34-72b1c40147d3"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.70543670654297,
                            "Text": "Nulla",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.040748827159404755,
                                    "Height": 0.010241663083434105,
                                    "Left": 0.24878355860710144,
                                    "Top": 0.3468765914440155
                                },
                                "Polygon": [
                                    {
                                        "X": 0.24878355860710144,
                                        "Y": 0.34688371419906616
                                    },
                                    {
                                        "X": 0.2895238697528839,
                                        "Y": 0.3468765914440155
                                    },
                                    {
                                        "X": 0.2895323932170868,
                                        "Y": 0.35711055994033813
                                    },
                                    {
                                        "X": 0.2487921118736267,
                                        "Y": 0.35711824893951416
                                    }
                                ]
                            },
                            "Id": "ff583b4f-77dd-4cc2-87f8-739d1ef02426"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.47177124023438,
                            "Text": "bibendum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07986792922019958,
                                    "Height": 0.010443014092743397,
                                    "Left": 0.29562774300575256,
                                    "Top": 0.3466607630252838
                                },
                                "Polygon": [
                                    {
                                        "X": 0.29562774300575256,
                                        "Y": 0.34667468070983887
                                    },
                                    {
                                        "X": 0.3754870295524597,
                                        "Y": 0.3466607630252838
                                    },
                                    {
                                        "X": 0.37549567222595215,
                                        "Y": 0.35708868503570557
                                    },
                                    {
                                        "X": 0.2956364154815674,
                                        "Y": 0.35710376501083374
                                    }
                                ]
                            },
                            "Id": "f1b36203-d15e-4a5b-a52f-f4b44453d9ad"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.9651870727539,
                            "Text": "efficitur",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05915461853146553,
                                    "Height": 0.010355088859796524,
                                    "Left": 0.3816339671611786,
                                    "Top": 0.346733421087265
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3816339671611786,
                                        "Y": 0.34674373269081116
                                    },
                                    {
                                        "X": 0.44078004360198975,
                                        "Y": 0.346733421087265
                                    },
                                    {
                                        "X": 0.4407885670661926,
                                        "Y": 0.35707733035087585
                                    },
                                    {
                                        "X": 0.38164252042770386,
                                        "Y": 0.35708850622177124
                                    }
                                ]
                            },
                            "Id": "fc9caf52-eae0-4cc6-bcb3-1c9648502ddd"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.75736999511719,
                            "Text": "augue",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05051962658762932,
                                    "Height": 0.01035391353070736,
                                    "Left": 0.44574424624443054,
                                    "Top": 0.3489990234375
                                },
                                "Polygon": [
                                    {
                                        "X": 0.44574424624443054,
                                        "Y": 0.3490079939365387
                                    },
                                    {
                                        "X": 0.49625539779663086,
                                        "Y": 0.3489990234375
                                    },
                                    {
                                        "X": 0.49626389145851135,
                                        "Y": 0.3593432307243347
                                    },
                                    {
                                        "X": 0.4457527995109558,
                                        "Y": 0.3593529462814331
                                    }
                                ]
                            },
                            "Id": "5be409c7-51c8-4fdb-b9da-0e5c4f203660"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.88388061523438,
                            "Text": "et",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.015440982766449451,
                                    "Height": 0.009933390654623508,
                                    "Left": 0.502210259437561,
                                    "Top": 0.3472038805484772
                                },
                                "Polygon": [
                                    {
                                        "X": 0.502210259437561,
                                        "Y": 0.34720659255981445
                                    },
                                    {
                                        "X": 0.5176430940628052,
                                        "Y": 0.3472038805484772
                                    },
                                    {
                                        "X": 0.5176512598991394,
                                        "Y": 0.3571343421936035
                                    },
                                    {
                                        "X": 0.5022184252738953,
                                        "Y": 0.3571372628211975
                                    }
                                ]
                            },
                            "Id": "c4d5f841-72c2-4a0c-b821-11604eae9897"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.2989273071289,
                            "Text": "vulputate.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0787389874458313,
                                    "Height": 0.01229231059551239,
                                    "Left": 0.5222272872924805,
                                    "Top": 0.3469807207584381
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5222272872924805,
                                        "Y": 0.3469944894313812
                                    },
                                    {
                                        "X": 0.6009562611579895,
                                        "Y": 0.3469807207584381
                                    },
                                    {
                                        "X": 0.6009662747383118,
                                        "Y": 0.35925790667533875
                                    },
                                    {
                                        "X": 0.5222373604774475,
                                        "Y": 0.3592730164527893
                                    }
                                ]
                            },
                            "Id": "39452350-dda9-4f4f-9229-2503b716962d"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.78117370605469,
                            "Text": "Morbi",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.045030705630779266,
                                    "Height": 0.010347401723265648,
                                    "Left": 0.6081454157829285,
                                    "Top": 0.3467393219470978
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6081454157829285,
                                        "Y": 0.34674718976020813
                                    },
                                    {
                                        "X": 0.653167724609375,
                                        "Y": 0.3467393219470978
                                    },
                                    {
                                        "X": 0.6531761288642883,
                                        "Y": 0.3570782244205475
                                    },
                                    {
                                        "X": 0.6081538796424866,
                                        "Y": 0.35708674788475037
                                    }
                                ]
                            },
                            "Id": "f735ea1d-2bea-49fe-8eab-07079cbdb5ad"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.79405975341797,
                            "Text": "sodales",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06267067044973373,
                                    "Height": 0.01040053553879261,
                                    "Left": 0.6590158939361572,
                                    "Top": 0.34677618741989136
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6590158939361572,
                                        "Y": 0.34678712487220764
                                    },
                                    {
                                        "X": 0.7216781973838806,
                                        "Y": 0.34677618741989136
                                    },
                                    {
                                        "X": 0.721686601638794,
                                        "Y": 0.3571648597717285
                                    },
                                    {
                                        "X": 0.6590243577957153,
                                        "Y": 0.3571767210960388
                                    }
                                ]
                            },
                            "Id": "187a4cd2-d90d-49ea-95d0-aade679ea1ce"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.70586395263672,
                            "Text": "magna",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05575123429298401,
                                    "Height": 0.010373776778578758,
                                    "Left": 0.7281146049499512,
                                    "Top": 0.3489671051502228
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7281146049499512,
                                        "Y": 0.3489770293235779
                                    },
                                    {
                                        "X": 0.7838574647903442,
                                        "Y": 0.3489671051502228
                                    },
                                    {
                                        "X": 0.7838658094406128,
                                        "Y": 0.3593301773071289
                                    },
                                    {
                                        "X": 0.7281229496002197,
                                        "Y": 0.3593409061431885
                                    }
                                ]
                            },
                            "Id": "cbb0a539-87af-4b5d-8b4f-d4004b283e02"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.47657012939453,
                            "Text": "eget",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03551140055060387,
                                    "Height": 0.012063289061188698,
                                    "Left": 0.7893885970115662,
                                    "Top": 0.3472500741481781
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7893885970115662,
                                        "Y": 0.34725630283355713
                                    },
                                    {
                                        "X": 0.8248902559280396,
                                        "Y": 0.3472500741481781
                                    },
                                    {
                                        "X": 0.8248999714851379,
                                        "Y": 0.35930654406547546
                                    },
                                    {
                                        "X": 0.7893982529640198,
                                        "Y": 0.35931336879730225
                                    }
                                ]
                            },
                            "Id": "e8383548-192b-4797-8d27-3721771bc6da"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.00285339355469,
                            "Text": "imperdiet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07577235251665115,
                                    "Height": 0.012663929723203182,
                                    "Left": 0.12070708721876144,
                                    "Top": 0.36404702067375183
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12070708721876144,
                                        "Y": 0.36406210064888
                                    },
                                    {
                                        "X": 0.19646884500980377,
                                        "Y": 0.36404702067375183
                                    },
                                    {
                                        "X": 0.1964794397354126,
                                        "Y": 0.37669458985328674
                                    },
                                    {
                                        "X": 0.12071773409843445,
                                        "Y": 0.3767109513282776
                                    }
                                ]
                            },
                            "Id": "00e77f38-e274-4d2d-b2f8-8931f34ce5d8"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.71709442138672,
                            "Text": "aliquam.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06838060915470123,
                                    "Height": 0.01244365144520998,
                                    "Left": 0.20147621631622314,
                                    "Top": 0.36418288946151733
                                },
                                "Polygon": [
                                    {
                                        "X": 0.20147621631622314,
                                        "Y": 0.3641964793205261
                                    },
                                    {
                                        "X": 0.26984646916389465,
                                        "Y": 0.36418288946151733
                                    },
                                    {
                                        "X": 0.2698568105697632,
                                        "Y": 0.37661176919937134
                                    },
                                    {
                                        "X": 0.20148661732673645,
                                        "Y": 0.37662655115127563
                                    }
                                ]
                            },
                            "Id": "ac45e9a1-b0de-44f4-af0b-01c81ffbe05d"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.40546417236328,
                            "Text": "Praesent",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07335299253463745,
                                    "Height": 0.01023114938288927,
                                    "Left": 0.27677807211875916,
                                    "Top": 0.36414915323257446
                                },
                                "Polygon": [
                                    {
                                        "X": 0.27677807211875916,
                                        "Y": 0.36416375637054443
                                    },
                                    {
                                        "X": 0.3501225709915161,
                                        "Y": 0.36414915323257446
                                    },
                                    {
                                        "X": 0.3501310646533966,
                                        "Y": 0.3743646740913391
                                    },
                                    {
                                        "X": 0.27678656578063965,
                                        "Y": 0.37438032031059265
                                    }
                                ]
                            },
                            "Id": "6313469b-5282-42c3-a185-e26757228044"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.86978149414062,
                            "Text": "non",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.029424753040075302,
                                    "Height": 0.00767317321151495,
                                    "Left": 0.3555159866809845,
                                    "Top": 0.3665693700313568
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3555159866809845,
                                        "Y": 0.36657530069351196
                                    },
                                    {
                                        "X": 0.3849343955516815,
                                        "Y": 0.3665693700313568
                                    },
                                    {
                                        "X": 0.3849407434463501,
                                        "Y": 0.37423625588417053
                                    },
                                    {
                                        "X": 0.3555223345756531,
                                        "Y": 0.37424254417419434
                                    }
                                ]
                            },
                            "Id": "98eb88a0-c0b4-40a7-88cf-812c7721607a"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.41500091552734,
                            "Text": "tempor",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.057849541306495667,
                                    "Height": 0.012148333713412285,
                                    "Left": 0.3906812071800232,
                                    "Top": 0.36459675431251526
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3906812071800232,
                                        "Y": 0.3646082878112793
                                    },
                                    {
                                        "X": 0.4485207498073578,
                                        "Y": 0.36459675431251526
                                    },
                                    {
                                        "X": 0.44853076338768005,
                                        "Y": 0.37673255801200867
                                    },
                                    {
                                        "X": 0.39069125056266785,
                                        "Y": 0.3767450749874115
                                    }
                                ]
                            },
                            "Id": "3560fc71-8c78-4608-9167-87139e213c2e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.1017074584961,
                            "Text": "leo,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.027989385649561882,
                                    "Height": 0.011809177696704865,
                                    "Left": 0.45391932129859924,
                                    "Top": 0.36420944333076477
                                },
                                "Polygon": [
                                    {
                                        "X": 0.45391932129859924,
                                        "Y": 0.3642149865627289
                                    },
                                    {
                                        "X": 0.4818990230560303,
                                        "Y": 0.36420944333076477
                                    },
                                    {
                                        "X": 0.4819087088108063,
                                        "Y": 0.3760125935077667
                                    },
                                    {
                                        "X": 0.45392906665802,
                                        "Y": 0.37601861357688904
                                    }
                                ]
                            },
                            "Id": "046a55d5-3a49-48bc-b735-c13210d3baee"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 96.42403411865234,
                            "Text": "egestas",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06376732885837555,
                                    "Height": 0.012307008728384972,
                                    "Left": 0.4883745014667511,
                                    "Top": 0.36461424827575684
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4883745014667511,
                                        "Y": 0.3646269738674164
                                    },
                                    {
                                        "X": 0.5521317720413208,
                                        "Y": 0.36461424827575684
                                    },
                                    {
                                        "X": 0.5521418452262878,
                                        "Y": 0.37690743803977966
                                    },
                                    {
                                        "X": 0.4883846044540405,
                                        "Y": 0.37692123651504517
                                    }
                                ]
                            },
                            "Id": "48c86ec4-91c6-46e3-b1ab-b5a5adf2c755"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.84137725830078,
                            "Text": "pretium",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.060260023921728134,
                                    "Height": 0.012554911896586418,
                                    "Left": 0.5584296584129333,
                                    "Top": 0.3642560541629791
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5584296584129333,
                                        "Y": 0.364268034696579
                                    },
                                    {
                                        "X": 0.6186794638633728,
                                        "Y": 0.3642560541629791
                                    },
                                    {
                                        "X": 0.6186897158622742,
                                        "Y": 0.3767979145050049
                                    },
                                    {
                                        "X": 0.5584399104118347,
                                        "Y": 0.3768109679222107
                                    }
                                ]
                            },
                            "Id": "44234942-da12-4794-a87b-cc9d12429570"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.2713394165039,
                            "Text": "justo.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04408608749508858,
                                    "Height": 0.012609279714524746,
                                    "Left": 0.6234233379364014,
                                    "Top": 0.36423036456108093
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6234233379364014,
                                        "Y": 0.3642391562461853
                                    },
                                    {
                                        "X": 0.6674992442131042,
                                        "Y": 0.36423036456108093
                                    },
                                    {
                                        "X": 0.6675094366073608,
                                        "Y": 0.3768301010131836
                                    },
                                    {
                                        "X": 0.6234336495399475,
                                        "Y": 0.37683963775634766
                                    }
                                ]
                            },
                            "Id": "6573daff-4748-4f75-aada-254b0faeafc4"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.75102233886719,
                            "Text": "Phasellus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07853566110134125,
                                    "Height": 0.01033707708120346,
                                    "Left": 0.6746412515640259,
                                    "Top": 0.3641124963760376
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6746412515640259,
                                        "Y": 0.36412811279296875
                                    },
                                    {
                                        "X": 0.7531685829162598,
                                        "Y": 0.3641124963760376
                                    },
                                    {
                                        "X": 0.7531769275665283,
                                        "Y": 0.37443283200263977
                                    },
                                    {
                                        "X": 0.6746496558189392,
                                        "Y": 0.37444958090782166
                                    }
                                ]
                            },
                            "Id": "7c0808fb-c70a-4c87-bb70-8ae41690fe01"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.72832489013672,
                            "Text": "quis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03286372497677803,
                                    "Height": 0.012509339489042759,
                                    "Left": 0.7591165900230408,
                                    "Top": 0.3642088770866394
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7591165900230408,
                                        "Y": 0.3642154335975647
                                    },
                                    {
                                        "X": 0.7919702529907227,
                                        "Y": 0.3642088770866394
                                    },
                                    {
                                        "X": 0.7919803261756897,
                                        "Y": 0.3767111301422119
                                    },
                                    {
                                        "X": 0.7591266632080078,
                                        "Y": 0.3767182230949402
                                    }
                                ]
                            },
                            "Id": "62b74803-3ba3-492b-9be0-22392068c256"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.83332824707031,
                            "Text": "mattis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04837372526526451,
                                    "Height": 0.00939274113625288,
                                    "Left": 0.7978326082229614,
                                    "Top": 0.3650185763835907
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7978326082229614,
                                        "Y": 0.3650282621383667
                                    },
                                    {
                                        "X": 0.8461987972259521,
                                        "Y": 0.3650185763835907
                                    },
                                    {
                                        "X": 0.8462063074111938,
                                        "Y": 0.3744010031223297
                                    },
                                    {
                                        "X": 0.7978401780128479,
                                        "Y": 0.37441131472587585
                                    }
                                ]
                            },
                            "Id": "97c9f01e-f09f-42b5-9d77-42c681dcc1c0"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.74954986572266,
                            "Text": "nisl,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03102213330566883,
                                    "Height": 0.011645141988992691,
                                    "Left": 0.12097800523042679,
                                    "Top": 0.381405234336853
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12097800523042679,
                                        "Y": 0.381412148475647
                                    },
                                    {
                                        "X": 0.1519903540611267,
                                        "Y": 0.381405234336853
                                    },
                                    {
                                        "X": 0.15200012922286987,
                                        "Y": 0.3930429518222809
                                    },
                                    {
                                        "X": 0.12098780274391174,
                                        "Y": 0.3930503726005554
                                    }
                                ]
                            },
                            "Id": "3d75a872-846c-4929-8ce3-061cd07eb493"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.57096099853516,
                            "Text": "interdum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07067849487066269,
                                    "Height": 0.01012929156422615,
                                    "Left": 0.15877631306648254,
                                    "Top": 0.3814511299133301
                                },
                                "Polygon": [
                                    {
                                        "X": 0.15877631306648254,
                                        "Y": 0.38146689534187317
                                    },
                                    {
                                        "X": 0.22944636642932892,
                                        "Y": 0.3814511299133301
                                    },
                                    {
                                        "X": 0.22945481538772583,
                                        "Y": 0.39156365394592285
                                    },
                                    {
                                        "X": 0.15878480672836304,
                                        "Y": 0.3915804326534271
                                    }
                                ]
                            },
                            "Id": "f1fdfdbd-373d-48a9-b8b7-b50015013217"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.25125122070312,
                            "Text": "tristique",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06411201506853104,
                                    "Height": 0.012282053008675575,
                                    "Left": 0.23488688468933105,
                                    "Top": 0.3813842833042145
                                },
                                "Polygon": [
                                    {
                                        "X": 0.23488688468933105,
                                        "Y": 0.3813985586166382
                                    },
                                    {
                                        "X": 0.2989886999130249,
                                        "Y": 0.3813842833042145
                                    },
                                    {
                                        "X": 0.2989988923072815,
                                        "Y": 0.39365094900131226
                                    },
                                    {
                                        "X": 0.23489713668823242,
                                        "Y": 0.3936663269996643
                                    }
                                ]
                            },
                            "Id": "c56d95aa-7226-4e41-ada7-7e28998fb921"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.22505950927734,
                            "Text": "odio.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03834599256515503,
                                    "Height": 0.010038292966783047,
                                    "Left": 0.3049958050251007,
                                    "Top": 0.3815113306045532
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3049958050251007,
                                        "Y": 0.3815198838710785
                                    },
                                    {
                                        "X": 0.34333348274230957,
                                        "Y": 0.3815113306045532
                                    },
                                    {
                                        "X": 0.34334179759025574,
                                        "Y": 0.39154052734375
                                    },
                                    {
                                        "X": 0.30500414967536926,
                                        "Y": 0.39154961705207825
                                    }
                                ]
                            },
                            "Id": "8e24e076-f6a4-4e05-b767-449411ba9488"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.32688903808594,
                            "Text": "Duis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0356474407017231,
                                    "Height": 0.009970484301447868,
                                    "Left": 0.3505416810512543,
                                    "Top": 0.38152551651000977
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3505416810512543,
                                        "Y": 0.3815334737300873
                                    },
                                    {
                                        "X": 0.3861808776855469,
                                        "Y": 0.38152551651000977
                                    },
                                    {
                                        "X": 0.38618913292884827,
                                        "Y": 0.39148756861686707
                                    },
                                    {
                                        "X": 0.35054996609687805,
                                        "Y": 0.3914960026741028
                                    }
                                ]
                            },
                            "Id": "817707f4-99b7-484d-ac07-5887afb9ecc4"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.56148529052734,
                            "Text": "commodo",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07992886751890182,
                                    "Height": 0.010069125331938267,
                                    "Left": 0.39231008291244507,
                                    "Top": 0.381522536277771
                                },
                                "Polygon": [
                                    {
                                        "X": 0.39231008291244507,
                                        "Y": 0.38154035806655884
                                    },
                                    {
                                        "X": 0.4722307026386261,
                                        "Y": 0.381522536277771
                                    },
                                    {
                                        "X": 0.4722389578819275,
                                        "Y": 0.3915727138519287
                                    },
                                    {
                                        "X": 0.39231839776039124,
                                        "Y": 0.3915916681289673
                                    }
                                ]
                            },
                            "Id": "68f2c17e-f37b-4031-9b0a-2264a7bc39a4"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.85916137695312,
                            "Text": "eros",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03510471433401108,
                                    "Height": 0.008030164986848831,
                                    "Left": 0.47819796204566956,
                                    "Top": 0.38350191712379456
                                },
                                "Polygon": [
                                    {
                                        "X": 0.47819796204566956,
                                        "Y": 0.3835098445415497
                                    },
                                    {
                                        "X": 0.5132960677146912,
                                        "Y": 0.38350191712379456
                                    },
                                    {
                                        "X": 0.5133026838302612,
                                        "Y": 0.3915237486362457
                                    },
                                    {
                                        "X": 0.47820454835891724,
                                        "Y": 0.3915320634841919
                                    }
                                ]
                            },
                            "Id": "33d635ed-7753-45c3-a192-e8c732129842"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.84928894042969,
                            "Text": "id",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.013233201578259468,
                                    "Height": 0.010074044577777386,
                                    "Left": 0.5194746851921082,
                                    "Top": 0.3813290596008301
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5194746851921082,
                                        "Y": 0.38133201003074646
                                    },
                                    {
                                        "X": 0.5326996445655823,
                                        "Y": 0.3813290596008301
                                    },
                                    {
                                        "X": 0.5327078700065613,
                                        "Y": 0.39139997959136963
                                    },
                                    {
                                        "X": 0.5194829702377319,
                                        "Y": 0.39140310883522034
                                    }
                                ]
                            },
                            "Id": "95b35e56-f410-445b-a3f0-b1d4cb1cd032"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.71443176269531,
                            "Text": "ex",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.01889181137084961,
                                    "Height": 0.007879562675952911,
                                    "Left": 0.538893461227417,
                                    "Top": 0.3835785984992981
                                },
                                "Polygon": [
                                    {
                                        "X": 0.538893461227417,
                                        "Y": 0.3835828900337219
                                    },
                                    {
                                        "X": 0.5577788352966309,
                                        "Y": 0.3835785984992981
                                    },
                                    {
                                        "X": 0.5577852725982666,
                                        "Y": 0.39145368337631226
                                    },
                                    {
                                        "X": 0.5388998985290527,
                                        "Y": 0.3914581835269928
                                    }
                                ]
                            },
                            "Id": "c5bc5783-e795-417c-9fde-72c005193856"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 92.03113555908203,
                            "Text": "ullamcorper,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0993877574801445,
                                    "Height": 0.012310082092881203,
                                    "Left": 0.5634072422981262,
                                    "Top": 0.3813478350639343
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5634072422981262,
                                        "Y": 0.3813699781894684
                                    },
                                    {
                                        "X": 0.662784993648529,
                                        "Y": 0.3813478350639343
                                    },
                                    {
                                        "X": 0.6627950072288513,
                                        "Y": 0.39363405108451843
                                    },
                                    {
                                        "X": 0.5634173154830933,
                                        "Y": 0.393657922744751
                                    }
                                ]
                            },
                            "Id": "0c21e49c-4e6a-459b-a5ca-0baa7cb40072"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.76692962646484,
                            "Text": "vitae",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03864787891507149,
                                    "Height": 0.009935632348060608,
                                    "Left": 0.6683513522148132,
                                    "Top": 0.38160401582717896
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6683513522148132,
                                        "Y": 0.381612628698349
                                    },
                                    {
                                        "X": 0.7069911956787109,
                                        "Y": 0.38160401582717896
                                    },
                                    {
                                        "X": 0.7069992423057556,
                                        "Y": 0.39153048396110535
                                    },
                                    {
                                        "X": 0.6683594584465027,
                                        "Y": 0.39153963327407837
                                    }
                                ]
                            },
                            "Id": "d3b2facb-b9e7-4743-aa4a-9f86c92a1f7e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.67881774902344,
                            "Text": "venenatis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07851409912109375,
                                    "Height": 0.010209453292191029,
                                    "Left": 0.7124698758125305,
                                    "Top": 0.3815034031867981
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7124698758125305,
                                        "Y": 0.38152092695236206
                                    },
                                    {
                                        "X": 0.7909757494926453,
                                        "Y": 0.3815034031867981
                                    },
                                    {
                                        "X": 0.7909839749336243,
                                        "Y": 0.39169421792030334
                                    },
                                    {
                                        "X": 0.7124781012535095,
                                        "Y": 0.39171287417411804
                                    }
                                ]
                            },
                            "Id": "c8ff457f-d660-4eae-a997-3ba6d80bb1bc"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.73474884033203,
                            "Text": "enim",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.038729503750801086,
                                    "Height": 0.009928411804139614,
                                    "Left": 0.7970137596130371,
                                    "Top": 0.38156139850616455
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7970137596130371,
                                        "Y": 0.38157007098197937
                                    },
                                    {
                                        "X": 0.8357353210449219,
                                        "Y": 0.38156139850616455
                                    },
                                    {
                                        "X": 0.835743248462677,
                                        "Y": 0.3914806544780731
                                    },
                                    {
                                        "X": 0.797021746635437,
                                        "Y": 0.39148983359336853
                                    }
                                ]
                            },
                            "Id": "c358d587-58a1-4a52-8367-d48c7bb93235"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.8090591430664,
                            "Text": "auctor.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.053805168718099594,
                                    "Height": 0.00981865543872118,
                                    "Left": 0.12073896825313568,
                                    "Top": 0.3990625739097595
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12073896825313568,
                                        "Y": 0.3990758955478668
                                    },
                                    {
                                        "X": 0.17453591525554657,
                                        "Y": 0.3990625739097595
                                    },
                                    {
                                        "X": 0.17454414069652557,
                                        "Y": 0.4088671803474426
                                    },
                                    {
                                        "X": 0.12074722349643707,
                                        "Y": 0.40888121724128723
                                    }
                                ]
                            },
                            "Id": "1c8de13d-1793-442a-8ad3-c69a81414388"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.97203063964844,
                            "Text": "Aenean",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06303054094314575,
                                    "Height": 0.010157961398363113,
                                    "Left": 0.1806575506925583,
                                    "Top": 0.39879873394966125
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1806575506925583,
                                        "Y": 0.39881432056427
                                    },
                                    {
                                        "X": 0.24367962777614594,
                                        "Y": 0.39879873394966125
                                    },
                                    {
                                        "X": 0.24368809163570404,
                                        "Y": 0.40894022583961487
                                    },
                                    {
                                        "X": 0.18066605925559998,
                                        "Y": 0.40895670652389526
                                    }
                                ]
                            },
                            "Id": "76f4b14c-f2d6-45b9-b61a-1aa168be3603"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.79753112792969,
                            "Text": "nec",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.029154080897569656,
                                    "Height": 0.007586958352476358,
                                    "Left": 0.25017672777175903,
                                    "Top": 0.4011884927749634
                                },
                                "Polygon": [
                                    {
                                        "X": 0.25017672777175903,
                                        "Y": 0.40119579434394836
                                    },
                                    {
                                        "X": 0.2793245017528534,
                                        "Y": 0.4011884927749634
                                    },
                                    {
                                        "X": 0.2793308198451996,
                                        "Y": 0.40876784920692444
                                    },
                                    {
                                        "X": 0.2501830458641052,
                                        "Y": 0.4087754487991333
                                    }
                                ]
                            },
                            "Id": "1b42dace-65a5-479e-80c3-1a8f12fbbdf7"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.75072479248047,
                            "Text": "augue",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05023646354675293,
                                    "Height": 0.010206205770373344,
                                    "Left": 0.28473392128944397,
                                    "Top": 0.4010260999202728
                                },
                                "Polygon": [
                                    {
                                        "X": 0.28473392128944397,
                                        "Y": 0.40103867650032043
                                    },
                                    {
                                        "X": 0.3349619209766388,
                                        "Y": 0.4010260999202728
                                    },
                                    {
                                        "X": 0.3349703848361969,
                                        "Y": 0.4112190306186676
                                    },
                                    {
                                        "X": 0.2847423851490021,
                                        "Y": 0.4112322926521301
                                    }
                                ]
                            },
                            "Id": "5f306934-cf4d-4845-9342-418fd484aeb2"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.95384979248047,
                            "Text": "in",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.013022336177527905,
                                    "Height": 0.009924955666065216,
                                    "Left": 0.3412899971008301,
                                    "Top": 0.3988141715526581
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3412899971008301,
                                        "Y": 0.39881739020347595
                                    },
                                    {
                                        "X": 0.35430410504341125,
                                        "Y": 0.3988141715526581
                                    },
                                    {
                                        "X": 0.35431233048439026,
                                        "Y": 0.4087357223033905
                                    },
                                    {
                                        "X": 0.3412982225418091,
                                        "Y": 0.4087391197681427
                                    }
                                ]
                            },
                            "Id": "ba813cc6-7f45-45db-8cd7-78051a3fdb9e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.81600189208984,
                            "Text": "leo",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.023383300751447678,
                                    "Height": 0.010346542112529278,
                                    "Left": 0.36077335476875305,
                                    "Top": 0.3986482322216034
                                },
                                "Polygon": [
                                    {
                                        "X": 0.36077335476875305,
                                        "Y": 0.3986540138721466
                                    },
                                    {
                                        "X": 0.38414809107780457,
                                        "Y": 0.3986482322216034
                                    },
                                    {
                                        "X": 0.38415664434432983,
                                        "Y": 0.4089886546134949
                                    },
                                    {
                                        "X": 0.3607819080352783,
                                        "Y": 0.40899476408958435
                                    }
                                ]
                            },
                            "Id": "77ce1929-a180-4f69-a9e9-20e9705c7d3f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.58039855957031,
                            "Text": "laoreet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05600595474243164,
                                    "Height": 0.01026332750916481,
                                    "Left": 0.39042362570762634,
                                    "Top": 0.3986622095108032
                                },
                                "Polygon": [
                                    {
                                        "X": 0.39042362570762634,
                                        "Y": 0.3986760675907135
                                    },
                                    {
                                        "X": 0.4464211165904999,
                                        "Y": 0.3986622095108032
                                    },
                                    {
                                        "X": 0.4464295506477356,
                                        "Y": 0.40891093015670776
                                    },
                                    {
                                        "X": 0.39043208956718445,
                                        "Y": 0.4089255630970001
                                    }
                                ]
                            },
                            "Id": "34ef1fa5-2a9d-4bd7-84eb-03df2033a64f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.03521728515625,
                            "Text": "venenatis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07815591990947723,
                                    "Height": 0.010027243755757809,
                                    "Left": 0.4517841637134552,
                                    "Top": 0.39888641238212585
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4517841637134552,
                                        "Y": 0.39890575408935547
                                    },
                                    {
                                        "X": 0.529931902885437,
                                        "Y": 0.39888641238212585
                                    },
                                    {
                                        "X": 0.5299400687217712,
                                        "Y": 0.40889325737953186
                                    },
                                    {
                                        "X": 0.4517923891544342,
                                        "Y": 0.40891367197036743
                                    }
                                ]
                            },
                            "Id": "167eb5b4-8418-4abb-8fee-7685f56d9780"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.93736267089844,
                            "Text": "sit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.018559373915195465,
                                    "Height": 0.010113316588103771,
                                    "Left": 0.535679280757904,
                                    "Top": 0.39878731966018677
                                },
                                "Polygon": [
                                    {
                                        "X": 0.535679280757904,
                                        "Y": 0.3987918794155121
                                    },
                                    {
                                        "X": 0.5542303323745728,
                                        "Y": 0.39878731966018677
                                    },
                                    {
                                        "X": 0.5542386174201965,
                                        "Y": 0.4088957607746124
                                    },
                                    {
                                        "X": 0.5356875658035278,
                                        "Y": 0.4089006185531616
                                    }
                                ]
                            },
                            "Id": "be46818e-cb47-4d8d-9873-13c9f1339fc4"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.5009536743164,
                            "Text": "amet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.040728457272052765,
                                    "Height": 0.009757257997989655,
                                    "Left": 0.559477686882019,
                                    "Top": 0.39916566014289856
                                },
                                "Polygon": [
                                    {
                                        "X": 0.559477686882019,
                                        "Y": 0.3991757333278656
                                    },
                                    {
                                        "X": 0.6001982092857361,
                                        "Y": 0.39916566014289856
                                    },
                                    {
                                        "X": 0.6002061367034912,
                                        "Y": 0.4089122712612152
                                    },
                                    {
                                        "X": 0.559485673904419,
                                        "Y": 0.4089229106903076
                                    }
                                ]
                            },
                            "Id": "9e7e7ebb-722a-4699-b71f-1f9354a45b17"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.85189819335938,
                            "Text": "nec",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0292144063860178,
                                    "Height": 0.007795725017786026,
                                    "Left": 0.6057471632957458,
                                    "Top": 0.4010915160179138
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6057471632957458,
                                        "Y": 0.4010988175868988
                                    },
                                    {
                                        "X": 0.6349552273750305,
                                        "Y": 0.4010915160179138
                                    },
                                    {
                                        "X": 0.6349615454673767,
                                        "Y": 0.4088796079158783
                                    },
                                    {
                                        "X": 0.6057535409927368,
                                        "Y": 0.40888723731040955
                                    }
                                ]
                            },
                            "Id": "8e14f03c-274d-44d5-ba0f-1487cba69a87"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.47563934326172,
                            "Text": "lacus.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04621851444244385,
                                    "Height": 0.010076242499053478,
                                    "Left": 0.6408029794692993,
                                    "Top": 0.39882272481918335
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6408029794692993,
                                        "Y": 0.3988341689109802
                                    },
                                    {
                                        "X": 0.6870133280754089,
                                        "Y": 0.39882272481918335
                                    },
                                    {
                                        "X": 0.6870214939117432,
                                        "Y": 0.4088868796825409
                                    },
                                    {
                                        "X": 0.6408111453056335,
                                        "Y": 0.4088989794254303
                                    }
                                ]
                            },
                            "Id": "8e484602-702a-49e5-aeb1-d9025c777ef8"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.42564392089844,
                            "Text": "Duis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03537912294268608,
                                    "Height": 0.010078302584588528,
                                    "Left": 0.6942760944366455,
                                    "Top": 0.3987153172492981
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6942760944366455,
                                        "Y": 0.3987240493297577
                                    },
                                    {
                                        "X": 0.7296470403671265,
                                        "Y": 0.3987153172492981
                                    },
                                    {
                                        "X": 0.7296552062034607,
                                        "Y": 0.4087843596935272
                                    },
                                    {
                                        "X": 0.6942842602729797,
                                        "Y": 0.4087935984134674
                                    }
                                ]
                            },
                            "Id": "3c447909-41b7-4e4c-a69a-14a3f439a324"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.71436309814453,
                            "Text": "ultricies",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06118316203355789,
                                    "Height": 0.010298682376742363,
                                    "Left": 0.7359339594841003,
                                    "Top": 0.3986643850803375
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7359339594841003,
                                        "Y": 0.3986795246601105
                                    },
                                    {
                                        "X": 0.7971088290214539,
                                        "Y": 0.3986643850803375
                                    },
                                    {
                                        "X": 0.7971171140670776,
                                        "Y": 0.40894708037376404
                                    },
                                    {
                                        "X": 0.7359423041343689,
                                        "Y": 0.40896308422088623
                                    }
                                ]
                            },
                            "Id": "d1c2c77d-89cb-4a25-8e66-321e3ee0fd08"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7623062133789,
                            "Text": "augue",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05046449601650238,
                                    "Height": 0.010501605458557606,
                                    "Left": 0.8031705617904663,
                                    "Top": 0.4008411467075348
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8031705617904663,
                                        "Y": 0.4008537828922272
                                    },
                                    {
                                        "X": 0.8536266684532166,
                                        "Y": 0.4008411467075348
                                    },
                                    {
                                        "X": 0.8536350727081299,
                                        "Y": 0.41132938861846924
                                    },
                                    {
                                        "X": 0.8031790256500244,
                                        "Y": 0.4113427698612213
                                    }
                                ]
                            },
                            "Id": "0a649114-501a-4288-a95c-e7c3ab343ec8"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.92781066894531,
                            "Text": "maximus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07268757373094559,
                                    "Height": 0.010014171712100506,
                                    "Left": 0.12091194093227386,
                                    "Top": 0.41606104373931885
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12091194093227386,
                                        "Y": 0.4160807430744171
                                    },
                                    {
                                        "X": 0.1935911327600479,
                                        "Y": 0.41606104373931885
                                    },
                                    {
                                        "X": 0.19359950721263885,
                                        "Y": 0.4260544776916504
                                    },
                                    {
                                        "X": 0.12092035263776779,
                                        "Y": 0.42607519030570984
                                    }
                                ]
                            },
                            "Id": "9b2302bb-6935-4c9a-bb16-86e95f2c439b"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.72599029541016,
                            "Text": "nunc",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03918307274580002,
                                    "Height": 0.007972483523190022,
                                    "Left": 0.19997556507587433,
                                    "Top": 0.4180014431476593
                                },
                                "Polygon": [
                                    {
                                        "X": 0.19997556507587433,
                                        "Y": 0.41801217198371887
                                    },
                                    {
                                        "X": 0.2391519844532013,
                                        "Y": 0.4180014431476593
                                    },
                                    {
                                        "X": 0.23915863037109375,
                                        "Y": 0.42596277594566345
                                    },
                                    {
                                        "X": 0.19998222589492798,
                                        "Y": 0.42597392201423645
                                    }
                                ]
                            },
                            "Id": "c6357811-df5e-4d21-869c-aebb135177e2"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 94.21480560302734,
                            "Text": "iaculis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.050180427730083466,
                                    "Height": 0.01015970017760992,
                                    "Left": 0.24473918974399567,
                                    "Top": 0.4158504605293274
                                },
                                "Polygon": [
                                    {
                                        "X": 0.24473918974399567,
                                        "Y": 0.4158640503883362
                                    },
                                    {
                                        "X": 0.2949111759662628,
                                        "Y": 0.4158504605293274
                                    },
                                    {
                                        "X": 0.29491961002349854,
                                        "Y": 0.4259958565235138
                                    },
                                    {
                                        "X": 0.24474765360355377,
                                        "Y": 0.4260101616382599
                                    }
                                ]
                            },
                            "Id": "82b93edf-0b59-4561-a874-4604e53afb31"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.84066772460938,
                            "Text": "volutpat.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0682491883635521,
                                    "Height": 0.012286482378840446,
                                    "Left": 0.3006851375102997,
                                    "Top": 0.41596442461013794
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3006851375102997,
                                        "Y": 0.4159829318523407
                                    },
                                    {
                                        "X": 0.36892417073249817,
                                        "Y": 0.41596442461013794
                                    },
                                    {
                                        "X": 0.3689343333244324,
                                        "Y": 0.42823123931884766
                                    },
                                    {
                                        "X": 0.3006953299045563,
                                        "Y": 0.42825090885162354
                                    }
                                ]
                            },
                            "Id": "8453a163-ee8f-40e3-b55a-ca99df924e6e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.34038543701172,
                            "Text": "In",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.013307683169841766,
                                    "Height": 0.009743384085595608,
                                    "Left": 0.3767496943473816,
                                    "Top": 0.4160580635070801
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3767496943473816,
                                        "Y": 0.416061669588089
                                    },
                                    {
                                        "X": 0.3900493085384369,
                                        "Y": 0.4160580635070801
                                    },
                                    {
                                        "X": 0.39005738496780396,
                                        "Y": 0.42579764127731323
                                    },
                                    {
                                        "X": 0.37675774097442627,
                                        "Y": 0.42580145597457886
                                    }
                                ]
                            },
                            "Id": "541383cd-1e88-4be1-af8d-2590902d8e46"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.48094177246094,
                            "Text": "rutrum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05197230353951454,
                                    "Height": 0.009620371274650097,
                                    "Left": 0.39650678634643555,
                                    "Top": 0.4163396954536438
                                },
                                "Polygon": [
                                    {
                                        "X": 0.39650678634643555,
                                        "Y": 0.41635382175445557
                                    },
                                    {
                                        "X": 0.44847115874290466,
                                        "Y": 0.4163396954536438
                                    },
                                    {
                                        "X": 0.4484790861606598,
                                        "Y": 0.4259452521800995
                                    },
                                    {
                                        "X": 0.3965147137641907,
                                        "Y": 0.42596006393432617
                                    }
                                ]
                            },
                            "Id": "a4ea6347-5e68-4348-8c8e-c50cdcb16597"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.56715393066406,
                            "Text": "orci",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.028674649074673653,
                                    "Height": 0.010077213868498802,
                                    "Left": 0.4548795521259308,
                                    "Top": 0.4159093499183655
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4548795521259308,
                                        "Y": 0.41591712832450867
                                    },
                                    {
                                        "X": 0.4835459291934967,
                                        "Y": 0.4159093499183655
                                    },
                                    {
                                        "X": 0.4835542142391205,
                                        "Y": 0.4259783923625946
                                    },
                                    {
                                        "X": 0.45488786697387695,
                                        "Y": 0.42598655819892883
                                    }
                                ]
                            },
                            "Id": "12f9d189-0cca-428f-b02a-12a9d159b184"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 96.94032287597656,
                            "Text": "augue,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05489332601428032,
                                    "Height": 0.010658363811671734,
                                    "Left": 0.489535391330719,
                                    "Top": 0.41737839579582214
                                },
                                "Polygon": [
                                    {
                                        "X": 0.489535391330719,
                                        "Y": 0.41739338636398315
                                    },
                                    {
                                        "X": 0.5444200038909912,
                                        "Y": 0.41737839579582214
                                    },
                                    {
                                        "X": 0.5444287061691284,
                                        "Y": 0.4280209541320801
                                    },
                                    {
                                        "X": 0.4895441234111786,
                                        "Y": 0.42803674936294556
                                    }
                                ]
                            },
                            "Id": "be2ad99d-9c1e-409e-811d-bb7c40526326"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.78352355957031,
                            "Text": "vitae",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.038436830043792725,
                                    "Height": 0.00991304311901331,
                                    "Left": 0.5506817698478699,
                                    "Top": 0.41611894965171814
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5506817698478699,
                                        "Y": 0.41612938046455383
                                    },
                                    {
                                        "X": 0.5891104936599731,
                                        "Y": 0.41611894965171814
                                    },
                                    {
                                        "X": 0.5891185998916626,
                                        "Y": 0.4260210394859314
                                    },
                                    {
                                        "X": 0.5506898760795593,
                                        "Y": 0.42603200674057007
                                    }
                                ]
                            },
                            "Id": "9080ce60-1ac5-404a-8975-1dde51e65f19"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.10767364501953,
                            "Text": "sollicitudin",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08404329419136047,
                                    "Height": 0.010049048811197281,
                                    "Left": 0.5951251983642578,
                                    "Top": 0.41593778133392334
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5951251983642578,
                                        "Y": 0.41596055030822754
                                    },
                                    {
                                        "X": 0.6791603565216064,
                                        "Y": 0.41593778133392334
                                    },
                                    {
                                        "X": 0.6791684627532959,
                                        "Y": 0.4259628355503082
                                    },
                                    {
                                        "X": 0.595133364200592,
                                        "Y": 0.4259868264198303
                                    }
                                ]
                            },
                            "Id": "392894c6-c036-400d-8f74-aeca6a3b9163"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.78887939453125,
                            "Text": "nisl",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.02638140879571438,
                                    "Height": 0.010112522169947624,
                                    "Left": 0.6856658458709717,
                                    "Top": 0.41579386591911316
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6856658458709717,
                                        "Y": 0.4158010184764862
                                    },
                                    {
                                        "X": 0.712039053440094,
                                        "Y": 0.41579386591911316
                                    },
                                    {
                                        "X": 0.7120472192764282,
                                        "Y": 0.42589884996414185
                                    },
                                    {
                                        "X": 0.6856740117073059,
                                        "Y": 0.42590638995170593
                                    }
                                ]
                            },
                            "Id": "a5d79bc4-576e-4601-9abe-26661cf5e9ca"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.6445541381836,
                            "Text": "vehicula",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06718076020479202,
                                    "Height": 0.010900652967393398,
                                    "Left": 0.7177212834358215,
                                    "Top": 0.4155164361000061
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7177212834358215,
                                        "Y": 0.4155346155166626
                                    },
                                    {
                                        "X": 0.784893274307251,
                                        "Y": 0.4155164361000061
                                    },
                                    {
                                        "X": 0.784902036190033,
                                        "Y": 0.4263978600502014
                                    },
                                    {
                                        "X": 0.7177301049232483,
                                        "Y": 0.4264170825481415
                                    }
                                ]
                            },
                            "Id": "364b4b74-6595-4da9-91a7-72c68f2d76b6"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 86.59790802001953,
                            "Text": "vitae.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.044561050832271576,
                                    "Height": 0.010527901351451874,
                                    "Left": 0.7883262038230896,
                                    "Top": 0.416029691696167
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7883262038230896,
                                        "Y": 0.4160417914390564
                                    },
                                    {
                                        "X": 0.832878828048706,
                                        "Y": 0.416029691696167
                                    },
                                    {
                                        "X": 0.8328872919082642,
                                        "Y": 0.42654484510421753
                                    },
                                    {
                                        "X": 0.7883346676826477,
                                        "Y": 0.42655760049819946
                                    }
                                ]
                            },
                            "Id": "a32b8f3e-ad5f-4a5c-99c6-e64daece2884"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.90168762207031,
                            "Text": "Nam",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03744589537382126,
                                    "Height": 0.010143399238586426,
                                    "Left": 0.12107160687446594,
                                    "Top": 0.43322011828422546
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12107160687446594,
                                        "Y": 0.4332311749458313
                                    },
                                    {
                                        "X": 0.1585090011358261,
                                        "Y": 0.43322011828422546
                                    },
                                    {
                                        "X": 0.1585175096988678,
                                        "Y": 0.44335195422172546
                                    },
                                    {
                                        "X": 0.12108013778924942,
                                        "Y": 0.4433635175228119
                                    }
                                ]
                            },
                            "Id": "7e25a2ea-761b-4e1f-9923-0402ded386d6"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7348861694336,
                            "Text": "eu",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.01965412124991417,
                                    "Height": 0.007661138195544481,
                                    "Left": 0.16461597383022308,
                                    "Top": 0.43571028113365173
                                },
                                "Polygon": [
                                    {
                                        "X": 0.16461597383022308,
                                        "Y": 0.4357161521911621
                                    },
                                    {
                                        "X": 0.1842636913061142,
                                        "Y": 0.43571028113365173
                                    },
                                    {
                                        "X": 0.18427009880542755,
                                        "Y": 0.44336533546447754
                                    },
                                    {
                                        "X": 0.16462241113185883,
                                        "Y": 0.44337141513824463
                                    }
                                ]
                            },
                            "Id": "1353a03a-81f8-43f0-b1e0-1a999c1797a3"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 88.03228759765625,
                            "Text": "iaculis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.050242092460393906,
                                    "Height": 0.010200678370893002,
                                    "Left": 0.19034405052661896,
                                    "Top": 0.43318092823028564
                                },
                                "Polygon": [
                                    {
                                        "X": 0.19034405052661896,
                                        "Y": 0.43319573998451233
                                    },
                                    {
                                        "X": 0.24057763814926147,
                                        "Y": 0.43318092823028564
                                    },
                                    {
                                        "X": 0.24058614671230316,
                                        "Y": 0.44336605072021484
                                    },
                                    {
                                        "X": 0.19035258889198303,
                                        "Y": 0.4433816075325012
                                    }
                                ]
                            },
                            "Id": "a8a15974-eb49-4422-9b93-a9c6a621afb3"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 94.75995635986328,
                            "Text": "metus.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05340423434972763,
                                    "Height": 0.009749779477715492,
                                    "Left": 0.2467230260372162,
                                    "Top": 0.4336391091346741
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2467230260372162,
                                        "Y": 0.43365490436553955
                                    },
                                    {
                                        "X": 0.30011916160583496,
                                        "Y": 0.4336391091346741
                                    },
                                    {
                                        "X": 0.3001272678375244,
                                        "Y": 0.44337236881256104
                                    },
                                    {
                                        "X": 0.24673114717006683,
                                        "Y": 0.4433888792991638
                                    }
                                ]
                            },
                            "Id": "a43d11d6-cdbd-4e04-9812-7fc63dbcefe2"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.97335815429688,
                            "Text": "Aenean",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06295280903577805,
                                    "Height": 0.010053849779069424,
                                    "Left": 0.12014767527580261,
                                    "Top": 0.46782609820365906
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12014767527580261,
                                        "Y": 0.46784770488739014
                                    },
                                    {
                                        "X": 0.18309207260608673,
                                        "Y": 0.46782609820365906
                                    },
                                    {
                                        "X": 0.18310049176216125,
                                        "Y": 0.47785747051239014
                                    },
                                    {
                                        "X": 0.12015612423419952,
                                        "Y": 0.47787994146347046
                                    }
                                ]
                            },
                            "Id": "c4b47e5c-01c1-4f89-a2c9-1c1a21ade416"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.24996185302734,
                            "Text": "hendrerit,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07581295818090439,
                                    "Height": 0.011922954581677914,
                                    "Left": 0.18969595432281494,
                                    "Top": 0.46754419803619385
                                },
                                "Polygon": [
                                    {
                                        "X": 0.18969595432281494,
                                        "Y": 0.4675702154636383
                                    },
                                    {
                                        "X": 0.2654989957809448,
                                        "Y": 0.46754419803619385
                                    },
                                    {
                                        "X": 0.2655089199542999,
                                        "Y": 0.4794398844242096
                                    },
                                    {
                                        "X": 0.18970592319965363,
                                        "Y": 0.47946715354919434
                                    }
                                ]
                            },
                            "Id": "7341eeb6-7363-43d2-816b-4e865da1c9d2"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7768783569336,
                            "Text": "arcu",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03466636687517166,
                                    "Height": 0.00784791074693203,
                                    "Left": 0.2724941074848175,
                                    "Top": 0.47010159492492676
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2724941074848175,
                                        "Y": 0.470113605260849
                                    },
                                    {
                                        "X": 0.30715394020080566,
                                        "Y": 0.47010159492492676
                                    },
                                    {
                                        "X": 0.30716046690940857,
                                        "Y": 0.47793710231781006
                                    },
                                    {
                                        "X": 0.2725006341934204,
                                        "Y": 0.47794950008392334
                                    }
                                ]
                            },
                            "Id": "97273024-f1cc-4470-ae5b-27a311d781b5"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.81295013427734,
                            "Text": "ut",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.015336497686803341,
                                    "Height": 0.00970564316958189,
                                    "Left": 0.31341445446014404,
                                    "Top": 0.46822336316108704
                                },
                                "Polygon": [
                                    {
                                        "X": 0.31341445446014404,
                                        "Y": 0.46822863817214966
                                    },
                                    {
                                        "X": 0.3287428915500641,
                                        "Y": 0.46822336316108704
                                    },
                                    {
                                        "X": 0.32875093817710876,
                                        "Y": 0.47792351245880127
                                    },
                                    {
                                        "X": 0.3134225308895111,
                                        "Y": 0.4779289960861206
                                    }
                                ]
                            },
                            "Id": "842335c7-f1de-4061-8dee-002a4eda18a8"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.49717712402344,
                            "Text": "commodo",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08014864474534988,
                                    "Height": 0.010136640630662441,
                                    "Left": 0.33370062708854675,
                                    "Top": 0.4679238796234131
                                },
                                "Polygon": [
                                    {
                                        "X": 0.33370062708854675,
                                        "Y": 0.4679514169692993
                                    },
                                    {
                                        "X": 0.4138409197330475,
                                        "Y": 0.4679238796234131
                                    },
                                    {
                                        "X": 0.41384926438331604,
                                        "Y": 0.47803184390068054
                                    },
                                    {
                                        "X": 0.3337090015411377,
                                        "Y": 0.4780605137348175
                                    }
                                ]
                            },
                            "Id": "245ba790-f3e3-44ff-a961-6a99e5ecffbd"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.0576171875,
                            "Text": "dignissim,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08088598400354385,
                                    "Height": 0.012591671198606491,
                                    "Left": 0.4196196496486664,
                                    "Top": 0.4676465094089508
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4196196496486664,
                                        "Y": 0.46767428517341614
                                    },
                                    {
                                        "X": 0.5004953145980835,
                                        "Y": 0.4676465094089508
                                    },
                                    {
                                        "X": 0.5005056262016296,
                                        "Y": 0.48020899295806885
                                    },
                                    {
                                        "X": 0.4196300208568573,
                                        "Y": 0.4802381992340088
                                    }
                                ]
                            },
                            "Id": "d05b1922-d9fc-43ec-8389-db8f9e6b9752"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.71609497070312,
                            "Text": "velit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03321673721075058,
                                    "Height": 0.009961341507732868,
                                    "Left": 0.5066394209861755,
                                    "Top": 0.46795493364334106
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5066394209861755,
                                        "Y": 0.46796634793281555
                                    },
                                    {
                                        "X": 0.5398479700088501,
                                        "Y": 0.46795493364334106
                                    },
                                    {
                                        "X": 0.5398561358451843,
                                        "Y": 0.47790440917015076
                                    },
                                    {
                                        "X": 0.5066475868225098,
                                        "Y": 0.47791627049446106
                                    }
                                ]
                            },
                            "Id": "c0ddbac6-dee4-4a5c-9bee-e3842f0a0988"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.81771087646484,
                            "Text": "purus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04487104341387749,
                                    "Height": 0.010147164575755596,
                                    "Left": 0.545257031917572,
                                    "Top": 0.47003763914108276
                                },
                                "Polygon": [
                                    {
                                        "X": 0.545257031917572,
                                        "Y": 0.47005316615104675
                                    },
                                    {
                                        "X": 0.5901197791099548,
                                        "Y": 0.47003763914108276
                                    },
                                    {
                                        "X": 0.5901280641555786,
                                        "Y": 0.4801686108112335
                                    },
                                    {
                                        "X": 0.5452653169631958,
                                        "Y": 0.48018479347229004
                                    }
                                ]
                            },
                            "Id": "7daa9402-2cca-440f-8d83-57ea8ccdbec6"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.76155853271484,
                            "Text": "molestie",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06762244552373886,
                                    "Height": 0.01029263436794281,
                                    "Left": 0.5964934825897217,
                                    "Top": 0.4678126573562622
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5964934825897217,
                                        "Y": 0.4678359031677246
                                    },
                                    {
                                        "X": 0.6641075611114502,
                                        "Y": 0.4678126573562622
                                    },
                                    {
                                        "X": 0.6641159057617188,
                                        "Y": 0.478081077337265
                                    },
                                    {
                                        "X": 0.5965018272399902,
                                        "Y": 0.4781052768230438
                                    }
                                ]
                            },
                            "Id": "4a652ecc-f25a-4142-a384-071917ad22c3"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 95.43069458007812,
                            "Text": "dui,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.02814137190580368,
                                    "Height": 0.011451968923211098,
                                    "Left": 0.6697569489479065,
                                    "Top": 0.4678767919540405
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6697569489479065,
                                        "Y": 0.46788644790649414
                                    },
                                    {
                                        "X": 0.6978890895843506,
                                        "Y": 0.4678767919540405
                                    },
                                    {
                                        "X": 0.6978983283042908,
                                        "Y": 0.47931864857673645
                                    },
                                    {
                                        "X": 0.6697662472724915,
                                        "Y": 0.4793287515640259
                                    }
                                ]
                            },
                            "Id": "92ec0e77-2916-4a6b-80c3-6ffb059f953f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.68785858154297,
                            "Text": "eu",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.01964198239147663,
                                    "Height": 0.008027330040931702,
                                    "Left": 0.7046422958374023,
                                    "Top": 0.4699622392654419
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7046422958374023,
                                        "Y": 0.4699690639972687
                                    },
                                    {
                                        "X": 0.7242777943611145,
                                        "Y": 0.4699622392654419
                                    },
                                    {
                                        "X": 0.724284291267395,
                                        "Y": 0.4779825508594513
                                    },
                                    {
                                        "X": 0.7046487927436829,
                                        "Y": 0.4779895842075348
                                    }
                                ]
                            },
                            "Id": "de1cd0e5-4226-483f-a1ce-c59fd31ac418"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.54644775390625,
                            "Text": "ornare",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.052667345851659775,
                                    "Height": 0.008087102323770523,
                                    "Left": 0.7303867936134338,
                                    "Top": 0.4698597192764282
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7303867936134338,
                                        "Y": 0.4698779582977295
                                    },
                                    {
                                        "X": 0.783047616481781,
                                        "Y": 0.4698597192764282
                                    },
                                    {
                                        "X": 0.7830541133880615,
                                        "Y": 0.4779279828071594
                                    },
                                    {
                                        "X": 0.7303932905197144,
                                        "Y": 0.47794681787490845
                                    }
                                ]
                            },
                            "Id": "5843e25f-1b37-4d07-b5ff-4c842247ccc8"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.83645629882812,
                            "Text": "purus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.044776108115911484,
                                    "Height": 0.010203056037425995,
                                    "Left": 0.7891921401023865,
                                    "Top": 0.4701031744480133
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7891921401023865,
                                        "Y": 0.4701187014579773
                                    },
                                    {
                                        "X": 0.8339600563049316,
                                        "Y": 0.4701031744480133
                                    },
                                    {
                                        "X": 0.8339682817459106,
                                        "Y": 0.4802900552749634
                                    },
                                    {
                                        "X": 0.7892003655433655,
                                        "Y": 0.4803062081336975
                                    }
                                ]
                            },
                            "Id": "1a373dd7-5120-4091-a807-e0a0522bc25b"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.88580322265625,
                            "Text": "elit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.02368970587849617,
                                    "Height": 0.010113275609910488,
                                    "Left": 0.8400493264198303,
                                    "Top": 0.4678131937980652
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8400493264198303,
                                        "Y": 0.467821329832077
                                    },
                                    {
                                        "X": 0.8637309074401855,
                                        "Y": 0.4678131937980652
                                    },
                                    {
                                        "X": 0.863739013671875,
                                        "Y": 0.47791799902915955
                                    },
                                    {
                                        "X": 0.8400574326515198,
                                        "Y": 0.47792646288871765
                                    }
                                ]
                            },
                            "Id": "d4464a86-9166-4948-b6e8-39d8a5ce9bef"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.48698425292969,
                            "Text": "vel",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.022666236385703087,
                                    "Height": 0.009867178276181221,
                                    "Left": 0.120362788438797,
                                    "Top": 0.48527732491493225
                                },
                                "Polygon": [
                                    {
                                        "X": 0.120362788438797,
                                        "Y": 0.4852856397628784
                                    },
                                    {
                                        "X": 0.14302073419094086,
                                        "Y": 0.48527732491493225
                                    },
                                    {
                                        "X": 0.14302901923656464,
                                        "Y": 0.4951358437538147
                                    },
                                    {
                                        "X": 0.12037108838558197,
                                        "Y": 0.49514448642730713
                                    }
                                ]
                            },
                            "Id": "b766d8ed-e7a2-458c-8260-e3e4bc80ba75"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.38367462158203,
                            "Text": "quam.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04943666234612465,
                                    "Height": 0.010027259588241577,
                                    "Left": 0.1494191437959671,
                                    "Top": 0.4873133599758148
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1494191437959671,
                                        "Y": 0.48733168840408325
                                    },
                                    {
                                        "X": 0.19884741306304932,
                                        "Y": 0.4873133599758148
                                    },
                                    {
                                        "X": 0.19885580241680145,
                                        "Y": 0.49732160568237305
                                    },
                                    {
                                        "X": 0.14942754805088043,
                                        "Y": 0.4973406195640564
                                    }
                                ]
                            },
                            "Id": "7a2b16ca-f14c-48d4-b550-3f6850802598"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.68778228759766,
                            "Text": "Fusce",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04718507081270218,
                                    "Height": 0.01030038669705391,
                                    "Left": 0.20661982893943787,
                                    "Top": 0.48527055978775024
                                },
                                "Polygon": [
                                    {
                                        "X": 0.20661982893943787,
                                        "Y": 0.4852879047393799
                                    },
                                    {
                                        "X": 0.2537963092327118,
                                        "Y": 0.48527055978775024
                                    },
                                    {
                                        "X": 0.25380489230155945,
                                        "Y": 0.4955529272556305
                                    },
                                    {
                                        "X": 0.2066284418106079,
                                        "Y": 0.49557095766067505
                                    }
                                ]
                            },
                            "Id": "5e352b2f-0100-4961-a16a-67d12d29d8b9"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7516098022461,
                            "Text": "vitae",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03844593092799187,
                                    "Height": 0.01001068763434887,
                                    "Left": 0.2605568468570709,
                                    "Top": 0.4851853847503662
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2605568468570709,
                                        "Y": 0.485199511051178
                                    },
                                    {
                                        "X": 0.2989944517612457,
                                        "Y": 0.4851853847503662
                                    },
                                    {
                                        "X": 0.2990027666091919,
                                        "Y": 0.4951813817024231
                                    },
                                    {
                                        "X": 0.2605651915073395,
                                        "Y": 0.49519604444503784
                                    }
                                ]
                            },
                            "Id": "cfdfaa74-3caa-4822-8ba7-5fa3aeffb196"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.57023620605469,
                            "Text": "velit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03310404345393181,
                                    "Height": 0.009919288568198681,
                                    "Left": 0.3047410249710083,
                                    "Top": 0.48520880937576294
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3047410249710083,
                                        "Y": 0.4852209985256195
                                    },
                                    {
                                        "X": 0.3378368318080902,
                                        "Y": 0.48520880937576294
                                    },
                                    {
                                        "X": 0.3378450572490692,
                                        "Y": 0.4951154887676239
                                    },
                                    {
                                        "X": 0.3047492504119873,
                                        "Y": 0.4951280951499939
                                    }
                                ]
                            },
                            "Id": "5b5980e1-9a0b-4982-b975-c9fbba09c300"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.46086120605469,
                            "Text": "mollis,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.050553955137729645,
                                    "Height": 0.01156781055033207,
                                    "Left": 0.34326547384262085,
                                    "Top": 0.48521366715431213
                                },
                                "Polygon": [
                                    {
                                        "X": 0.34326547384262085,
                                        "Y": 0.48523223400115967
                                    },
                                    {
                                        "X": 0.39380985498428345,
                                        "Y": 0.48521366715431213
                                    },
                                    {
                                        "X": 0.3938194215297699,
                                        "Y": 0.49676206707954407
                                    },
                                    {
                                        "X": 0.3432750403881073,
                                        "Y": 0.49678146839141846
                                    }
                                ]
                            },
                            "Id": "df86a972-ff86-444f-8c25-ec4b912ec5c9"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.6111068725586,
                            "Text": "condimentum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.10921567678451538,
                                    "Height": 0.009939761832356453,
                                    "Left": 0.4005753993988037,
                                    "Top": 0.48515763878822327
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4005753993988037,
                                        "Y": 0.4851978123188019
                                    },
                                    {
                                        "X": 0.5097829699516296,
                                        "Y": 0.48515763878822327
                                    },
                                    {
                                        "X": 0.5097910761833191,
                                        "Y": 0.4950557351112366
                                    },
                                    {
                                        "X": 0.4005835950374603,
                                        "Y": 0.49509739875793457
                                    }
                                ]
                            },
                            "Id": "89e37045-ecce-4f8e-9dc8-9affc5454bd0"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.85038757324219,
                            "Text": "lacus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04191429167985916,
                                    "Height": 0.010025263763964176,
                                    "Left": 0.516434371471405,
                                    "Top": 0.48519957065582275
                                },
                                "Polygon": [
                                    {
                                        "X": 0.516434371471405,
                                        "Y": 0.4852149784564972
                                    },
                                    {
                                        "X": 0.5583404898643494,
                                        "Y": 0.48519957065582275
                                    },
                                    {
                                        "X": 0.5583486557006836,
                                        "Y": 0.49520882964134216
                                    },
                                    {
                                        "X": 0.516442596912384,
                                        "Y": 0.49522483348846436
                                    }
                                ]
                            },
                            "Id": "b665cd1e-b060-4364-9743-3d552b3cdcda"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.87211608886719,
                            "Text": "nec,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.032864589244127274,
                                    "Height": 0.009622054174542427,
                                    "Left": 0.5647515058517456,
                                    "Top": 0.48729997873306274
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5647515058517456,
                                        "Y": 0.4873121678829193
                                    },
                                    {
                                        "X": 0.5976082682609558,
                                        "Y": 0.48729997873306274
                                    },
                                    {
                                        "X": 0.5976160764694214,
                                        "Y": 0.49690940976142883
                                    },
                                    {
                                        "X": 0.564759373664856,
                                        "Y": 0.4969220459461212
                                    }
                                ]
                            },
                            "Id": "2c62239d-bf99-4bd7-8300-0ed9ea060895"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.75870513916016,
                            "Text": "lobortis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05851609632372856,
                                    "Height": 0.010206313803792,
                                    "Left": 0.6044765710830688,
                                    "Top": 0.48505786061286926
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6044765710830688,
                                        "Y": 0.4850793778896332
                                    },
                                    {
                                        "X": 0.6629843711853027,
                                        "Y": 0.48505786061286926
                                    },
                                    {
                                        "X": 0.6629926562309265,
                                        "Y": 0.49524182081222534
                                    },
                                    {
                                        "X": 0.6044848561286926,
                                        "Y": 0.4952641725540161
                                    }
                                ]
                            },
                            "Id": "50df6598-0da3-479c-b6e0-3bfffa5d3132"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.173583984375,
                            "Text": "nisl.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.030756499618291855,
                                    "Height": 0.010066020302474499,
                                    "Left": 0.6691203713417053,
                                    "Top": 0.48513171076774597
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6691203713417053,
                                        "Y": 0.4851430356502533
                                    },
                                    {
                                        "X": 0.6998687386512756,
                                        "Y": 0.48513171076774597
                                    },
                                    {
                                        "X": 0.6998769044876099,
                                        "Y": 0.4951860010623932
                                    },
                                    {
                                        "X": 0.6691285371780396,
                                        "Y": 0.49519774317741394
                                    }
                                ]
                            },
                            "Id": "609dbc63-278d-4605-ae50-438148c8f55c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.26469421386719,
                            "Text": "Aliquam",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06606046855449677,
                                    "Height": 0.012458830140531063,
                                    "Left": 0.7062473893165588,
                                    "Top": 0.48507237434387207
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7062473893165588,
                                        "Y": 0.48509666323661804
                                    },
                                    {
                                        "X": 0.7722978591918945,
                                        "Y": 0.48507237434387207
                                    },
                                    {
                                        "X": 0.7723078727722168,
                                        "Y": 0.497505784034729
                                    },
                                    {
                                        "X": 0.7062574625015259,
                                        "Y": 0.4975312054157257
                                    }
                                ]
                            },
                            "Id": "3778c628-53fb-4e14-abed-30861b069c0a"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7840576171875,
                            "Text": "nunc",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03936402127146721,
                                    "Height": 0.007996485568583012,
                                    "Left": 0.7788503170013428,
                                    "Top": 0.4872056245803833
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7788503170013428,
                                        "Y": 0.4872201979160309
                                    },
                                    {
                                        "X": 0.8182079195976257,
                                        "Y": 0.4872056245803833
                                    },
                                    {
                                        "X": 0.8182143568992615,
                                        "Y": 0.49518707394599915
                                    },
                                    {
                                        "X": 0.7788567543029785,
                                        "Y": 0.49520209431648254
                                    }
                                ]
                            },
                            "Id": "1cfca79e-1d9d-4cfe-9b9b-5a56490e9f2d"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.54400634765625,
                            "Text": "elit,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.02694307640194893,
                                    "Height": 0.011590968817472458,
                                    "Left": 0.8237441778182983,
                                    "Top": 0.4852810204029083
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8237441778182983,
                                        "Y": 0.4852909445762634
                                    },
                                    {
                                        "X": 0.8506779670715332,
                                        "Y": 0.4852810204029083
                                    },
                                    {
                                        "X": 0.8506872653961182,
                                        "Y": 0.49686166644096375
                                    },
                                    {
                                        "X": 0.8237534761428833,
                                        "Y": 0.4968720078468323
                                    }
                                ]
                            },
                            "Id": "a9790a33-d1c8-4a6b-bd09-6287174f737f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.60377502441406,
                            "Text": "tincidunt",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06920568645000458,
                                    "Height": 0.010247844271361828,
                                    "Left": 0.12017929553985596,
                                    "Top": 0.5022066831588745
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12017929553985596,
                                        "Y": 0.5022337436676025
                                    },
                                    {
                                        "X": 0.18937641382217407,
                                        "Y": 0.5022066831588745
                                    },
                                    {
                                        "X": 0.18938498198986053,
                                        "Y": 0.5124264359474182
                                    },
                                    {
                                        "X": 0.1201879009604454,
                                        "Y": 0.5124545097351074
                                    }
                                ]
                            },
                            "Id": "b2451b3e-cc85-4f35-bf03-937b8d6fde2f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.91802215576172,
                            "Text": "at",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.015519814565777779,
                                    "Height": 0.009950604289770126,
                                    "Left": 0.1942766010761261,
                                    "Top": 0.5024932026863098
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1942766010761261,
                                        "Y": 0.5024992227554321
                                    },
                                    {
                                        "X": 0.20978809893131256,
                                        "Y": 0.5024932026863098
                                    },
                                    {
                                        "X": 0.20979641377925873,
                                        "Y": 0.5124374628067017
                                    },
                                    {
                                        "X": 0.19428493082523346,
                                        "Y": 0.5124437808990479
                                    }
                                ]
                            },
                            "Id": "facfa7c3-ac83-4822-afb4-cf32a4c3292e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.89550018310547,
                            "Text": "lorem",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04492980241775513,
                                    "Height": 0.010125547647476196,
                                    "Left": 0.2151699662208557,
                                    "Top": 0.502243161201477
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2151699662208557,
                                        "Y": 0.5022607445716858
                                    },
                                    {
                                        "X": 0.2600913345813751,
                                        "Y": 0.502243161201477
                                    },
                                    {
                                        "X": 0.26009976863861084,
                                        "Y": 0.5123504996299744
                                    },
                                    {
                                        "X": 0.21517843008041382,
                                        "Y": 0.5123687386512756
                                    }
                                ]
                            },
                            "Id": "47988920-67cd-4f33-933e-9414950b73e2"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.68061065673828,
                            "Text": "in,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.017866773530840874,
                                    "Height": 0.011544318869709969,
                                    "Left": 0.26590508222579956,
                                    "Top": 0.5022875070571899
                                },
                                "Polygon": [
                                    {
                                        "X": 0.26590508222579956,
                                        "Y": 0.5022944808006287
                                    },
                                    {
                                        "X": 0.28376224637031555,
                                        "Y": 0.5022875070571899
                                    },
                                    {
                                        "X": 0.2837718427181244,
                                        "Y": 0.5138245224952698
                                    },
                                    {
                                        "X": 0.2659147083759308,
                                        "Y": 0.5138317942619324
                                    }
                                ]
                            },
                            "Id": "fbe7577f-b5b6-4fb9-af68-ea65270d3bf0"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.87277221679688,
                            "Text": "auctor",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05107636749744415,
                                    "Height": 0.009731747210025787,
                                    "Left": 0.2907259166240692,
                                    "Top": 0.5026833415031433
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2907259166240692,
                                        "Y": 0.5027033686637878
                                    },
                                    {
                                        "X": 0.3417942225933075,
                                        "Y": 0.5026833415031433
                                    },
                                    {
                                        "X": 0.34180229902267456,
                                        "Y": 0.512394368648529
                                    },
                                    {
                                        "X": 0.2907339930534363,
                                        "Y": 0.5124151110649109
                                    }
                                ]
                            },
                            "Id": "f1af9809-52ea-42f5-994a-19d6c4e38792"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.61891174316406,
                            "Text": "interdum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07070902734994888,
                                    "Height": 0.01017892174422741,
                                    "Left": 0.34721872210502625,
                                    "Top": 0.5022141933441162
                                },
                                "Polygon": [
                                    {
                                        "X": 0.34721872210502625,
                                        "Y": 0.502241849899292
                                    },
                                    {
                                        "X": 0.4179193675518036,
                                        "Y": 0.5022141933441162
                                    },
                                    {
                                        "X": 0.41792774200439453,
                                        "Y": 0.5123644471168518
                                    },
                                    {
                                        "X": 0.3472271263599396,
                                        "Y": 0.5123931169509888
                                    }
                                ]
                            },
                            "Id": "905d87c7-b78a-4ebb-b107-2cc62dc614f3"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.67931365966797,
                            "Text": "metus.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.053631387650966644,
                                    "Height": 0.00976361520588398,
                                    "Left": 0.4241887032985687,
                                    "Top": 0.502677321434021
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4241887032985687,
                                        "Y": 0.5026983022689819
                                    },
                                    {
                                        "X": 0.4778120815753937,
                                        "Y": 0.502677321434021
                                    },
                                    {
                                        "X": 0.4778200685977936,
                                        "Y": 0.5124191641807556
                                    },
                                    {
                                        "X": 0.424196720123291,
                                        "Y": 0.5124409198760986
                                    }
                                ]
                            },
                            "Id": "f0e1f69c-b003-4ea5-ab26-9e5fff9de1d1"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.52262878417969,
                            "Text": "Cras",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.037759896367788315,
                                    "Height": 0.010213690809905529,
                                    "Left": 0.4847091734409332,
                                    "Top": 0.5022218823432922
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4847091734409332,
                                        "Y": 0.5022366642951965
                                    },
                                    {
                                        "X": 0.5224606990814209,
                                        "Y": 0.5022218823432922
                                    },
                                    {
                                        "X": 0.5224690437316895,
                                        "Y": 0.5124202370643616
                                    },
                                    {
                                        "X": 0.48471754789352417,
                                        "Y": 0.5124355554580688
                                    }
                                ]
                            },
                            "Id": "4c956320-96c5-4d38-a9d7-4ed8d346e7ed"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.86859893798828,
                            "Text": "non",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.029397128149867058,
                                    "Height": 0.007765125948935747,
                                    "Left": 0.5287407636642456,
                                    "Top": 0.5045841336250305
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5287407636642456,
                                        "Y": 0.5045956969261169
                                    },
                                    {
                                        "X": 0.5581315159797668,
                                        "Y": 0.5045841336250305
                                    },
                                    {
                                        "X": 0.558137834072113,
                                        "Y": 0.512337327003479
                                    },
                                    {
                                        "X": 0.5287470817565918,
                                        "Y": 0.5123492479324341
                                    }
                                ]
                            },
                            "Id": "aa25a817-c561-43eb-8943-89b5dd9fb968"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.00617980957031,
                            "Text": "convallis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07010041922330856,
                                    "Height": 0.010201364755630493,
                                    "Left": 0.5641685128211975,
                                    "Top": 0.5022653341293335
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5641685128211975,
                                        "Y": 0.502292811870575
                                    },
                                    {
                                        "X": 0.6342606544494629,
                                        "Y": 0.5022653341293335
                                    },
                                    {
                                        "X": 0.6342689394950867,
                                        "Y": 0.5124382376670837
                                    },
                                    {
                                        "X": 0.5641768574714661,
                                        "Y": 0.5124667286872864
                                    }
                                ]
                            },
                            "Id": "342f9508-ebc4-4eed-924b-82eb4191352f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 93.14057159423828,
                            "Text": "dui.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.02806316874921322,
                                    "Height": 0.010427996516227722,
                                    "Left": 0.6401712894439697,
                                    "Top": 0.502108633518219
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6401712894439697,
                                        "Y": 0.5021196007728577
                                    },
                                    {
                                        "X": 0.6682259440422058,
                                        "Y": 0.502108633518219
                                    },
                                    {
                                        "X": 0.6682344079017639,
                                        "Y": 0.512525200843811
                                    },
                                    {
                                        "X": 0.6401797533035278,
                                        "Y": 0.5125365853309631
                                    }
                                ]
                            },
                            "Id": "772744fd-037a-4577-89dd-62a2e5f4500b"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.33607482910156,
                            "Text": "Duis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03558793663978577,
                                    "Height": 0.010198929347097874,
                                    "Left": 0.675477147102356,
                                    "Top": 0.5021909475326538
                                },
                                "Polygon": [
                                    {
                                        "X": 0.675477147102356,
                                        "Y": 0.5022048950195312
                                    },
                                    {
                                        "X": 0.7110568284988403,
                                        "Y": 0.5021909475326538
                                    },
                                    {
                                        "X": 0.7110650539398193,
                                        "Y": 0.5123754739761353
                                    },
                                    {
                                        "X": 0.6754854321479797,
                                        "Y": 0.5123898983001709
                                    }
                                ]
                            },
                            "Id": "fdc77aac-3133-4642-a61e-181e564b45f6"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.41157531738281,
                            "Text": "placerat,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06927192956209183,
                                    "Height": 0.012522620148956776,
                                    "Left": 0.7170205116271973,
                                    "Top": 0.5022135972976685
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7170205116271973,
                                        "Y": 0.502240777015686
                                    },
                                    {
                                        "X": 0.7862824201583862,
                                        "Y": 0.5022135972976685
                                    },
                                    {
                                        "X": 0.7862924933433533,
                                        "Y": 0.5147079229354858
                                    },
                                    {
                                        "X": 0.7170306444168091,
                                        "Y": 0.5147362351417542
                                    }
                                ]
                            },
                            "Id": "5f7c7fdd-8c22-408d-9a98-928100bea7dc"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.67517852783203,
                            "Text": "tellus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.042519502341747284,
                                    "Height": 0.010240661911666393,
                                    "Left": 0.7925889492034912,
                                    "Top": 0.5022876262664795
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7925889492034912,
                                        "Y": 0.5023043155670166
                                    },
                                    {
                                        "X": 0.8351002335548401,
                                        "Y": 0.5022876262664795
                                    },
                                    {
                                        "X": 0.8351083993911743,
                                        "Y": 0.5125110745429993
                                    },
                                    {
                                        "X": 0.7925971746444702,
                                        "Y": 0.5125283002853394
                                    }
                                ]
                            },
                            "Id": "32893480-3efb-4210-9360-05d27de664fc"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.60273742675781,
                            "Text": "sed",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.028690224513411522,
                                    "Height": 0.010038604959845543,
                                    "Left": 0.841053307056427,
                                    "Top": 0.5023411512374878
                                },
                                "Polygon": [
                                    {
                                        "X": 0.841053307056427,
                                        "Y": 0.5023524165153503
                                    },
                                    {
                                        "X": 0.8697354793548584,
                                        "Y": 0.5023411512374878
                                    },
                                    {
                                        "X": 0.8697435259819031,
                                        "Y": 0.5123681426048279
                                    },
                                    {
                                        "X": 0.8410613536834717,
                                        "Y": 0.5123797655105591
                                    }
                                ]
                            },
                            "Id": "b7e61ca2-3e0c-4b0e-aa90-4c70aac9353f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.74578857421875,
                            "Text": "cursus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05354613438248634,
                                    "Height": 0.008692411705851555,
                                    "Left": 0.12048539519309998,
                                    "Top": 0.5213872194290161
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12048539519309998,
                                        "Y": 0.5214096307754517
                                    },
                                    {
                                        "X": 0.17402425408363342,
                                        "Y": 0.5213872194290161
                                    },
                                    {
                                        "X": 0.17403152585029602,
                                        "Y": 0.5300565958023071
                                    },
                                    {
                                        "X": 0.12049269676208496,
                                        "Y": 0.5300796627998352
                                    }
                                ]
                            },
                            "Id": "3eaebafd-b636-4603-a8b9-ea0f13f24b44"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 96.0232162475586,
                            "Text": "rhoncus,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06902432441711426,
                                    "Height": 0.011619250290095806,
                                    "Left": 0.18026010692119598,
                                    "Top": 0.5196526050567627
                                },
                                "Polygon": [
                                    {
                                        "X": 0.18026010692119598,
                                        "Y": 0.5196812748908997
                                    },
                                    {
                                        "X": 0.24927476048469543,
                                        "Y": 0.5196526050567627
                                    },
                                    {
                                        "X": 0.24928443133831024,
                                        "Y": 0.5312420129776001
                                    },
                                    {
                                        "X": 0.18026982247829437,
                                        "Y": 0.5312718152999878
                                    }
                                ]
                            },
                            "Id": "fefac309-de5a-4943-98d3-0c6c0e9d9ae2"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.82494354248047,
                            "Text": "nulla",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03776566684246063,
                                    "Height": 0.00995466485619545,
                                    "Left": 0.25607478618621826,
                                    "Top": 0.5196759700775146
                                },
                                "Polygon": [
                                    {
                                        "X": 0.25607478618621826,
                                        "Y": 0.5196916460990906
                                    },
                                    {
                                        "X": 0.2938321828842163,
                                        "Y": 0.5196759700775146
                                    },
                                    {
                                        "X": 0.2938404381275177,
                                        "Y": 0.5296143889427185
                                    },
                                    {
                                        "X": 0.25608307123184204,
                                        "Y": 0.5296306014060974
                                    }
                                ]
                            },
                            "Id": "696887a0-bd83-4a21-a01d-874c30aa8e9c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.78282165527344,
                            "Text": "diam",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.038680534809827805,
                                    "Height": 0.010102487169206142,
                                    "Left": 0.300073504447937,
                                    "Top": 0.5194934606552124
                                },
                                "Polygon": [
                                    {
                                        "X": 0.300073504447937,
                                        "Y": 0.5195095539093018
                                    },
                                    {
                                        "X": 0.338745653629303,
                                        "Y": 0.5194934606552124
                                    },
                                    {
                                        "X": 0.3387540280818939,
                                        "Y": 0.5295793414115906
                                    },
                                    {
                                        "X": 0.30008187890052795,
                                        "Y": 0.5295959711074829
                                    }
                                ]
                            },
                            "Id": "b9d19b78-d7e6-45e6-a6b3-054c98eacb18"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.62608337402344,
                            "Text": "vehicula",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06724265962839127,
                                    "Height": 0.010007567703723907,
                                    "Left": 0.3447622060775757,
                                    "Top": 0.5195748209953308
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3447622060775757,
                                        "Y": 0.5196027755737305
                                    },
                                    {
                                        "X": 0.41199660301208496,
                                        "Y": 0.5195748209953308
                                    },
                                    {
                                        "X": 0.41200485825538635,
                                        "Y": 0.5295535326004028
                                    },
                                    {
                                        "X": 0.3447704613208771,
                                        "Y": 0.5295823812484741
                                    }
                                ]
                            },
                            "Id": "3c5d17ba-eaa3-482f-992b-428e4da971af"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.3316879272461,
                            "Text": "turpis,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04901108518242836,
                                    "Height": 0.012342970818281174,
                                    "Left": 0.41739651560783386,
                                    "Top": 0.5196710228919983
                                },
                                "Polygon": [
                                    {
                                        "X": 0.41739651560783386,
                                        "Y": 0.5196914076805115
                                    },
                                    {
                                        "X": 0.4663974642753601,
                                        "Y": 0.5196710228919983
                                    },
                                    {
                                        "X": 0.4664075970649719,
                                        "Y": 0.5319927334785461
                                    },
                                    {
                                        "X": 0.41740670800209045,
                                        "Y": 0.5320139527320862
                                    }
                                ]
                            },
                            "Id": "59e95b72-00e8-4a77-b07c-35c75409d69d"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.54761505126953,
                            "Text": "sed",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.028477322310209274,
                                    "Height": 0.009954881854355335,
                                    "Left": 0.4732275903224945,
                                    "Top": 0.5196429491043091
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4732275903224945,
                                        "Y": 0.5196548104286194
                                    },
                                    {
                                        "X": 0.501696765422821,
                                        "Y": 0.5196429491043091
                                    },
                                    {
                                        "X": 0.5017049312591553,
                                        "Y": 0.529585599899292
                                    },
                                    {
                                        "X": 0.47323575615882874,
                                        "Y": 0.529597818851471
                                    }
                                ]
                            },
                            "Id": "aaa9553f-67f5-413c-8fa8-bbde9aac8099"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.85159301757812,
                            "Text": "elementum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.09028328955173492,
                                    "Height": 0.010030819103121758,
                                    "Left": 0.5079464316368103,
                                    "Top": 0.5196462273597717
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5079464316368103,
                                        "Y": 0.5196837186813354
                                    },
                                    {
                                        "X": 0.5982215404510498,
                                        "Y": 0.5196462273597717
                                    },
                                    {
                                        "X": 0.598229706287384,
                                        "Y": 0.5296382308006287
                                    },
                                    {
                                        "X": 0.5079545974731445,
                                        "Y": 0.5296770334243774
                                    }
                                ]
                            },
                            "Id": "891570f6-a292-4ecc-bb1f-6a9824457ef5"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.27345275878906,
                            "Text": "sapien",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05289437621831894,
                                    "Height": 0.01228814572095871,
                                    "Left": 0.6043994426727295,
                                    "Top": 0.5196496248245239
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6043994426727295,
                                        "Y": 0.519671618938446
                                    },
                                    {
                                        "X": 0.6572838425636292,
                                        "Y": 0.5196496248245239
                                    },
                                    {
                                        "X": 0.6572937965393066,
                                        "Y": 0.5319148898124695
                                    },
                                    {
                                        "X": 0.6044094562530518,
                                        "Y": 0.5319377779960632
                                    }
                                ]
                            },
                            "Id": "cc85b87e-90a7-47d9-8d8d-94e394090099"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7374267578125,
                            "Text": "enim",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03927525505423546,
                                    "Height": 0.009946309961378574,
                                    "Left": 0.663689911365509,
                                    "Top": 0.5196512341499329
                                },
                                "Polygon": [
                                    {
                                        "X": 0.663689911365509,
                                        "Y": 0.5196675658226013
                                    },
                                    {
                                        "X": 0.7029571533203125,
                                        "Y": 0.5196512341499329
                                    },
                                    {
                                        "X": 0.7029651999473572,
                                        "Y": 0.5295807123184204
                                    },
                                    {
                                        "X": 0.6636980175971985,
                                        "Y": 0.5295975804328918
                                    }
                                ]
                            },
                            "Id": "d57abafb-041f-4a2e-9642-927d943d365e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.84764099121094,
                            "Text": "a",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.009606999345123768,
                                    "Height": 0.007895858958363533,
                                    "Left": 0.7089893817901611,
                                    "Top": 0.5218127965927124
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7089893817901611,
                                        "Y": 0.5218167901039124
                                    },
                                    {
                                        "X": 0.7185900211334229,
                                        "Y": 0.5218127965927124
                                    },
                                    {
                                        "X": 0.7185963988304138,
                                        "Y": 0.5297045111656189
                                    },
                                    {
                                        "X": 0.7089957594871521,
                                        "Y": 0.5297086238861084
                                    }
                                ]
                            },
                            "Id": "f5854f33-400f-4148-ac6c-a3bcf4239487"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.2175521850586,
                            "Text": "neque.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.054304737597703934,
                                    "Height": 0.010141144506633282,
                                    "Left": 0.724452555179596,
                                    "Top": 0.5217849016189575
                                },
                                "Polygon": [
                                    {
                                        "X": 0.724452555179596,
                                        "Y": 0.5218076705932617
                                    },
                                    {
                                        "X": 0.7787491679191589,
                                        "Y": 0.5217849016189575
                                    },
                                    {
                                        "X": 0.7787573337554932,
                                        "Y": 0.5319024920463562
                                    },
                                    {
                                        "X": 0.724460780620575,
                                        "Y": 0.5319260358810425
                                    }
                                ]
                            },
                            "Id": "fbfb5ac6-49ba-41d4-be48-15a019691565"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.88570404052734,
                            "Text": "Nam",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.037520311772823334,
                                    "Height": 0.010177808813750744,
                                    "Left": 0.12102735787630081,
                                    "Top": 0.5539682507514954
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12102735787630081,
                                        "Y": 0.5539856553077698
                                    },
                                    {
                                        "X": 0.15853913128376007,
                                        "Y": 0.5539682507514954
                                    },
                                    {
                                        "X": 0.15854766964912415,
                                        "Y": 0.5641281604766846
                                    },
                                    {
                                        "X": 0.12103591114282608,
                                        "Y": 0.5641460418701172
                                    }
                                ]
                            },
                            "Id": "7bb6a8f7-7d59-4221-8d57-cbd9e1850521"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.33475494384766,
                            "Text": "ornare",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05322711914777756,
                                    "Height": 0.008648499846458435,
                                    "Left": 0.16500934958457947,
                                    "Top": 0.5557900667190552
                                },
                                "Polygon": [
                                    {
                                        "X": 0.16500934958457947,
                                        "Y": 0.5558148622512817
                                    },
                                    {
                                        "X": 0.2182292491197586,
                                        "Y": 0.5557900667190552
                                    },
                                    {
                                        "X": 0.21823646128177643,
                                        "Y": 0.5644131302833557
                                    },
                                    {
                                        "X": 0.16501659154891968,
                                        "Y": 0.5644385814666748
                                    }
                                ]
                            },
                            "Id": "f79066fc-925b-4bf2-bde3-2df144c66af4"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.88460540771484,
                            "Text": "ipsum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0483284592628479,
                                    "Height": 0.012453426606953144,
                                    "Left": 0.2228640615940094,
                                    "Top": 0.5540682077407837
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2228640615940094,
                                        "Y": 0.5540906190872192
                                    },
                                    {
                                        "X": 0.2711821496486664,
                                        "Y": 0.5540682077407837
                                    },
                                    {
                                        "X": 0.2711925208568573,
                                        "Y": 0.5664983987808228
                                    },
                                    {
                                        "X": 0.2228744626045227,
                                        "Y": 0.5665216445922852
                                    }
                                ]
                            },
                            "Id": "4723ad54-fe09-4afa-8964-62a38e408285"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.54866027832031,
                            "Text": "sed",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.02848510816693306,
                                    "Height": 0.010091347619891167,
                                    "Left": 0.27752578258514404,
                                    "Top": 0.5540697574615479
                                },
                                "Polygon": [
                                    {
                                        "X": 0.27752578258514404,
                                        "Y": 0.5540829300880432
                                    },
                                    {
                                        "X": 0.30600252747535706,
                                        "Y": 0.5540697574615479
                                    },
                                    {
                                        "X": 0.306010901927948,
                                        "Y": 0.5641474723815918
                                    },
                                    {
                                        "X": 0.2775341868400574,
                                        "Y": 0.5641611218452454
                                    }
                                ]
                            },
                            "Id": "131ba2ba-bfad-4ebf-8691-dbde81d0fc4e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.03178405761719,
                            "Text": "sollicitudin",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08392336219549179,
                                    "Height": 0.01007835753262043,
                                    "Left": 0.31231749057769775,
                                    "Top": 0.5540778040885925
                                },
                                "Polygon": [
                                    {
                                        "X": 0.31231749057769775,
                                        "Y": 0.5541167259216309
                                    },
                                    {
                                        "X": 0.396232545375824,
                                        "Y": 0.5540778040885925
                                    },
                                    {
                                        "X": 0.39624083042144775,
                                        "Y": 0.5641160607337952
                                    },
                                    {
                                        "X": 0.3123258352279663,
                                        "Y": 0.564156174659729
                                    }
                                ]
                            },
                            "Id": "a504b6cb-ad46-4cf3-b6db-fd95ffe9dd3f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.31273651123047,
                            "Text": "lobortis.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06305549293756485,
                                    "Height": 0.01037872489541769,
                                    "Left": 0.40231871604919434,
                                    "Top": 0.5539571642875671
                                },
                                "Polygon": [
                                    {
                                        "X": 0.40231871604919434,
                                        "Y": 0.5539863705635071
                                    },
                                    {
                                        "X": 0.4653657078742981,
                                        "Y": 0.5539571642875671
                                    },
                                    {
                                        "X": 0.4653742015361786,
                                        "Y": 0.5643057227134705
                                    },
                                    {
                                        "X": 0.4023272693157196,
                                        "Y": 0.5643358826637268
                                    }
                                ]
                            },
                            "Id": "c036b455-b28c-4bf2-805a-cdbf945370a8"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.63704681396484,
                            "Text": "Fusce",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04868251830339432,
                                    "Height": 0.010314185172319412,
                                    "Left": 0.4716964662075043,
                                    "Top": 0.5537887811660767
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4716964662075043,
                                        "Y": 0.5538113117218018
                                    },
                                    {
                                        "X": 0.5203705430030823,
                                        "Y": 0.5537887811660767
                                    },
                                    {
                                        "X": 0.5203790068626404,
                                        "Y": 0.5640797019004822
                                    },
                                    {
                                        "X": 0.47170495986938477,
                                        "Y": 0.5641029477119446
                                    }
                                ]
                            },
                            "Id": "24e03d89-02eb-4944-b07a-a2f2df23ddbf"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.95027160644531,
                            "Text": "in",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.013025626540184021,
                                    "Height": 0.009868500754237175,
                                    "Left": 0.5277240872383118,
                                    "Top": 0.5541836619377136
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5277240872383118,
                                        "Y": 0.5541896820068359
                                    },
                                    {
                                        "X": 0.5407416224479675,
                                        "Y": 0.5541836619377136
                                    },
                                    {
                                        "X": 0.5407496690750122,
                                        "Y": 0.5640459060668945
                                    },
                                    {
                                        "X": 0.5277321338653564,
                                        "Y": 0.564052164554596
                                    }
                                ]
                            },
                            "Id": "92581cf0-c264-47b2-8a56-d3137aaf5c22"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.8884506225586,
                            "Text": "erat",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03147922083735466,
                                    "Height": 0.009710763581097126,
                                    "Left": 0.5470299124717712,
                                    "Top": 0.5545663237571716
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5470299124717712,
                                        "Y": 0.5545809268951416
                                    },
                                    {
                                        "X": 0.5785012245178223,
                                        "Y": 0.5545663237571716
                                    },
                                    {
                                        "X": 0.5785091519355774,
                                        "Y": 0.5642620325088501
                                    },
                                    {
                                        "X": 0.5470378994941711,
                                        "Y": 0.5642770528793335
                                    }
                                ]
                            },
                            "Id": "202a6d67-9912-4309-b294-8d682964657f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.69573974609375,
                            "Text": "eu",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.019396133720874786,
                                    "Height": 0.00763129023835063,
                                    "Left": 0.5838859677314758,
                                    "Top": 0.5565133094787598
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5838859677314758,
                                        "Y": 0.5565223693847656
                                    },
                                    {
                                        "X": 0.6032758951187134,
                                        "Y": 0.5565133094787598
                                    },
                                    {
                                        "X": 0.60328209400177,
                                        "Y": 0.5641353130340576
                                    },
                                    {
                                        "X": 0.5838922262191772,
                                        "Y": 0.5641446113586426
                                    }
                                ]
                            },
                            "Id": "da736bb7-db19-45e4-8019-e6ebcfeee409"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.81758117675781,
                            "Text": "purus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04479040205478668,
                                    "Height": 0.01005949079990387,
                                    "Left": 0.6098842620849609,
                                    "Top": 0.5564373135566711
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6098842620849609,
                                        "Y": 0.5564582347869873
                                    },
                                    {
                                        "X": 0.654666543006897,
                                        "Y": 0.5564373135566711
                                    },
                                    {
                                        "X": 0.6546747088432312,
                                        "Y": 0.5664752125740051
                                    },
                                    {
                                        "X": 0.6098924875259399,
                                        "Y": 0.5664967894554138
                                    }
                                ]
                            },
                            "Id": "8efc455f-f1bc-4637-84b1-b1dae673f223"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.05747985839844,
                            "Text": "sollicitudin",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08428669720888138,
                                    "Height": 0.010089358314871788,
                                    "Left": 0.660534679889679,
                                    "Top": 0.5541749596595764
                                },
                                "Polygon": [
                                    {
                                        "X": 0.660534679889679,
                                        "Y": 0.5542140603065491
                                    },
                                    {
                                        "X": 0.7448132634162903,
                                        "Y": 0.5541749596595764
                                    },
                                    {
                                        "X": 0.7448213696479797,
                                        "Y": 0.5642240047454834
                                    },
                                    {
                                        "X": 0.6605428457260132,
                                        "Y": 0.5642642974853516
                                    }
                                ]
                            },
                            "Id": "19cda7d7-211f-4881-bd7a-b1afec4ae5c1"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.45489501953125,
                            "Text": "maximus.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0769926980137825,
                                    "Height": 0.010050750337541103,
                                    "Left": 0.7509927749633789,
                                    "Top": 0.5541843771934509
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7509927749633789,
                                        "Y": 0.5542201399803162
                                    },
                                    {
                                        "X": 0.8279774188995361,
                                        "Y": 0.5541843771934509
                                    },
                                    {
                                        "X": 0.8279854655265808,
                                        "Y": 0.5641983151435852
                                    },
                                    {
                                        "X": 0.7510008811950684,
                                        "Y": 0.5642351508140564
                                    }
                                ]
                            },
                            "Id": "225c377d-7167-46ec-863c-f8350ed10903"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.32097625732422,
                            "Text": "Quisque",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06773691624403,
                                    "Height": 0.01237546093761921,
                                    "Left": 0.1207716315984726,
                                    "Top": 0.5714390277862549
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1207716315984726,
                                        "Y": 0.5714721083641052
                                    },
                                    {
                                        "X": 0.18849819898605347,
                                        "Y": 0.5714390277862549
                                    },
                                    {
                                        "X": 0.1885085552930832,
                                        "Y": 0.5837802886962891
                                    },
                                    {
                                        "X": 0.1207820251584053,
                                        "Y": 0.5838145017623901
                                    }
                                ]
                            },
                            "Id": "fabce796-bcbb-4b7a-9e21-00d239f724f5"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.23994445800781,
                            "Text": "maximus,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07722729444503784,
                                    "Height": 0.011774732731282711,
                                    "Left": 0.1947321593761444,
                                    "Top": 0.5715744495391846
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1947321593761444,
                                        "Y": 0.5716121196746826
                                    },
                                    {
                                        "X": 0.2719496786594391,
                                        "Y": 0.5715744495391846
                                    },
                                    {
                                        "X": 0.27195945382118225,
                                        "Y": 0.5833101868629456
                                    },
                                    {
                                        "X": 0.19474199414253235,
                                        "Y": 0.5833491683006287
                                    }
                                ]
                            },
                            "Id": "acfecb4a-0004-48ed-b9a0-d601cd486020"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.77935791015625,
                            "Text": "leo",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.023467665538191795,
                                    "Height": 0.010426714085042477,
                                    "Left": 0.27857184410095215,
                                    "Top": 0.5714475512504578
                                },
                                "Polygon": [
                                    {
                                        "X": 0.27857184410095215,
                                        "Y": 0.5714589953422546
                                    },
                                    {
                                        "X": 0.3020308315753937,
                                        "Y": 0.5714475512504578
                                    },
                                    {
                                        "X": 0.3020395040512085,
                                        "Y": 0.5818625092506409
                                    },
                                    {
                                        "X": 0.27858051657676697,
                                        "Y": 0.5818743109703064
                                    }
                                ]
                            },
                            "Id": "eeba76c3-3aa0-4db1-8507-abfb71e00de5"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.90355682373047,
                            "Text": "et",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.01522580161690712,
                                    "Height": 0.009783508256077766,
                                    "Left": 0.3081885874271393,
                                    "Top": 0.5718739628791809
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3081885874271393,
                                        "Y": 0.5718813538551331
                                    },
                                    {
                                        "X": 0.32340624928474426,
                                        "Y": 0.5718739628791809
                                    },
                                    {
                                        "X": 0.3234143853187561,
                                        "Y": 0.5816497802734375
                                    },
                                    {
                                        "X": 0.30819669365882874,
                                        "Y": 0.5816574692726135
                                    }
                                ]
                            },
                            "Id": "4b705bb6-f27d-47be-bd1f-e3a2debadcda"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.39984130859375,
                            "Text": "feugiat",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.055827509611845016,
                                    "Height": 0.012719998136162758,
                                    "Left": 0.328172892332077,
                                    "Top": 0.5712886452674866
                                },
                                "Polygon": [
                                    {
                                        "X": 0.328172892332077,
                                        "Y": 0.5713158249855042
                                    },
                                    {
                                        "X": 0.3839899003505707,
                                        "Y": 0.5712886452674866
                                    },
                                    {
                                        "X": 0.38400039076805115,
                                        "Y": 0.5839803814888
                                    },
                                    {
                                        "X": 0.32818344235420227,
                                        "Y": 0.5840086340904236
                                    }
                                ]
                            },
                            "Id": "86bd7b80-b8a0-4e80-845a-625560e610f8"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.66127014160156,
                            "Text": "feugiat,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05966654047369957,
                                    "Height": 0.012693878263235092,
                                    "Left": 0.38875916600227356,
                                    "Top": 0.5713523626327515
                                },
                                "Polygon": [
                                    {
                                        "X": 0.38875916600227356,
                                        "Y": 0.5713815093040466
                                    },
                                    {
                                        "X": 0.44841527938842773,
                                        "Y": 0.5713523626327515
                                    },
                                    {
                                        "X": 0.4484257102012634,
                                        "Y": 0.5840160846710205
                                    },
                                    {
                                        "X": 0.38876965641975403,
                                        "Y": 0.5840462446212769
                                    }
                                ]
                            },
                            "Id": "5f74ad76-1990-4058-a9fb-3ba71024c3c8"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.90933227539062,
                            "Text": "nibh",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03355853632092476,
                                    "Height": 0.010140074416995049,
                                    "Left": 0.4549277722835541,
                                    "Top": 0.5715086460113525
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4549277722835541,
                                        "Y": 0.5715250372886658
                                    },
                                    {
                                        "X": 0.4884779751300812,
                                        "Y": 0.5715086460113525
                                    },
                                    {
                                        "X": 0.48848628997802734,
                                        "Y": 0.5816318392753601
                                    },
                                    {
                                        "X": 0.45493611693382263,
                                        "Y": 0.5816487073898315
                                    }
                                ]
                            },
                            "Id": "697cd574-c57c-4943-bb3e-595e23bcbd3d"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.73806762695312,
                            "Text": "lectus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04718876630067825,
                                    "Height": 0.010156678967177868,
                                    "Left": 0.49489307403564453,
                                    "Top": 0.5715809464454651
                                },
                                "Polygon": [
                                    {
                                        "X": 0.49489307403564453,
                                        "Y": 0.5716039538383484
                                    },
                                    {
                                        "X": 0.5420735478401184,
                                        "Y": 0.5715809464454651
                                    },
                                    {
                                        "X": 0.5420818328857422,
                                        "Y": 0.5817139148712158
                                    },
                                    {
                                        "X": 0.4949013888835907,
                                        "Y": 0.5817375779151917
                                    }
                                ]
                            },
                            "Id": "9aa72cd5-13f1-4b3b-b222-1d5450804264"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.44176483154297,
                            "Text": "viverra",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05485080927610397,
                                    "Height": 0.010091339237987995,
                                    "Left": 0.5476421117782593,
                                    "Top": 0.5716469883918762
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5476421117782593,
                                        "Y": 0.5716738104820251
                                    },
                                    {
                                        "X": 0.6024847030639648,
                                        "Y": 0.5716469883918762
                                    },
                                    {
                                        "X": 0.6024928689002991,
                                        "Y": 0.5817107558250427
                                    },
                                    {
                                        "X": 0.5476503372192383,
                                        "Y": 0.5817383527755737
                                    }
                                ]
                            },
                            "Id": "90b2e3ba-a588-4c74-bf64-535db96b3f88"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.2070083618164,
                            "Text": "nibh,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03805676847696304,
                                    "Height": 0.011637866497039795,
                                    "Left": 0.6087503433227539,
                                    "Top": 0.5715509653091431
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6087503433227539,
                                        "Y": 0.571569561958313
                                    },
                                    {
                                        "X": 0.6467976570129395,
                                        "Y": 0.5715509653091431
                                    },
                                    {
                                        "X": 0.646807074546814,
                                        "Y": 0.5831696391105652
                                    },
                                    {
                                        "X": 0.6087598204612732,
                                        "Y": 0.5831888318061829
                                    }
                                ]
                            },
                            "Id": "2cfceca8-de35-4c8a-93b1-f6c1690906d1"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.99681091308594,
                            "Text": "aliquet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05439688265323639,
                                    "Height": 0.012285487726330757,
                                    "Left": 0.653526246547699,
                                    "Top": 0.5715004205703735
                                },
                                "Polygon": [
                                    {
                                        "X": 0.653526246547699,
                                        "Y": 0.5715270042419434
                                    },
                                    {
                                        "X": 0.7079132199287415,
                                        "Y": 0.5715004205703735
                                    },
                                    {
                                        "X": 0.707923173904419,
                                        "Y": 0.5837584137916565
                                    },
                                    {
                                        "X": 0.6535362601280212,
                                        "Y": 0.583785891532898
                                    }
                                ]
                            },
                            "Id": "f97e62d5-0cd4-426b-b3a8-aa8a83bb96ce"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.53414916992188,
                            "Text": "lacinia",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05143186077475548,
                                    "Height": 0.010352090932428837,
                                    "Left": 0.7131456732749939,
                                    "Top": 0.5713823437690735
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7131456732749939,
                                        "Y": 0.5714074969291687
                                    },
                                    {
                                        "X": 0.7645692229270935,
                                        "Y": 0.5713823437690735
                                    },
                                    {
                                        "X": 0.7645775675773621,
                                        "Y": 0.5817086100578308
                                    },
                                    {
                                        "X": 0.7131540775299072,
                                        "Y": 0.5817344784736633
                                    }
                                ]
                            },
                            "Id": "cc2411b9-b779-491f-a3f4-24882614f600"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.89144897460938,
                            "Text": "ipsum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04839608073234558,
                                    "Height": 0.012246483005583286,
                                    "Left": 0.7703079581260681,
                                    "Top": 0.5715003609657288
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7703079581260681,
                                        "Y": 0.5715239644050598
                                    },
                                    {
                                        "X": 0.8186942338943481,
                                        "Y": 0.5715003609657288
                                    },
                                    {
                                        "X": 0.8187040686607361,
                                        "Y": 0.5837223529815674
                                    },
                                    {
                                        "X": 0.7703178524971008,
                                        "Y": 0.5837468504905701
                                    }
                                ]
                            },
                            "Id": "e73e170d-4cf7-47b3-b936-e6d273042aa9"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.89979553222656,
                            "Text": "metus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04908721148967743,
                                    "Height": 0.00991007499396801,
                                    "Left": 0.8249452710151672,
                                    "Top": 0.5718603730201721
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8249452710151672,
                                        "Y": 0.5718843936920166
                                    },
                                    {
                                        "X": 0.8740245699882507,
                                        "Y": 0.5718603730201721
                                    },
                                    {
                                        "X": 0.8740324974060059,
                                        "Y": 0.5817458033561707
                                    },
                                    {
                                        "X": 0.8249532580375671,
                                        "Y": 0.5817704796791077
                                    }
                                ]
                            },
                            "Id": "e97e4e89-5d4c-49fe-a29c-d1ba78b42659"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7455825805664,
                            "Text": "non",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.029038293287158012,
                                    "Height": 0.007649414706975222,
                                    "Left": 0.12101706117391586,
                                    "Top": 0.5909956097602844
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12101706117391586,
                                        "Y": 0.591010570526123
                                    },
                                    {
                                        "X": 0.15004894137382507,
                                        "Y": 0.5909956097602844
                                    },
                                    {
                                        "X": 0.15005534887313843,
                                        "Y": 0.5986297726631165
                                    },
                                    {
                                        "X": 0.12102348357439041,
                                        "Y": 0.598645031452179
                                    }
                                ]
                            },
                            "Id": "a5e3398e-2916-4836-bc7b-d50e29de793f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 94.54946899414062,
                            "Text": "risus.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04237178713083267,
                                    "Height": 0.0100999865680933,
                                    "Left": 0.15654656291007996,
                                    "Top": 0.5887054204940796
                                },
                                "Polygon": [
                                    {
                                        "X": 0.15654656291007996,
                                        "Y": 0.5887271165847778
                                    },
                                    {
                                        "X": 0.1989099085330963,
                                        "Y": 0.5887054204940796
                                    },
                                    {
                                        "X": 0.19891835749149323,
                                        "Y": 0.5987831354141235
                                    },
                                    {
                                        "X": 0.15655502676963806,
                                        "Y": 0.5988054275512695
                                    }
                                ]
                            },
                            "Id": "5f43cdc0-2a8e-46a8-a8eb-9a08ab34138c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.44742584228516,
                            "Text": "Etiam",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04581163078546524,
                                    "Height": 0.010212363675236702,
                                    "Left": 0.20623894035816193,
                                    "Top": 0.5885167717933655
                                },
                                "Polygon": [
                                    {
                                        "X": 0.20623894035816193,
                                        "Y": 0.5885401964187622
                                    },
                                    {
                                        "X": 0.2520420551300049,
                                        "Y": 0.5885167717933655
                                    },
                                    {
                                        "X": 0.25205057859420776,
                                        "Y": 0.5987050533294678
                                    },
                                    {
                                        "X": 0.206247478723526,
                                        "Y": 0.598729133605957
                                    }
                                ]
                            },
                            "Id": "a96ffc51-d445-4f5c-b391-47933fe53663"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.19414520263672,
                            "Text": "malesuada",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08921762555837631,
                                    "Height": 0.010205499827861786,
                                    "Left": 0.2582923471927643,
                                    "Top": 0.5886361002922058
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2582923471927643,
                                        "Y": 0.5886818170547485
                                    },
                                    {
                                        "X": 0.3475015461444855,
                                        "Y": 0.5886361002922058
                                    },
                                    {
                                        "X": 0.3475099802017212,
                                        "Y": 0.59879469871521
                                    },
                                    {
                                        "X": 0.2583008408546448,
                                        "Y": 0.5988416075706482
                                    }
                                ]
                            },
                            "Id": "23208148-2d1e-445c-9374-11e5470d1900"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.90520477294922,
                            "Text": "sit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.018949490040540695,
                                    "Height": 0.01011599600315094,
                                    "Left": 0.35279715061187744,
                                    "Top": 0.5886775255203247
                                },
                                "Polygon": [
                                    {
                                        "X": 0.35279715061187744,
                                        "Y": 0.5886872410774231
                                    },
                                    {
                                        "X": 0.3717382550239563,
                                        "Y": 0.5886775255203247
                                    },
                                    {
                                        "X": 0.37174662947654724,
                                        "Y": 0.598783552646637
                                    },
                                    {
                                        "X": 0.3528055250644684,
                                        "Y": 0.5987935066223145
                                    }
                                ]
                            },
                            "Id": "a326c41a-c6db-4316-9d03-859adf41fe67"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.52214050292969,
                            "Text": "amet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.040965937077999115,
                                    "Height": 0.009899257682263851,
                                    "Left": 0.3768783211708069,
                                    "Top": 0.5889183282852173
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3768783211708069,
                                        "Y": 0.5889393091201782
                                    },
                                    {
                                        "X": 0.41783609986305237,
                                        "Y": 0.5889183282852173
                                    },
                                    {
                                        "X": 0.4178442656993866,
                                        "Y": 0.5987960696220398
                                    },
                                    {
                                        "X": 0.3768864870071411,
                                        "Y": 0.5988175868988037
                                    }
                                ]
                            },
                            "Id": "3e8065d9-61a2-44cf-b8fb-fcc4113c8ad1"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.58390045166016,
                            "Text": "quam",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04498816654086113,
                                    "Height": 0.010299891233444214,
                                    "Left": 0.4230380654335022,
                                    "Top": 0.5908002853393555
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4230380654335022,
                                        "Y": 0.5908234119415283
                                    },
                                    {
                                        "X": 0.4680177569389343,
                                        "Y": 0.5908002853393555
                                    },
                                    {
                                        "X": 0.46802622079849243,
                                        "Y": 0.6010763645172119
                                    },
                                    {
                                        "X": 0.4230465292930603,
                                        "Y": 0.6011001467704773
                                    }
                                ]
                            },
                            "Id": "8e596bd6-4d5b-4521-87da-678bebfc1e7c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.70956420898438,
                            "Text": "quis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.032924290746450424,
                                    "Height": 0.012520131655037403,
                                    "Left": 0.4742598235607147,
                                    "Top": 0.5886589288711548
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4742598235607147,
                                        "Y": 0.5886757969856262
                                    },
                                    {
                                        "X": 0.5071738362312317,
                                        "Y": 0.5886589288711548
                                    },
                                    {
                                        "X": 0.5071840882301331,
                                        "Y": 0.6011616587638855
                                    },
                                    {
                                        "X": 0.4742701053619385,
                                        "Y": 0.6011790633201599
                                    }
                                ]
                            },
                            "Id": "7160de9f-a2f2-41a0-b80c-f6177cc3da36"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.3353042602539,
                            "Text": "dignissim.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08105427026748657,
                                    "Height": 0.01311399694532156,
                                    "Left": 0.5127074122428894,
                                    "Top": 0.5884274840354919
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5127074122428894,
                                        "Y": 0.5884689688682556
                                    },
                                    {
                                        "X": 0.5937510132789612,
                                        "Y": 0.5884274840354919
                                    },
                                    {
                                        "X": 0.593761682510376,
                                        "Y": 0.601498544216156
                                    },
                                    {
                                        "X": 0.512718141078949,
                                        "Y": 0.6015415191650391
                                    }
                                ]
                            },
                            "Id": "e35805ae-8324-4750-ae6a-9ea7a78849aa"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.14580535888672,
                            "Text": "Nulla",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04282579943537712,
                                    "Height": 0.010207749903202057,
                                    "Left": 0.5983145833015442,
                                    "Top": 0.5883448123931885
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5983145833015442,
                                        "Y": 0.588366687297821
                                    },
                                    {
                                        "X": 0.641132116317749,
                                        "Y": 0.5883448123931885
                                    },
                                    {
                                        "X": 0.6411404013633728,
                                        "Y": 0.5985300540924072
                                    },
                                    {
                                        "X": 0.5983229279518127,
                                        "Y": 0.5985525250434875
                                    }
                                ]
                            },
                            "Id": "692b26cf-827f-489f-9915-b2ca62645e4d"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.89481353759766,
                            "Text": "et",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.015459036454558372,
                                    "Height": 0.009846421889960766,
                                    "Left": 0.6473488807678223,
                                    "Top": 0.588915228843689
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6473488807678223,
                                        "Y": 0.5889231562614441
                                    },
                                    {
                                        "X": 0.6627998948097229,
                                        "Y": 0.588915228843689
                                    },
                                    {
                                        "X": 0.6628079414367676,
                                        "Y": 0.5987535119056702
                                    },
                                    {
                                        "X": 0.6473568677902222,
                                        "Y": 0.5987616777420044
                                    }
                                ]
                            },
                            "Id": "74c652b6-9a9c-4da3-8228-e68003dd70ee"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.56108856201172,
                            "Text": "urna",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03597819805145264,
                                    "Height": 0.007932186126708984,
                                    "Left": 0.6680599451065063,
                                    "Top": 0.5908441543579102
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6680599451065063,
                                        "Y": 0.5908626914024353
                                    },
                                    {
                                        "X": 0.7040317058563232,
                                        "Y": 0.5908441543579102
                                    },
                                    {
                                        "X": 0.704038143157959,
                                        "Y": 0.5987574458122253
                                    },
                                    {
                                        "X": 0.6680663824081421,
                                        "Y": 0.5987763404846191
                                    }
                                ]
                            },
                            "Id": "1acf2b95-5674-4977-8c34-2c3cc618ba4f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.51618194580078,
                            "Text": "mattis,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05253051966428757,
                                    "Height": 0.011662285774946213,
                                    "Left": 0.7102042436599731,
                                    "Top": 0.5887281894683838
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7102042436599731,
                                        "Y": 0.5887550711631775
                                    },
                                    {
                                        "X": 0.7627253532409668,
                                        "Y": 0.5887281894683838
                                    },
                                    {
                                        "X": 0.7627347707748413,
                                        "Y": 0.6003627181053162
                                    },
                                    {
                                        "X": 0.7102136611938477,
                                        "Y": 0.6003904342651367
                                    }
                                ]
                            },
                            "Id": "b5ff1951-f9ee-49c0-b882-10b90179e44e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.87757110595703,
                            "Text": "auctor",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05120789632201195,
                                    "Height": 0.00975270289927721,
                                    "Left": 0.7693427205085754,
                                    "Top": 0.5890055894851685
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7693427205085754,
                                        "Y": 0.5890318751335144
                                    },
                                    {
                                        "X": 0.8205428123474121,
                                        "Y": 0.5890055894851685
                                    },
                                    {
                                        "X": 0.8205506205558777,
                                        "Y": 0.5987313389778137
                                    },
                                    {
                                        "X": 0.769350528717041,
                                        "Y": 0.598758339881897
                                    }
                                ]
                            },
                            "Id": "9adcbbe0-2261-45d0-9da6-18dbdbf3550c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.43548583984375,
                            "Text": "dui",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.02382086031138897,
                                    "Height": 0.010195493698120117,
                                    "Left": 0.8256461024284363,
                                    "Top": 0.5885260701179504
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8256461024284363,
                                        "Y": 0.5885382890701294
                                    },
                                    {
                                        "X": 0.8494587540626526,
                                        "Y": 0.5885260701179504
                                    },
                                    {
                                        "X": 0.8494669198989868,
                                        "Y": 0.5987090468406677
                                    },
                                    {
                                        "X": 0.8256542682647705,
                                        "Y": 0.5987215638160706
                                    }
                                ]
                            },
                            "Id": "d483c0c6-c53f-4920-83ce-f3a86afee81c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.18567657470703,
                            "Text": "non,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.033970266580581665,
                                    "Height": 0.009562031365931034,
                                    "Left": 0.1207428053021431,
                                    "Top": 0.6079667806625366
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1207428053021431,
                                        "Y": 0.6079850792884827
                                    },
                                    {
                                        "X": 0.15470504760742188,
                                        "Y": 0.6079667806625366
                                    },
                                    {
                                        "X": 0.15471306443214417,
                                        "Y": 0.6175100803375244
                                    },
                                    {
                                        "X": 0.12075083702802658,
                                        "Y": 0.6175288558006287
                                    }
                                ]
                            },
                            "Id": "5e6c5ef1-02dd-4626-893d-79cd831447f3"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.34052276611328,
                            "Text": "ornare",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.052764274179935455,
                                    "Height": 0.008102275431156158,
                                    "Left": 0.1614350527524948,
                                    "Top": 0.6080777049064636
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1614350527524948,
                                        "Y": 0.6081061363220215
                                    },
                                    {
                                        "X": 0.21419256925582886,
                                        "Y": 0.6080777049064636
                                    },
                                    {
                                        "X": 0.21419931948184967,
                                        "Y": 0.6161509156227112
                                    },
                                    {
                                        "X": 0.161441832780838,
                                        "Y": 0.6161799430847168
                                    }
                                ]
                            },
                            "Id": "4655d09f-a569-4e0c-aa05-60947b160892"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.30555725097656,
                            "Text": "mi.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.022519076243042946,
                                    "Height": 0.00986282154917717,
                                    "Left": 0.22029836475849152,
                                    "Top": 0.6062544584274292
                                },
                                "Polygon": [
                                    {
                                        "X": 0.22029836475849152,
                                        "Y": 0.6062664985656738
                                    },
                                    {
                                        "X": 0.2428092062473297,
                                        "Y": 0.6062544584274292
                                    },
                                    {
                                        "X": 0.24281743168830872,
                                        "Y": 0.6161048412322998
                                    },
                                    {
                                        "X": 0.2203066051006317,
                                        "Y": 0.6161172389984131
                                    }
                                ]
                            },
                            "Id": "b2b34cb5-693a-4197-a084-ad9c8700b924"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.75464630126953,
                            "Text": "Sed",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.031258076429367065,
                                    "Height": 0.01008552685379982,
                                    "Left": 0.25014445185661316,
                                    "Top": 0.6059839725494385
                                },
                                "Polygon": [
                                    {
                                        "X": 0.25014445185661316,
                                        "Y": 0.6060007214546204
                                    },
                                    {
                                        "X": 0.2813941240310669,
                                        "Y": 0.6059839725494385
                                    },
                                    {
                                        "X": 0.2814025282859802,
                                        "Y": 0.6160523295402527
                                    },
                                    {
                                        "X": 0.2501528561115265,
                                        "Y": 0.616069495677948
                                    }
                                ]
                            },
                            "Id": "0864914b-c6c8-432f-8fe0-9633d9e8bb78"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.22178649902344,
                            "Text": "imperdiet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.07598365843296051,
                                    "Height": 0.012289589270949364,
                                    "Left": 0.28754761815071106,
                                    "Top": 0.6060271859169006
                                },
                                "Polygon": [
                                    {
                                        "X": 0.28754761815071106,
                                        "Y": 0.606067955493927
                                    },
                                    {
                                        "X": 0.36352112889289856,
                                        "Y": 0.6060271859169006
                                    },
                                    {
                                        "X": 0.36353129148483276,
                                        "Y": 0.6182747483253479
                                    },
                                    {
                                        "X": 0.28755784034729004,
                                        "Y": 0.6183167695999146
                                    }
                                ]
                            },
                            "Id": "fb2d6c0e-10f3-4e5f-a7f0-faa4983e120b"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.3799819946289,
                            "Text": "dui",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.023820865899324417,
                                    "Height": 0.010014049708843231,
                                    "Left": 0.3686147630214691,
                                    "Top": 0.6061782836914062
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3686147630214691,
                                        "Y": 0.6061910390853882
                                    },
                                    {
                                        "X": 0.39242735505104065,
                                        "Y": 0.6061782836914062
                                    },
                                    {
                                        "X": 0.39243561029434204,
                                        "Y": 0.6161792278289795
                                    },
                                    {
                                        "X": 0.3686230480670929,
                                        "Y": 0.6161923408508301
                                    }
                                ]
                            },
                            "Id": "9641e6a9-665f-4513-b52f-39a0b900ecb8"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.98670196533203,
                            "Text": "sollicitudin",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08408331871032715,
                                    "Height": 0.010259576141834259,
                                    "Left": 0.39827534556388855,
                                    "Top": 0.6059749722480774
                                },
                                "Polygon": [
                                    {
                                        "X": 0.39827534556388855,
                                        "Y": 0.6060200333595276
                                    },
                                    {
                                        "X": 0.48235028982162476,
                                        "Y": 0.6059749722480774
                                    },
                                    {
                                        "X": 0.4823586642742157,
                                        "Y": 0.6161882281303406
                                    },
                                    {
                                        "X": 0.39828380942344666,
                                        "Y": 0.616234540939331
                                    }
                                ]
                            },
                            "Id": "6e3c8d40-3b07-45c7-b92f-e1947b4595b3"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.46927642822266,
                            "Text": "laoreet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05658827722072601,
                                    "Height": 0.010259440168738365,
                                    "Left": 0.48828762769699097,
                                    "Top": 0.6060229539871216
                                },
                                "Polygon": [
                                    {
                                        "X": 0.48828762769699097,
                                        "Y": 0.606053352355957
                                    },
                                    {
                                        "X": 0.5448675155639648,
                                        "Y": 0.6060229539871216
                                    },
                                    {
                                        "X": 0.5448759198188782,
                                        "Y": 0.6162512302398682
                                    },
                                    {
                                        "X": 0.4882960319519043,
                                        "Y": 0.6162824034690857
                                    }
                                ]
                            },
                            "Id": "34b87aad-a589-468c-909d-2b0207e8e2a9"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.20198822021484,
                            "Text": "elementum.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.09547556936740875,
                                    "Height": 0.01055677980184555,
                                    "Left": 0.5497307181358337,
                                    "Top": 0.605928897857666
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5497307181358337,
                                        "Y": 0.6059800982475281
                                    },
                                    {
                                        "X": 0.6451977491378784,
                                        "Y": 0.605928897857666
                                    },
                                    {
                                        "X": 0.6452062726020813,
                                        "Y": 0.6164330840110779
                                    },
                                    {
                                        "X": 0.5497393012046814,
                                        "Y": 0.6164856553077698
                                    }
                                ]
                            },
                            "Id": "6dc1c11f-42b9-454e-a287-fd850b902ef5"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.3984146118164,
                            "Text": "Cras",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03756178915500641,
                                    "Height": 0.010251257568597794,
                                    "Left": 0.6519350409507751,
                                    "Top": 0.6059839129447937
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6519350409507751,
                                        "Y": 0.6060040593147278
                                    },
                                    {
                                        "X": 0.6894885301589966,
                                        "Y": 0.6059839129447937
                                    },
                                    {
                                        "X": 0.6894968152046204,
                                        "Y": 0.6162145137786865
                                    },
                                    {
                                        "X": 0.6519433259963989,
                                        "Y": 0.6162351965904236
                                    }
                                ]
                            },
                            "Id": "7e9d30ed-10ca-46f5-8f17-e67cc12c4c38"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.88557434082031,
                            "Text": "at",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.015366453677415848,
                                    "Height": 0.009800177067518234,
                                    "Left": 0.695656955242157,
                                    "Top": 0.6064530611038208
                                },
                                "Polygon": [
                                    {
                                        "X": 0.695656955242157,
                                        "Y": 0.6064613461494446
                                    },
                                    {
                                        "X": 0.7110154628753662,
                                        "Y": 0.6064530611038208
                                    },
                                    {
                                        "X": 0.7110233902931213,
                                        "Y": 0.6162447929382324
                                    },
                                    {
                                        "X": 0.6956648826599121,
                                        "Y": 0.6162532567977905
                                    }
                                ]
                            },
                            "Id": "2a741eea-aac2-490c-9e2e-b2a40699e003"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.69889831542969,
                            "Text": "gravida",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.059635985642671585,
                                    "Height": 0.012585426680743694,
                                    "Left": 0.7160446643829346,
                                    "Top": 0.6059998869895935
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7160446643829346,
                                        "Y": 0.6060318946838379
                                    },
                                    {
                                        "X": 0.7756705284118652,
                                        "Y": 0.6059998869895935
                                    },
                                    {
                                        "X": 0.775680661201477,
                                        "Y": 0.6185522675514221
                                    },
                                    {
                                        "X": 0.7160548567771912,
                                        "Y": 0.6185853481292725
                                    }
                                ]
                            },
                            "Id": "d8dbdbc2-232d-4325-a0a7-b20764a4441e"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.55543518066406,
                            "Text": "tortor.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04580986127257347,
                                    "Height": 0.009901627898216248,
                                    "Left": 0.7814407348632812,
                                    "Top": 0.606302797794342
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7814407348632812,
                                        "Y": 0.6063273549079895
                                    },
                                    {
                                        "X": 0.8272426724433899,
                                        "Y": 0.606302797794342
                                    },
                                    {
                                        "X": 0.827250599861145,
                                        "Y": 0.6161791682243347
                                    },
                                    {
                                        "X": 0.7814487218856812,
                                        "Y": 0.6162043809890747
                                    }
                                ]
                            },
                            "Id": "c06b05bf-831a-4b81-821a-ee8b58c5e360"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.26105499267578,
                            "Text": "Suspendisse",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.10475769639015198,
                                    "Height": 0.012713213451206684,
                                    "Left": 0.12074673920869827,
                                    "Top": 0.6230903267860413
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12074673920869827,
                                        "Y": 0.6231489777565002
                                    },
                                    {
                                        "X": 0.22549386322498322,
                                        "Y": 0.6230903267860413
                                    },
                                    {
                                        "X": 0.22550444304943085,
                                        "Y": 0.6357430219650269
                                    },
                                    {
                                        "X": 0.12075739353895187,
                                        "Y": 0.6358035206794739
                                    }
                                ]
                            },
                            "Id": "3c0f9b7a-8252-4d9e-b883-6de77d51f645"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.50468444824219,
                            "Text": "consectetur",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0956222265958786,
                                    "Height": 0.009978641755878925,
                                    "Left": 0.2311743050813675,
                                    "Top": 0.6236339807510376
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2311743050813675,
                                        "Y": 0.6236875653266907
                                    },
                                    {
                                        "X": 0.3267882764339447,
                                        "Y": 0.6236339807510376
                                    },
                                    {
                                        "X": 0.3267965316772461,
                                        "Y": 0.6335576772689819
                                    },
                                    {
                                        "X": 0.23118259012699127,
                                        "Y": 0.6336125731468201
                                    }
                                ]
                            },
                            "Id": "e2222a52-bdb6-48a1-b8d1-d69c48851726"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.70040893554688,
                            "Text": "ultricies",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0615907721221447,
                                    "Height": 0.01010282151401043,
                                    "Left": 0.3318077325820923,
                                    "Top": 0.623437225818634
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3318077325820923,
                                        "Y": 0.623471736907959
                                    },
                                    {
                                        "X": 0.3933901786804199,
                                        "Y": 0.623437225818634
                                    },
                                    {
                                        "X": 0.3933985233306885,
                                        "Y": 0.6335046887397766
                                    },
                                    {
                                        "X": 0.3318161070346832,
                                        "Y": 0.6335400342941284
                                    }
                                ]
                            },
                            "Id": "cf7bc8fd-8d20-4333-8187-8e80422a3c28"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.87138366699219,
                            "Text": "lacus,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.046643976122140884,
                                    "Height": 0.011706151068210602,
                                    "Left": 0.399490624666214,
                                    "Top": 0.623356819152832
                                },
                                "Polygon": [
                                    {
                                        "X": 0.399490624666214,
                                        "Y": 0.6233829855918884
                                    },
                                    {
                                        "X": 0.44612497091293335,
                                        "Y": 0.623356819152832
                                    },
                                    {
                                        "X": 0.4461345970630646,
                                        "Y": 0.6350361108779907
                                    },
                                    {
                                        "X": 0.3995002806186676,
                                        "Y": 0.6350629925727844
                                    }
                                ]
                            },
                            "Id": "83c05ca2-dedb-46d0-92f2-28af8ae5042a"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.7439956665039,
                            "Text": "vitae",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03843275085091591,
                                    "Height": 0.009999231435358524,
                                    "Left": 0.4523071050643921,
                                    "Top": 0.623509407043457
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4523071050643921,
                                        "Y": 0.623530924320221
                                    },
                                    {
                                        "X": 0.4907316565513611,
                                        "Y": 0.623509407043457
                                    },
                                    {
                                        "X": 0.4907398521900177,
                                        "Y": 0.6334865689277649
                                    },
                                    {
                                        "X": 0.4523153305053711,
                                        "Y": 0.6335086226463318
                                    }
                                ]
                            },
                            "Id": "274f0f50-63ff-40ea-86bf-3d9016b6e0ef"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 98.07484436035156,
                            "Text": "convallis",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06959167867898941,
                                    "Height": 0.010197700932621956,
                                    "Left": 0.4968492090702057,
                                    "Top": 0.6234158873558044
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4968492090702057,
                                        "Y": 0.6234549283981323
                                    },
                                    {
                                        "X": 0.5664325952529907,
                                        "Y": 0.6234158873558044
                                    },
                                    {
                                        "X": 0.5664408802986145,
                                        "Y": 0.633573591709137
                                    },
                                    {
                                        "X": 0.49685755372047424,
                                        "Y": 0.6336135864257812
                                    }
                                ]
                            },
                            "Id": "661612a0-98bc-444f-ac52-5c6cd6997829"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.83328247070312,
                            "Text": "nibh",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03322167322039604,
                                    "Height": 0.010024885646998882,
                                    "Left": 0.5730406045913696,
                                    "Top": 0.6233663558959961
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5730406045913696,
                                        "Y": 0.623384952545166
                                    },
                                    {
                                        "X": 0.6062541007995605,
                                        "Y": 0.6233663558959961
                                    },
                                    {
                                        "X": 0.6062622666358948,
                                        "Y": 0.6333721280097961
                                    },
                                    {
                                        "X": 0.5730487704277039,
                                        "Y": 0.6333912014961243
                                    }
                                ]
                            },
                            "Id": "4e8c0f24-da1c-4dbb-bc5b-9194cfe9c58d"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.70819091796875,
                            "Text": "condimentum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.1096690371632576,
                                    "Height": 0.010410351678729057,
                                    "Left": 0.6125869750976562,
                                    "Top": 0.6233583092689514
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6125869750976562,
                                        "Y": 0.6234198212623596
                                    },
                                    {
                                        "X": 0.7222476005554199,
                                        "Y": 0.6233583092689514
                                    },
                                    {
                                        "X": 0.7222560048103333,
                                        "Y": 0.6337056159973145
                                    },
                                    {
                                        "X": 0.6125953793525696,
                                        "Y": 0.6337686777114868
                                    }
                                ]
                            },
                            "Id": "63f4aa12-912e-4c92-b05b-a359e1b4b4a4"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.50812530517578,
                            "Text": "eget.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.038502100855112076,
                                    "Height": 0.011931302957236767,
                                    "Left": 0.7287957072257996,
                                    "Top": 0.6242026090621948
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7287957072257996,
                                        "Y": 0.6242242455482483
                                    },
                                    {
                                        "X": 0.7672882080078125,
                                        "Y": 0.6242026090621948
                                    },
                                    {
                                        "X": 0.7672978043556213,
                                        "Y": 0.6361116766929626
                                    },
                                    {
                                        "X": 0.7288053631782532,
                                        "Y": 0.6361339092254639
                                    }
                                ]
                            },
                            "Id": "959666c0-1a29-4f67-babf-5b987c239ee4"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.80084991455078,
                            "Text": "Proin",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.041654735803604126,
                                    "Height": 0.010088118724524975,
                                    "Left": 0.7749755382537842,
                                    "Top": 0.6233752369880676
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7749755382537842,
                                        "Y": 0.6233985424041748
                                    },
                                    {
                                        "X": 0.8166221976280212,
                                        "Y": 0.6233752369880676
                                    },
                                    {
                                        "X": 0.8166303038597107,
                                        "Y": 0.6334394216537476
                                    },
                                    {
                                        "X": 0.7749836444854736,
                                        "Y": 0.6334633231163025
                                    }
                                ]
                            },
                            "Id": "4bdc5123-4779-4492-83c1-4899fcd31d3b"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.57291412353516,
                            "Text": "velit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.03260170668363571,
                                    "Height": 0.009882643818855286,
                                    "Left": 0.8224703073501587,
                                    "Top": 0.6235283017158508
                                },
                                "Polygon": [
                                    {
                                        "X": 0.8224703073501587,
                                        "Y": 0.6235466003417969
                                    },
                                    {
                                        "X": 0.8550640940666199,
                                        "Y": 0.6235283017158508
                                    },
                                    {
                                        "X": 0.855072021484375,
                                        "Y": 0.6333922147750854
                                    },
                                    {
                                        "X": 0.8224782347679138,
                                        "Y": 0.6334109306335449
                                    }
                                ]
                            },
                            "Id": "8937529d-28bb-4a31-93d4-1ea6cbc10349"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.34271240234375,
                            "Text": "elit,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.02707313373684883,
                                    "Height": 0.011762372218072414,
                                    "Left": 0.1205323189496994,
                                    "Top": 0.6404869556427002
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1205323189496994,
                                        "Y": 0.6405027508735657
                                    },
                                    {
                                        "X": 0.1475955843925476,
                                        "Y": 0.6404869556427002
                                    },
                                    {
                                        "X": 0.14760544896125793,
                                        "Y": 0.6522330641746521
                                    },
                                    {
                                        "X": 0.12054220587015152,
                                        "Y": 0.6522493362426758
                                    }
                                ]
                            },
                            "Id": "f5ee01ee-c510-47c4-b741-6868db660684"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.84782409667969,
                            "Text": "elementum",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.09063379466533661,
                                    "Height": 0.010105880908668041,
                                    "Left": 0.15407289564609528,
                                    "Top": 0.6405251622200012
                                },
                                "Polygon": [
                                    {
                                        "X": 0.15407289564609528,
                                        "Y": 0.6405780911445618
                                    },
                                    {
                                        "X": 0.24469830095767975,
                                        "Y": 0.6405251622200012
                                    },
                                    {
                                        "X": 0.24470669031143188,
                                        "Y": 0.6505767703056335
                                    },
                                    {
                                        "X": 0.1540813446044922,
                                        "Y": 0.6506310105323792
                                    }
                                ]
                            },
                            "Id": "1e30420f-29ad-4dab-b000-03d8c394e39c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.925537109375,
                            "Text": "sit",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.018410759046673775,
                                    "Height": 0.009850822389125824,
                                    "Left": 0.2505020201206207,
                                    "Top": 0.6406547427177429
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2505020201206207,
                                        "Y": 0.6406654715538025
                                    },
                                    {
                                        "X": 0.26890456676483154,
                                        "Y": 0.6406547427177429
                                    },
                                    {
                                        "X": 0.26891279220581055,
                                        "Y": 0.6504945755004883
                                    },
                                    {
                                        "X": 0.25051024556159973,
                                        "Y": 0.650505542755127
                                    }
                                ]
                            },
                            "Id": "4e852a8f-4381-4d25-9efa-924b74be7127"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.42279815673828,
                            "Text": "amet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0408145934343338,
                                    "Height": 0.009612711146473885,
                                    "Left": 0.2743138074874878,
                                    "Top": 0.6410481929779053
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2743138074874878,
                                        "Y": 0.6410720348358154
                                    },
                                    {
                                        "X": 0.3151204288005829,
                                        "Y": 0.6410481929779053
                                    },
                                    {
                                        "X": 0.3151283860206604,
                                        "Y": 0.6506364941596985
                                    },
                                    {
                                        "X": 0.2743217945098877,
                                        "Y": 0.6506608724594116
                                    }
                                ]
                            },
                            "Id": "dc13cf28-7173-4520-af13-7a7af0a05c90"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 94.69880676269531,
                            "Text": "consequat",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.08491208404302597,
                                    "Height": 0.012091703712940216,
                                    "Left": 0.3203766644001007,
                                    "Top": 0.6408451199531555
                                },
                                "Polygon": [
                                    {
                                        "X": 0.3203766644001007,
                                        "Y": 0.6408947706222534
                                    },
                                    {
                                        "X": 0.4052788019180298,
                                        "Y": 0.6408451199531555
                                    },
                                    {
                                        "X": 0.4052887558937073,
                                        "Y": 0.6528857350349426
                                    },
                                    {
                                        "X": 0.320386677980423,
                                        "Y": 0.6529368162155151
                                    }
                                ]
                            },
                            "Id": "b4d6bf8c-ac8a-4d63-9aaf-47342f2de2bd"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.20697021484375,
                            "Text": "eu,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.024103956297039986,
                                    "Height": 0.009537660516798496,
                                    "Left": 0.4106261134147644,
                                    "Top": 0.6427475214004517
                                },
                                "Polygon": [
                                    {
                                        "X": 0.4106261134147644,
                                        "Y": 0.6427616477012634
                                    },
                                    {
                                        "X": 0.4347222149372101,
                                        "Y": 0.6427475214004517
                                    },
                                    {
                                        "X": 0.43473008275032043,
                                        "Y": 0.6522706747055054
                                    },
                                    {
                                        "X": 0.41063398122787476,
                                        "Y": 0.6522851586341858
                                    }
                                ]
                            },
                            "Id": "331edb84-5bb4-480e-89f2-ba9bebbd5f37"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.90747833251953,
                            "Text": "tempus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.060246244072914124,
                                    "Height": 0.012054932303726673,
                                    "Left": 0.44095736742019653,
                                    "Top": 0.6408746838569641
                                },
                                "Polygon": [
                                    {
                                        "X": 0.44095736742019653,
                                        "Y": 0.6409099698066711
                                    },
                                    {
                                        "X": 0.5011937618255615,
                                        "Y": 0.6408746838569641
                                    },
                                    {
                                        "X": 0.5012035965919495,
                                        "Y": 0.6528934240341187
                                    },
                                    {
                                        "X": 0.44096729159355164,
                                        "Y": 0.6529296636581421
                                    }
                                ]
                            },
                            "Id": "e5f1cbd7-5373-4bd2-a29d-fd641ce46eaf"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.89703369140625,
                            "Text": "id",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.013163387775421143,
                                    "Height": 0.010050452314317226,
                                    "Left": 0.507165253162384,
                                    "Top": 0.6404550671577454
                                },
                                "Polygon": [
                                    {
                                        "X": 0.507165253162384,
                                        "Y": 0.6404627561569214
                                    },
                                    {
                                        "X": 0.5203204154968262,
                                        "Y": 0.6404550671577454
                                    },
                                    {
                                        "X": 0.5203286409378052,
                                        "Y": 0.6504976749420166
                                    },
                                    {
                                        "X": 0.507173478603363,
                                        "Y": 0.650505542755127
                                    }
                                ]
                            },
                            "Id": "d524b51e-09f8-47a5-a200-66b007ab6a6c"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 95.83547973632812,
                            "Text": "urna.",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.039717696607112885,
                                    "Height": 0.007647327147424221,
                                    "Left": 0.527026891708374,
                                    "Top": 0.6428493857383728
                                },
                                "Polygon": [
                                    {
                                        "X": 0.527026891708374,
                                        "Y": 0.6428727507591248
                                    },
                                    {
                                        "X": 0.5667383670806885,
                                        "Y": 0.6428493857383728
                                    },
                                    {
                                        "X": 0.5667446255683899,
                                        "Y": 0.6504729986190796
                                    },
                                    {
                                        "X": 0.5270331501960754,
                                        "Y": 0.6504967212677002
                                    }
                                ]
                            },
                            "Id": "fd2fdeea-df9e-461b-b55b-d2a0c985a555"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.6728515625,
                            "Text": "Praesent",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.0728256031870842,
                                    "Height": 0.01001247949898243,
                                    "Left": 0.5744451284408569,
                                    "Top": 0.6406304836273193
                                },
                                "Polygon": [
                                    {
                                        "X": 0.5744451284408569,
                                        "Y": 0.640673041343689
                                    },
                                    {
                                        "X": 0.6472626328468323,
                                        "Y": 0.6406304836273193
                                    },
                                    {
                                        "X": 0.6472707390785217,
                                        "Y": 0.6505993604660034
                                    },
                                    {
                                        "X": 0.5744532942771912,
                                        "Y": 0.6506429314613342
                                    }
                                ]
                            },
                            "Id": "510ddd00-36e6-4ebb-8485-116b588c1a2b"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.46469116210938,
                            "Text": "euismod",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.06852664053440094,
                                    "Height": 0.010041208006441593,
                                    "Left": 0.6526129841804504,
                                    "Top": 0.6405512690544128
                                },
                                "Polygon": [
                                    {
                                        "X": 0.6526129841804504,
                                        "Y": 0.6405913829803467
                                    },
                                    {
                                        "X": 0.7211315035820007,
                                        "Y": 0.6405512690544128
                                    },
                                    {
                                        "X": 0.7211396098136902,
                                        "Y": 0.6505514979362488
                                    },
                                    {
                                        "X": 0.6526210904121399,
                                        "Y": 0.6505925059318542
                                    }
                                ]
                            },
                            "Id": "0c699a7b-0bff-4ccb-a6e0-8a172ba17623"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.9049301147461,
                            "Text": "metus",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.04906562343239784,
                                    "Height": 0.00977199524641037,
                                    "Left": 0.7277337908744812,
                                    "Top": 0.6408990025520325
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7277337908744812,
                                        "Y": 0.6409276723861694
                                    },
                                    {
                                        "X": 0.7767915725708008,
                                        "Y": 0.6408990025520325
                                    },
                                    {
                                        "X": 0.7767993807792664,
                                        "Y": 0.6506416201591492
                                    },
                                    {
                                        "X": 0.7277416586875916,
                                        "Y": 0.6506710052490234
                                    }
                                ]
                            },
                            "Id": "b13a0d1f-3be7-4580-8966-73915b856ffc"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 97.7944107055664,
                            "Text": "sapien,",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05843622237443924,
                                    "Height": 0.012168501503765583,
                                    "Left": 0.7823654413223267,
                                    "Top": 0.6406506896018982
                                },
                                "Polygon": [
                                    {
                                        "X": 0.7823654413223267,
                                        "Y": 0.6406848430633545
                                    },
                                    {
                                        "X": 0.8407919406890869,
                                        "Y": 0.6406506896018982
                                    },
                                    {
                                        "X": 0.8408016562461853,
                                        "Y": 0.652783989906311
                                    },
                                    {
                                        "X": 0.7823752164840698,
                                        "Y": 0.6528191566467285
                                    }
                                ]
                            },
                            "Id": "2d01daf8-fefb-440d-aa21-6e3fb857297f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.84517669677734,
                            "Text": "id",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.013331927359104156,
                                    "Height": 0.010241610929369926,
                                    "Left": 0.847317099571228,
                                    "Top": 0.6404359936714172
                                },
                                "Polygon": [
                                    {
                                        "X": 0.847317099571228,
                                        "Y": 0.640443742275238
                                    },
                                    {
                                        "X": 0.860640823841095,
                                        "Y": 0.6404359936714172
                                    },
                                    {
                                        "X": 0.8606489896774292,
                                        "Y": 0.6506695747375488
                                    },
                                    {
                                        "X": 0.847325325012207,
                                        "Y": 0.6506775617599487
                                    }
                                ]
                            },
                            "Id": "02b35a8b-360e-41b0-b32d-84f332eaa9ec"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.41513061523438,
                            "Text": "lacinia",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.05128364637494087,
                                    "Height": 0.010457085445523262,
                                    "Left": 0.12071333080530167,
                                    "Top": 0.657715916633606
                                },
                                "Polygon": [
                                    {
                                        "X": 0.12071333080530167,
                                        "Y": 0.6577471494674683
                                    },
                                    {
                                        "X": 0.17198823392391205,
                                        "Y": 0.657715916633606
                                    },
                                    {
                                        "X": 0.17199698090553284,
                                        "Y": 0.6681411266326904
                                    },
                                    {
                                        "X": 0.12072210758924484,
                                        "Y": 0.6681730151176453
                                    }
                                ]
                            },
                            "Id": "65584d46-7261-40af-baae-e4ba0001132f"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.35919952392578,
                            "Text": "orci",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.028932051733136177,
                                    "Height": 0.009975560009479523,
                                    "Left": 0.1779302954673767,
                                    "Top": 0.6580476760864258
                                },
                                "Polygon": [
                                    {
                                        "X": 0.1779302954673767,
                                        "Y": 0.6580653190612793
                                    },
                                    {
                                        "X": 0.20685400068759918,
                                        "Y": 0.6580476760864258
                                    },
                                    {
                                        "X": 0.20686234533786774,
                                        "Y": 0.6680052280426025
                                    },
                                    {
                                        "X": 0.17793864011764526,
                                        "Y": 0.6680232882499695
                                    }
                                ]
                            },
                            "Id": "ed7062f2-ddb9-4cf4-a0cb-b3270e6524ee"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.74606323242188,
                            "Text": "laoreet",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.055751096457242966,
                                    "Height": 0.01020136196166277,
                                    "Left": 0.21313099563121796,
                                    "Top": 0.6579169034957886
                                },
                                "Polygon": [
                                    {
                                        "X": 0.21313099563121796,
                                        "Y": 0.6579508185386658
                                    },
                                    {
                                        "X": 0.2688736319541931,
                                        "Y": 0.6579169034957886
                                    },
                                    {
                                        "X": 0.2688820958137512,
                                        "Y": 0.6680835485458374
                                    },
                                    {
                                        "X": 0.21313950419425964,
                                        "Y": 0.6681182384490967
                                    }
                                ]
                            },
                            "Id": "ff6b9bbe-ba74-4a32-a1bc-e2485450a639"
                        },
                        {
                            "BlockType": "WORD",
                            "Confidence": 99.88445281982422,
                            "Text": "at",
                            "TextType": "PRINTED",
                            "Geometry": {
                                "BoundingBox": {
                                    "Width": 0.015155636705458164,
                                    "Height": 0.009690779261291027,
                                    "Left": 0.2743632197380066,
                                    "Top": 0.6583943367004395
                                },
                                "Polygon": [
                                    {
                                        "X": 0.2743632197380066,
                                        "Y": 0.6584035754203796
                                    },
                                    {
                                        "X": 0.2895107865333557,
                                        "Y": 0.6583943367004395
                                    },
                                    {
                                        "X": 0.2895188629627228,
                                        "Y": 0.668075680732727
                                    },
                                    {
                                        "X": 0.27437129616737366,
                                        "Y": 0.6680850982666016
                                    }
                                ]
                            },
                            "Id": "65eefb46-909c-420b-8ee7-1e138da8b871"
                        }
                    ],
                    "AnalyzeDocumentModelVersion": "1.0",
                    "@metadata": {
                        "statusCode": 200,
                        "effectiveUri": "https:\/\/textract.eu-west-2.amazonaws.com",
                        "headers": {
                            "x-amzn-requestid": "b44a14c8-731c-46c4-b595-eb6e74a3c2ed",
                            "content-type": "application\/x-amz-json-1.1",
                            "content-length": "214108",
                            "date": "Wed, 14 Feb 2024 11:03:53 GMT"
                        },
                        "transferStats": {
                            "http": [
                                []
                            ]
                        }
                    }
                }', true));

        $correctResult = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dictum ipsum leo. Duis sit
amet tellus et nunc hendrerit rhoncus at in tellus. Pellentesque at quam elementum, pharetra
diam vel, finibus risus. Nunc feugiat non erat eget aliquam. Aliquam dignissim libero id
vestibulum pretium. Donec ac nulla nec nunc laoreet congue. Suspendisse condimentum
ultricies suscipit. Proin imperdiet dictum vehicula. Maecenas egestas turpis id feugiat luctus.
Cras sollicitudin vulputate nisi in auctor. Cras tristique mi ut ex dignissim dignissim. Aenean
nec sagittis turpis, a sodales nisi. Sed nec felis ullamcorper, porta nisi eu, vehicula nulla.
Proin et ipsum molestie ipsum ornare tempor. Nam augue magna, eleifend a luctus eu,
rutrum sit amet neque. Maecenas sit amet urna arcu.
In hac habitasse platea dictumst. Nulla quis rutrum ligula, sed ultrices nulla. Pellentesque
fermentum tortor eu nunc sagittis eleifend. Integer lacus orci, ultricies ac mattis vitae, blandit
ut libero. Vivamus mi velit, molestie eget pellentesque non, feugiat molestie mauris. Aenean
molestie erat accumsan, ultricies urna non, luctus augue. Donec auctor massa in tellus
cursus efficitur. Nulla bibendum efficitur augue et vulputate. Morbi sodales magna eget
imperdiet aliquam. Praesent non tempor leo, egestas pretium justo. Phasellus quis mattis
nisl, interdum tristique odio. Duis commodo eros id ex ullamcorper, vitae venenatis enim
auctor. Aenean nec augue in leo laoreet venenatis sit amet nec lacus. Duis ultricies augue
maximus nunc iaculis volutpat. In rutrum orci augue, vitae sollicitudin nisl vehicula vitae.
Nam eu iaculis metus.
Aenean hendrerit, arcu ut commodo dignissim, velit purus molestie dui, eu ornare purus elit
vel quam. Fusce vitae velit mollis, condimentum lacus nec, lobortis nisl. Aliquam nunc elit,
tincidunt at lorem in, auctor interdum metus. Cras non convallis dui. Duis placerat, tellus sed
cursus rhoncus, nulla diam vehicula turpis, sed elementum sapien enim a neque.
Nam ornare ipsum sed sollicitudin lobortis. Fusce in erat eu purus sollicitudin maximus.
Quisque maximus, leo et feugiat feugiat, nibh lectus viverra nibh, aliquet lacinia ipsum metus
non risus. Etiam malesuada sit amet quam quis dignissim. Nulla et urna mattis, auctor dui
non, ornare mi. Sed imperdiet dui sollicitudin laoreet elementum. Cras at gravida tortor.
Suspendisse consectetur ultricies lacus, vitae convallis nibh condimentum eget. Proin velit
elit, elementum sit amet consequat eu, tempus id urna. Praesent euismod metus sapien, id
lacinia orci laoreet at';

        $service = app()->make(PdfService::class);
        $result = $service->extractTextFromResponse($response);

        $this->assertEquals($correctResult, $result);
    }
}
