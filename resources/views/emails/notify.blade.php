<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Helpdesk System</title>

    <style>
        body{
            font-family: 'Nunito', sans-serif;
            padding: 50px;
            }
            .card{
                border-radius: 4px;
                background: #fff;
                box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
                transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
            padding: 14px 80px 18px 36px;
            cursor: pointer;
            }

            .card h3{
            font-weight: 600;
            }

            .card-1{
            background-image: url(https://ionicframework.com/img/getting-started/ionic-native-card.png);
                background-repeat: no-repeat;
                background-position: right;
                background-size: 80px;
            }

            @media(max-width: 990px){
            .card{
                margin: 20px;
            }
            } 

    </style>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-1">
                <h3>Penugasan Baru</h3>
                <p>Tiket Nomor {{ $ticketNumber }} telah ditugaskan kepada anda </p>
                <p><i>sent by system. do not reply</i></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>