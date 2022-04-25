<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dierenvertaler</title>
        <link href="https://unpkg.com/nes.css@2.3.0/css/nes.min.css" rel="stylesheet" />
        <style>
            .container {
                width: 80%;
                margin-right: auto;
                margin-left: auto;
            }

            .row {
                overflow: hidden;
            }

            ._20 {
                display: inline-block;
                width: 20%;
            }

            ._70 {
                display: inline-block;
                width: 70%;
            }
        </style>
    </head>
    <body class="container">
       <textarea class="nes-textarea" name="text"></textarea>
       <div class="row">
           <div class="nes-select _70">
            <select name="language">
                <option value="detect">Taal herkennen</option>
                @foreach(['Mens', 'Labrador', 'Poedel', 'Parkiet'] as $language)
                    <option value="{{ Str::lower($language) }}">{{ $language }}</option>
                @endforeach
            </select>
        </div>
           <button class="nes-btn is-primary _20">Vertaal</button>
       </div>

       <br><br>

       @isset($output)
       <p class="nes-balloon from-left nes-pointer">
           {{ $output }}
       </p>
       @endisset
    </body>
</html>
