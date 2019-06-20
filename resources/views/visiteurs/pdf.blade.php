<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Invoice</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <style>
        
        .text-right {
            text-align: right;
        }
        body { font-family: DejaVu Sans, sans-serif; }
    </style>

</head>
<body class="login-page" style="background: white">

    <div>
        <div class="row">
            <div class="col-xs-7">
                <strong>Royaume Du Maroc</strong><br>
             Ministère De L'intérieur <br>
               Province de chichaoua<br>
                <br>
            </div>

            <div class="col-xs-4">
                <img src="{{asset('files/assets/images/logo.png')}}" alt="logo" style="float: right;">
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
           

           
       

        <table class="table" style="width: 100%">
            <thead style="background: #F5F5F5; width: 100%;">
                <tr>
                    <th style="width: 100%">Les informations de visiteur </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="col-xs-4">
                            <table>
                                <tbody>
                                        <tr>
                                      <th>CIN: {{$visiteurs->numCIN}}</th>
                                      </tr>
                                    <tr>
                                    <th>Nom: {{$visiteurs->nomFR}}</th>
                                    </tr>
                                    <tr>
                                        <th> Prénom: {{$visiteurs->prenomFR}}</th>
                                    </tr>
                                    <tr>
                                            <th> Email: {{$visiteurs->email}}</th>
                                        </tr>
                                        <tr>
                                                <th> Telephone: {{$visiteurs->telephone}}</th>
                                            </tr>
                                            <tr>
                                                    <th> Adresse: {{$visiteurs->adresse}}</th>
                                                </tr>
                                </tbody>
                            </table>
                            <td class="col-xs-4">
                            <table>
                                    <tbody>
                                        <tr>
                                            <th style="direction: rtl; text-align: right;">الاسم العائلي: {{$visiteurs->nomAr}}</th>
                                        </tr>
                                        <tr>
                                            <th style="direction: rtl; text-align: right;" > الاسم الشخصي: {{$visiteurs->prenomAr}} </th>
                                        </tr>
                                       
                                            <tr>
                                                    <th>Sexe: {{$visiteurs->sexe->nomSexeFr}}</th>
                                                </tr>
                                    </tbody>
                                </table></td>
                        </td>
                </tr>
                
            </tbody>
        </table>
    </div>
            

            <div style="margin-bottom: 0px">&nbsp;</div>

            
        </div>

    </body>
    </html>