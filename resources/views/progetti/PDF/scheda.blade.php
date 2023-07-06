<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Scheda Progetto</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>
    @foreach($tot as $totale) @endforeach @foreach($dettaglio ?? '' as $progetto)
  <table width="100%">
    <tr>
       <!-- <td valign="top"><img src="{{asset('images/meteor-logo.png')}}" alt="" width="150"/></td> -->
        <td>
            <h3>Progetto: #{{$progetto->id}}:{{$progetto->nome}}</h3>
            
             <p>  {{$progetto->descrizione}}</p>
            
        </td>
    </tr>

  </table>
<hr>
  <table width="100%">
    <tr>
        <td><strong>Creato il:</strong> {{ date('d/m/Y',strtotime($progetto->data_creazione)) }}</td>
        <td><strong>Inizio:</strong> {{ date('d/m/Y',strtotime($progetto->data_inizio)) }}</td>
        <td><strong>Termine:</strong> {{ date('d/m/Y',strtotime($progetto->data_fine)) }}</td>
        <td><strong>Stato:</strong> {{ $progetto->stato }}</td>
    </tr>
    <tr>
        <td><strong>Budget iniziale:</strong> {{ $progetto->budget }}</td>
        <td><strong>Costi sostenuti:</strong> {{ $totale->costo}}</td>
        <td><strong>Scostamento:</strong>{{ $progetto->budget - $totale->costo}}</td>
        <td><strong>Coordinatore:</strong> {{ $progetto->name }}</td>
    </tr>
    <tr>
        <td colspan="4" class="gray">DESCRIZIONE:</td>
    </tr>
    <tr>
        <td colspan="4">{{ $progetto->note }}</td>
    </tr>
   
  </table>
  @endforeach
  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>Data</th>
        <th>Descrizione</th>
        <th>Ore</th>
        <th>Costi</th>
      </tr>
    </thead>
    <tbody>
    @foreach($righe as $riga) 
    <tr>
        <td>{{ date('d/m/Y',strtotime($riga->data)) }}</td>
        <td>{{ $riga->descrizione }}</td>
        <td>{{ $riga->ore }}</td>
        <td>{{ $riga->prezzo }}</td>
    </tr>
    @endforeach
    </tbody>

    <tfoot>
        <tr>
            <td colspan="2"></td>
            <td align="right">Totale</td>
            <td align="right" class="gray">{{ $totale->costo}} &euro;</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>