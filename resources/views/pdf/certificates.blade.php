<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        .cert {
            border: 15px solid #0072c6;
            border-right: 15px solid #0894fb;
            border-left: 15px solid #0894fb;
            width: 700px;
            font-family: arial;
            color: #383737;
        }

        .crt_title {
            margin-top: 30px;
            font-family: "Poppins", sans-serif;
            font-size: 40px;
            letter-spacing: 1px;
            color: #0060a9;
        }
        .crt_logo img {
            width: 130px;
            height: auto;
            margin: auto;
            padding: 30px;
        }
        .colorGreen {
            color: #27ae60;
        }
        .crt_user {
            display: inline-block;
            width: 80%;
            padding: 5px 25px;
            margin-bottom: 0px;
            padding-bottom: 0px;
            font-family: "Satisfy", cursive;
            font-size: 40px;
            border-bottom: 1px dashed #cecece;
        }

        .afterName {
            font-weight: 100;
            color: #383737;
        }
        .colorGrey {
            color: grey;
        }
        .certSign {
            width: 200px;
        }

        @media (max-width: 700px) {
            .cert {
                width: 100%;
            }
        }

    </style>
</head>
<body>

<table class="cert">
    <tr>
        <td align="center">
            <h1 class="crt_title">Certificate Of Participation</h1>
                <h2>This Certificate is awarded to</h2>
                <h1 class="colorGreen crt_user">{{$user->name}}</h1>
                <h3 class="afterName">For his/her participation of {{$product->name}}
                </h3>
                <h3>Awarded on {{\Illuminate\Support\Carbon::simpleDate($product->date)}}</h3>
        </td>
    </tr>
    <tr>
        <td align="center">
            <h3>{{$product->initiator->name}}</h3>
        </td>
    </tr>
</table>

</body>
</html>
