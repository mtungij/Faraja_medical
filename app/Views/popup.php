<?= $this->extend('main') ?>

<?= $this->section('content') ;?>


<div class="max-w-2xl mx-4   sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-sm sm:mx-auto md:mx-auto lg:mx-auto xl:mx-auto  bg-white shadow-xl rounded-lg text-gray-900">
                    <div class="image  overflow-hidden">
                        
                    <?php
                     if ($patient->gender == 'female') {
        // Display female picture
              echo '<img src="/img/female.png" alt="Female Image">';
                      } else {
        // Display male picture or a default image for other genders
                      echo '<img src="/img/male2.png" alt="Male Image">';
                         }
                          ?>
                    </div>
                    <h1 class="text-gray-900 font-bold text-l flex justify-center"><?= $patient->first_name ." ".$patient->middle_name ." ".$patient->last_name ;?></h1>
                    <h3 class=" font-lg text-bold flex justify-center  ">
                   
                   <?= $patient->phone ;?>

                    </h3>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">

                    </p>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto">
                            <?php
                      $statusClass = ($patient->illiness_status == 'normal') ? 'bg-green-300   py-2 px-5 ' : 'bg-red-100 text-red-800';
                    ?>
                        <span class="<?= $statusClass; ?> text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 <?= ( $patient->illiness_status == 'active') ? 'dark:text-green-400 border border-green-400' : 'dark:text-red-400 border border-red-400'; ?>">
                        <?= ucfirst($patient->illiness_status ); ?>
                    </span>
                              
                            <span
                          </li>
                          <!-- <li class="flex items-center py-3">
                            <span>Member since</span>
                            <span class="ml-auto">Nov 07, 2016</span>
                          </li> -->
                    </ul>
                  </div>





<?= $this->endSection() ;?>



