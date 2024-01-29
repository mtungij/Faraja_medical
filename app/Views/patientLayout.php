<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>
<div>
  <div>
    <img class="h-32 w-full object-cover  lg:h-48" src="/img/final.jpg" alt="">
  </div>
  <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
    <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
      <div class="flex">
        <img class="h-24 w-24 rounded-full ring-4 ring-blue-300 sm:h-32 sm:w-32" src="/img/female.png" alt="">
      </div>
      <div class="mt-6 sm:flex sm:min-w-0 sm:flex-1 sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
        <div class="mt-6 min-w-0 flex-1 sm:hidden md:block">
          <h1 class="truncate text-2xl uppercase font-bold "><?= $patient->first_name ." ".$patient->middle_name ." ".$patient->last_name ;?></h1>
        </div>
        <div class="mt-6 flex flex-col justify-stretch space-y-3 sm:flex-row sm:space-x-4 sm:space-y-0">
          <button type="button" class="inline-flex justify-center rounded-md px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
            
            <span class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">status</span>
          </button>
          <a href="<?= site_url("transfers/$patient->id") ?>" class="text-white bg-cyan-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            TRANSFER
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
        </a>
        </div>
      </div>
    </div>
    <div class="mt-6 hidden min-w-0 flex-1 sm:block md:hidden">
      <h1 class="truncate text-2xl font-bold text-blue-300">Shehab coding</h1>
    </div>
  </div>
</div>

<!-- Tabbs -->
<nav class="border-b-1 border-gray-300 whitespace-nowrap my-4">
    <ul class="flex gap-4 flex-wrap">
        <li class='<?= url_is("/patients/$patient->id/signs") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("patients/$patient->id/signs") ?>" class="py-6">Vital Sign</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/complains") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("/patients/$patient->id/complains") ?>" class="py-6">Chief Complain</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/hpis") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("/patients/$patient->id/hpis") ?>" class="py-6">HPI</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/rvs") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("/patients/$patient->id/rvs") ?>" class="py-6">RVS</a>
        </li>
        <li class="class='<?= url_is("/patients/$patient->id/pmhs") ? "border-b-2 border-sky-600": "" ?> font-medium'">
            <a href="<?= site_url("/patients/$patient->id/pmhs") ?>" class="py-6">PMH</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/fshs") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("/patients/$patient->id/fshs") ?>" class="py-6">FSH</a>
        </li>
        <li class="class='<?= url_is("/patients/$patient->id/examinations") ? "border-b-2 border-sky-600": "" ?> font-medium'">
            <a href="<?= site_url("/patients/$patient->id/examinations") ?>" class="py-6">Examination</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/diagnosis") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("/patients/$patient->id/diagnosis") ?>" class="py-6">Diagnosis</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/investigations") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("/patients/$patient->id/investigations") ?>" class="py-6">Investigation</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/treatiments") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("/patients/$patient->id/treatments") ?>" class="p-2">Treatments</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/pinfos") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("/patients/$patient->id/pinfos") ?>" class="p-2">Patient Info</a>
        </li>
    </ul>
</nav>

<?= $this->renderSection('patient') ;?>

<?= $this->endSection() ;?>
