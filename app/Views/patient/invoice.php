<?= $this->extend('patientLayout') ;?>

<?= $this->section('patient') ;?>
    <div class="bg-slate-700 p-10">
      <!-- invoice confirmation(select) -->
      <div>
        <div class="flex justify-between items-center">
          <h1 class="text-2xl font-semibold">Invoice</h1>
          <div class="flex items-center">
            <a href="invoice/1" class="bg-sky-700 text-white px-4 py-2 rounded-lg">Print</a>
            <a href="" class="bg-sky-700 text-white px-4 py-2 rounded-lg ms-2">Download</a>
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
                  <h1 class="text-2xl font-semibold">Invoice #0472</h1>
                  <p class="text-sm">August 1, 2021</p>
              </div>
          </header>
          <div class="mb-6">
              <h2 class="text-xl font-semibold">BILL TO</h2>
              <p class="text-sm "><?= ucfirst($patient->first_name) . " " . ucfirst($patient->last_name) . "." ;?></p>
              <p class="text-sm"><?= $setting->address ?></p>
              <p class="text-sm"><?= $patient?->phone ?></p>
          </div>
          <table class="w-full border-collapse border border-gray-600">
              <thead>
                  <tr>
                      <th class="p-2 border border-gray-600">ITEM</th>
                      <th class="p-2 border border-gray-600">PRICE</th>
                      <th class="p-2 border border-gray-600">QTY</th>
                      <th class="p-2 border border-gray-600">DISC</th>
                      <th class="p-2 border border-gray-600">TOTAL</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td class="p-2 border border-gray-600">Pixel Design System</td>
                      <td class="p-2 border border-gray-600">$128.00</td>
                      <td class="p-2 border border-gray-600">1</td>
                      <td class="p-2 border border-gray-600">50%</td>
                      <td class="p-2 border border-gray-600">$64.00</td>
                  </tr>
                  <tr>
                      <td class="p-2 border border-gray-600">Volt Dashboard Template</td>
                      <td class="p-2 border border-gray-600">$69.00</td>
                      <td class="p-2 border border-gray-600">1</td>
                      <td class="p-2 border border-gray-600">0%</td>
                      <td class="p-2 border border-gray-600">$69.00</td>
                  </tr>
                  <tr>
                      <td class="p-2 border border-gray-600">Neumorphism UI</td>
                      <td class="p-2 border border-gray-600">$89.00</td>
                      <td class="p-2 border border-gray-600">1</td>
                      <td class="p-2 border border-gray-600">0%</td>
                      <td class="p-2 border border-gray-600">$89.00</td>
                  </tr>
                  <tr>
                      <td class="p-2 border border-gray-600">Glassmorphism UI</td>
                      <td class="p-2 border border-gray-600">$149.00</td>
                      <td class="p-2 border border-gray-600">1</td>
                      <td class="p-2 border border-gray-600">0%</td>
                      <td class="p-2 border border-gray-600">$149.00</td>
                  </tr>
              </tbody>
          </table>
          <div class="mt-6 text-right">
              <p class="text-sm">SUBTOTAL: $415.00</p>
              <p class="text-sm">TAX RATE: 5%</p>
              <p class="text-sm">DISCOUNT: -$64.00</p>
              <p class="text-xl font-semibold mt-2">TOTAL: $351.00</p>
          </div>
      </div>
    </div>

<?= $this->endSection() ;?>