<?= $this->extend('patientLayout') ;?>

<?= $this->section('patient') ;?>

<!-- component -->
<section class="">
  <?php if($invoice && $invoice->investigatigation_id): ?>
    <div class="flex justify-between p-4 bg-sky-200 rounded-lg">
      <p class="flex gap-2">
        <span class="text-base text-sky-950">STATUS</span>
        <?php if($invoice->status == "pending"): ?>
            <span class="bg-yellow-100 uppercase h-fit text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300"><?= $invoice->status ?></span>
        <?php elseif($invoice->status == "paid"): ?>
            <span class="bg-green-50 uppercase h-fit text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"><?= $invoice->status ?></span>
        <?php endif ?>
      </p>
      
      <?php if($invoice->status == 'pending'): ?>
        <form id="form" action="<?= site_url("patients/$patient->id/$invoice->id/invoice_status") ?>" method="post">
          <?= csrf_field() ;?>
          <input type="hidden" name="_method" value="PATCH">
          <select id="countries" name="status" onchange="document.getElementById('form').submit()" class="bg-gray-50 max-w-36 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-1 px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected><?= $invoice->status ?></option>
            <option value="paid">Paid</option>
          </select>
          <button type="submit" class="hidden"></button>
        </form>
      <?php endif ?>
    </div>
  <?php endif ?>

  <div class="w-2xl mx-auto py-0 md:py-6">
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

        <?php $totalAmount = 0 ;?>
        <?php if($investigations): ?>
         <div class="relative overflow-x-auto my-6 px-3">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-s-lg">
                            Investigation Name
                        </th>
                      
                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                            Amount
                        </th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  $investigationsIds = unserialize($investigations->categories);

                  $invests = model('LabtestModel')->find($investigationsIds);
                  ;?>
                <?php foreach ($invests as $item) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $item->name ;?>
                    </th>
                    <td class="px-6 py-4">
                      <?php $totalAmount += ($item->price) ;?>
                      <?= number_format($item->price) ;?>
                    </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </div>
            <!-- <tfoot>
                <tr class="font-semibold text-gray-900 dark:text-white">
                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                    <td class="px-6 py-3"><?//= number_format($totalAmount) ;?></td>
                </tr>
            </tfoot> -->
       </table>
      </div>
      <?php if($investigations->surgicals): ?>
         <div class="relative overflow-x-auto my-6 px-3">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-s-lg">
                            Surgical Name
                        </th>
                      
                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                            Amount
                        </th>
                    </tr>
                </thead>
                <tbody>
                  <?php 
                  $surgicalIds = unserialize($investigations->surgicals);

                  $surgicals = model('SurgicalModel')->find($surgicalIds);
                  ;?>
                <?php foreach ($surgicals as $item) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $item->name ;?>
                    </th>
                    <td class="px-6 py-4">
                      <?php $totalAmount += ($item->price) ;?>
                      <?= number_format($item->price) ;?>
                    </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </div>
            <!-- <tfoot>
                <tr class="font-semibold text-gray-900 dark:text-white">
                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                    <td class="px-6 py-3"><?//= number_format($totalAmount) ;?></td>
                </tr>
            </tfoot> -->
       </table>
      </div>
      <?php endif ?>
      <?php endif ?>




        <div class="relative overflow-x-auto px-3">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-s-lg">
                            DRUG NAME
                        </th>
                      
                        <th scope="col" class="px-6 py-3 rounded-e-lg">
                            AMOUNT
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($invoiceItems as $item) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $item->name ;?>
                    </th>
                    <td class="px-6 py-4">
                      <?php $totalAmount += ($item->price * $item->quantity) ;?>
                        <?= number_format($item->price * $item->quantity) ;?>
                    </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </div>
            <tfoot>
                <tr class="font-semibold text-gray-900 dark:text-white">
                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                    <td class="px-6 py-3"><?= number_format($totalAmount) ;?></td>
                </tr>
            </tfoot>
       </table>
      
      </div>
    </article>
  </div>
</section>


<script>
  function changePaymentStatus(selectElement) {
    const value = selectElement.value;
    console.log(value)

    //send request request to update the payment status - url is /patients/patient_id/<?= $invoice->id ;?>/invoice_status
    //if success reload the page

    fetch(`/patients/<?= (int) $patient->id; ?>/<?= (int) $invoice->id ;?>/invoice_status`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        // 'X-Requested-With': 'XMLHttpRequest'
      },
      body: JSON.stringify({status: value})
    })
    .then(response => console.log(response))
    .then(data => {
      console.log(data)
      // location.assign(location.href)
    })
    .catch(error => console.log(error))

  }
</script>

<?= $this->endSection() ;?>