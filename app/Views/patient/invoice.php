<?= $this->extend('patientLayout') ;?>

<?= $this->section('patient') ;?>

<!-- component -->
<section class="">
  <div class="w-2xl mx-auto py-0 md:py-16">
    <article class="shadow-none md:shadow-md md:rounded-md overflow-hidden">
      <div class="md:rounded-b-md  bg-white">
        <div class="p-9 border-b border-gray-200">
          <div class="space-y-6">
            <div class="flex justify-between items-top">
              <div class="space-y-4">
                <div>
                  <p class="font-bold text-lg"> Invoice </p>
                </div>
                <div>
                  <p class="font-medium text-sm text-gray-400"> Billed To </p>
                  <p> <?= $patient->first_name ." ". $patient->middle_name ." ". $patient->last_name ;?> </p>
                  <p><?= $patient->phone ?> </p>
                  <p><?= $patient->address ;?></p>
                </div>
              </div>
              <div class="space-y-2">
                <div>
                  <p class="font-medium text-sm text-gray-400"> Invoice Number </p>
                  <p> <?= "INV-". random_int (1000000, 9999999) ;?> </p>
                </div>
                <div>
                  <p class="font-medium text-sm text-gray-400"> Invoice Date </p>
                  <p> <?= date('d M Y') ;?> </p>
                </div>
               
                <div>
                  <a href="#" target="_blank" class="inline-flex items-center text-sm font-medium text-blue-500 hover:opacity-75 "> Download PDF <svg class="ml-0.5 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"></path>
                      <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"></path>
                    </svg>
                  </a>
                </div>
                
              </div>
            </div>
          </div>
        </div>
       
        <table class="w-full divide-y divide-gray-200 text-sm">
          <thead>
            <tr>
              <th scope="col" class="px-9 py-4 text-left font-semibold text-gray-400"> Item </th>
              <th scope="col" class="py-3 text-left font-semibold text-gray-400">  </th>
              <th scope="col" class="py-3 text-left font-semibold text-gray-400"> Amount </th>
              <th scope="col" class="py-3 text-left font-semibold text-gray-400"> </th>
              <th scope="col" class="py-3 text-left font-semibold text-gray-400"></th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <?php $total = 0 ;?>
            <?php foreach ($invoiceItems as $item): ?>
                <tr>
                  <td class="px-9 py-5 whitespace-nowrap space-x-1 flex items-center">
                    <div>
                      <p><?= $item->name ;?> </p>
                    </div>
                  </td>
                  <td class="whitespace-nowrap text-gray-600 truncate"></td>
                  <?= $total += ($item->price * $item->quantity) ;?>
                  <td class="whitespace-nowrap text-gray-600 truncate"><?= number_format($item->price * $item->quantity) ;?></td>
                </tr>
            <?php endforeach ?>
          </tbody>
          <!-- <tfooter>
            <tr class="py-4">
              <th class="text-left">Total</th>
              <td></td>
              <td class="text-left"><?//= number_format($total) ;?></td>
            </tr>
          </tfooter> -->
        </table>
        <div class="p-9 border-b border-gray-200">
          <div class="space-y-3">
            <div class="flex justify-between">
              <div>
                <p class="text-gray-500 text-sm"> Total </p>
              </div>
              <p class="text-gray-500 text-sm ml-10"> <?= number_format($total) ;?> </p>
            </div>
          </div>
        </div>
        <!-- <div class="p-9 border-b border-gray-200">
          <div class="space-y-3">
            <div class="flex justify-between">
              <div>
                <p class="font-bold text-black text-lg"> Amount Due </p>
              </div>
              <p class="font-bold text-black text-lg"> $360.00 </p>
            </div>
          </div>
        </div> -->
      </div>
    </article>
  </div>
</section>

<?= $this->endSection() ;?>