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
          <button type="button" data-modal-target="transfer-model" data-modal-toggle="transfer-model" class="text-white bg-cyan-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            TRANSFER
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
          </button>


          <!-- Main modal -->
<div id="transfer-model" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Transfer Patient
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="transfer-model">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="<?= site_url('transfer') ?>" method="post">
             <?= csrf_field() ;?>
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <input type="hidden" name="from" value="<?= session("user_id") ?>">
                    <input type="hidden" name="patient_id" value="<?= $patient->id ?>">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Departiment</label>
                        <select id="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected>Select department</option>
                        </select>
                    </div>
                    
                    <div class="col-span-2 sm:col-span-1">
                        <label for="staff" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Staff</label>
                        <select id="staff" name="to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected>Select staff</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Transfer
                </button>
            </form>
        </div>
    </div>
</div> 

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
            <a href="<?= site_url("patients/$patient->id/complains") ?>" class="py-6">Chief Complain</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/hpis") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("patients/$patient->id/hpis") ?>" class="py-6">HPI</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/rvs") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("patients/$patient->id/rvs") ?>" class="py-6">RVS</a>
        </li>
        <li class="class='<?= url_is("/patients/$patient->id/pmhs") ? "border-b-2 border-sky-600": "" ?> font-medium'">
            <a href="<?= site_url("patients/$patient->id/pmhs") ?>" class="py-6">PMH</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/fshs") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("patients/$patient->id/fshs") ?>" class="py-6">FSH</a>
        </li>
        <li class="class='<?= url_is("/patients/$patient->id/examinations") ? "border-b-2 border-sky-600": "" ?> font-medium'">
            <a href="<?= site_url("patients/$patient->id/examinations") ?>" class="py-6">Examination</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/diagnosis") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("patients/$patient->id/diagnosis") ?>" class="py-6">Diagnosis</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/investigations") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("patients/$patient->id/investigations") ?>" class="py-6">Investigation</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/treatiments") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("patients/$patient->id/treatments") ?>" class="p-2">Treatments</a>
        </li>

        <li class='<?= url_is("/patients/$patient->id/appointments") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("patients/$patient->id/appointments") ?>" class="p-2">Make Appointment</a>
        </li>
        <li class='<?= url_is("/patients/$patient->id/pinfos") ? "border-b-2 border-sky-600": "" ?> font-medium'>
            <a href="<?= site_url("patients/$patient->id/pinfos") ?>" class="p-2">Patient Info</a>
        </li>
    </ul>
</nav>

<?= $this->renderSection('patient') ;?>


<script>
    $(document).ready(function () {
        // Fetch departments and populate the first select
        $.ajax({
            url: '<?php echo site_url('transfer/departments'); ?>',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $.each(data, function (index, value) {
                    $('#department').append('<option value="' + value.department + '">' + value.department + '</option>');
                });
            }
        });

        // Handle change event on department select
        $('#department').on('change', function () {
            var selectedDepartment = $(this).val();

            // Fetch staff based on the selected department
            $.ajax({
                url: '<?php echo site_url('transfer/staffs'); ?>/' + selectedDepartment,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Clear and populate the staff select
                    $('#staff').empty();
                    $('#staff').append('<option selected>Select staff</option>');
                    $.each(data, function (index, value) {
                        $('#staff').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>

<?= $this->endSection() ;?>
