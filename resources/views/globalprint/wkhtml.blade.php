<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>PLATAFORMA VIRTUAL - MUSERPOL</title>
  
  <style>
    html,body{
      font-family: 'Arial', sans-serif;
    }
    .qrCode{
      position: absolute;
      left: 80%;
      bottom: 15%;
    }
    div#izq{
        float:left;
        font-size: 10px;
    }
    div#der{
      float:right;
      font-size: 10px;
    }
  </style>
</head>
<body>
  <header class="clearfix">
    <center><h4><b>MUTUAL DE SERVICIOS AL POLIC&#205A<br>
            {!! $header1 !!}<br>{!! $header2 !!}
            @yield('title')
          </b></h4></center>
        <div id="izq"><b>Fecha Emisi&#243n: </b> La Paz, {!! $date !!}-{!! $hour !!}</div>
        @if(isset($user))
            <div id="der"><b>Usuario: </b> {!! $user->first_name !!} {!! $user->last_name !!} - {!! $user->getAllRolesToString() !!}</div>
       
        @endif

    <h2>
      <center><b>{{ $title }}</b></center>
      @yield('title2')
    </h2>
   
    @yield('content')
  </header>
  <br>
  <footer>
    
    <center>PLATAFORMA VIRTUAL DE LA MUTUAL DE SERVICIOS AL POLIC&#205A - {{ $anio }}</center>

      <div align="right">
        <table>
          <tr>
            <th class="info" style="border: 0px;text-align:right;width: 100% ">
                @if(isset($eco_com_applicant))
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(90)->generate(
                    $title.'                                     '.
                    'Registro: Nº '.$eco_com_applicant->code.' || '.
                    $eco_com_applicant->getTitleNameFull().' || '.
                    'Carnet de Identidad: '.$eco_com_applicant->identity_card.' '.$eco_com_applicant->city_identity_card->first_shortened.' || '.
                    'Edad del Afiliado: '.$eco_com_applicant->getHowOld().' || '.
                    'Numero de CUA/NUA: '.$eco_com_applicant->nua
                    )) !!} ">
                    @else
                        @if(isset($affiliate))
                            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(90)->generate(
                            $title.'                                     '.
                            $affiliate->getTitleNameFull().' || '.
                            'Carnet de Identidad: '.$affiliate->identity_card.' '.$affiliate->city_identity_card->first_shortened.' || '.
                            'Edad del Afiliado: '.$affiliate->getHowOld().' || '.
                            'Numero de CUA/NUA: '.$affiliate->nua
                            )) !!} ">
                        @endif
                @endif
                @if(isset($double_perception_eco_complements))
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(90)->generate(
                    $title.'                                     '
                    )) !!} ">
                @endif
                @if(isset($representative_eco_complements))
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(90)->generate(
                    $title.'                                     '
                    )) !!} ">
                @endif
                @if(isset($beneficiary_eco_complements))
                    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(90)->generate(
                    $title.'                                     '
                    )) !!} ">
                @endif
            </th>
          </tr>
        </table>
      </div>
  </footer>
</body>
</html>
