<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\ProgramStudiImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportProdi extends Command
{
    protected $signature = 'import:prodi {file}';
    protected $description = 'Import data Program Studi dari file Excel';

    public function handle()
    {
        $file = $this->argument('file');

        if (!file_exists($file)) {
            $this->error("File {$file} tidak ditemukan.");
            return 1;
        }

        Excel::import(new ProgramStudiImport, $file);
        $this->info('Data Program Studi berhasil diimport!');
        return 0;
    }
}
