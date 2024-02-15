
<?= $this->extend('patientLayout') ;?>

<?= $this->section('patient') ;?>

<section class="bg-gray-50 dark:bg-gray-900">
    <header>
        <h2 class="text-2xl font-bold my-3">RCH</h2>
    </header>
    <?php if(session('val_errors')): ?>
        <ul>
            <?php foreach(session('val_errors') as $key => $error): ?>
                <li class="text-red-500"><?= $error ?></li>
            <?php endforeach ;?>
        </ul>
    <?php endif ;?>

    <div class="">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <?= $this->include('patient/partials/createrch') ;?>
                </div>
            </div>
        <?php foreach($rchesRecords as $rchesRecord): ?>
         <div class="overflow-x-auto">
                <div class="inline-flex rounded-md shadow-sm my-3" role="group">
                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-s-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                       INVOICE STATUS
                    </button>
                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                       
                        <?php if($invoiceStatus == 'pending'): ?>
                            <span class="bg-yellow-100 text-yellow-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300"> <?= $invoiceStatus ?></span>
                        <?php else: ?>
                            <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"> <?= $invoiceStatus ?></span>
                        <?php endif ?>
                    </button>
                </div>

                <table class="w-full border border-gray-200 rounded text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs border-b border-gray-300 uppercase text-white bg-sky-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">S/N</th>
                            <th scope="col" class="px-4 py-3">NAME</th>
                            <th scope="col" class="px-4 py-3">PRICE</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $rowId = 1 ;
                        $total = 0;
                        ?>
                        <?php foreach($rchesRecord->items as $rch): ?>
                            <tr class="border-b dark:border-gray-700">
                                <th scope="row" class="px-4 py-3">
                                    <?= $rowId++ ?>
                                </th>
                                <?php $total += $rch->price ;?>
                                <td class="px-4 py-3"><?= $rch->name ?></td>
                                <td class="px-4 py-3"><?= number_format($rch->price) ?></td>
                            </tr>
                        <?php endforeach ;?>
                    </tbody>
                    <tfoot>
                        <td class=""></td>
                        <th>Total Price</th>
                        <th><?= number_format($total) ?></th>
                    </tfoot>
                </table>

            </div>
        <?php endforeach ;?>
        </div>
    </div>
    </section>

<?= $this->endSection() ;?>