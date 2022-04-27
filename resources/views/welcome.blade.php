<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dierenvertaler</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://unpkg.com/nes.css@2.3.0/css/nes.min.css" rel="stylesheet" />
    </head>
    <body>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-5">
                <label for="from">van</label>
                <div class="nes-select">
                    <select name="from" id="from" onchange="updateToSelectOptions()">
                        <option value="detect">Taal herkennen</option>
                        @foreach(['Mens', 'Labrador', 'Poedel', 'Parkiet'] as $language)
                            <option value="{{ Str::lower($language) }}">{{ $language }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-5">
                <label for="to">naar</label>
                <div class="nes-select">
                    <select name="to" id="to" disabled>
                    </select>
                </div>
                <label>
                    <input type="checkbox" class="nes-checkbox" name="drunk">
                    <span>Ik ben zo dronken!!!</span>
                </label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-5">
                    <textarea class="nes-textarea" name="source-text" minlength="1"></textarea>
            </div>
            <div class="col-2 text-center">
                <button class="nes-btn is-primary">Vertaal</button>
            </div>
            <div class="col-5">
                <textarea class="nes-textarea" name="translated-text" disabled></textarea>
            </div>
        </div>
        <br><br>
    </div>
    <script>
        updateToSelectOptions = () => {
            const requestOptions = {
                method: 'GET',
                redirect: 'follow'
            };

            fetch('/targetLanguages?from=' + document.querySelector('#from').value, requestOptions)
                .then(response => response.text())
                .then(result => {
                    const toSelect = document.querySelector('#to');
                    toSelect.innerHTML = '';

                    const languages = JSON.parse(result);

                    if (Array.isArray(languages)) {
                        toSelect.disabled = false;
                        languages.forEach(language => toSelect.add(new Option(language, language)));
                    }
                });
        };
    </script>
    </body>
</html>
