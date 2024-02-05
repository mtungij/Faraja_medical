<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

<?php

$totalInvestigtions = 0;
$totalSurgicals = 0;

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
            $surgicals = model('SurgicalModel')->find(unserialize($investigation->surgicals));
            foreach($surgicals as $surgical) {
                $totalSurgicals += $surgical->price;
            }
        }
    }
}

?>

<section>
    <div>
        <form action="<?= base_url('reports/investigation') ?>" method="get">
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
            <p class="text-lg font-medium">Investigations Revenue </p>
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
                    <th>INVESTIGATIONS</th>
                    <th>SURGICALS</th>
                    <th>STATUS</th>
                    <th>DATE</th>
                </tr>
            </thead>
            <tbody>
                <?php $rowId = 1 ;?>
                <?php foreach ($investigations as $investigation) : ?>
                    <tr>
                        <td><?= $rowId++ ;?></td>
                        <td><?= $investigation->first_name . " " . $investigation->middle_name . " " . $investigation->last_name ?></td>
                        <td><?= $investigation->staff ?></td>
                        <td>
                            <?php
                            $categoriesIds = unserialize($investigation->categories) ;
                            ?>
                            <?php if(!empty($categoriesIds)): ?>
                                <?php
                                $categories = model('LabtestModel')->find($categoriesIds);
                                ?>
                                <ul>
                                    <?php foreach($categories as $category): ?>
                                        <li> - <?= $category->name ?></li>
                                    <?php endforeach ?>
                                </ul>
                            <?php endif ;?>
                        </td>
                        <td>
                            <?php
                            $surgicalIds = unserialize($investigation->surgicals);
                            ?>
                            <?php if(!empty($surgicalIds)): ?>
                                <?php
                                $surgicals= model('SurgicalModel')->find($surgicalIds);
                                ?>
                                <ol class="lis list-item">
                                    <?php foreach($surgicals as $surgical): ?>
                                        <li> - <?= $surgical->name ?></li>
                                    <?php endforeach ?>
                                </ol>
                            <?php endif ;?>
                        </td>
                        <td>
                            <?php if($investigation->status == 'pending'): ?>
                                <span class="bg-yellow-100 uppercase text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300"><?= $investigation->status ?></span>
                            <?php else: ?>
                                <span class="bg-green-100 uppercase text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"><?= $investigation->status ?></span>
                            <?php endif ?>
                        </td>
                        <td>
                            <?= date('d M, Y', strtotime($investigation->updated_at)) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->endSection() ;?>