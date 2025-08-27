<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

it('can upload an excel file', function () {
    // Fake the storage disk
    Storage::fake('local');

    // Create a fake file
    $file = UploadedFile::fake()->create('test-file.xlsx', 100);

    // Make a POST request to upload the file
    $response = $this->post('/upload-excel', [
        'excel_file' => $file,
    ]);

    // Assert the file was uploaded to the 'local' disk
    Storage::disk('local')->assertExists('excel_files/test-file.xlsx');

    // Optionally, assert a success message
    $response->assertSessionHas('success', 'Data imported successfully!');
});
