

<!-- Modal toggle -->

<button data-modal-target="vital-sign" data-modal-toggle="vital-sign" type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
<svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
</svg>
Add Vital
</button>

<!-- Main modal -->
<div id="vital-sign" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form action="<?= site_url("patients/$patient->id/signs") ?>" method="post" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <?= csrf_field() ?>
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Create Vital Sign
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="vital-sign">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 grid grid-cols-1 md:grid-cols-2 items-center gap-4">

                <input type="hidden" name="patient_id" value="<?= $patient->id ?>">
                <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">
               <?= view_cell('TextInputCell', ['type' => 'text', 'name' => 'blood_pressure', 'label' => 'Blood Pressure']) ?>

               <?= view_cell('TextInputCell', ['type' => 'text', 'name' => 'resp_rate', 'label' => 'Respiratory Rate']) ?>

               <?= view_cell('TextInputCell', ['type' => 'text', 'name' => 'pulse_rate', 'label' => 'Pulse Rate']) ?>

               <?= view_cell('TextInputCell', ['type' => 'text', 'name' => 'oxygen_saturation', 'label' => 'Oxygen Saturation']) ?>

               <?= view_cell('TextInputCell', ['type' => 'text', 'name' => 'weight', 'label' => 'Weight']) ?>

               <?= view_cell('TextInputCell', ['type' => 'text', 'name' => 'height', 'label' => 'Height']) ?>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit" class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Submit</button>
                <button data-modal-hide="vital-sign" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-sky-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
       </form>
    </div>
</div>
