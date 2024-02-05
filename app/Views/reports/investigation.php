<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

<?php

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
}

?>

<section>
    <div>

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