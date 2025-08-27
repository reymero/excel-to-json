<!DOCTYPE html>
<html>
<head>
    <title>Excel App</title>
</head>
<body>

<h2>Excel File Preview</h2>

{{-- Table Preview --}}
<table border="1" cellpadding="5">
    <thead>
    <tr>
        @foreach ($excelData[0] as $header)
            <th>{{ $header }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach (array_slice($excelData, 1) as $row)
        <tr>
            @foreach ($row as $cell)
                <td>{{ $cell }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>

<br>

{{-- Action Buttons --}}
<button onclick="copyTable()">Copy Table</button>
<button onclick="toggleJSON()">Show JSON</button>

<form action="{{ route('send_excel_email') }}" method="POST" style="display:inline;">
    @csrf
    <input type="hidden" name="json_data" value="{{ json_encode($excelData) }}">
    <button type="submit">Send Email</button>
</form>

{{-- Hidden JSON textarea --}}
<textarea id="jsonData" style="width:100%; height:150px; display:none;">
{{ json_encode($excelData, JSON_PRETTY_PRINT) }}
</textarea>

{{-- JavaScript --}}
<script>
    function copyTable() {
        let table = document.querySelector("table");
        if(!table) return alert("Table not found!");

        let text = "";
        for (let row of table.rows) {
            let rowText = [];
            for (let cell of row.cells) {
                rowText.push(cell.innerText);
            }
            text += rowText.join("\t") + "\n";
        }

        // Legacy method: create temporary textarea to copy text
        let temp = document.createElement("textarea");
        temp.value = text;
        document.body.appendChild(temp);
        temp.select();
        document.execCommand("copy");  // old but reliable
        document.body.removeChild(temp);

        alert("Table copied as text!");
    }


    function toggleJSON() {
        const textArea = document.getElementById('jsonData');
        if (textArea.style.display === 'none') {
            textArea.style.display = 'block';
        } else {
            textArea.style.display = 'none';
        }
    }
</script>

</body>
</html>



{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Process Excel Data</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<h1>Excel Data Preview</h1>--}}

{{--<!-- Display the parsed data -->--}}
{{--<table border="1">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        @foreach ($excelData[0] as $column => $value)--}}
{{--            <th>{{ $column }}</th>--}}
{{--        @endforeach--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    @foreach ($excelData as $row)--}}
{{--        <tr>--}}
{{--            @foreach ($row as $value)--}}
{{--                <td>{{ $value }}</td>--}}
{{--            @endforeach--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}

{{--<!-- Add buttons to store data or convert it to JSON -->--}}
{{--<form action="{{ route('store_data') }}" method="POST">--}}
{{--    @csrf--}}
{{--    <button type="submit">Store in Database</button>--}}
{{--</form>--}}

{{--<form action="{{ route('convert_to_json') }}" method="POST">--}}
{{--    @csrf--}}
{{--    <button type="submit">Convert to JSON</button>--}}
{{--</form>--}}
{{--</body>--}}
{{--</html>--}}

