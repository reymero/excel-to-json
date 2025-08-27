<form action="{{ route('upload_excel') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="file">Upload Excel File:</label>
    <input type="file" name="excel_file" id="file" accept=".xlsx,.xls" required>
    <button type="submit">Upload</button>
</form>
