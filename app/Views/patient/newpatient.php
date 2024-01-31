<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>

<section class="bg-gray-50 dark:bg-gray-900">
    <div class=" w-full ">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-sky-800 relative   sm:rounded-lg overflow-hidden">
          

            <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
       
            <h4
              class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
            >
              New Patients
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




