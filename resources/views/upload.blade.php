@if(session('success'))
    <div style="color: green; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="color: red; margin-bottom: 15px;">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('upload_excel') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="file">Upload Excel File:</label>
    <input type="file" name="excel_file" id="file" accept=".xlsx,.xls" required>
    <button type="submit">Upload</button>
</form>
