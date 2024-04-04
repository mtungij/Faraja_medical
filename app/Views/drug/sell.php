<?= $this->extend('main') ?>

<?= $this->section('content') ;?>

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

<section class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div class="relative overflow-x-auto">
        <h2 class="text-3xl font-bold text-sky-950 my-3">Cart</h2>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-50 uppercase bg-sky-600/90 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-2">
                        Product name
                    </th>
                    <th scope="col" class="p-2">
                        Quantity
                    </th>
                    <th scope="col" class="p-2">
                        Price
                    </th>
                    <th scope="col" class="p-2">
                        Subtotal
                    </th>
                    <th scope="col" class="p-2">
                        Cancel
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0 ;?>
                <?php foreach ($cart as $key => $item) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $item['name'] ?>
                        </th>
                        <td class="p-2">
                           <!-- quantity input -->
                            <form action="<?= site_url("sell/update") ?>" method="post" class="flex gap-1.5">
                                  <?= csrf_field() ?>
                                  <input type="hidden" name="_method" value="PATCH">
                                  <input type="hidden" name="drug_id" value="<?= $item['id'] ?>">
                                  <input type="hidden" name="rowid" value="<?= $key ?>">
                                  <input type="number" name="qty" value="<?= $item['qty'] ?>" class="w-20 px-2 py-1 border border-gray-300 rounded-lg focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                                  <button type="submit" class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" class="w-4 h-4" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-pen"><path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.375 2.625a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4Z"/></svg>
                                  </button>
                             </form>
                        </td>
                        <td class="p-2">
                            <?= number_format($item['price']) ?>
                        </td>
                        <td class="p-2"> 
                            <?php $total += $item['subtotal'] ;?>
                            <?= number_format($item["subtotal"]) ?>
                        </td>
                        <td class="p-2">
                            <form action="<?= site_url("sell/remove") ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="rowid" value="<?= $key ?>">
                                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                </button>
                            </form>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="flex justify-end w-full">
            <div>
                <h2 class="text-2xl font-bold text-sky-950 my-3">Total: <?= number_format($total) ?></h2>
                <form action="<?= site_url("sell/checkout") ?>" method="post" class="space-y-3">
                    <?= csrf_field() ?>
                    <input type="hidden" name="patient_id" value="<?= $patient->id ?>">
                    <select name="payment_id"  class="shrink">
                        <?php foreach ($payments as $payment): ?>
                            <option selected value=" <?= $payment->id ?>"><?= $payment->name ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="flex justify-end">
                        <button type="submit" class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Sell</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div class="relative overflow-x-auto">
        <table id="myTable" class="display">
            <thead >
                <tr>
                    <th>
                        Product name
                    </th>
                    <th>
                        Stock
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Sell
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($drugs as $item) : ?>
                    <tr>
                        <th>
                            <?= $item->name ?>
                        </th>
                        <td class="flex gap-1 items-center">
                            <?php if($item->quantity <= $item->stock_limit): ?>
                             <span class="flex w-3 h-3 me-3 bg-red-500 rounded-full"></span>
                             <?php else: ?>
                                <span class="flex w-3 h-3 me-3 bg-green-500 rounded-full"></span>
                            <?php endif ?>
                            <span>
                                <?= $item->quantity ?>
                            </span>
                        </td>
                        <td>
                            <?= $item->sell_price ?>
                        </td>
                        <td>
                            <?php if($item->quantity != 0): ;?>
                                <form action="<?= site_url("sell") ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="drug_id" value="<?= $item->id ?>">
                                    <button type="submit" class="text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Sell</button>
                                </form>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>

<?= $this->endSection() ;?>