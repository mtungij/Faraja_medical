<?= $this->extend('patientLayout') ;?>

<?= $this->section('patient') ;?>
    <div class="bg-slate-700 p-10">
      <!-- invoice confirmation(select) -->
      <div>
        <div class="flex justify-between items-center">
          <h1 class="text-2xl font-semibold">Invoice</h1>
          <div class="flex items-center">
            <a href="<?= site_url('risit/'.$patient->id.'/'.$invoice->id.'/print') ?>" target="_blanck" class="bg-sky-700 text-white px-4 py-2 rounded-lg">Print</a>
            <a href="<?= site_url('risit/'.$patient->id.'/'.$invoice->id.'/print') ?>" target="_blanck" class="bg-sky-700 text-white px-4 py-2 rounded-lg ms-2">Download</a>
          </div>
        </div>
      </div>
      <div class="p-10 m-10 bg-slate-100">
          <header class="flex justify-between items-center mb-6">
              <div>
                <img src="themesberg-logo.png" alt="logo" class="w-16 h-16">
                <div class="text-left">
                  <p><?= strtoupper( $setting->center_name) ;?></p>
                  <address>
                    <?= $setting->address ;?> <br />
                    <?= $setting->phone ;?> <br />
                    <?= $setting->email ;?>
                  </address>
                </div>
              </div>
              <div class="text-right">
                  <h1 class="text-2xl font-semibold">Invoice #<?= $invoiceType->number ?></h1>
                  <p class="text-sm"><?= date('d M Y H:i', strtotime($invoiceType->created_at)) ?></p>
              </div>
          </header>
          <div class="mb-6">
              <h2 class="text-xl font-semibold">BILL TO</h2>
              <p class="text-sm "><?= ucfirst($patient->first_name) . " " . ucfirst($patient->middle_name) . " " . ucfirst($patient->last_name) . "." ;?></p>
              <p class="text-sm"><?= $setting->address ?></p>
              <p class="text-sm"><?= $patient?->phone ?></p>
          </div>
          <table class="w-full border-collapse border border-gray-600">
              <thead>
                  <tr>
                      <th class="p-2 border border-gray-600">ITEM</th>
                      <th class="p-2 border border-gray-600">PRICE</th>
                      <th class="p-2 border border-gray-600">QTY</th>
                      <th class="p-2 border border-gray-600 text-left" colspan="2">TOTAL</th>
                  </tr>
              </thead>
              <tbody>
                <?php $total = 0; ?>
                <?php foreach($invoiceType->items as $item): ?>
                  <tr>
                      <td class="p-2 border border-gray-600"><?= strtoupper($item->name) ?></td>
                      <td class="p-2 border border-gray-600"><?= number_format($item->price) ?></td>
                      <td class="p-2 border border-gray-600"><?= $item->quantity ?></td>
                      <?php 
                      if($invoice->invoiceable_type == 'investigations' && $item->status == "seen") {
                        $total += ($item->price * $item->quantity) ;
                      } else {
                        $total += ($item->price * $item->quantity) ;
                      }
                      ?>
                      <td class="p-2 border border-gray-600"><?= number_format($item->price * $item->quantity) ?></td>
                      <?php if($invoice->invoiceable_type == 'investigations'): ?>
                        <?php if($item->status == 'seen'):?>
                        <td class="p-2 border border-gray-600 text-green-600"><?= $item->status ?></td>
                        <?php else: ?>
                          <td class="p-2 border border-gray-600 text-red-600"><?= $item->status ?></td>
                        <?php endif ?>
                      <?php endif ;?>
                  </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
          <div class="mt-6 text-right">
              <p class="text-sm">SUBTOTAL TSH: <?= number_format($total) ?></p>
              <p class="text-sm">TAX RATE: 0%</p>
              <p class="text-sm">DISCOUNT: 0%</p>
              <p class="text-xl font-semibold mt-2">TOTAL TSH:  <?= number_format($total) ?></p>
          </div>
      </div>
    </div>

<?= $this->endSection() ;?>