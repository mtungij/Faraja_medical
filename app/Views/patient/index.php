<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

<section class="bg-gray-50 dark:bg-gray-900">
    <div class=" w-full ">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-sky-800 relative   sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center w-full justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
            <form action="<?= site_url("loadRecord") ?>" id="searchForm" class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="search" value="<?= $search ?>" id="btnsearch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search Patient" required="">
                        </div>
                    <input type="submit" id="btnsearch" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick='document.getElementById("searchForm").submit();'>
                        
                        <span class="sr-only">Search</span>
                 </input>
            </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <a href="<?= site_url("create_patient") ?>" type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Register Patient
                      </a>
                </div>
            </div>

            <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
       
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              All Patients
            </h4>
            <div class="w-full">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Patient Name</th>
                      <th class="px-4 py-3">Phone Number</th>
                      <th class="px-4 py-3">Gender</th>
                      <th class="px-4 py-3">Illiness Status</th>
                      <th class="px-4 py-3">Age</th>
                      <th class="px-4 py-3">Address</th>
                      <th class="px-4 py-3">Action</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php $j=1 ;?>
                        <?php foreach ($users as $item) : ?>
                    <tr class="text-gray-700  dark:text-gray-400">
                      <td class="w-full">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >

                          <?php
                     if ($item->gender == 'female') {
        // Display female picture
              echo '<img src="/img/female.png" alt="Female Image">';
                      } else {
        // Display male picture or a default image for other genders
                      echo '<img src="/img/male2.png" alt="Male Image">';
                         }
                          ?>

                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="uppercase"><a  href="<?= site_url("/nextpage/$item->id") ?>">
                             <?= $item->first_name . " " . $item->middle_name . " " . $item->last_name ?>
                          
                           </p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                             
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?= $item->phone ;?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                      <?= $item->gender ;?></
                      </td>
                      <td class="px-4 py-3 text-sm">
                      <?php
                      $statusClass = ($item->illiness_status == 'normal') ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
                    ?>
                        <span class="<?= $statusClass; ?> text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 <?= ( $item->illiness_status == 'active') ? 'dark:text-green-400 border border-green-400' : 'dark:text-red-400 border border-red-400'; ?>">
                        <?= ucfirst($item->illiness_status ); ?>
                    </span>

                      </td>
                      <td class="px-4 py-3">
                      <?=  $item->age ;?>
                      </td>
                     
                      <td class="px-4 py-3">
                      <?=  $item->address ;?>
                      </td>
                      <td class="px-4 py-3">
                      <div class="flex items-center space-x-4 text-sm">
                      <a  href="<?= site_url("/nextpage/$item->id") ?>">
                            <button class="flex space-x-2 items-center px-3 py-2 bg-sky-500 rounded-md drop-shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye">
                                  <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                 <circle cx="12" cy="12" r="3"/>
                              </svg>

                                    <span class="text-white">View</span>
                           </button>
                          </a>

                          <a  href="<?= site_url("/editpage/$item->id") ?>">
                            <button class="flex space-x-2 items-center px-3 py-2 bg-sky-500 rounded-md drop-shadow-md">
                           
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil">
                              <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                              <path d="m15 5 4 4"/>
                            </svg>
                          </button>
                        </a>
                        </div>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
                <span class="flex items-center col-span-3">
                  Showing 21-30 of 100
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <li>
                        <button
                          class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                          aria-label="Previous"
                        >
                          <svg
                            class="w-4 h-4 fill-current"
                            aria-hidden="true"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          1
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          2
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          3
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          4
                        </button>
                      </li>
                      <li>
                        <span class="px-3 py-1">...</span>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          8
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                        >
                          9
                        </button>
                      </li>
                      <li>
                        <button
                          class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                          aria-label="Next"
                        >
                          <svg
                            class="w-4 h-4 fill-current"
                            aria-hidden="true"
                            viewBox="0 0 20 20"
                          >
                            <path
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"
                              fill-rule="evenodd"
                            ></path>
                          </svg>
                        </button>
                      </li>
                    </ul>
                  </nav>
                </span>
              </div>
            </div>
          </div>
        </main>







        </div>
    </div>
    </section>
<?= $this->endSection() ;?>




