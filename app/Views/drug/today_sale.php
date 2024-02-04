<?= $this->extend('main') ;?>

<?= $this->section('content') ;?>


<dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
    <div class="relative overflow-hidden rounded-lg bg-gray-600 px-4 pb-6 pt-2 mb-4 shadow sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-yellow-300 p-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart-3"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-white">TOTAL PRODUCT SOLD</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">

     
        <p class="text-2xl pb-4 font-semibold text-gray-100"><?php echo $total_product_sold ?></p>
     
          <span class="sr-only"> Increased by </span>
        </p>
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
            <a href="<?= site_url("product/sold")?>" class="font-medium text-orange-400 hover:text-red-500">View all<span class="sr-only"> Total Subscribers stats</span></a>
          </div>
        </div>
      </dd>
    </div>
    <div class="relative overflow-hidden rounded-lg bg-gray-600 px-4 pb-6 pt-2 mb-4 shadow sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-yellow-300 p-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart-3"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-white">TOTAL SALE</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-100"><?= $total_sales ;?></p>

          <span class="sr-only"> Increased by </span>
        
        </p>
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
           
          </div>
        </div>
      </dd>
    </div>
    <div class="relative overflow-hidden rounded-lg bg-gray-600 px-4 pb-6 pt-2 mb-4 shadow sm:px-6 sm:pt-6">
      <dt>
        <div class="absolute rounded-md bg-yellow-300 p-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bar-chart-big"><path d="M3 3v18h18"/><rect width="4" height="7" x="7" y="10" rx="1"/><rect width="4" height="12" x="15" y="5" rx="1"/></svg>
        </div>
        <p class="ml-16 truncate text-sm font-medium text-white">TOTAL PROFIT</p>
      </dt>
      <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
        <p class="text-2xl font-semibold text-gray-100"><?= $total_profit ?></p>
        
        <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
          <div class="text-sm">
          
          </div>
        </div>
      </dd>
    </div>
  </dl>

<div class="container justify-center mx-auto flex flex-col">
  <div class="w-full">
    <div class="inline-block min-w-full align-middle dark:bg-gray-800">
<section class=" dark:bg-gray-900 p-3 sm:p-5">
    <div class="w-full">
        <!-- Start coding here -->
        <div class="w-full dark:bg-gray-800 ">
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
                <?= $this->include('drug/partials/filter.php') ;?>
                    <div class="flex items-center space-x-3 w-full md:w-auto">
                    <button type="button" class="flex items-center justify-center flex-shrink-0 px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                      <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                      </svg>
                      Export Pdf
                  </button>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">PATIENT NAME</th>
                            <th scope="col" class="px-4 py-3">SELLER NAME</th>
                            <th scope="col" class="px-4 py-3">MEDICINE NAME</th>
                            <th scope="col" class="px-4 py-3">QUANTITY</th>
                            <th scope="col" class="px-4 py-3">UNIT PRICE</th>
                            <th scope="col" class="px-4 py-3">TOTAL PRICE</th>
                            <th scope="col" class="px-4 py-3">PROFIT</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
          
                    $totalPrice = 0;
                    $totalQuantity = 0;
                    $sumprice = 0;
                    $totalprofit = 0;
                    ;?>

          <?php foreach ($todaySales as $value) : ?>


                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">  <?= $value->first_name ." ". $value->middle_name ." ". $value->last_name ?></th>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $value->seller ?></td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $value->drugName ?></td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php  $totalQuantity += $value->quantity ?>

                             <?= $value->quantity ?>
                            </td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php  $totalPrice += $value->price ;?>
                             <?= number_format($value->price)  ?>
                            </td>

                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php  $sumprice += ($value->price * $value->quantity) ;?>
                            <?= number_format($value->price * $value->quantity) ?> 
                            </td>
                            
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?php $totalprofit += (($value->price  -  $value->buy_price) * $value->quantity)  ;?>

                              <?= number_format(($value->price  -  $value->buy_price) * $value->quantity) ;?>
                            </td>
                        </tr>
                        <?php endforeach ?>


                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"></th>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"></td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">TOTAL</td>
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"> <?=  $totalQuantity ;?></td>
                         
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            
                            <?= number_format($totalPrice) ;?>
                             
                            </td>

                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?=  number_format($sumprice) ;?>
                            </td>
                            
                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= number_format($totalprofit) ;?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Showing
                    <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                    of
                    <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                </span>
                <ul class="inline-flex items-stretch -space-x-px">
                    <li>
                        <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Previous</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page" class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <span class="sr-only">Next</span>
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    </section>



   

      
<?= $this->endSection() ;?>