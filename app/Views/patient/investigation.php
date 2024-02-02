
<?= $this->extend('patientLayout') ;?>

<?= $this->section('patient') ;?>

<section class="bg-gray-50 dark:bg-gray-900">
    <header>
        <h2 class="text-2xl font-bold my-3">Investigations</h2>
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
                    <?= $this->include('patient/partials/createInvestigation') ;?>
                    
                    <div class="flex items-center space-x-3 w-full md:w-auto">
                        <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                            Actions
                        </button>
                        <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-300" aria-labelledby="actionsDropdownButton">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass Edit</a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-300 dark:hover:text-white">Delete all</a>
                            </div>
                        </div>
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Filter
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Choose brand</h6>
                            <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                <li class="flex items-center">
                                    <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Apple (56)</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="fitbit" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Microsoft (16)</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="razor" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="razor" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Razor (49)</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="nikon" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="nikon" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Nikon (12)</label>
                                </li>
                                <li class="flex items-center">
                                    <input id="benq" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="benq" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">BenQ (74)</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
        <ol class="mx-4 relative border-s border-gray-300 dark:border-gray-700"> 
            <?php foreach ($investigations as $investigation):?>  
                <?php
                    $serializedSurgicals = unserialize($investigation->surgicals);
                    $serializedcategories = unserialize($investigation->categories);
                    $surgicals = [];
                    $categories = [];
                    if(!empty($serializedSurgicals)) {
                        $surgicals = model('SurgicalModel')->find($serializedSurgicals);
                    }
                    if(!empty($serializedcategories)) {
                        $categories = model('LabtestModel')->find($serializedcategories);
                    }
                    ?>

                    <?php $invoice = model('InvoiceModel')->where('investigatigation_id', $investigation->id)->first() ;?>
                                   
                <li class="mb-4 ms-4">
                    <div class="absolute w-3 h-3 bg-gray-300 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                        <?= date('d M Y', strtotime($investigation->created_at))  ;?>
                        <?php if($invoice): ?>
                            <?php if($invoice->status == "pending"): ?>
                                <span class="bg-yellow-100 uppercase text-yellow-800 text-xs font-medium me-2 px-2.5 py-1 rounded-full dark:bg-yellow-900 dark:text-yellow-300"><?= $invoice->status ?></span>
                            <?php else: ?>
                                <span class="bg-green-200 uppercase text-green-900 text-xs font-medium me-2 px-2.5 py-1 rounded-full dark:bg-green-900 dark:text-green-300"><?= $invoice->status ?></span>
                            <?php endif ;?>
                        <?php endif ;?>
                    </time>
                    <div class="border border-gray-300 rounded-md my-3 p-3">
                        <h3 class="font-medium text-sky-950 mb-3">Investigations</h3>
                        <ul role="list" class="marker:text-sky-400 list-disc pl-5 space-y-3 text-sky-950/60">
                            <?php foreach ($categories as $item) : ?>
                                <li><?= $item->name ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <?php if($investigation->surgicals || !empty($investigation->surgicals)): ?>
                        <div class="border border-gray-300 rounded-md my-3 p-3">
                            <h3 class="font-medium text-sky-950 mb-3">Surgicals</h3>
                            <ul role="list" class="marker:text-sky-400 list-disc pl-5 space-y-3 text-sky-950/60">
                                <?php foreach ($surgicals as $item) : ?>
                                    <li><?= $item->name ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    <?php endif ;?>
                    <?php 
                    if($investigation->replied_by != null) {
                        $replied_by = model('UserModel')->where('id', $investigation->replied_by)->first()->name;
                    }
                     ?>
                    <div class="border border-gray-300 rounded-md p-3">
                        <h3 class="text-lg font-semibold text-gray-900 border-b-2 border-sky-900 w-fit dark:text-white">
                            <span class="font-medium text-sky-950n pb-2">Comment</span>
                            </h3>
                        <article class="prose lg:prose-xl">
                            <?= $investigation->comment ?? 'No comment' ?>
                        </article>
                    </div>

                    <?php if($investigation->result): ?>
                        <div class="border border-gray-300 rounded-md p-3 ml-20 my-4 bg-sky-100">
                            <h3 class="text-lg font-semibold text-gray-900 w-fit dark:text-white">
                                <span class="font-medium text-sky-950n pb-2">Replied by - <i class="font-normal"><?= $replied_by ?? "No results yet" ?></i></span>
                                </h3>
                            <article class="prose lg:prose-xl">
                                <?= $investigation->result ?? 'No replay yet' ?>
                            </article>
                        </div>
                    <?php endif ;?>
                </li>
                <div class="flex justify-end">
                   

                    <?php if(!$investigation->result || !$investigation->user_id): ?>
                        <a href="<?= site_url("patients/$patient->id/investigations/$investigation->id/edit") ?>" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Replay
                        </a> 
                    <?php endif ;?>
 
                </div>
            <?php endforeach ;?>
        </ol>
        </div>
    </div>
    </section>

<?= $this->endSection() ;?>