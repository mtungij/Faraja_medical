<?= $this->extend('main') ?>

<?= $this->section('content') ;?>
<?php
$totalPatients = 0;
$todayPatients = 0;
$newPatients = 0;

foreach ($patients as $patient) {
    $totalPatients++;
    if(date('Y-m-d', strtotime($patient->created_at)) == date('Y-m-d')) {
        $todayPatients++;
    }
    if($patient->badge == 'new') {
        $newPatients++;
}
}

?>
   <section>
       <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 ">
          <div class="p-4 border border-gray-300 rounded shadow-md">
            <p class="text-lg font-medium">New Patients <span class="text-white bg-green-500 px-1.5 py-1 rounded">new</span></p>
            <p class="text-3xl font-bold text-green-600"> <?= $newPatients ;?> </p>
          </div>

          <div class="p-4 border border-gray-300 rounded shadow-md">
            <p class="text-lg font-medium">Today Patients</p>
            <p class="text-3xl font-bold text-sky-950"><?= $todayPatients ;?></p>
          </div>

          <div class="p-4 border border-gray-300 rounded shadow-md">
            <p class="text-lg font-medium">Total Patients</p>
            <p class="text-3xl font-bold text-sky-950"><?= number_format($totalPatients) ;?></p>
          </div>
       </div>


       <div class="grid grid-cols-1 py-4 bg-gray-100 rounded ">
            <div class="relative overflow-x-auto whitespace-nowrap">
                <table class="w-full text-sm border border-gray-200 rounded text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-sky-600/60 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-3 py-3">
                                Patient Name
                            </th>
                            <th scope="col" class="px-3 py-3">
                                Status
                            </th>
                             <th scope="col" class="px-3 py-3">
                                Department
                            </th>
                             <th scope="col" class="px-3 py-3">
                                Staff
                            </th>
                            <th scope="col" colspan="2" class="px-3 py-3">
                                Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($patients as $patient) : ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $patient->first_name . ' ' . $patient->middle_name . ' ' . $patient->last_name ?>
                                    <span>
                                        <?php if($patient->badge == 'new'): ?>
                                            <span class="bg-blue-100 uppercase text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                                <?= $patient->badge ?>
                                            </span>
                                        <?php endif ?>
                                    </span>
                                </td>
                                <td class="px-3 py-4">
                                    <?php if($patient->status == 'emergency'): ?>
                                        <span class="bg-pink-100 uppercase text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">
                                            <?= $patient->status ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="bg-green-100 uppercase text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                            <?= $patient->status ?>
                                        </span>
                                    <?php endif ?>
                                </td>
                                <td class="px-3 py-3">
                                    <?= $patient->department ?>
                                </td>
                                <td class="px-3 py-3">
                                    <?= $patient->name ?>
                                </td>
                                <td class="px-3 py-3">
                                    <?= $patient->created_at ?>
                                </td>
                                <td class="px-3 py-3">
                                    <?php if(session('department') == 'doctor'): ?>
                                        <a class="text-sky-700 font-medium hover:underline active:text-green-700" href="<?= site_url("patients/$patient->patientId/signs") ?>">open</a>
                                    <?php elseif(session('department') == 'receptionist'): ?>
                                        <a class="text-sky-700 font-medium hover:underline active:text-green-700" href="<?= site_url("patients/sell?patient_id=$patient->patientId") ?>">open</a>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
       </div>
   </section>
<?= $this->endSection() ;?>