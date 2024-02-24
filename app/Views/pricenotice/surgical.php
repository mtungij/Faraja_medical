
<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>





<section class="w-full">
    <div class="w-full">
        <!-- Start coding here -->
        <div class=" dark:bg-gray-800 relative sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                   
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    
                    <div class="flex items-center space-x-3 w-full md:w-auto">
                  
                        <!-- <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Filter
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button> -->
                        <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">Filter By</h6>
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>S/no</th>
                            <th>Surgical Name</th>
                            <th>Price</th>
                            <!-- <th>QUANTITY</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php  $i = 1 ;?> 
                    <?php foreach ($surgical as $value) : ?>
                
                     
                        <tr>
                           <td><?= $i ++ ;?></td>
                            <td><?= $value->name ;?></td>
                            <td><?= $value->price ;?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    </section>

    



    <?= $this->endSection() ;?>

