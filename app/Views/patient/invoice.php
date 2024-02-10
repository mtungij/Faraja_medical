<?= $this->extend('patientLayout') ;?>

<?= $this->section('patient') ;?>
<?php 
use App\Models\SettingModel;

$setting = model(SettingModel::class)->first();

;?>
<!-- component -->
<section class="">
  <?php if($invoice && ($invoice->investigatigation_id || $invoice->rch_record_id || $invoice->sale_id)): ?>
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
            <!-- <div class ="flex justify-center">
               <?= $setting->center_name ;?>
               <br><br>
               <?= $setting->location ;?>
            </div> -->
        <div class="p-9 border-b border-gray-200">
          <div class="space-y-6">
            <div class="flex justify-between items-top">
              <div class="space-y-4">
                <div>
                  <p class="font-bold text-lg"> Invoice </p>
                </div>
                <div>
                  <p class="font-medium text-sm text-gray-400"> Billed To </p>
                  <p style="text-transform: uppercase; font-weight: bold;"><?= $patient->first_name ." ". $patient->middle_name ." ". $patient->last_name ;?></p>
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
                  <a href="#" target="_blank" class="inline-flex items-center text-sm font-bold text-blue-500 hover:opacity-75 "> PRINT RECEIPT 
                  </a>
                </div>
                
              </div>
            </div>
          </div>
        </div>

        <?php $totalAmount = 0 ;?>
        <?php if($investigations): ?>
          <?php 
          $investigationsIds = unserialize($investigations->categories) ?? [];
          ?>

          <?php if(count($investigationsIds) > 0): ?>
         <div class="relative overflow-x-auto my-6 px-3">
            <table class="w-full border border-gray-200 rounded text-sm text-left text-gray-500 dark:text-gray-400">
                      <thead class="text-xs border-b border-gray-300 uppercase text-white bg-sky-700 dark:bg-gray-700 dark:text-gray-400">
                          <tr>
                              <th scope="col" class="px-4 py-3">IVESTIGATION NAME</th>
                              <th scope="col" class="px-4 py-3">PRICE</th>
                          </tr>
                </thead>
                <tbody>
                  <?php
                  $invests = model('LabtestModel')->find($investigationsIds);

                   $totalCategories = 0 ;
                   ?>
                <?php foreach ($invests as $item) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-bold text-red-700  whitespace-nowrap dark:text-white">
                        <?= $item->name ;?>
                    </th>
                    <td class="px-6 py-4">
                      <?php $totalAmount += ($item->price) ;?>
                      <?php $totalCategories += ($item->price) ;?>
                      <?= number_format($item->price) ;?>
                    </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </div>
            <tfoot>
                <tr class="font-semibold text-gray-900 dark:text-white">
                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                    <td class="px-6 py-3"><?= number_format($totalCategories) ;?></td>
                </tr>
            </tfoot>
       </table>
      </div>
      <?php endif ;?>

      
      <?php if($investigations->surgicals): ?>
        <?php 
        $surgicalIds = unserialize($investigations->surgicals) ?? [];
        ?>

        <?php if(count($surgicalIds) > 0): ?>
        <div class="relative overflow-x-auto my-6 px-3">
           <table class="w-full border border-gray-200 rounded text-sm text-left text-gray-500 dark:text-gray-400">
                      <thead class="text-xs border-b border-gray-300 uppercase text-white bg-sky-700 dark:bg-gray-700 dark:text-gray-400">
                          <tr>
                              <th scope="col" class="px-4 py-3">SURGICAL NAME</th>
                              <th scope="col" class="px-4 py-3">PRICE</th>
                          </tr>
                </thead>
                <tbody>
                    <?php
                     $totalSurgicals1 = 0;
                     $surgicals = model('SurgicalModel')->find($surgicalIds);
                     ?>
                    <?php foreach ($surgicals as $item) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-red-700 whitespace-nowrap dark:text-white">
                            <?= $item->name ;?>
                        </th>
                        <td class="px-6 py-4">
                          <?php $totalAmount += ($item->price) ;?>
                          <?php $totalSurgicals1 += ($item->price) ;?>
                          <?= number_format($item->price) ;?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </div>
                <tfoot>
                  <tr class="font-semibold text-gray-900 dark:text-white">
                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                    <td class="px-6 py-3"><?= number_format($totalSurgicals1) ;?></td>
                  </tr>
                </tfoot>
          </table>
        </div>
        <?php endif ;?>
        
        <?php endif ?>
        <?php endif ?>
        
        <?php if(count($rchesRecords) > 0): ?>
          <div class="overflow-x-auto">
                  <table class="w-full border border-gray-200 rounded text-sm text-left text-gray-500 dark:text-gray-400">
                      <thead class="text-xs border-b border-gray-300 uppercase text-white bg-sky-700 dark:bg-gray-700 dark:text-gray-400">
                          <tr>
                              <th scope="col" class="px-4 py-3">S/N</th>
                              <th scope="col" class="px-4 py-3">RCH NAME</th>
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
                          <?php foreach($rchesRecords as $rch): ?>
                              <tr class="border-b dark:border-gray-700">
                                  <th scope="row" class="px-4 py-3">
                                      <?= $rowId++ ?>
                                  </th>
                                  <?php $total += $rch->price ;?>
                                  <td class="px-4 py-3 text-red-700"><?= $rch->name ?></td>
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
        <?php endif ;?>


        <?php if($invoiceItems): ?>
        <div class="relative overflow-x-auto px-3">
             <table class="w-full border border-gray-200 rounded text-sm text-left text-gray-500 dark:text-gray-400">
                      <thead class="text-xs border-b border-gray-300 uppercase text-white bg-sky-700 dark:bg-gray-700 dark:text-gray-400">
                          <tr>
                              <th scope="col" class="px-4 py-3">DRUG NAME</th>
                              <th scope="col" class="px-4 py-3">AMOUNT</th>
                          </tr>
                </thead>
                <tbody>
                <?php $totalSales = 0 ;?>
                <?php foreach ($invoiceItems as $item) : ?>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $item->name ;?>
                    </th>
                    <td class="px-6 py-4">
                      <?php $totalAmount += ($item->price * $item->quantity) ;?>
                      <?php $totalSales += ($item->price * $item->quantity) ;?>

                        <?= number_format($item->price * $item->quantity) ;?>
                    </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </div>
            <tfoot>
                <tr class="font-semibold text-gray-900 dark:text-white">
                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                    <td class="px-6 py-3"><?= number_format($totalSales) ;?></td>
                </tr>
            </tfoot>
       </table>
      </div>
      <?php endif ;?>

      <div class="flex justify-between px-10 my-6">
         <div class="text-xl ">
           Total Amount
         </div>
         <div class="text-xl font-bold">
           <?= number_format($totalAmount) ;?>
         </div>
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