
<?= $this->extend('patientLayout') ;?>

<?= $this->section('patient') ;?>

<section class="bg-gray-50 dark:bg-gray-900">
    <header>
        <h2 class="text-2xl font-bold my-3">Surgicals</h2>
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
                    <?= $this->include('patient/partials/createSurgical') ;?>
                </div>
            </div>
            
        <ol class="mx-4 relative border-s border-gray-300 dark:border-gray-700"> 
            <?php foreach ($surgicalRecords as $surgical):?>  
                <li class="mb-4 ms-4">
                    <div class="absolute w-3 h-3 bg-gray-300 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                        <?= date('d M Y H:i', strtotime($surgical->created_at))  ;?>
                    </time>
                    <h3 class="font-medium text-sky-950 mb-3">surgical by <?= $surgical->user->name ?></h3>
                    <div class="border border-gray-300 rounded-md my-3 p-3">
                        <h3 class="font-medium text-sky-950 mb-3">surgicals</h3>
                        <ul role="list" class="marker:text-sky-400 list-disc pl-5 space-y-3 text-sky-950/60">
                            <?php foreach($surgical->items as $item): ?>
                               <li><?= $item->name ?></li>
                            <?php endforeach ;?>
                        </ul>
                    </div>
                </li>
                <?php endforeach ;?>
            </ol>
        </div>
    </div>
    </section>

<?= $this->endSection() ;?>