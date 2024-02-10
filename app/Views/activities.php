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

$totalQuantity = 0;
$totalSales = 0;

$totalRches = 0;

if($staffSales) {
    foreach ($staffSales as $drug) {
            $totalQuantity += $drug->quantity;
            $totalSales += ($drug->quantity * $drug->price);
        }
    }
}

$totalInvestigtions = 0;

if($investigations) {
    foreach ($investigations as $investigation) {
        if(!empty(unserialize($investigation->categories))) {
            $categories = model('LabtestModel')->find(unserialize($investigation->categories));
            foreach($categories as $category) {
                $totalInvestigtions += $category->price;
            }
        }
    }

    foreach ($investigations as $investigation) {
        if(!empty(unserialize($investigation->surgicals))) {
            $categories = model('SurgicalModel')->find(unserialize($investigation->surgicals));
            foreach($categories as $category) {
                $totalInvestigtions += $category->price;
            }
        }
    }

    if($rchesRecords) {
    foreach ($rchesRecords as $rch) {
        $totalRches += $rch->price;
    }
}
}
?>
   <section>
       <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 ">
          <div class="p-4 border border-gray-300 rounded shadow-md">
            <p class="text-lg font-medium">New Transfers <span class="text-white bg-green-500 px-1.5 py-1 rounded">new</span></p>
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

       <?php if($staffSales): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 ">
                <div class="p-4 border border-gray-300 rounded shadow-md">
                    <p class="text-lg font-medium">Total Drugs Sold</p>
                    <p class="text-3xl font-bold text-green-600"> <?= $totalQuantity ;?> </p>
                </div>

                <div class="p-4 border border-gray-300 rounded shadow-md">
                    <p class="text-lg font-medium">Drug Sales</p>
                    <p class="text-3xl font-bold text-sky-950"><?= "Tsh " . number_format($totalSales) ;?></p>
                </div>
        <?php endif ?>
        <?php if(session('department') == 'receptionist'): ?>
                <div class="p-4 border border-gray-300 rounded shadow-md">
                    <p class="text-lg font-medium">Investigation Sales</p>
                    <p class="text-3xl font-bold text-sky-950"><?= "Tsh " . number_format($totalInvestigtions) ;?></p>
                </div>

                <!-- <div class="p-4 border border-gray-300 rounded shadow-md">
                    <p class="text-lg font-medium">Rches Sales</p>
                    <p class="text-3xl font-bold text-sky-950"><?//= "Tsh " . number_format($totalRches) ;?></p>
                </div> -->
        <?php endif ?>
            </div>


       <div class="grid grid-cols-1 py-4 bg-gray-100 rounded ">
            <div class="relative overflow-x-auto whitespace-nowrap">

            <div class="flex justify-between mb-4 m-1">
                <form method="get" action="<?= site_url('activities') ?>">   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" name="search" id="default-search" class="block w-full px-4 py-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search patient..." required>
                        <!-- <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button> -->
                    </div>
                </form>

                <div>
                    <?php if(session('department') == 'receptionist' || session('department') == 'admin'): ?>
                      <a href="<?= site_url('patients') ?>" class="bg-sky-700 text-white px-4 py-2 rounded">Patients</a>
                    <?php endif ?>
                </div>
            </div>

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
                                    <?php elseif(session('department') == 'pharmacist'): ?>
                                        <a class="text-sky-700 font-medium hover:underline active:text-green-700" href="<?= site_url("sell?patient_id=$patient->patientId") ?>">open</a>
                                    <?php elseif(session('department') == 'receptionist'): ?>
                                        <a class="text-sky-700 font-medium hover:underline active:text-green-700" href="<?= site_url("patients/$patient->patientId/invoice") ?>">open</a>
                                    <?php elseif(session('department') == 'lab'): ?>
                                        <a class="text-sky-700 font-medium hover:underline active:text-green-700" href="<?= site_url("patients/$patient->patientId/investigations") ?>">open</a>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
       </div>


       <?php if($staffSales): ?>
        <div class="grid grid-cols-1 py-4 bg-gray-100 rounded my-4">
                <div class="relative overflow-x-auto whitespace-nowrap">

                   <h2 class="text-2xl text-sky-950 font-semibold px-2 my-2">Sale Items</h2>
                    <table class="w-full text-sm border border-gray-200 rounded text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-sky-600/60 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 py-3">
                                    S/N
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    Drug Name
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    Quantity
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    Price
                                </th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <?php $rowId = 1 ;?>
                            <?php foreach ($staffSales as $drug) : ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $rowId++ ;?>
                                    </td>
                                    <td class="px-3 py-4">
                                        <?= $drug->name ?>
                                    </td>
                                    <td class="px-3 py-3">
                                        <?= $drug->quantity ?>
                                    </td>
                                    <td class="px-3 py-3">
                                        <?= number_format($drug->price * $drug->quantity) ?>
                                    </td>
                                    
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
        </div>
       <?php endif ?>

   </section>
<?= $this->endSection() ;?>