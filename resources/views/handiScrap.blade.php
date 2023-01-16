<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda Handicap</title>
</head>
<body>
    Agenda Handicap

    <table> 
        <tbody>
            <tr>
                <th>Date</th>
                <th>Evénement</th>
            </tr>
            @foreach ($data as $key=>$value)
            
                @if($key%2==0)
                <tr>
                    <td>{{ $value }}</td>
                @endif
                @if($key%2==1)
                    <td>{{ $value }}</td>
                </tr>
                @endif
            
            @endforeach
        </tbody>
    </table>
</body>
</html>