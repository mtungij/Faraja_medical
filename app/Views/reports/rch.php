<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

<?php

$totalInvestigtions = 0;
$totalSurgicals = 0;

// if($rchs) {
//     foreach ($rchs as $rch) {
//         if(!empty(unserialize($rch->categories))) {
//             $categories = model('LabtestModel')->find(unserialize($rch->categories));
//             foreach($categories as $category) {
//                 $totalInvestigtions += $category->price;
//             }
//         }
//     }

//     foreach ($rchs as $rch) {
//         if(!empty(unserialize($rch->surgicals))) {
//             $surgicals = model('SurgicalModel')->find(unserialize($rch->surgicals));
//             foreach($surgicals as $surgical) {
//                 $totalSurgicals += $surgical->price;
//             }
//         }
//     }
// }

?>

<section>
    <div>
        <form action="<?= base_url('reports/rch') ?>" method="get">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div>
                    <label for="filter_by_status" class="block text-sm font-medium text-gray-700">Filter by Status</label>
                    <select id="filter_by_status" name="filter_by_status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">All</option>
                        <option value="pending">Pending</option>
                        <option value="paid">Paid</option>
                    </select>
                </div>
                <div>
                    <label for="from" class="block text-sm font-medium text-gray-700">From</label>
                    <input type="date" name="from" id="from" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="to" class="block text-sm font-medium text-gray-700">To</label>
                    <input type="date" name="to" id="to" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Filter</button>
            </div>
    </div>
    <div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 ">
          <div class="p-4 border border-gray-300 rounded shadow-md">
            <p class="text-lg font-medium">rchs Revenue </p>
            <p class="text-3xl font-bold text-green-600"> <?= number_format($totalInvestigtions) ;?> </p>
          </div>

          <div class="p-4 border border-gray-300 rounded shadow-md">
            <p class="text-lg font-medium">Surgicals Revenue</p>
            <p class="text-3xl font-bold text-sky-950"><?= number_format($totalSurgicals) ;?></p>
          </div>

          <!-- <div class="p-4 border border-gray-300 rounded shadow-md">
            <p class="text-lg font-medium">Total Patients</p>
            <p class="text-3xl font-bold text-sky-950"><? //= '677' ;?></p>
          </div> -->
       </div>
    </div>
    <div>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>PATIENT NAME</th>
                    <th>STAFF NAME</th>
                    <th>RCH</th>
                    <th>PRICE</th>
                    <th>DATE</th>
                </tr>
            </thead>
            <tbody>
                <?php $rowId = 1 ;?>
                <?php foreach ($rches as $rch) : ?>
                    <tr>
                        <td><?= $rowId++ ;?></td>
                        <td><?= $rch->first_name . " " . $rch->middle_name . " " . $rch->last_name ?></td>
                        <td><?= $rch->staff ?></td>
                        <td>
                            <?= $rch->name ;?>
                        </td>
                        <td>
                            <?= number_format($rch->price) ;?>
                        </td>
                        <td>
                            <?= date('d M, Y', strtotime($rch->date)) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->endSection() ;?>