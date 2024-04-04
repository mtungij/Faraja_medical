
<?= $this->extend('patientLayout') ;?>

<?= $this->section('patient') ;?>

<section class="bg-gray-50 dark:bg-gray-900 mb-20">
    <h2 class="text-2xl font-semibold text-sky-950">Treatment area</h2>

    <div class="my-3">
        <form action="<?php echo base_url('medicine/add') ?>" method="post" class="grid grid-cols-1 md:grid-cols-2 items-center gap-6">
            <input type="hidden" name="user_id" value="<?= session('user_id') ?>">
            <input type="hidden" name="patient_id" value="<?= $patient->id ?>">
            <select name="drug_id" data-te-select-init data-te-select-filter="true" data-te-select-placeholder="select medicine" class="w-full p-2 border rounded">
                    <?php foreach ($drugs as $drug) : ?>
                        <option value="<?= $drug->id ?>"><?= $drug->name ;?></option>
                    <?php endforeach ?>
            </select>
            <div>
                <!-- <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label> -->
                <input type="number" id="quantity" name="qty" placeholder="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required />
            </div>

            <div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>

        <div class="relative overflow-x-auto mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-50 uppercase bg-sky-600 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Drug Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach($treatments as $treatment): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $treatment->name ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= number_format($treatment->sell_price) ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $treatment->qty ?>
                            </td>
                            <?php
                            $total += $treatment->sell_price * $treatment->qty
                             ?>
                            <td><?= $treatment->created_at ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
            <tr class="font-semibold text-gray-900 dark:text-white">
                <th scope="row" class="px-6 py-3 text-base">Total</th>
                <td class="px-6 py-3"></td>
                <td class="px-6 py-3"><?=number_format($total) ?></td>
            </tr>
        </tfoot>
            </table>
        </div>

    </div>
</section>

<?= $this->endSection() ;?>