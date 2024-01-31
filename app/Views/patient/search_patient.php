<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>



<form action="<?= site_url('sell') ?>" method="get" class="w-full">   
    <div class="w-full flex gap-2">
        <select name="patient_id" data-te-select-init data-te-select-filter="true" class="shrink"   data-te-select-placeholder="Search Patient">
            <?php foreach ($patients as $patient) : ?>
                <option value=" <?= $patient->id ?>"><?= $patient->first_name ." ". $patient->middle_name ." ". $patient->last_name ;?></option>
            <?php endforeach ?>
        </select>

        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
             <span class="sr-only">Search</span>
        </button>
    </div>
</form>





<?= $this->endSection() ;?>