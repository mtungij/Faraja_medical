<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Receipt</title>
    <link rel="stylesheet" href="<?php echo base_url('css/styles.css') ?>">
</head>

<body>

    <div class="w-fit h-fit  p-10">
        <div class="p-10 m-10 bg-slate-100">
            <header class="flex justify-between items-center mb-6">
                <div>
                    <div class="text-center">
                        <p class="font-bold"><?= strtoupper( $setting->center_name) ;?></p>
                        <address>
                            <?= $setting->address ;?> <br />
                            <?= $setting->phone ;?> <br />
                            <?= $setting->email ;?>
                        </address>
                    </div>
                </div>
            </header>
            <div class="mb-6">
                <h2 class="text-xl font-medium">Patient informatons</h2>
                <p class="text-sm "> <span class="font-bold">Name:
                    </span><?= ucfirst($patient->first_name) . " " . ucfirst($patient->middle_name) . " " . ucfirst($patient->last_name) . "." ;?>
                </p>
                <p class="text-sm"><span class="font-bold">Address: </span<?= $setting?->address ?>< /p>
                        <p class="text-sm"><span class="font-bold">Phone: </span<?= $patient?->phone ?>< /p>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-400">
                        <th class="p-2">ITEM</th>
                        <th class="p-2">PRICE</th>
                        <th class="p-2">QTY</th>
                        <th class="p-2">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php foreach($invoiceType->items as $item): ?>
                    <tr class="border-b font-semibold border-gray-200">
                        <td class="p-2"><?= strtoupper($item->name) ?></td>
                        <td class="p-2"><?= number_format($item->price) ?></td>
                        <td class="p-2"><?= $item->quantity ?></td>
                        <?php $total += ($item->price * $item->quantity) ;?>
                        <td class="p-2"><?= number_format($item->price * $item->quantity) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="mt-6 text-right">
                <p class="text-sm">SUBTOTAL TSH: <?= number_format($total) ?></p>
                <p class="text-sm">TAX RATE: 0%</p>
                <p class="text-sm">DISCOUNT: 0%</p>
                <p class="text-xl font-semibold mt-2">TOTAL TSH: <?= number_format($total) ?></p>
            </div>
            <div class="my-3 text-center">
                <i>God will heal you!</i>
            </div>
        </div>
    </div>

    <script>
    //on page load print the page 
    window.onload = () => {
        print()
    }
    </script>
</body>

</html>